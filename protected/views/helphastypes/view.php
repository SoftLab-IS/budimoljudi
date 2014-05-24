<?php
/* @var $this HelphastypesController */
/* @var $model Helphastypes */

$this->breadcrumbs=array(
	'Helphastypes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Helphastypes', 'url'=>array('index')),
	array('label'=>'Create Helphastypes', 'url'=>array('create')),
	array('label'=>'Update Helphastypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Helphastypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Helphastypes', 'url'=>array('admin')),
);
?>

<h1>View Helphastypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'help_id',
		'help_types_id',
	),
)); ?>
