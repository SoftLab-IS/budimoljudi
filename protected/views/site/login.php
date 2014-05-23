<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Administracija';
?>

<div class="row">

	<div class="form login-form col-md-4 col-md-push-4">

		<h1 class="text-center">Prijava korisnika</h1>

		<p class="text-center">Unesite email i lozinku da bi ste pristupili administraciji:</p>

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

		<div class="">
			<?php echo $form->textField($model,'username', array('placeholder'=> "Email",'class'=>'form-control', 'required' => true, 'autofocus' => true)); ?>
			<?php echo $form->passwordField($model,'password', array('placeholder'=>"Lozinka",'class'=>'form-control', 'required' => true)); ?>
			<?php echo $form->error($model,'username'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="rememberMe">
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>

		<div class="text-center">
			<?php echo CHtml::submitButton('Nastavi', array('class' => 'btn btn-primary')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>