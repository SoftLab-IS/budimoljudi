<?php
/* @var $this CityController */
/* @var $data City */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ptt')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ptt), array('view', 'id'=>$data->ptt)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />


</div>