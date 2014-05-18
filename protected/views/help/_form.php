<?php
/* @var $this HelpController */
/* @var $model Help */
/* @var $form CActiveForm */
?>

<div class="form-wrapper">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'help-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

<p class="note">Polja sa <span class="required">*</span> su obavezna.</p>

<?php echo $form->errorSummary($model, null, null, array('class'=>'alert alert-danger')); ?>

<div class="col-md-6">

    <h3>Lične informacije</h3>
    <div class="form-group">
        <div class="col-md-2">
            <?php echo $form->labelEx($userModel,'name'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->textField($userModel,'name',array('maxlength'=>255, 'class'=>'form-control')); ?>
            <?php echo $form->error($userModel,'name', array('class'=>'alert alert-danger')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $form->labelEx($userModel,'email'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->emailField($userModel,'email',array('maxlength'=>255, 'class'=>'form-control')); ?>
            <?php echo $form->error($userModel,'email', array('class'=>'alert alert-danger')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $form->labelEx($userModel,'password'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->passwordField($userModel,'password',array('maxlength'=>255, 'class'=>'form-control')); ?>
            <?php echo $form->error($userModel,'password', array('class'=>'alert alert-danger')); ?>
        </div>
    </div>
    <br/>
    <h3>Vrsta pomoći</h3>
    <div class="col-md-12">
        <label class="checkbox">
            <input type="checkbox" name="type[]" value="smjestaj"/>Smještaj
        </label>
        <label class="checkbox">
            <input type="checkbox" name="type[]" value="smjestaj"/>Hrana
        </label>
        <label class="checkbox">
            <input type="checkbox" name="type[]" value="smjestaj"/>Voda
        </label>
    </div>

</div>

<div class="col-md-6">
    <h3>Oblast</h3>
    <div class="col-md-2">
        <?php echo CHtml::label("Država",'country'); ?>
    </div>
    <div class="col-md-10">
        <?php
        $list = CHtml::listData(State::model()->findAll(), 'id', 'name');
        echo CHtml::dropDownList('country', '1', $list, array('class'=>'form-control'));
        ?>
    </div>
    <div class="col-md-2">
        <?php echo CHtml::label("Region",'region'); ?>
    </div>
    <div class="col-md-10">
        <?php
        $country = 1;
        $list = CHtml::listData(Region::model()->findAllByAttributes(array("state_id"=>$country)), 'id', 'name');
        echo CHtml::dropDownList('region', '1', $list, array('class'=>'form-control'));
        ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->labelEx($model,'city_ptt'); ?>
    </div>
    <div class="col-md-10">
        <?php
        $region = 1;
        $list = CHtml::listData(City::model()->findAllByAttributes(array('region_id' => $region)), 'ptt', 'name');
        echo CHtml::dropDownList('Action[city_ptt]', $model, $list, array('class'=>'form-control'));
        ?>
        <?php echo $form->error($model,'city_ptt', array('class'=>'alert alert-danger')); ?>
    </div>

    <h3>Opis</h3>
    <div class="col-md-12">
        <?php echo $form->textArea($model,'description',array('rows'=>5, 'cols'=>80)); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>
</div>

<div class="col-md-12 text-center buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Sačuvaj svoj profil' : 'Sačuvaj', array('class'=>'btn btn-primary btn-md')); ?>
</div>


<?php $this->endWidget(); ?>

<!---->
<!--<div class="">-->
<!--    --><?php //echo $form->labelEx($model,'time'); ?>
<!--    --><?php //echo $form->textField($model,'time',array('size'=>45,'maxlength'=>45)); ?>
<!--    --><?php //echo $form->error($model,'time'); ?>
<!--</div>-->
<!---->
<!--<div class="">-->
<!--    --><?php //echo $form->labelEx($model,'types'); ?>
<!--    --><?php //echo $form->textField($model,'types',array('size'=>60,'maxlength'=>255)); ?>
<!--    --><?php //echo $form->error($model,'types'); ?>
<!--</div>-->
<!---->
<!--<div class="">-->
<!--    --><?php //echo $form->labelEx($model,'user_id'); ?>
<!--    --><?php //echo $form->textField($model,'user_id'); ?>
<!--    --><?php //echo $form->error($model,'user_id'); ?>
<!--</div>-->


</div>