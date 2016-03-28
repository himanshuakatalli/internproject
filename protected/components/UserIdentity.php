<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

	$username=$this->username;
	$password=$this->password;

		$user=Users::model()->find(array('condition'=>"username='$username'"));

		if(!empty($user))
		{
		   if($password==$user->password)
		     {
		        $this->errorCode=self::ERROR_NONE;
	            Yii::app()->user->setState('id',$username);
	            Yii::app()->user->setState('fname',$user->first_name);
	          //  $rolename=Roles::model()->find(array('condition'=>"id='$user->role_id'"));
	            Yii::app()->user->setState('role',$user->role->name);


		     }else{$this->errorCode=self::ERROR_PASSWORD_INVALID;}

		}else{$this->errorCode=self::ERROR_USERNAME_INVALID;}

		    return !$this->errorCode;
	}



}