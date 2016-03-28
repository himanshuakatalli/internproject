<?php
/* @var $this ProductCategoriesController */
/* @var $model ProductCategories */

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductCategories', 'url'=>array('index')),
	array('label'=>'Create ProductCategories', 'url'=>array('create')),
	array('label'=>'View ProductCategories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductCategories', 'url'=>array('admin')),
);
?>

<h1>Update ProductCategories <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>