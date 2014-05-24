<?php
/* @var $this ActionController */
/* @var $model Action */
/* @var $form CActiveForm */
?>

<div class="form-wrapper">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'action-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="col-sm-12">
        <small class="note">Polja sa <span class="required">*</span> su obavezna.</small>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <div class="col-sm-7">
        <div class="form-section-heading">
            <h3>Oblast</h3>
            <p>Izeberite oblast u kojoj bi ste mogli djelovati</p>
        </div>
        <div class="col-sm-12">
            <?php echo $form->labelEx($model,'title'); ?>
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
        <div class="col-md-12">
            <?php echo $form->labelEx($model,'description'); ?>
            <?php echo $form->textarea($model,'description',array('class' => 'form-control')); ?>
            <?php echo $form->error($model,'description'); ?>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="form-section-heading">
            <h3>Oblast</h3>
            <p>Izeberite oblast u kojoj bi ste mogli djelovati</p>
        </div>
        <div class="col-sm-4">
            <?php echo $form->labelEx($model,'time_start'); ?>
        </div>
        <div class="col-sm-8">
            <?php echo $form->textField($model, 'time_start', array('class' => 'form-control datetimepicker', 'id' => 'start-date')); ?>
            <?php echo $form->error($model,'time_start'); ?>
        </div>

        <div class="col-sm-4">
            <?php echo $form->labelEx($model,'time_end'); ?>
        </div>
        <div class="col-sm-8">
            <?php echo $form->textField($model, 'time_end', array('class' => 'form-control datetimepicker', 'id' => 'end-date')); ?>
            <?php echo $form->error($model,'time_end'); ?>
        </div>

	    <?php $this->renderPartial('//_shared/_location_form', array('form'=>$form, 'locationModel'=>$locationModel)); ?>
    </div>

	<?php $this->renderPartial('//_shared/_licne_informacije', array('form'=>$form, 'userModel'=>$userModel)); ?>

    <div class="col-sm-12 text-center buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Snimi akciju' : 'Sačuvaj', array('class'=>'btn btn-primary btn-md')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->