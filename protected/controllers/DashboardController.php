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
        $this->render('index');
    }
public function actionProductsetting()
    {
        $id=3;
        $this->layout="dashboard/main";
        $product=Product::model()->findByPk($id);
        if(isset($_POST['product']))
         {



         }
        $this->render('productsetting',array('product'=>$product));
    }
public function actionUsersetting()
    {
        $user = new Users;
        $this->layout="dashboard/main";
        return $this->render('usersetting',array('users'=>$user));
    }
}