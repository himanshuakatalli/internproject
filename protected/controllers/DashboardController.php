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
                'actions'=>array('index','productsetting','usersetting'),
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
        $productArray = Product::model()->with('reviews.ratings')->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id));
        if(!$productArray) {
            $this->render('indexAlt');
        }
        $max = 0;
        $indexOfMax = 0;
        $ratingCount = array();
        foreach ($productArray as $product) {
                # code...
            $overallRating = 0;
            if(!$product->reviews) {
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

    public function actionProductsetting()
    {
        $this->layout="dashboard/main";
        $this->render('productsetting');
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