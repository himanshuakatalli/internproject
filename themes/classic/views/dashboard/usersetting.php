<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/user-dash-style.css" rel="stylesheet">
<section class="wrapper">
	<div class="row">
		<div style="padding-top: 30px; padding-left:30px; width: 60%;" class="">
			<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/dashboard/save'),'id'=>"formUserSettings",'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"form-horizontal",'data-parsley-validate'=>'data-parsley-validate')));?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="utype">User Type:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<label id="utype" class="input-box col-lg-11"><?php echo Yii::app()->user->role; ?></label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="firstName">First Name:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($users,'first_name',array('id'=>"first_name",'placeholder'=>'First Name', 'class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Name is required','required'=>'required','value'=>Yii::app()->user->fname,'data-parsley-trigger'=>"focusout", 'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lastName">Last Name:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($users,'first_name',array('id'=>"last_name",'placeholder'=>'Last Name', 'class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Name is required','required'=>'required','value'=>Yii::app()->user->lname,'data-parsley-trigger'=>"focusout",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($users,'username',array('id'=>"email",'placeholder'=>'Email', 'class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Email is required','required'=>'required','data-parsley-trigger'=>"focusout",'value'=>Yii::app()->user->id,'data-parsley-type'=>"email"));?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="password">Password:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->passwordField($users,'password',array('id'=>"password",'placeholder'=>'Password','value'=>'**********','disabled'=>'disabled', 'class'=>"input-box col-lg-11",'data-parsley-required-message'=>'Password is required','required'=>'required','data-parsley-trigger'=>"focusout"));?>
						<a href="#" id="changeP"><span class="fa fa-pencil"> change</span></a>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="jProfile">Job profile:</label>
					<div class="col-sm-10">
						<i class="fa fa-user col-lg-1"></i>
						<?php echo $form->textField($users,'job_profile',array('id'=>"jProfile",'placeholder'=>'Job Profile', 'class'=>"input-box col-lg-11",'value'=>Yii::app()->user->jProf,'data-parsley-required-message'=>'Job Profile is required','required'=>'required','data-parsley-trigger'=>"focusout"));?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<?php
							echo CHtml::Button('Save',array('class'=>'btn btn-primary pull-right','data-id'=>'formUserSettings','onClick'=>'save($this'));
						?>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.7/parsley.min.js" async></script>
<script type="text/javascript">

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
</script>
<!--

<main class="main-wrap">
			<div>
				<form class="form-horizontal" role="form">
					<div class="row">
						<div id="section1-row">
							<h4>User Information</h4>
							<figure>
								<img src="<?php echo (!empty(Yii::app()->user->image))?Yii::app()->user->image:Yii::app()->theme->baseUrl."/style/newhome/images/pic.png";?>" alt="profile picture"/>
							</figure>
							<div class="form-group">
								<label class="control-label col-sm-2" for="firstName">First Name:</label>
								<div class="col-sm-10">
									<i class="fa fa-user col-lg-1"></i>
									<input type="text" id="firstName" name="firstName" class="input-box col-lg-11"placeholder="First Name" value="<?php echo Yii::app()->user->fname;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="lastName">Last Name:</label>
								<div class="col-sm-10">
									<i class="fa fa-user col-lg-1"></i>
									<input type="text" id="lastName" name="lastName" class="input-box col-lg-11"placeholder="Last Name" value="<?php echo Yii::app()->user->lname;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="email">Email:</label>
								<div class="col-sm-10">
									<i class="fa fa-envelope-o col-lg-1"></i>
									<input type="text" class="input-box col-lg-11" id="email" name="email" placeholder="Email" value="<?php echo Yii::app()->user->id;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="password">Password:</label>
								<div class="col-sm-10">
									<i class="fa fa-lock col-lg-1"></i>
									<input type="password" class="input-box col-lg-11" id="password" name="password" placeholder="Password" value="**********" disabled="disabled">
									<a href="#" id="changeP"><span class="fa fa-pencil"> change</span></a>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-2 control-label pl0 pr0 rs-hide" for="jobProfile">Job Profile:</label>
								<div class="col-sm-12 col-md-10 col-xs-12">
									<input type="text" class="input-box col-lg-11" id="jobProfile" name="jobProfile" placeholder="Job Profile" value="<?php echo Yii::app()->user->jProf;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label pl0 pr0 rs-hide" for="jobProfile">User Type:</label>
								<div class="col-sm-12 col-md-10 col-xs-12">
									<input type="text" class="input-box col-lg-11" id="jobProfile" name="jobProfile" placeholder="Job Profile" value="<?php echo Yii::app()->user->role;?>" disabled="disabled">
								</div>
							</div>
					</div>
				</div>
				</form>
				</div>
			</div>
		</main>
		-->