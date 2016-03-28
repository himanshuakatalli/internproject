<?php
/* @var $this ProductCategoriesController */
/* @var $model ProductCategories */

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductCategories', 'url'=>array('index')),
	array('label'=>'Manage ProductCategories', 'url'=>array('admin')),
);
?>

<h1>Create ProductCategories</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>