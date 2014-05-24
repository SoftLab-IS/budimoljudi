<?php
/* @var $this HelpController */
/* @var $model Help */

?>

<h1>Izmjeni profil, <?php echo $userModel->name; ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'userModel'=>$userModel,
	'locationModel'=>$locationModel,
	'helpTypes'=>$helpTypes,
	'checkedTypes'=>$checkedTypes,
)); ?>