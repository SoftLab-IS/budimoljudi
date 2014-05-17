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

	<p class="note">Polja sa <span class="required">*</span> su obavezna.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_start');
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'name'=>'WorkAccounts[time_start]',
		'id'=>'WorkAccounts_time_start',
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

	<div class="row">
		<?php echo $form->labelEx($model,'time_end');
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'name'=>'WorkAccounts[time_end]',
		'id'=>'WorkAccounts_time_end',
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

	<div class="row">
		<?php echo $form->labelEx($model,'city_ptt'); ?>
		<?php
		$list = CHtml::listData(City::model()->findAll(), 'ptt', 'name');
		echo CHtml::dropDownList('Ad[city_ptt]', $model, $list);
		?>
		<?php echo $form->error($model,'city_ptt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kreiraj' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->