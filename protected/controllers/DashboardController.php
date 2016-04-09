<?php
Yii::import('application.vendors.*');
require_once('stripe/init.php');
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
								'actions'=>array('index','productsetting','usersetting','Productsettingsave','UserUpdate','Viewprofile','socialnetworks','ShowStats','addproduct','GetFeaturesByID','payment'),
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
			$productArray = Product::model()->with('reviews.ratings')->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id));

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
	$productexist=Product::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id,'id'=>$id));

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

		$criteria = new CDbCriteria();
		$criteria->order = 'entry_time ASC';
		$criteria->condition = 'product_id=:id';
		$criteria->params = array(':id'=>$id);
		$tracking_user = TrackingUser::model()->findAll($criteria);

		$currDate = "0000-00";
		$ppcCountArray = array();
		foreach ($tracking_user as $value)
		{
			if(preg_match_all("/$currDate/", $value->entry_time, $matches) == 0)
			{
				$tempDateArray = explode(" ",$value->entry_time);
				$currYearMonth = explode("-",$tempDateArray[0]);
				$currYearMonth = array($currYearMonth[0], $currYearMonth[1]);
				$currDate = implode("-", $currYearMonth);
				$ppcCountArray[$currDate] = 1;
			}
			else
			{
				$ppcCountArray[$currDate]++;
			}
		}

		//print_r($ppcCountArray);

		$this->render('productsetting',array('product'=>$product,'productCategory'=>$productCategoryNames,'productCategoryFeatures'=>$productCategoryFeatures,'productFeatures'=>$productFeatures,'monthlyBill'=>$ppcCountArray));

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
		print_r($product);

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
public function actionViewprofile()
{
	$user_id = Yii::app()->user->id;
	$user = new Users;
	$_user = Users::model()->findByAttributes(array('username'=>$user_id));
	$this->render('viewprofile',array('user'=>$user,'_user'=>$_user));

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

	if($user->password == "")
	{
		$_user = Users::model()->findByAttributes(array('username'=>$user_id));

		$user->password = $_user->password;
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
			$productexist=Product::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id,'id'=>$id));
			if($productexist)
			{
			$criteria = new CDbCriteria();
			$criteria->order = 'entry_time ASC';
			$criteria->condition = 'product_id=:id';
			$criteria->params = array(':id'=>$id);
			$tracking_user = TrackingUser::model()->findAll($criteria);

			$currDate = "0000-00-00";
			$ppcCountArray = array();
			foreach ($tracking_user as $value) {
					# code...
				if(preg_match_all("/$currDate/", $value->entry_time, $matches) == 0) {
						$tempDateArray = explode(" ",$value->entry_time);
						$currDate = $tempDateArray[0];
						$ppcCountArray[$currDate] = 1;
				}
				else {
						$ppcCountArray[$currDate]++;
				}
			}
			$this->render('showstats',array('ppcCountArray'=>$ppcCountArray,'product_id'=>$id));
		}else{

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
		$product->status = 1;
		$product->visit_count = 0;
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
			foreach($_POST['Categories']['id'] as $category_id)
			{
				$productHasCategories = new ProductHasCategories;
				$productHasCategories->product_id = $product->id;
				$productHasCategories->category_id = $category_id;
				$productHasCategories->add_date = new CDbExpression('NOW()');

				$productHasCategories->save();
			}

			foreach($_POST['features'] as $feature)
			{
				$_feature = Features::model()->findByAttributes(array('name'=>$feature));

				$productHasFeatures = new ProductHasFeatures;
				$productHasFeatures->product_id = $product->id;
				$productHasFeatures->feature_id = $_feature->id;
				$productHasFeatures->add_date = new CDbExpression('NOW()');

				$productHasFeatures->save();
			}

			foreach($_POST['deployment_features'] as $deploymentFeatureID)
			{

				$productHasDeploymentFeatures = new ProductHasDeploymentFeatures;
				$productHasDeploymentFeatures->product_id = $product->id;
				$productHasDeploymentFeatures->deployment_feature_id = $deploymentFeatureID;
				$productHasDeploymentFeatures->add_date = new CDbExpression('Now()');

				$productHasDeploymentFeatures->save();
			}

		}
	}
// payment proccessing

	public function actionPayment()
	{
		$user_id=Yii::app()->user->user_id;
		$token=$_POST['token'];
		$id=$_POST['product_id'];
		// $token='tok_17xwKBBbTKYuQctafgo9ICuQ';
		$invoice=Invoice::model()->findByAttributes(array('user_id'=>$user_id,'product_id'=>$id,'payment_status'=>'0'));
		if($invoice)
		{
			try{
							$secretkey=Controller::getsecretkey();
							\Stripe\Stripe::setApiKey($secretkey);
			        $charge = \Stripe\Charge::create(
				              array('card' => $token,
				                    'amount' => $invoice->amount,
				                    'currency' => 'usd',
				                    'description'=>"Amount paid for User ID: ".$user_id." and product ID: ".$id." ",
				                    ));

						  if($charge->paid)
							{
										$transaction=new Transaction;
										$transaction->invoice_id=$invoice->id;
										$transaction->stripe_transaction_id=$charge->id;
										$transaction->transaction_status='1';
										$transaction->status='1';
										$transaction->msg_description=$charge->description;
										$transaction->add_date=new CDbExpression('Now()');
										if($transaction->save())
										{
											$invoice->payment_status='1';
										  if($invoice->update())
										  {
											  $response['message']="Transaction Successfull.";
												$response['success']="1";
												echo json_encode($response);
										  }
										}
							}else{
										$transaction=new Transaction;
										$transaction->invoice_id=$invoice->id;
										$transaction->stripe_transaction_id=$charge->id;
										$transaction->transaction_status='0';
										$transaction->status='1';
										$transaction->failure_code=$charge->failure_code;
										$transaction->failure_message=$charge->failure_message;
										$transaction->msg_description=$charge->description;
										$transaction->add_date=new CDbExpression('Now()');
										if($transaction->save())
										{
											$response['message']="Transaction Failed.";
											$response['error']=$charge->failure_message;
											$response['success']="0";
											echo json_encode($response);
										}

							    }
						}catch(\Stripe\Error\InvalidRequest $e)
						{
							$e_json = $e->getJsonBody();
              $error = $e_json['error'];
              $response['error']=$error['message'];
							// $response['message']="Invalid Request.";
							$response['success']="2";
							echo json_encode($response);
						}catch(\Stripe\Error\ApiConnection $e)
						{
							$e_json = $e->getJsonBody();
              $error = $e_json['error'];
              $response['error']=$error['message'];
							// $response['message']="Network Error.Please make request again";
							$response['success']="3";
							echo json_encode($response);
						}catch (\Stripe\Error\Base $e)
						 {
						 	$e_json = $e->getJsonBody();
              $error = $e_json['error'];
              $response['error']=$error['message'];
						 	$response['message']="Something gone wrong.Please try later.And send us screenshot of this error.";
							$response['success']="4";
							echo json_encode($response);
						 }
						catch(Exception $e)
						{
							$e_json = $e->getJsonBody();
              $error = $e_json['error'];
              $response['error']=$error['message'];
							$response['message']="Internal Server Error.";
							$response['success']="5";
							echo json_encode($response);
						}

	 }else{
	 					  // $response['message']="Invalid Invoice.";
	 					  $response['error']="Invalid Invoice.";
							$response['success']="7";
							echo json_encode($response);
			  }

	}
public function actionDeleteProduct($id)
{
	$productexist=Product::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id,'id'=>$id));
	if($productexist)
	{
		$productexist->status='0';
		$productexist->update();
	}

}

}
