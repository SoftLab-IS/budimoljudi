<?php
/* @var $this ActionController */
/* @var $model Action */

$this->breadcrumbs=array(
	'Actions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Action', 'url'=>array('index')),
	array('label'=>'Manage Action', 'url'=>array('admin')),
);
?>

<h1>Pokreni novu Akciju</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'userModel'=>$userModel)); ?>