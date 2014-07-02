<?php
/* @var $this HelptypesController */
/* @var $model Helptypes */

$this->breadcrumbs=array(
	'Helptypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(

	array('label'=>'Kriraj novi tip pomoći', 'url'=>array('create')),
	array('label'=>'Uređuj tipove pomoći', 'url'=>array('admin')),
);
?>

<h1>Izmjeni tip pomoći <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>