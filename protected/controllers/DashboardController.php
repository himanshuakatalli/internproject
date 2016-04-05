<?php

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
      $user_id = Users::model()->findByAttributes(array('username'=>Yii::app()->user->id));
      $productArray = Product::model()->with('reviews.ratings')->findAllByAttributes(array('user_id'=>$user_id->id));
      if(empty($productArray)) {
          $this->render('indexAlt');
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
        $this->render('index',array('productArray'=>$productArray,'indexOfMax'=>$indexOfMax));
  		}
    }


public function actionProductsetting($id)
    {

            $productexist=Product::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id,'id'=>$id));
// CVarDumper::dump($productexist,10,1); die;
            if($productexist)
            {
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
        }else
        {
            $this->render('indexAlt');

        }


 }


public function actionProductsettingsave($id)
{
		$product=$product=product::model()->findByPk($id);

         // CVarDumper::dump($_POST['productCategory'],10,1);die;
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
        // $this->layout="dashboard/main";
        $this->render('usersetting');
    }

}