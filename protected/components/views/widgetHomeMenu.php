<!-- Sign In starts -->
<div class="form-horizontal admin-form theme-primary col-lg-6 col-md-7 col-md-offset-5 np signin signin-show">
	<div class="alert alert-dismissible alert-danger1 alert_message mt15" style="display:none;">
		<p class="messageResponse"></p>
	</div>
	<div class="form-group">
		<div class="col-md-12 col-xs-12">
			<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignIn via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>'2'),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
		</div>
		<div class="col-md-12 col-xs-12 mt5 mb5 rs-show">
			<div class="col-md-5 border-overlay mt5 mb5"></div>
			<div class="col-md-2 p10 text-center rs-np mt10"><span class="fs14 font_newregular grey1">or</span></div>
			<div class="col-md-5 border-overlay mt5 mb5"></div>
		</div>
		<div class="col-md-12 mt5 mb5 rs-hide">
			<div class="col-md-5 border-overlay"></div>
			<div class="col-md-2 p10 text-center mt10"><span class="fs14 font_newregular grey1">or</span></div>
			<div class="col-md-5 border-overlay"></div>
		</div>
		<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/login'),'id'=>'login-form-inside','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
		<div class="col-md-12 col-xs-12">
			<?php echo $form->emailField($model,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Your Email Address",'class'=>'gui-input bb0','required'=>'required','data-parsley-type'=>"email",'data-parsley-required-message'=>'Email is required')); ?>
			<div class="col-md-12 col-xs-12 np">
			<?php echo $form->passwordField($model,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required password','required'=>'required','id'=>'passwordField','data-parsley-required-message'=>'Password is required')); ?>
			<a class="fs12 font_newregular orange-new pull-right mt15 forgot-passwordDiv forgot-pass" href="javascript:void(0);" id="">Forgot?</a>
			</div>
		</div>
		<div class="col-md-12 col-xs-12">
			<div class="col-md-6 col-xs-6 np ">
				<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
					<?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox3"));?>
					<label for="customcheckbox3" class="fs12 grey1">&nbsp; Remember me</label>
				</div>
			</div>
		</div>
		<!--</div>-->
		<div class="col-md-12 col-xs-12">
			<input type="button" value="Sign In" id="loginButton" class="btn width100 tab-btn-orange fs14 pull-left font_newregular mt15" data-id="login-form-inside" onClick="signIn($(this));">
			<?php //echo CHtml::submitButton('Sign In',array('class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt15')); ?>
		</div>
		<?php $this->endWidget(); ?>
		<div class="col-md-12 col-xs-12">
			<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
				<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new create-accDiv" href="javascript:void(0);">Create now</a></span>
				<br /><br />
			</div>
		</div>
	</div>
</div>
<!-- Sign In ends -->
<!-- Forgot Password starts -->
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
<div class="form-horizontal admin-form theme-primary col-md-6 col-md-offset-5 np forgot-password">
	<div class="alert alert-success hide mt15 mb15" id="repsoneRest" style="width:100%; margin:0 auto;">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		<p id="messageResponse"></p>
	</div>
	<div id="resetpass">
		<h3 class="fs26 font_newlight team-text-blue mt5">No Problem!</h3>
		<div class="form-group">
			<div class="col-md-12 col-xs-12">
				<?php echo $form->textField($forgot,'email',array('data-parsley-required-message'=>'Email is required','placeholder'=>'Email','class'=>'gui-input bb2 mt10','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email')); ?>
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'btn width100 tab-btn-orange fs14 pull-left font_newregular mt20','id'=>'passButSat')); ?>
			</div>
			<div class="col-md-12 col-xs-12">
				<div class="col-md-12 col-xs-12 bt mt25 pt20 np">
					<span class="grey1 fs14">Don't have an Account? <a class="fs14 font_newregular orange-new create-accDiv" href="javascript:void(0);">Create now</a></span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
<!-- Forgot Password ends -->
<!-- Sign Up starts -->
<div class="form-horizontal admin-form theme-primary col-md-6 col-md-offset-5 np create-acc">
	<div class="alert alert-dismissible alert_message mt15" style="display:none;">
		<p class="messageResponse"></p>
	</div>
    <h3 class="fs26 font_newlight team-text-blue mt5">Create Account</h3>
	<div class="form-group">
		<div class="col-md-12 col-xs-12">
			<?php echo CHtml::link('<i class="fa fa-linkedin-square fs15 mr5"></i> SignUp via LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn width100 btn-linkedin fs14 pull-left font_newregular mt10'));?>
		</div>
		<div class="col-md-12 col-xs-12 mt5 mb5 rs-show">
			<div class="col-md-5 border-overlay mt5 mb5"></div>
			<div class="col-md-2 p10 text-center rs-np mt10"><span class="fs14 font_newregular grey1">or</span></div>
			<div class="col-md-5 border-overlay mt5 mb5"></div>
		</div>
		<div class="col-md-12 mt5 mb5 rs-hide">
			<div class="col-md-5 border-overlay"></div>
			<div class="col-md-2 p10 text-center mt10"><span class="fs14 font_newregular grey1">or</span></div>
			<div class="col-md-5 border-overlay"></div>
		</div>
		<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/signup'),'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up_inside','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
		<div class="col-md-12 col-xs-12">
			<?php echo $form->textField($users,'first_name',array('data-parsley-required-message'=>'Name is required','placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input bb0 required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>

				<?php echo $form->emailField($users,'username',array('data-parsley-required-message'=>'Email is required','placeholder'=>"Email",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input required bb0 email','tabindex'=>'2')); ?>
			   <?php echo $form->passwordField($users,'password',array('data-parsley-required-message'=>'Password is required','placeholder'=>"Password",'required'=>'required','title'=>"Password",'data-parsley-minlength'=>"6",'class'=>'gui-input bb2 required minlength','length'=>"6",'tabindex'=>'3'));?>
			<div class="col-md-12 col-sm-12 col-xs-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np mt10 mb10"><span class="fs14 font_newregular grey1">I am a</span></div>
				<div class="col-md-12 col-sm-12 col-xs-12 np mt0 mb10">
					<label for="inlineRadio1" class="login-radio col-md-4 col-sm-4 col-xs-4 pl0 pr0">
						<input type="radio" checked="true" name="Users[role_id]" value="1" id="inlineRadio1">
						<div class="radio radio-inline">
							Admin
						</div>
					</label>
					<label for="inlineRadio2" class="login-radio col-md-4 col-sm-4 col-xs-4 pl0 pr0">
						<input type="radio" name="Users[role_id]" value="2" id="inlineRadio2">
						<div class="radio radio-inline">
							User
						</div>
					</label>
					<label for="inlineRadio3" class="login-radio col-md-4 col-sm-4 col-xs-4 pl0 pr0">
						<input type="radio"  name="Users[role_id]" value="3" id="inlineRadio3">
						<div class="radio radio-inline">
							Reviewer
						</div>
					</label>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-xs-12">
			<div class="checkbox custom-checkbox custom-checkbox-orange bg-none border-none checkbox-width pt10">
				<input type="checkbox" required="required" name="customcheckbox2" id="customcheckbox2" checked/>
				<label for="customcheckbox2" class="fs12 grey1">&nbsp; I agree to</label>
				<a class="fs12 font_newregular orange-new mt5" href="javascript:void(0);" id=""  data-toggle='modal' data-target='#terms-conditions'>Terms & Conditions</a>
			</div>
		</div>
		<div class="col-md-12 col-xs-12 rs-mt10">
			<input type="button" value="Create Account" class="btn width100 tab-btn-orange fs14 pull-left font_newregular mt15" data-id="sign_up_inside" onClick="signUp($(this));">
		</div>
		<?php $this->endWidget(); ?>
		<div class="col-md-12 col-xs-12">
			<div class="col-md-12 col-xs-12 pt10 np">
				<span class="grey1 fs14">Already have an Account? <a class="fs14 font_newregular grey1 orange-new signin-div" href="javascript:void(0);">Sign In</a></span>
			</div>
		</div>
	</div>
</div>
<!-- Sign Up ends -->
<script type="text/javascript">
$(document).ready(function(){

		$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>2,'redirectType'=>5));?>');

});
function signIn(element){
	var form="#"+element.attr('data-id');
	if($(form).parsley().validate()){
		element.attr('value','Please Wait ... ');
		$.ajax({
			type:'POST',
			url:$(form).attr('action'),
			data:$(form).serialize(),
			success:function(data){
				console.log(data);
				var response = $.parseJSON(data);
				if(response.success=='1'){
					window.location.href = response.url;

				}
				else{
					element.parent().parent().parent().parent().find("p.messageResponse").html("<strong>Login Failed!</strong> "+ response.success );
					element.parent().parent().parent().parent().find("div.alert_message").fadeIn("slow");
					element.attr('value','Sign In');
				}
			}
		});
	}
}

function signUp(element){
	var form="#"+element.attr('data-id');
	if($(form).parsley().validate()){
		element.attr('value','Creating Account ...').attr('disabled','disabled');
		$.ajax({
			type:'POST',
			url:$(form).attr('action'),
			data:$(form).serialize(),
			success:function(data){
				var response = $.parseJSON(data);
				if(response.success=='1'){
					 $(".create-acc").hide();
	                 $(".signin").show();
	                 $('.messageResponse').html(response.message);
	                 $(".alert_message").show();
	                 $('#repsoneRest').removeClass('hide');
	                 var ErrID   =   elem.attr('data-parsley-id')
	                 $('#parsley-id-satn-'+ErrID).html('');
				}else if(response.success=='3')
				{

					 $(".create-acc").hide();
	                 $(".signin").show();
	                 $('.messageResponse').html(response.message);
	                 $(".alert_message").show();
	                 $('#repsoneRest').removeClass('hide');
	                 var ErrID   =   elem.attr('data-parsley-id')
	                 $('#parsley-id-satn-'+ErrID).html('');

				}
				 else{
						element.parent().parent().parent().parent().find("div.alert_message").removeClass('alert-success');
						element.parent().parent().parent().parent().find("div.alert_message").addClass('alert-danger1');
						element.parent().parent().parent().parent().find("p.messageResponse").html("<strong>Failed!</strong> "+ response.message );
						element.parent().parent().parent().parent().find("div.alert_message").fadeIn("slow");
						element.attr('value','Create Account').removeAttr("disabled");
					}
			}
		});
	}
}

$( "#login-form-inside" ).keypress(function( event ) {
	if ( event.which == 13 ) {
		$( "#loginButton" ).trigger( "click" );
		$( "#loginButton" ).focus();
	}
});
</script>