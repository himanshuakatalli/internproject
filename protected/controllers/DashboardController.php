<?php

class DashboardController extends Controller
{


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
                'actions'=>array('index','productsetting','usersetting','Productsettingsave'),
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
        $this->layout="dashboard/main";
        $this->render('index');
    }
public function actionProductsetting()
    {
        $id=3;
        $this->layout="dashboard/main";
        $product=Product::model()->findByPk($id);

        $productCategoryNames=array();
				foreach ($product->categories as $product_Category)
						{
								array_push($productCategoryNames, $product_Category->name);
						}
					//CVarDumper::dump($productCategory,10,1); die;
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
	       // CVarDumper::dump($productFeatures,10,1); die;

        $this->render('productsetting',array('product'=>$product,'productCategory'=>$productCategoryNames,'productCategoryFeatures'=>$productCategoryFeatures,'productFeatures'=>$productFeatures));
    }


public function actionProductsettingsave($id)
{
		$product=$product=product::model()->findByPk($id);
		if(isset($_POST['Product']))
	     {
			     	$product->attributes = $_POST['Product'];



			     	if($product->update())
			     	{
								$response['message']="successfully Updated.";
								echo json_encode($response);
						}

	      }

}

public function actionUsersetting()
    {
        $this->layout="dashboard/main";
        $this->render('usersetting');
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