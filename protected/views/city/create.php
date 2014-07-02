<?php
/* @var $this CityController */
/* @var $model City */


$this->menu=array(
	array('label'=>'Uređuj Gradove', 'url'=>array('admin')),
);
?>

<h1>Unesi Grad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>