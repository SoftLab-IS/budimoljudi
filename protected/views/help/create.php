<?php
/* @var $this HelpController */
/* @var $model Help */
?>

<div class="col-sm-12">
    <header class="page-header">
        <h1 class="row">
            <span class="col-sm-10">Ponudi pomoć</span>
        </h1>
        <p class="page-description">
            Popunjavanjem ovog formulara se upisujete u našu bazu volontera i dobijate mogućnost da se prijavite na neku akciju ili da
            vi pokrenete neku humanitarnu akciju.
        </p>
    </header>
</div>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'userModel'=>$userModel,
	'locationModel'=>$locationModel,
	'helpTypes'=>$helpTypes,
	'checkedTypes' => false,
)); ?>