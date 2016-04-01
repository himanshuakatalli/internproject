<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>245)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'display_name'); ?>
		<?php echo $form->textField($model,'display_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'display_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'linkedin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_linkedin_user'); ?>
		<?php echo $form->textField($model,'is_linkedin_user'); ?>
		<?php echo $form->error($model,'is_linkedin_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_zone'); ?>
		<?php echo $form->textField($model,'time_zone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'time_zone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_reset'); ?>
		<?php echo $form->textField($model,'last_reset'); ?>
		<?php echo $form->error($model,'last_reset'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login'); ?>
		<?php echo $form->error($model,'last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_login_location'); ?>
		<?php echo $form->textField($model,'last_login_location',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_login_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_notes'); ?>
		<?php echo $form->textArea($model,'admin_notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'admin_notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->textField($model,'role_id'); ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promo_code'); ?>
		<?php echo $form->textField($model,'promo_code',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'promo_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'access_token'); ?>
		<?php echo $form->textField($model,'access_token',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'access_token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_innovation_user'); ?>
		<?php echo $form->textField($model,'is_innovation_user'); ?>
		<?php echo $form->error($model,'is_innovation_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_in_invited'); ?>
		<?php echo $form->textField($model,'is_in_invited'); ?>
		<?php echo $form->error($model,'is_in_invited'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'package_id'); ?>
		<?php echo $form->textField($model,'package_id'); ?>
		<?php echo $form->error($model,'package_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'google_access_token'); ?>
		<?php echo $form->textField($model,'google_access_token',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'google_access_token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'github_access_token'); ?>
		<?php echo $form->textField($model,'github_access_token',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'github_access_token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_verify_status'); ?>
		<?php echo $form->textField($model,'email_verify_status',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email_verify_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->