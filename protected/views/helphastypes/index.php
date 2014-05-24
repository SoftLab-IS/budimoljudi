<?php
/* @var $this HelphastypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Helphastypes',
);

$this->menu=array(
	array('label'=>'Create Helphastypes', 'url'=>array('create')),
	array('label'=>'Manage Helphastypes', 'url'=>array('admin')),
);
?>

<h1>Helphastypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
