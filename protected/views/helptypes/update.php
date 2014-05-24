<?php
/* @var $this HelptypesController */
/* @var $model Helptypes */

$this->breadcrumbs=array(
	'Helptypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Helptypes', 'url'=>array('index')),
	array('label'=>'Create Helptypes', 'url'=>array('create')),
	array('label'=>'View Helptypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Helptypes', 'url'=>array('admin')),
);
?>

<h1>Update Helptypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>