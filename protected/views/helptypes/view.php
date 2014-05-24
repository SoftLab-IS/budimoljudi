<?php
/* @var $this HelptypesController */
/* @var $model Helptypes */

$this->breadcrumbs=array(
	'Helptypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Helptypes', 'url'=>array('index')),
	array('label'=>'Create Helptypes', 'url'=>array('create')),
	array('label'=>'Update Helptypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Helptypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Helptypes', 'url'=>array('admin')),
);
?>

<h1>View Helptypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
