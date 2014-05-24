<?php
/* @var $this HelphastypesController */
/* @var $model Helphastypes */

$this->breadcrumbs=array(
	'Helphastypes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Helphastypes', 'url'=>array('index')),
	array('label'=>'Create Helphastypes', 'url'=>array('create')),
	array('label'=>'View Helphastypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Helphastypes', 'url'=>array('admin')),
);
?>

<h1>Update Helphastypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>