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

    <div class="col-sm-8">
        <div class="col-sm-12">
            <?php echo $form->labelEx($model,'title'); ?>
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>

        <div class="col-sm-12">
            <?php echo $form->labelEx($model,'description'); ?>
            <?php $this->widget('ext.redactor.ImperaviRedactorWidget',array(
                "model"=>$model,
                "attribute"=>'description',
            )); ?>
            <?php echo $form->error($model,'description'); ?>
        </div>
    </div>


	<div class="col-md-6">

		<div class="col-md-12">
			<?php echo $form->labelEx($model,'description'); ?>
			<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'description'); ?>
		</div>

		<div class="col-md-12">
			<?php echo $form->labelEx($model,'time_start');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'Action[time_start]',
				'id'=>'Action_time_start',
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showAnim'=>'fade',
					'dayNamesMin'=> array('Ned' ,'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'),
					'dateFormat'=>"dd.mm.yy",
					'firstDay'=>1,
					'monthNames'=>array('Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'),
					'monthNamesShort'=>array('Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'),
					'changeMonth'=>true,
					'changeYear'=>true
				),
				'htmlOptions'=>array(
					'style'=>'height:2.3125rem;',
					'required' =>'required',
				),
			));
			?>
			<?php echo $form->error($model,'time_start'); ?>
		</div>

		<div class="col-md-12">
			<?php echo $form->labelEx($model,'time_end');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'Action[time_end]',
				'id'=>'Action_time_end',
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showAnim'=>'fade',
					'dayNamesMin'=> array('Ned' ,'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'),
					'dateFormat'=>"dd.mm.yy",
					'firstDay'=>1,
					'monthNames'=>array('Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'),
					'monthNamesShort'=>array('Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'),
					'changeMonth'=>true,
					'changeYear'=>true
				),
				'htmlOptions'=>array(
					'style'=>'height:2.3125rem;',
					'required' =>'required',
				),
			));
			?>
			<?php echo $form->error($model,'time_end'); ?>
		</div>

		<div class="col-md-12">
			<?php echo CHtml::label("Država",'country'); ?>
			<?php
			$list = CHtml::listData(State::model()->findAll(), 'id', 'name');
			echo CHtml::dropDownList('country', '1', $list);
			?>
		</div>

		<div class="col-md-12">
			<?php echo CHtml::label("Region",'region'); ?>
			<?php
			$country = 1;
			$list = CHtml::listData(Region::model()->findAllByAttributes(array("state_id"=>$country)), 'id', 'name');
			echo CHtml::dropDownList('region', '1', $list);
			?>
		</div>

		<div class="col-md-12">
			<?php echo $form->labelEx($model,'city_ptt'); ?>
			<?php
			$region = 1;
			$list = CHtml::listData(City::model()->findAllByAttributes(array('region_id' => $region)), 'ptt', 'name');
			echo CHtml::dropDownList('Action[city_ptt]', $model, $list);
			?>
			<?php echo $form->error($model,'city_ptt'); ?>
		</div>
	</div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-section-heading">
                <h3>Lične informacije</h3>
                <p>Vaši lični podaci pomoću kojih ćemo Vas kontaktirati kada nekome zatreba pomoć. Nakon snimanja ponude pomoći
                    moći ćete ponovo pristupiti svom volonterskom profilu na našem sajtu, pomoću email adrese i lozinke koju ste unijeli.</p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                <?php echo $form->labelEx($userModel,'name'); ?>
                <?php echo $form->textField($userModel,'name',array('maxlength'=>255, 'class'=>'form-control')); ?>
                <?php echo $form->error($userModel,'name', array('class'=>'alert alert-danger')); ?>
            </div>
            <div class="col-md-3">
                <?php echo $form->labelEx($userModel,'email'); ?>
                <?php echo $form->emailField($userModel,'email',array('maxlength'=>255, 'class'=>'form-control')); ?>
                <?php echo $form->error($userModel,'email', array('class'=>'alert alert-danger')); ?>
            </div>
            <div class="col-md-3">
                <?php echo $form->labelEx($userModel,'password'); ?>
                <?php echo $form->passwordField($userModel,'password',array('maxlength'=>255, 'class'=>'form-control')); ?>
                <?php echo $form->error($userModel,'password', array('class'=>'alert alert-danger')); ?>
            </div>
        </div>
    </div>

    <div class="col-sm-12 text-center buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Snimi akciju' : 'Sačuvaj', array('class'=>'btn btn-primary btn-md')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->