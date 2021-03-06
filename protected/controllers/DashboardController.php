<?php
Yii::import('application.vendors.*');
require_once('stripe/init.php');
//require_once('../vendors/stripe/init.php');

class DashboardController extends Controller
{

public $layout="dashboard/main";

		/**
		 * @return array action filters
		 */
		public function filters()
		{
				return array(
						'accessControl', // perform access control for CRUD operations
						'postOnly + delete', // we only allow deletion via POST request
				);
		}

		/**
		 * Specifies the access control rules.
		 * This method is used by the 'accessControl' filter.
		 * @return array access control rules
		 */
		public function accessRules()
		{
				return array(
						array('allow',  // allow all users to perform 'index' and 'view' actions
								'actions'=>array(''),
								'users'=>array('*'),
						),
						array('allow', // allow authenticated user to perform 'create' and 'update' actions
								'actions'=>array('index','productsetting','usersetting','Productsettingsave','UserUpdate','Viewprofile','socialnetworks','ShowStats','addproduct','GetFeaturesByID','add_premium','deleteProduct','viewInvoice','GetFeatures','RemovePremium'),
								'users'=>array('@'),
						),
						array('allow', // allow admin user to perform 'admin' and 'delete' actions
								'actions'=>array(''),
								'users'=>array('admin'),
						),
						array('deny',  // deny all users
								'users'=>array('*'),
						),
				);
		}


		public function actionIndex()
		{
			$userVerificationStatus = Users::model()->find(array("condition"=>"id=:id","params"=>array(":id"=>Yii::app()->user->user_id),"select"=>"is_verified"));
			$this->layout="dashboard/main";
			$productArray = Product::model()->with('reviews.ratings')->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id,'status'=>'1'));

			if(empty($productArray)) {
					$this->render('indexAlt',array('status'=>$userVerificationStatus->is_verified));
			}else {

				$max = 0;
				$indexOfMax = 0;
				$ratingCount = array();
				foreach ($productArray as $product) {
								# code...
						$overallRating = 0;
						if(empty($product->reviews)) {
								array_push($ratingCount, 0);
								continue;
						}
						foreach ($product->reviews as $review) {
								# code...
								$totalRating = 0;
								foreach ($review->ratings as $rating) {
										# code...
										$totalRating += $rating->rating;
								}
								if(count($review->ratings)==0)
									$overallRating = 0;
								else
									$overallRating += $totalRating / count($review->ratings);
						}
						array_push($ratingCount, $overallRating);
				}
				foreach ($ratingCount as $key => $val) {
						if ($val > $max) {
								$max = $val;
								$indexOfMax = $key;
						}
				}
				$this->render('index',array('productArray'=>$productArray,'indexOfMax'=>$indexOfMax,'status'=>$userVerificationStatus->is_verified));
		 }
		}

public function actionProductsetting($id)
{
	$productexist=Product::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id,'id'=>$id,'status'=>'1'));

	if($productexist)
	{
		$product=Product::model()->findByPk($id);

		$productCategoryNames=array();
		foreach ($product->_categories as $_productCategory)
		{
			if($_productCategory->status == 1)
			{
				$productCategory = Categories::model()->findByPk($_productCategory->category_id);
				array_push($productCategoryNames, $productCategory->name);
			}
		}

		$productCategoryFeatures = array();
		foreach ($product->_categories as $_productCategory)
		{
			if($_productCategory->status == 1)
			{
				$productCategory = Categories::model()->findByPk($_productCategory->category_id);

				foreach ($productCategory->_features as $_productCategoryFeature)
				{
					if($_productCategoryFeature->status == 1)
					{
						$productCategoryFeature = Features::model()->findByPk($_productCategoryFeature->feature_id);
						array_push($productCategoryFeatures, $productCategoryFeature->name);
					}
				}
			}
		}

		$productFeatures = array();
		foreach ($product->_features as $_productFeature)
		{
			if($_productFeature->status == 1)
			{
				$productFeature = Features::model()->findByPk($_productFeature->feature_id);
				array_push($productFeatures,$productFeature->name);
			}
		}

		$this->render('productsetting',array('product'=>$product,'productCategory'=>$productCategoryNames,'productCategoryFeatures'=>$productCategoryFeatures,'productFeatures'=>$productFeatures));

	}
	else
	{
		$this->render('indexAlt');
	}
}


public function actionProductsettingsave($id)
{
	$product = Product::model()->findByPk($id);

	if(!empty($product))
	{
		$productOldCategory = array();
		foreach ($product->categories as $product_Category)
		{
			array_push($productOldCategory, $product_Category->name);
		}

		$productOldFeatures = array();
		foreach ($product->features as $productFeature)
		{
			array_push($productOldFeatures,$productFeature->name);
		}
	}

	if(isset($_POST['Product']))
	{
		$product->attributes = $_POST['Product'];
		

		if($product->under_ppc)
		{
			$product->was_under_ppc = 1;
		}

		if($product->update())
		{

			foreach($productOldCategory as $category)
			{
				$_category = Categories::model()->findByAttributes(array('name'=>$category));

				$productHasCategories = ProductHasCategories::model()->findByAttributes(array('product_id'=>$id,'category_id'=>$_category->id));

				if(!empty($productHasCategories))
				{
					$productHasCategories->status = 0;
					$productHasCategories->modify_date = new CDbExpression('NOW()');

					$productHasCategories->update();
				}

			}

			foreach($productOldFeatures as $features)
			{
				$_feature = Features::model()->findByAttributes(array('name'=>$features));

				$productHasFeatures = ProductHasFeatures::model()->findByAttributes(array('product_id'=>$id,'feature_id'=>$_feature->id));

				if(!empty($productHasFeatures))
				{
					$productHasFeatures->status = 0;
					$productHasFeatures->modify_date = new CDbExpression('NOW()');

					$productHasFeatures->update();
				}

			}

			if(isset($_POST['productCategory']))
			{
				foreach($_POST['productCategory'] as $category)
				{
					$_category = Categories::model()->findByAttributes(array('name'=>$category));

					$productHasCategories = ProductHasCategories::model()->findByAttributes(array('product_id'=>$id,'category_id'=>$_category->id));

					if(empty($productHasCategories))
					{
						$productHasCategories = new ProductHasCategories;
						$productHasCategories->product_id = $id;
						$productHasCategories->category_id = $_category->id;
						$productHasCategories->add_date = new CDbExpression('NOW()');

						$productHasCategories->save();
					}
					$productHasCategories->status = 1;
					$productHasCategories->modify_date = null;
					$productHasCategories->update();
				}
			}

			if(isset($_POST['productCategoryFeatures']))
			{
				foreach($_POST['productCategoryFeatures'] as $feature)
				{
					$_feature = Features::model()->findByAttributes(array('name'=>$feature));

					$productHasFeatures = ProductHasFeatures::model()->findByAttributes(array('product_id'=>$id,'feature_id'=>$_feature->id));

					if(empty($productHasFeatures))
					{
						$productHasFeatures = new ProductHasFeatures;
						$productHasFeatures->product_id = $id;
						$productHasFeatures->feature_id = $_feature->id;
						$productHasFeatures->add_date = new CDbExpression('NOW()');

						$productHasFeatures->save();
					}
					$productHasFeatures->status = 1;
					$productHasFeatures->modify_date = null;
					$productHasFeatures->update();
				}
			}

		}
	}
}


public function actionUsersetting()
{
	$user_id = Yii::app()->user->id;
	$user = new Users;
	$_user = Users::model()->findByAttributes(array('username'=>$user_id));
	$this->render('usersetting',array('user'=>$user,'_user'=>$_user));

}

public function actionSocialnetworks()
{

	$this->render('socialnetworks');

}

public function actionUserUpdate()
{

	$user_id = Yii::app()->user->id;
	$user = Users::model()->findByAttributes(array('username'=>$user_id));

	$user->attributes = $_POST['Users'];

	$user->job_profile = $_POST['Users']['job_profile'];

	$user->profile_img = $_POST['Users']['profile_img'];

	if(isset($_POST['Users']['password']))
	{
		if($user->password == "")
		{
			$_user = Users::model()->findByAttributes(array('username'=>$user_id));

			$user->password = $_user->password;
		}
		else
		{
			$user->password = base64_encode($_POST['Users']['password']);
		}
	}

	$user->modify_date = new CDbExpression('NOW()');

	$user->update();
}

public function actionGetFeatures()
{
	$features = array();

	if(!empty($_POST['categories']))
	{
		foreach($_POST['categories'] as $category)
		{
			$_category = Categories::model()->findByAttributes(array('name'=>$category));

			foreach($_category->features as $feature)
			{
				if(!in_array($feature->name, $features))
					array_push($features, $feature->name);
			}
		}
	}

	if(empty($features))
	{
		echo "";
	}
	echo "<i class='fa fa-tasks fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1'></i>
	<select id='features' name='productCategoryFeatures[]' multiple='multiple' class='col-lg-11 col-md-11 col-sm-11 col-xs-11' >";
		for($i=0;$i<count($features);$i++)
		{
			echo "<option value='$features[$i]'>$features[$i]</option>";
		}
		echo "</select>";
	}


	public function actionGetFeaturesByID()
	{
		$features = array();

		if(!empty($_POST['categories']))
		{
			foreach($_POST['categories'] as $category_id)
			{
				$_category = Categories::model()->findByPk($category_id);

				foreach($_category->features as $feature)
				{
					if(!in_array($feature->name, $features))
						array_push($features, $feature->name);
				}
			}
		}

		if(empty($features))
		{
			echo "";
		}

		echo "<span class='input-group-addon'><i class='glyphicon glyphicons-life-preserver'></i></span>
					<select class='form-control' multiple='multiple' id='productFeatures' name='features[]'>";

		for($i=0;$i<count($features);$i++)
		{
			echo "<option value='$features[$i]'>$features[$i]</option>";
		}

		echo "</select>";
	}

		public function actionShowStats($id)
		{
			$product = Product::model()->findByAttributes(array('id'=>$id, 'status'=>'1','user_id'=>Yii::app()->user->user_id));
			
			if($product)
			{
				$sql = "select count(*) as click_count,entry_time as date,extract(month from entry_time) as month,extract(year from entry_time) as year from tracking_user where product_id='$product->id' group by extract(month from entry_time),extract(year from entry_time) order by year desc, month desc";

				$command = Yii::app()->db->createCommand($sql);

				$stats = $command->queryAll();

				// foreach ($stats as $stat) 
				// {
				// 	print_r($stat);
				// }

				$this->render('showstats',array('stats'=>$stats,'product'=>$product));
			}
			else
			{
				$this->render('indexAlt');
			}
		}
//dashboard add product page.
	public function actionAddproduct()
	{
		$product = new Product;

		$product->user_id = Yii::app()->user->user_id;
		$product->name = $_POST['product_name'];
		$product->description = $_POST['product_description'];
		$product->product_website = $_POST['product_website'];
		$product->starting_price = $_POST['starting_price'];
		$product->customer_count = $_POST['user_count'];
		$product->company_name = $_POST['company_name'];
		$product->company_website = $_POST['company_website'];
		$product->founding_country = $_POST['founding_country'];
		$product->founding_year = $_POST['founding_year'];
		$product->add_date= new CDbExpression('NOW()');


		if(isset($_POST['trial']))
		{
			if($_POST['trial'] == 'trial')
			{
				$product->has_trial = 1;
			}
		}

		if(isset($_POST['free_version']))
		{
			if($_POST['free_version'] == 'free')
			{
				$product->has_free_version = 1;
			}
		}

		if($product->save())
		{

			if(isset($_POST['Categories']))
			{
				foreach($_POST['Categories']['id'] as $category_id)
				{
					$productHasCategories = new ProductHasCategories;
					$productHasCategories->product_id = $product->id;
					$productHasCategories->category_id = $category_id;
					$productHasCategories->add_date = new CDbExpression('NOW()');

					$productHasCategories->save();
				}
			}

			if(isset($_POST['features']))
			{
				foreach($_POST['features'] as $feature)
				{
					$_feature = Features::model()->findByAttributes(array('name'=>$feature));

					$productHasFeatures = new ProductHasFeatures;
					$productHasFeatures->product_id = $product->id;
					$productHasFeatures->feature_id = $_feature->id;
					$productHasFeatures->add_date = new CDbExpression('NOW()');

					$productHasFeatures->save();
				}
			}

			if(isset($_POST['DeploymentFeatures']))
			{
				foreach($_POST['DeploymentFeatures']['id'] as $deploymentFeatureID)
				{
					$productHasDeploymentFeatures = new ProductHasDeploymentFeatures;
					$productHasDeploymentFeatures->product_id = $product->id;
					$productHasDeploymentFeatures->deployment_feature_id = $deploymentFeatureID;
					$productHasDeploymentFeatures->add_date = new CDbExpression('Now()');

					$productHasDeploymentFeatures->save();
				}
			}

			if(isset($_POST['SupportFeatures']))
			{
				foreach($_POST['SupportFeatures']['id'] as $supportFeatureID)
				{
					$productHasSupportFeatures = new ProductHasSupportFeatures;
					$productHasSupportFeatures->product_id = $product->id;
					$productHasSupportFeatures->support_feature_id = $supportFeatureID;
					$productHasSupportFeatures->add_date = new CDbExpression('Now()');

					$productHasSupportFeatures->save();
				}
			}

			if(isset($_POST['TrainingFeatures']))
			{
				foreach($_POST['TrainingFeatures']['id'] as $trainingFeatureID)
				{
					$productHasTrainingFeatures = new ProductHasTrainingFeatures;
					$productHasTrainingFeatures->product_id = $product->id;
					$productHasTrainingFeatures->training_feature_id = $trainingFeatureID;
					$productHasTrainingFeatures->add_date = new CDbExpression('Now()');

					$productHasTrainingFeatures->save();
				}
			}

		}
	}
// payment proccessing

	public function actionAdd_premium()
	{
		$user_id = Yii::app()->user->user_id;
		$user=Users::model()->findByPk($user_id);

		$token = $_POST['token'];

		try{
			$secretkey=Controller::getsecretkey();

			\Stripe\Stripe::setApiKey($secretkey);

			echo $secretkey."\n";
			echo $token;
			

			$customer = \Stripe\Customer::create(
				array(
					"description"=>"Amount paid for premium plan by vendor ".$user->first_name." ".$user->last_name."",
					"source"=>$token
					));
			
			
			print_r($customer);
			
			$charge = \Stripe\Charge::create(
			array(
				'amount' => (2060),
				'currency' => 'usd',
				"customer" => $customer->id 
				));

			if($charge->paid)
			{
				$user->is_premium ='1';
				$user->Customer_ID = $customer->id;

				$products = Product::model()->findAllByAttributes(array('user_id'=>$user->id));
			
				foreach($products as $product)
				{
					if($product->was_under_ppc)
					{
						$product->under_ppc = 1;
						$product->update();
					}
				}


				$transaction=new Transaction;
				$transaction->user_id=$user_id;
				$transaction->customer_id=$customer->id;
				$transaction->amount='20$';
				$transaction->transaction_id=$charge->id;
				$transaction->description=$charge->description;
				$transaction->add_date=new CDbExpression('Now()');
				
				if($transaction->save())
				{
					$user->update();
				}
			}
			else
			{
				$transaction=new Transaction;
				$transaction->transaction_id=$charge->id;
				$transaction->user_id=$user_id;
				$transaction->amount='20$';
				$transaction->failure_code=$charge->failure_code;
				$transaction->description=$charge->failure_message;
				$transaction->add_date=new CDbExpression('Now()');
				if($transaction->save())
				{
					$response['message']="Transaction Failed.Please try later.";
					$response['error']=$charge->failure_message;
					$response['success']="0";
					echo json_encode($response);
				}
			}
		}
		catch(\Stripe\Error\InvalidRequest $e)
		{
			echo "Hello1";
			$e_json = $e->getJsonBody();
			$error = $e_json['error'];
			$response['error']=$error['message'];
			$response['success']="2";
			echo json_encode($response);
		}
		catch(\Stripe\Error\ApiConnection $e)
		{
			echo "Hello2";
			$e_json = $e->getJsonBody();
			$error = $e_json['error'];
			$response['error']=$error['message'];
			$response['success']="3";
			echo json_encode($response);
		}
		catch (\Stripe\Error\Base $e)
		{
			echo "Hello3";
			$e_json = $e->getJsonBody();
			$error = $e_json['error'];
			$response['error']=$error['message'];
			$response['message']="Something gone wrong.Please try later.And send us screenshot of this error.";
			$response['success']="4";
			echo json_encode($response);
		}
		catch(Exception $e)
		{
			echo "Hello4";
			$e_json = $e->getJsonBody();
			$error = $e_json['error'];
			$response['error']=$error['message'];
			$response['message']="Internal Server Error.";
			$response['success']="5";
			echo json_encode($response);
		}
	}

	public function actionViewInvoice($id) {
		$invoice = Invoice::model()->with('product','user')->findByPk($id);
		if(!empty($invoice) && $invoice->payment_status)
			$this->render('viewInvoice',array('invoiceArray'=>$invoice));
		else
			$this->render('indexAlt');
	}

	public function actionDeleteProduct($id)
	{
		$productexist=Product::model()->findByAttributes(array('user_id'=>Yii::app()->user->user_id,'id'=>$id,'status'=>'1'));
		if($productexist)
		{
			$productexist->status='0';
			if($productexist->update())
			{
				$this->redirect(array('index'));
			}
		}
	}

	public function actionRemovePremium()
	{
		$user = Users::model()->findByPk(Yii::app()->user->user_id);

		if(!empty($user))
		{
			$user->is_premium = 0;

			$user->update();

			$products = Product::model()->findAllByAttributes(array('user_id'=>$user->id));
			
			foreach($products as $product)
			{
				if($product->under_ppc)
				{
					$product->under_ppc = 0;
					$product->was_under_ppc = 1;
					$product->update();
				}
			}
		}
	}

}
