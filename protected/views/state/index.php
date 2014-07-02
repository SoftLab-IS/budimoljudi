<?php
/* @var $this StateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'States',
);

$this->menu=array(
	array('label'=>'Dodaj Državu', 'url'=>array('create')),
	array('label'=>'Uređuj Države', 'url'=>array('admin')),
);
?>

<h1>States</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
