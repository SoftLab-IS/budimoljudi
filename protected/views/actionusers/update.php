<?php
/* @var $this ActionusersController */
/* @var $model Actionusers */

$this->breadcrumbs=array(
	'Actionusers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Actionusers', 'url'=>array('index')),
	array('label'=>'Create Actionusers', 'url'=>array('create')),
	array('label'=>'View Actionusers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Actionusers', 'url'=>array('admin')),
);
?>

<h1>Update Actionusers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>