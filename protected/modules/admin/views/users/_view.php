<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display_name')); ?>:</b>
	<?php echo CHtml::encode($data->display_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkedin')); ?>:</b>
	<?php echo CHtml::encode($data->linkedin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_linkedin_user')); ?>:</b>
	<?php echo CHtml::encode($data->is_linkedin_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_zone')); ?>:</b>
	<?php echo CHtml::encode($data->time_zone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_reset')); ?>:</b>
	<?php echo CHtml::encode($data->last_reset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login_location')); ?>:</b>
	<?php echo CHtml::encode($data->last_login_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_notes')); ?>:</b>
	<?php echo CHtml::encode($data->admin_notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_id')); ?>:</b>
	<?php echo CHtml::encode($data->role_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promo_code')); ?>:</b>
	<?php echo CHtml::encode($data->promo_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('access_token')); ?>:</b>
	<?php echo CHtml::encode($data->access_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_innovation_user')); ?>:</b>
	<?php echo CHtml::encode($data->is_innovation_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_in_invited')); ?>:</b>
	<?php echo CHtml::encode($data->is_in_invited); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_id')); ?>:</b>
	<?php echo CHtml::encode($data->package_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('google_access_token')); ?>:</b>
	<?php echo CHtml::encode($data->google_access_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('github_access_token')); ?>:</b>
	<?php echo CHtml::encode($data->github_access_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_verify_status')); ?>:</b>
	<?php echo CHtml::encode($data->email_verify_status); ?>
	<br />

	*/ ?>

</div>