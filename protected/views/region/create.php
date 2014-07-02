<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Uređuj Regije', 'url'=>array('admin')),
);
?>

<h1>Unesi Regiju</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>