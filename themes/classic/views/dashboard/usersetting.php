<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/user-dash-style.css" rel="stylesheet">
<section class="wrapper ">
	<div class="row ">
		<div style="padding-top: 30px; padding-left:30px; width: 60%;" class="">

			<?php $form = $this->beginWidget('CActiveForm',array('id'=>'update_user','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"form-horizontal",'data-parsley-validate'=>'data-parsley-validate')));?>

				<figure><p class="centered"><a href="#" id="changeProfileImg"><img id="pimg" src="<?php echo (!empty($_user->profile_img))?$_user->profile_img:Yii::app()->theme->baseUrl."/style/newhome/images/pic.png";?>" class="img-circle" width="60"/></a></p></figure><br>
				<?php echo $form->textField($user,'profile_img',array('placeholder'=>'Profile Image','id'=>'profImg','hidden'=>"hidden" ,'class'=>"input-box col-lg-11",'value'=>$_user->profile_img));?>
					</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="firstName">First Name:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($user,'first_name',array('placeholder'=>'First Name', 'class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Name is required','required'=>'required','value'=>$_user->first_name,'data-parsley-trigger'=>"focusout", 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lastName">Last Name:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($user,'last_name',array('placeholder'=>'Last Name', 'class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Name is required','required'=>'required','value'=>$_user->last_name,'data-parsley-trigger'=>"focusout",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($user,'username',array('placeholder'=>'Email','disabled'=>'disabled','class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Email is required','required'=>'required','data-parsley-trigger'=>"focusout",'value'=>$_user->username,'data-parsley-type'=>"email"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="phone_number">Phone Number</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($user,'phone_number',array('placeholder'=>'Phone Number','class'=>"input-box col-lg-11",'value'=>$_user->phone_number,'required'=>'required','data-parsley-trigger'=>"focusout",'data-parsley-required-message'=>"Phone Number is required",'data-parsley-minlength'=>"10",'data-parsley-type'=>"digits"));?>
					</div>
					</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="password">New Password:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->passwordField($user,'password',array('placeholder'=>'Leave blank in case you dont want to update','class'=>"input-box col-lg-11"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="job_profile">Job profile:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($user,'job_profile',array('placeholder'=>'Job Profile', 'class'=>"input-box col-lg-11",'value'=>$_user->job_profile,'data-parsley-required-message'=>'Job Profile is required','required'=>'required','data-parsley-trigger'=>"focusout"));?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<?php
							echo CHtml::Button('Save',array('class'=>'btn btn-primary pull-right','onClick'=>'send();'));
						?>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.7/parsley.min.js" async></script>
<script type="text/javascript">
	$('#userSettings').addClass('active');
	$('#dashboard').removeClass('active');
  $(document).ready(function(){
  	$("#formUserSettings").parsley().validate();
  	$('#userInfo').click(function(){
  		$('#userInfo').addClass('active');
  		$('#compInfo').removeClass('active');
  	});
  	$('#compInfo').click(function(){
  		$('#compInfo').addClass('active');
  		$('#userInfo').removeClass('active');
  	});
  	$('#changeP').click(function(){
  		$('#password').removeAttr("disabled")
  		$('#password').val("");
  		$('#password').focus();
  	});
  });

  function send()
 	{
 		var validated = $("#update_user").parsley().validate();

 		if(validated)
 		{
 			var data = $("#update_user").serialize();
 			console.log(data);
 			$.ajax({
    		type: 'POST',
    		url: '<?php echo Yii::app()->createUrl("dashboard/UserUpdate"); ?>',
    		data: data,
    		success: function(data)
    		{
      		alert("Profile Updated");
    		},
    		error: function(data)
    		{
      		alert("failed");
   			}
  		})
 		}
 	}
 	var yourApiKey = 'A6TyxFZ2QSHOoQEcmsQA3z'
filepicker.setKey(yourApiKey);

document.getElementById("changeProfileImg").onclick = function(){
  filepicker.pick({
      services: ['COMPUTER', 'FACEBOOK', 'CLOUDAPP'],
      mimetype:'image/*',
      cropRatio:1,
      cropForce:true,
    },
    function onSuccess(Blob){
      var image = document.getElementById("imgPlaceholder");
      $('#profImg').val(Blob.url);
      $('#pimg').attr('src',Blob.url);
    }
  );
};
</script>
<style>
#pimg:hover{

	opacity:0.5;
}

</style>