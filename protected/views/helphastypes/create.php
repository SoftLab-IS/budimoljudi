<?php
/* @var $this HelphastypesController */
/* @var $model Helphastypes */

$this->breadcrumbs=array(
	'Helphastypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Helphastypes', 'url'=>array('index')),
	array('label'=>'Manage Helphastypes', 'url'=>array('admin')),
);
?>

<h1>Create Helphastypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>