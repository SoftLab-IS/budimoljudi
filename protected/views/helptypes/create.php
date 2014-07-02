<?php
/* @var $this HelptypesController */
/* @var $model Helptypes */

$this->breadcrumbs=array(
	'Helptypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Uređuj tipove pomoći', 'url'=>array('admin')),
);
?>

<h1>Dodaj novi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>