<?php
class ForgotpasswordForm extends CFormModel
{
   
    public $email;
    // public $verifyCode;
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
          // email is required
            array('email','required'),
            // email has to be a valid email address
            array('email', 'email'),
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
            'email'=>'Email',
            //'verifyCode'=>'Verification Code',
           );
    }
    
}//ends class

