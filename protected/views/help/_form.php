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

    <small class="note">Polja sa <span class="required">*</span> su obavezna.</small>

    <?php echo $form->errorSummary($model, null, null, array('class'=>'alert alert-danger')); ?>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-section-heading">
                <h3>Vrsta pomoći</h3>
                <p>Izaberite sve vrste pomoći koje bi ste mogli pružiti</p>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model,'type'); ?>
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

        <div class="col-sm-4">
            <div class="form-section-heading">
                <h3>Oblast</h3>
                <p>Izeberite oblast u kojoj bi ste mogli djelovati</p>
            </div>
            <div class="col-md-3">
                <?php echo CHtml::label("Država",'country'); ?>
            </div>
            <div class="col-md-9">
                <?php
                $list = CHtml::listData(State::model()->findAll(), 'id', 'name');
                echo CHtml::dropDownList('country', '', $list,
                    array(
                        'class'=>'form-control',
                        'prompt'=>'Izaberite državu',
                        'ajax' => array(
                            'type'=>'POST',
                            'url'=>Yii::app()->createUrl('region/loadregions'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update'=>'#region', //or 'success' => 'function(data){...handle the data in the way you want...}',
                            'data'=>array('country'=>'js:this.value'),
                        )));
                ?>
            </div>
            <div class="col-md-3">
                <?php echo CHtml::label("Regija",'region'); ?>
            </div>
            <div class="col-md-9">
                <?php
                $country = 1;
                $list = CHtml::listData(Region::model()->findAllByAttributes(array("state_id"=>$country)), 'id', 'name');
                echo CHtml::dropDownList('region', '', $list,
                    array(
                        'class'=>'form-control',
                        'prompt'=>'Sve regije',
                        'ajax' => array(
                            'type'=>'POST',
                            'url'=>Yii::app()->createUrl('city/loadcities'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update'=>'#Help_city_ptt', //or 'success' => 'function(data){...handle the data in the way you want...}',
                            'data'=>array('region'=>'js:this.value'),
                        )));
                ?>
            </div>
            <div class="col-md-3">
                <?php echo $form->labelEx($model,'city_ptt'); ?>
            </div>
            <div class="col-md-9">
                <?php
                echo CHtml::dropDownList('Help[city_ptt]', $model, array(),
                    array(
                        'class'=>'form-control',
                        'empty' => 'Svi gradovi'
                    ));
                ?>
                <?php echo $form->error($model,'city_ptt', array('class'=>'alert alert-danger')); ?>
            </div>
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
    </div>

	<?php $this->renderPartial('//_shared/_licne_informacije', array('form'=>$form, 'userModel'=>$userModel)); ?>

    <div class="col-sm-12 text-center buttons">
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