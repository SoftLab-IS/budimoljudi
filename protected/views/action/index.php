<?php
/* @var $this ActionController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Akcije</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
