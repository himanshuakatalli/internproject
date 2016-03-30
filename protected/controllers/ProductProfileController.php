<?php

class ProductProfileController extends Controller
{
	public function actionIndex($id)
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
}