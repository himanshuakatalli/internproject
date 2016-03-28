<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>245)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'display_name'); ?>
		<?php echo $form->textField($model,'display_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_linkedin_user'); ?>
		<?php echo $form->textField($model,'is_linkedin_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_zone'); ?>
		<?php echo $form->textField($model,'time_zone',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_reset'); ?>
		<?php echo $form->textField($model,'last_reset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_login_location'); ?>
		<?php echo $form->textField($model,'last_login_location',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_notes'); ?>
		<?php echo $form->textArea($model,'admin_notes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'role_id'); ?>
		<?php echo $form->textField($model,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promo_code'); ?>
		<?php echo $form->textField($model,'promo_code',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'access_token'); ?>
		<?php echo $form->textField($model,'access_token',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_innovation_user'); ?>
		<?php echo $form->textField($model,'is_innovation_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_in_invited'); ?>
		<?php echo $form->textField($model,'is_in_invited'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'package_id'); ?>
		<?php echo $form->textField($model,'package_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'google_access_token'); ?>
		<?php echo $form->textField($model,'google_access_token',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'github_access_token'); ?>
		<?php echo $form->textField($model,'github_access_token',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_verify_status'); ?>
		<?php echo $form->textField($model,'email_verify_status',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->