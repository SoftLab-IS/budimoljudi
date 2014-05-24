<?php
/* @var $this HelphastypesController */
/* @var $model Helphastypes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'helphastypes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'help_id'); ?>
		<?php echo $form->textField($model,'help_id'); ?>
		<?php echo $form->error($model,'help_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'help_types_id'); ?>
		<?php echo $form->textField($model,'help_types_id'); ?>
		<?php echo $form->error($model,'help_types_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->