<?php
/* @var $this HelphastypesController */
/* @var $model Helphastypes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'help_id'); ?>
		<?php echo $form->textField($model,'help_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'help_types_id'); ?>
		<?php echo $form->textField($model,'help_types_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->