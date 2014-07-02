<?php
/* @var $this StateController */
/* @var $model State */


$this->menu=array(
	array('label'=>'Uređuj Države', 'url'=>array('admin')),
);
?>

<h1>Unesi novu državu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>