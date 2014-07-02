<?php
/* @var $this RegionController */
/* @var $model Region */


$this->menu=array(
	array('label'=>'Unesi Regiju', 'url'=>array('create')),
	array('label'=>'Uređuj Regije', 'url'=>array('admin')),
);
?>

<h1>Izmjeni Regiju</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>