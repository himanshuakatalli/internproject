<?php

class ProductController extends Controller
{
	public function actionIndex()
	{
	   if(isset($_GET["value"]))
	   {


      $catName = explode('_',$_GET["value"])[1];  // taking category name from querystring
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
	  sleep(2);
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