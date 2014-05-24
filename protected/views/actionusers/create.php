<?php
/* @var $this ActionusersController */
/* @var $model Actionusers */

$this->breadcrumbs=array(
	'Actionusers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Actionusers', 'url'=>array('index')),
	array('label'=>'Manage Actionusers', 'url'=>array('admin')),
);
?>

<h1>Create Actionusers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>