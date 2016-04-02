<?php

class ProductController extends Controller
{
	public function actionIndex()
	{
	   if(isset($_GET["value"]))
	   {

      $catName = $_GET["value"];  // taking category name from querystring
      $categoryInfo = Categories::model()->findByAttributes(array('name'=>$catName));    //for getting category Info

      $deployment = DeploymentFeatures::model()->findAll();  // for finding all deployment features 

      $criteria=new CDbCriteria;                             //for finding products related to that category
			$criteria->with = array('categories');
			$criteria->addCondition('category_id= '.$categoryInfo->id);
			$products = Product::model()->findAll($criteria);  

			$criteria2=new CDbCriteria;                          // for finding features related to that category
			$criteria2->with = array('categories');
			$criteria2->addCondition('category_id= '.$categoryInfo->id);
			$features = Features::model()->findALL($criteria2);

	   	//CVarDumper::dump($features,10,1);die;
	   	$this->render('product',array('products'=>$products,
			'features'=>$features,'categoryInfo'=>$categoryInfo,
			'deployment'=>$deployment));
        

     

	   }
      
	}


public function actionFilter($id)
{
	  //sleep(3);
		//CVarDumper::dump( $id,10,1);die;
		$criteria=new CDbCriteria;                             //for finding products related to that category
		$criteria->with = array('categories','features','deploymentFeatures');
		$criteria->addCondition('category_id= '.$id);     
		//adding conditions according to post request
		if(isset($_POST['deploy']))
		{
			$criteria->addInCondition('deployment_feature_id',$_POST['deploy']);
		}
		if(isset($_POST['features']))
		{
			$criteria->addInCondition('feature_id',$_POST['features']);
		}
		if(isset($_POST['nuser']))
		{
			$parts = explode('-', $_POST['nuser']);
			$criteria->addCondition('customer_count >= '.$parts[0] . ' and customer_count <= '.$parts[1]);
		}
    
		$products = Product::model()->findAll($criteria);  
		$content = $this->renderPartial('_products',array('products'=>$products),true);
		die(json_encode(array('content'=>$content,'success'=>1)));

}


	public function actionSearch()
	{
		if(isset($_GET["key"]))
		{
			$criteria=new CDbCriteria;                            
			$criteria->with = array('productHasCategories');
			$criteria->addCondition("name like '%".$_GET["key"]."%' or "."company_name like '%".$_GET["key"]."%' or "."description like '%".$_GET["key"]."%'" );    

			$products = Product::model()->findAll($criteria);  
	    //CVarDumper::dump($products,10,1);die;
			$this->render('search',array('products'=>$products));
      
		}
	}



	public function actionReferring($id)
	{		
    $product = Product::model()->findByPk($id);
    //CVarDumper::dump($product,10,1);die;
    $pCookie = Yii::app()->request->cookies["P_".$id];
    if(isset($pCookie))
    {
      CController:: redirect('http://'.$product->product_website);
    }
    else
    {
      $pCookie = new CHttpCookie("P_".$id,'set' );
			$pCookie->expire = time()+60*60*24; 
			Yii::app()->request->cookies["P_".$id] = $pCookie; 
			$tracking = new TrackingUser ;
			$tracking ->product_id = $id;
			$tracking ->user_ip = $this->get_client_ip();
			$tracking ->cookie = "P_".$id;
			$tracking ->entry_time = date("Y-m-d H:i:s",time());
			$tracking ->action_time = date("Y-m-d H:i:s",time());
			$queryGeoLoc = @unserialize(file_get_contents('http://ip-api.com/php/'.$tracking ->user_ip));
      if($queryGeoLoc && $queryGeoLoc['status'] == 'success')
      {
      	$tracking ->country = $queryGeoLoc['country'];
      	$tracking ->country_code = $queryGeoLoc['countryCode'];
      	$tracking ->region = $queryGeoLoc['region'];
      	$tracking ->region_name = $queryGeoLoc['regionName'];
      	$tracking ->city = $queryGeoLoc['city'];
      	$tracking ->zip = $queryGeoLoc['zip'];
      	$tracking ->latitude = $queryGeoLoc['lat'];
      	$tracking ->longitude = $queryGeoLoc['lon'];
      	$tracking ->timezone = $queryGeoLoc['timezone'];
      	$tracking ->isp = $queryGeoLoc['isp'];
      	$tracking ->org = $queryGeoLoc['org'];
      }
      else 
      {
        $tracking ->status_geo = 0;
      }      
			$tracking ->save();
      CController:: redirect('http://'.$product->product_website);
    }
  }

	public function actionProductRegister()
	{
		$user = new Users;
		$product = new Product;
		$category = new Categories;
		$this->render('productreg',array('users'=>$user,'product'=>$product,'category'=>$category));
	}

	public function actionProductRegisterSave()
	{
		//print_r($_POST['Product']);
		$email = $_POST['Users']['username'];
		
		$user = Users::model()->findByAttributes(array('username'=>$email));

		if($user)
		{
			$product = new Product;
			$product->attributes = $_POST['Product'];
			$product->add_date = new CDbExpression('NOW()');
			$product->user_id = $user->id;

			if($product->save())
			{
				$product_id = $product->id;

				foreach($_POST['Categories'] as $category)
				{
					$category_id = Categories::model()->findByAttributes(array('name'=>$category->name));

					//create object of product has categories and save.
				}
			}


		}
		else
		{
			$m=Yii::app()->getSecurityManager()->generateRandomString(6);
			$user = new Users;
			$user->attributes = $_POST['Users'];
			$user->password = base64_encode($m);
			$user->role_id = 2;
			$user->is_verified = 0;
			$user->add_date = new CDbExpression('NOW()');
			if($user->save())
			{
				
			}
		}*/

	}

	public function actionProductProfile($id)
	{
		$product = Product::model()->findByPk($id);

		$reviews = Reviews::model()->findAllByAttributes(array('product_id'=>$id));

		if($product)
		{
			$productCategoryFeatures = array();
			foreach ($product->categories as $productCategory)
			{
				foreach ($productCategory->features as $productCategoryFeature)
				{
					array_push($productCategoryFeatures, $productCategoryFeature->name);
				}
			}

			$productFeatures = array();
			foreach ($product->features as $productFeature)
			{
				array_push($productFeatures,$productFeature->name);
			}

			$this->render('showReviews',array('reviews'=>$reviews, 'product'=>$product,
			'productFeatures'=>$productFeatures, 'productCategoryFeatures'=>$productCategoryFeatures));
		}
	}


	


	public function get_client_ip() 
  {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }

  public function actionProductReview($id)
	{
		$review = new Reviews;
		$user = new Users;
		$product = Product::model()->findByAttributes(array('id'=>$id));
		$this->render('reviewsinput',array('review'=>$review,'user'=>$user,'product'=>$product));
 	}
 
	public function actionProductReviewSave($id)
	{
		$response="";
		$email = $_POST['Users']['username'];
		x:  $user = Users::model()->findByAttributes(array('username'=>$email));
		if($user)
		{
			$review = Reviews::model()->findByAttributes(array('user_id'=>$user->id,'product_id'=>$id));
			if(empty($review))
			{
				$review = new Reviews;
				$review->attributes = $_POST['Reviews'];
				$review->user_id = $user->id;
				$review->product_id = $id;
				$review->add_date = new CDbExpression('NOW()');
				if($review->save())
				{
					$review = Reviews::model()->findByAttributes(array('user_id'=>$user->id));
					$categories=RatingCategories::model()->findAll();
					foreach ($categories as $category)
					{
						$rating = new Ratings;
						$rating->review_id = $review->id;
						$rating->rating_category_id = $category->id;
						$rating->rating = $_POST[$category->id];
						$rating->add_date = new CDbExpression('NOW()');
						$rating->save();
					}
					$response['userSaved'] = 1;
					$response['url'] = Yii::app()->createUrl('/productProfile/index/',array('id'=>$id));
				}
			}
			else
			{
				$review->attributes = $_POST['Reviews'];
				$review->modify_date = new CDbExpression('NOW()');
				if($review->update())
				{
					foreach ($review->ratings as $rating)
					{
						$rating->rating = $_POST[$rating->ratingCategory->id];
						$rating->modify_date = new CDbExpression('NOW()');
						$rating->update();
					}
					$response['userUpdate']=2;
					$response['url'] = Yii::app()->createUrl('/productProfile/index/',array('id'=>$id));
				}
			}
			echo json_encode($response);
			die;
		}
		else
		{
			$m=Yii::app()->getSecurityManager()->generateRandomString(6);
			$user = new Users;
			$user->attributes = $_POST['Users'];
			$user->password = base64_encode($m);
			$user->role_id = 3;
			$user->is_verified = 0;
			$user->add_date = new CDbExpression('NOW()');
			if($user>save())
			{
				goto x;
			}
		}
	}
}

// Uncomment the following methods and override them if needed
/*
public function filters()
{
// return the filter configuration for this controller, e.g.:
return array(
'inlineFilterName',
array(
'class'=>'path.to.FilterClass',
'propertyName'=>'propertyValue',
),
);
}

public function actions()
{
// return external action classes, e.g.:
return array(
'action1'=>'path.to.ActionClass',
'action2'=>array(
'class'=>'path.to.AnotherActionClass',
'propertyName'=>'propertyValue',
),
);
}
*/