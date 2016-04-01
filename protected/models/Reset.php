<?php
class Reset extends CFormModel
{

	public $Password;
	public $Confirm_Password;
// public $verifyCode;
/**
* Declares the validation rules.
*/
public function rules()
{
	return array(
// email is required
		array('Password,Confirm_Password','required'),
// email has to be a valid email address
// array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
}

/**
* Declares customized attribute labels.
* If not declared here, an attribute would have a label that is
* the same as its name with the first letter in upper case.
*/
public function attributeLabels()
{
	return array(
		'Password'=>'Password',
		'Confirm_Password'=>'Confirm_Password',
//'verifyCode'=>'Verification Code',
		);
}

}//ends class

