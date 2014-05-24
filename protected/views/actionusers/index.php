<?php
/* @var $this ActionusersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actionusers',
);

$this->menu=array(
	array('label'=>'Create Actionusers', 'url'=>array('create')),
	array('label'=>'Manage Actionusers', 'url'=>array('admin')),
);
?>

<h1>Actionusers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
