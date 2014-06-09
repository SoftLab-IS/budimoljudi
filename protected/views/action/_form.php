<?php
/* @var $this ActionController */
/* @var $model Action */
/* @var $form CActiveForm */
?>

<div class="form-wrapper col-sm-12">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'action-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <?php echo $form->errorSummary($model, array('class' => 'alert alert-danger')); ?>

    <div class="row">
        <div class="col-sm-7">
            <div class="">
                <?php echo $form->labelEx($model,'title'); ?>
                <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model,'title'); ?>
            </div>
            <div class="">
                <?php echo $form->labelEx($model,'description'); ?>
                <?php echo $form->textarea($model,'description',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'description'); ?>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-4">
                    <?php echo $form->labelEx($model,'time_start'); ?>
                </div>
                <div class="col-sm-5">
                    <input type="text" placeholder="<?php echo date('d.m.Y'); ?>" <?php echo ($model->time_start)? 'value="'.date('d.m.Y',strtotime($model->time_start)).'"' : ''; ?> class="form-control" id="start-date" name="d_start"/>
                    <?php echo $form->error($model,'time_start'); ?>
                </div>
                <div class="col-sm-3">
                    <input type="text" placeholder="<?php echo date('H:i'); ?>" <?php echo ($model->time_start)? 'value="'.date('H:i',strtotime($model->time_start)).'"' : ''; ?> class="form-control" id="start-time" name="t_start"/>
                </div>

                <div class="col-sm-4">
                    <?php echo $form->labelEx($model,'time_end'); ?>
                </div>
                <div class="col-sm-5">
                    <input type="text" placeholder="<?php echo date('d.m.Y'); ?>" <?php echo ($model->time_end)? 'value="'.date('d.m.Y',strtotime($model->time_end)).'"' : ''; ?> class="form-control" id="end-date" name="d_end"/>
                    <?php echo $form->error($model,'time_end'); ?>
                </div>
                <div class="col-sm-3">
                    <input type="text" placeholder="<?php echo date('H:i'); ?>" <?php echo ($model->time_end)? 'value="'.date('H:i',strtotime($model->time_end)).'"' : ''; ?> class="form-control" id="end-time" name="t_end"/>
                </div>

                <?php $this->renderPartial('//_shared/_location_form', array('form'=>$form, 'locationModel'=>$locationModel)); ?>
            </div>
        </div>
    </div>

	<?php
	if(Yii::app()->user->isGuest)
		$this->renderPartial('//_shared/_licne_informacije', array('form'=>$form, 'userModel'=>$userModel));
	?>

    <div class="col-sm-12 text-center buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Snimi akciju' : 'Sačuvaj', array('class'=>'btn btn-primary btn-md')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->