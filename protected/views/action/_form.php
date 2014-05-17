<?php
/* @var $this ActionController */
/* @var $model Action */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'action-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_start'); ?>
		<?php echo $form->textField($model,'time_start'); ?>
		<?php echo $form->error($model,'time_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_end'); ?>
		<?php echo $form->textField($model,'time_end'); ?>
		<?php echo $form->error($model,'time_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_ptt'); ?>
		<?php echo $form->textField($model,'city_ptt'); ?>
		<?php echo $form->error($model,'city_ptt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number_of_participants'); ?>
		<?php echo $form->textField($model,'number_of_participants'); ?>
		<?php echo $form->error($model,'number_of_participants'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->