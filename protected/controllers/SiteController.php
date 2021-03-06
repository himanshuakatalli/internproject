<?php

Yii::import('application.vendors.*');
require_once('LinkedIn/http.php');
require_once('LinkedIn/oauth_client.php');

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
	$this->render('newIndex');
}

public function actionCategories()
{
	$categories = Categories::model()->findAllByAttributes(array('status'=>1));

	$this->render('categories',array('categories'=>$categories));
}

public function actionCategoryFilter()
{
	$partialText = $_POST['partialText'];

	$sql = "select name from categories where name like '%$partialText%' and status = 1";

	$categories = Categories::model()->findAllBySql($sql);

	if($categories)
	{
		$this->renderPartial('render_categories',array('categories'=>$categories));
	}
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
			$response['url'] = Yii::app()->createUrl('dashboard');
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
			if($user->hash)
			{
//do nothing
			}else{
				$user->hash=md5(uniqid(rand(1,1000)));
				$user->update();
			}
			if($forgot->validate())
			{
// $to="abhishek.singh@venturepact.com";
				$to=$username;
//CVarDumper::dump($mail,10,1);
				$from="abhishek.singh@venturepact.com";
				$from_name="admin";
				$subject="Forgot Password";
				$url = Yii::app()->createUrl('site/newpassword',array('email'=>$username,'hash'=>$user->hash));
				$url ="localhost".$url;
				$message="Hey, ".$user->first_name." ".$user->last_name."!<br><br><br>";
				$message .="A password reset request has been initiated from your account, please click the button below to reset your password.<br><br>";
				$message .="<a href=".$url."><button style='background:#f07762;color:white;width:200px;height:30px'>Reset Password</button></a><br><br>";
				$message.=" If you did not initiate this request, kindly ignore this email.<br><br><br>";
				$message.="Thanks,<br>";
				$message.="VenturePact Support Team.";
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
		$users->password=base64_encode($_POST['Users']['password']);
		$users->role_id=$_POST['Users']['role_id'];
		$users->add_date=new CDbExpression('NOW()');
		$users->hash=md5(uniqid(rand(1,1000)));
		$user_exist=Users::model()->find(array('condition'=>"username='$username'"));
		if(!$user_exist)
		{
			if($users->save())
			{
//$to="abhishek.singh@venturepact.com";
				$this->sendVerificationEmailOnSignUP($username, $users);

				$response['success']='1';
				$response['message']='Successfully Registered.Verify your Email and login.';
				echo json_encode($response);

			}else{


				$response['success']='2';
				$response['message']='Something went wrong.';
				echo json_encode($response);
			}
		}else
		{
			$response['success']='3';
			$response['message']='You are already Registered with this email id.Login to continue.';
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
			$user->hash=null;
			if($user->update())
			{
				$this->redirect('index');
			}

		}else
		{
			$this->redirect('verifyerror');
		}

	}

}

public function actionNewpassword()
{
	$this->layout="pagehead";
	$reset=new Reset;

	if(isset($_GET['email'])&&isset($_GET['hash']))
	{
		$username=$_GET['email'];
		$hash=$_GET['hash'];
		$user=Users::model()->find(array('condition'=>"username='$username' AND hash='$hash'"));
		if($user)
		{
			$this->render('reset',array('reset'=>$reset,'user'=>$user));
		}else
		{
			$this->redirect('expire');
		}
	}
}
public function actionReset()
{
	//$this->layout="pagehead";
	$reset=new Reset;
	$username=$_GET['username'];
	if(isset($_POST['Reset']))
	{

		$user=Users::model()->find(array('condition'=>"username='$username'"));
		if($user)
		{
			$user->password=base64_encode($_POST['Reset']['Password']);
			$user->hash=null;
			if(!$user->is_verified)
			{
				$user->is_verified=1;
			}
			if($user->update())
			{
				$response['success']=1;
				$response['message']="Password successfully saved.";
				echo json_encode($response);
			}
		}

	}
}
public function actionExpire()
{
	$this->layout="pagehead";
	$this->render('linkerror');
}
public function actionVerifyerror()
{
	$this->layout="pagehead";
	$this->render('verifyerror');
}
public function actionLinkedin()
{
        $baseURL = 'http://localhost/internproject/';
        $callbackURL = 'http://localhost/internproject/index.php/site/linkedin';
        $linkedinApiKey = Controller::getapikey();
        $linkedinApiSecret = Controller::getapisecret();
        $linkedinScope = 'r_basicprofile r_emailaddress';

        if (isset($_GET["oauth_problem"]) && $_GET["oauth_problem"] <> "") {
          // in case if user cancel the login. redirect back to home page.
          Yii::app()->user->setState('err_msg',$_GET["oauth_problem"]);
          $this->redirect('index');
          exit;
        }

        $client = new oauth_client_class;
        $client->debug = false;
        $client->debug_http = true;
        $client->redirect_uri = $callbackURL;
        $client->client_id = $linkedinApiKey;
        $client->client_secret = $linkedinApiSecret;
        $client->scope = $linkedinScope;
        if (($success = $client->Initialize())) {
          if (($success = $client->Process())) {
            if (strlen($client->authorization_error)) {
              $client->error = $client->authorization_error;
              $success = false;
            } elseif (strlen($client->access_token)) {
              $success = $client->CallAPI(
                            'http://api.linkedin.com/v1/people/~:(id,email-address,first-name,headline,last-name,location,picture-url,public-profile-url,positions,formatted-name)',
                            'GET', array(
                                'format'=>'json'
                            ), array('FailOnAccessError'=>true), $user);
            }
          }
          $success = $client->Finalize($success);
        }
        if ($client->exit) exit;
        if ($success) {
 //CVarDumper::dump($user,10,1); die;
               $this->linked_in_user($user);
        } else {
             Yii::app()->user->setState('err_msg',$client->error);
        }
        $this->redirect('index');
        exit;
}

public function linked_in_user($userdata)
{
	$oauth_uid = $userdata->id;
	$username = $userdata->emailAddress;

	$user = Users::model()->findByAttributes(array("username"=>$username,"oauth_uid"=>$oauth_uid));
	if(empty($user))
	{
		$user = new Users;
		$user->add_date=date("Y-m-d h:i:sa");
	}
	$user->first_name=$userdata->firstName;
	$user->last_name=$userdata->lastName;
	$user->username=$userdata->emailAddress;
	$user->oauth_uid=$userdata->id;
	$user->password=base64_encode($userdata->id);
	$user->role_id="2";
	$user->job_profile=$userdata->positions->values[0]->title;
	$user->organization=$userdata->positions->values[0]->company->name;
	$user->profile_img=$userdata->pictureUrl;
	$user->is_verified="1";
	$user->modify_date=date("Y-m-d h:i:sa");
	$user->in_profile_url=$userdata->publicProfileUrl;
	$user->save();
	$model = new LoginForm;
	$model->username=$userdata->emailAddress;
	$model->password=$userdata->id;
	if($model->validate() && $model->login()){

		$this->redirect(Yii::app()->createUrl('dashboard'));
	} else {
		$this->redirect(Yii::app()->createUrl('site/index'));
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

public function sendVerificationEmailOnSignUP($username, $users)
{
	$to=$username;
	$from="abhishek.singh@venturepact.com";
	$from_name="Admin";
	$subject="Verify your Email";

	$url = Yii::app()->createUrl('site/verify',array('email'=>$username,'hash'=>$users->hash));
	$url ="localhost".$url;
	$message="Hey, ".$users->first_name." ".$users->last_name."!<br><br><br>";
	$message.="Thank you for trusting us.<br><br>";
	$message .="<a href=".$url."><button style='background:#f07762;color:white;width:200px;height:30px'>Verify Your Email</button></a><br><br><br>";
	$message.="Regards,<br>";
	$message.="VenturePact Support Team.";
	$this->mailsend($to,$from,$from_name,$subject,$message);
}


}
