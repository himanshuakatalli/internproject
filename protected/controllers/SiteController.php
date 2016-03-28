<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout="newPublic";
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('newIndex');
	}
	public function actionCategories()
	{
		$this->layout="pagehead";
		$this->render('categories');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	 public function actionLogin()
    {
        $model=new LoginForm;
        if(isset($_POST['LoginForm']))
        {
            $model->username=$_POST['LoginForm']['username'];
            $model->password=$_POST['LoginForm']['password'];

            if($model->validate() && $model->login())
            {
            $response['success']='1';
            $response['url']	=Yii::app()->createUrl(Yii::app()->user->role);
            echo json_encode($response);
            }else{
            $response['success']='User Name Is Not Valid.';
            echo json_encode($response);
            }
        }
    }
    public function actionForgot()
    {
        $forgot=new ForgotpasswordForm;

		if(isset($_POST['ForgotpasswordForm']))
        {
             $forgot->email=$_POST['ForgotpasswordForm']['email'];
             $username=$_POST['ForgotpasswordForm']['email'];
             $user=Users::model()->find(array('condition'=>"username='$username'"));

	         if($user)
	         {
	            if($forgot->validate())
	            {

                            $to="abhishek.singh@venturepact.com";
                           // $to=$username;
                            $from="abhishek.singh@venturepact.com";
                            $from_name="bla-bla";
                            $subject="Forgot Password";


                            //$message="click to verify account.<br><br><a href=".$url.">Click Here</a>";
                            $message="Your password is:- <br>".$user->password;
                            $this->mailsend($to,$from,$from_name,$subject,$message);





	                $response['success']='1';
	                $response['message']="Email is send to your email id.";
	                echo json_encode($response);
	            }
	        }else{
                    $response['success']='2';
	                $response['message']="Email dosen't exist.";
	                echo json_encode($response);

	             }
        }
    }


 public function actionSignup()
 {
    $users=new Users;

    if(isset($_POST['Users']))
    {
                $users->first_name=$_POST['Users']['first_name'];
                $users->username=$_POST['Users']['username'];
                $username=$_POST['Users']['username'];
                $users->password=$_POST['Users']['password'];
				$users->role_id=$_POST['Users']['role_id'];
				$users->add_date=date("Y-m-d h:i:sa");
				$users->hash=md5(uniqid(rand(1,1000)));
                if($users->save())
                {
                		    //$to="abhishek.singh@venturepact.com";
                            $to=$username;
                            $from="abhishek.singh@venturepact.com";
                            $from_name="bla-bla";
                            $subject="verify your Email";

                               $url = Yii::app()->createUrl('site/verify',array('email'=>$username,'hash'=>$users->hash));
                                $url ="localhost".$url;

                            //$message="click to verify account.<br><br><a href=".$url.">Click Here</a>";
                            $message="click to verify account.<br><br><a href=".$url.">Click Here</a>";
                            $this->mailsend($to,$from,$from_name,$subject,$message);

                            $response['success']='1';
                            $response['message']='Successfully Registered.Verify your Email and login.';
                            echo json_encode($response);

                }else{


                            $response['success']='2';
                            $response['message']='Something went wrong.';
                            echo json_encode($response);
                }
    }
 }

public function actionVerify()
{

	$user=new Users;
	if(isset($_GET['email'])&&isset($_GET['hash']))
	{
		$username=$_GET['email'];
		$hash=$_GET['hash'];

		$user=Users::model()->find(array('condition'=>"username='$username' AND hash='$hash'"));
	     if($user)
	     {
	       $user->is_verified=1;
	       if($user->save())
	        {
	           $url=Yii::app()->createUrl('site');
	            $user->hash=null;
	            $user->save();
	           header('location:'.$url);
	        }

	     }else
	     {
	     	echo "sorry! Couldn't Verify you.";
	     }

	}

}


	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
