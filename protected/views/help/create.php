<?php
/* @var $this HelpController */
/* @var $model Help */
?>

<div class="col-sm-12">

        <h1>Ponudi pomoć</h1>
        <p>Opis nudjenja pomoci</p>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'userModel'=>$userModel,
	'locationModel'=>$locationModel,
	'helpTypes'=>$helpTypes,
	'checkedTypes' => false,
)); ?>

</div>