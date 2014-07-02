<?php
/* @var $this CityController */
/* @var $model City */


$this->menu=array(
	array('label'=>'Unesi Grad', 'url'=>array('create')),
	array('label'=>'Uređuj Gradove', 'url'=>array('admin')),
);
?>

<h1>Izmjeni Grad </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>