<?php
/* @var $this HelphastypesController */
/* @var $data Helphastypes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('help_id')); ?>:</b>
	<?php echo CHtml::encode($data->help_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('help_types_id')); ?>:</b>
	<?php echo CHtml::encode($data->help_types_id); ?>
	<br />


</div>