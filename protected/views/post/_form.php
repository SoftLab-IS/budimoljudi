<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form col-md-8">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype' => 'multipart/form-data',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="col-md-12">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="col-md-12">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	<div class="col-md-5">
		<?php if($model->image) echo "<img src='".Yii::app()->baseUrl."/img/blog/".$model->image."' width='200'/>" ?>
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo CHtml::fileField('photo','', array('class' => 'form-control', 'id' => 'image-input', 'style' => 'display:none'));  ?>
		<div class="input-append input-group">
			<input id="photoCover" class="form-control" type="text" name="file">
                <span class="input-group-btn">
                    <a class="btn btn-default" onclick="$('input[id=image-input]').click();">Pronađi</a>
                </span>
		</div>

		<?php echo $form->error($model,'image'); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->