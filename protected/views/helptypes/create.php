<?php
/* @var $this HelptypesController */
/* @var $model Helptypes */

$this->breadcrumbs=array(
	'Helptypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Helptypes', 'url'=>array('index')),
	array('label'=>'Manage Helptypes', 'url'=>array('admin')),
);
?>

<h1>Create Helptypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>