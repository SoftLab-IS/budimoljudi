<?php
/* @var $this HelptypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Helptypes',
);

$this->menu=array(
	array('label'=>'Create Helptypes', 'url'=>array('create')),
	array('label'=>'Manage Helptypes', 'url'=>array('admin')),
);
?>

<h1>Helptypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
