<?php
/* @var $this HelpController */
/* @var $model Help */
/* @var $form CActiveForm */
?>

<div class="form-wrapper col-sm-12">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'help-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <?php echo $form->errorSummary($model, null, null, array('class'=>'alert alert-danger')); ?>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-section-heading">
                <h3>Vrsta pomoći</h3>
                <p>Izaberite sve vrste pomoći koje bi ste mogli pružiti</p>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model,'type'); ?>
	            <?php foreach($helpTypes as $h): ?>
                <label class="checkbox">
                    <input type="checkbox" name="type[]"
                           value="<?php echo $h->id; ?>"
	                        <?php if($checkedTypes)
		                            foreach($checkedTypes as $t)
			                            echo ($h->id == $t->help_types_id)? 'checked' : ''; ?>
	                    /> <?php echo $h->name; ?>
                </label>
	            <?php endforeach; ?>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-section-heading">
                <h3>Oblast</h3>
                <p>Izeberite oblast u kojoj bi ste mogli djelovati</p>
            </div>
	        <?php $this->renderPartial('//_shared/_location_form', array('form'=>$form, 'locationModel'=>$locationModel)); ?>
        </div>

        <div class="col-sm-5">
            <div class="form-section-heading">
                <h3>Opis</h3>
                <p>Opišite svoje sposobnosti i dosadašnja iskustva koja bi mogla pomoći prilikom pružanja pomoći</p>
            </div>
            <div class="col-sm-12">
                <?php echo $form->textArea($model,'description',array('rows'=>5, 'cols'=>80, 'class' => 'form-control')); ?>
                <?php echo $form->error($model,'description'); ?>
            </div>
        </div>


	    <?php if(Yii::app()->controller->action->id != 'update' && Yii::app()->user->isGuest) $this->renderPartial('//_shared/_licne_informacije', array('form'=>$form, 'userModel'=>$userModel)); ?>

        <div class="col-sm-12 text-center buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Sačuvaj svoj profil' : 'Sačuvaj', array('class'=>'btn btn-primary btn-md')); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>