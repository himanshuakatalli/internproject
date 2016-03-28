<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'last_name',
		'first_name',
		'image',
		'company_name',
		'display_name',
		'username',
		'phone_number',
		'password',
		'linkedin',
		'is_linkedin_user',
		'role',
		'time_zone',
		'add_date',
		'last_reset',
		'last_login',
		'last_login_location',
		'admin_notes',
		'status',
		'role_id',
		'promo_code',
		'access_token',
		'is_innovation_user',
		'is_in_invited',
		'package_id',
		'google_access_token',
		'github_access_token',
		'email_verify_status',
	),
)); ?>
