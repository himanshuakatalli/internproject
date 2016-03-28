<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'last_name',
		'first_name',
		'image',
		'company_name',
		'display_name',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
