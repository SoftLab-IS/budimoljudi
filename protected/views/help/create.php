<?php
/* @var $this HelpController */
/* @var $model Help */
?>

<div class="col-md-12">

        <h1>Ponudi pomoć</h1>
        <p>Opis nudjenja pomoci</p>

<?php $this->renderPartial('_form', array('model'=>$model, 'userModel'=>$userModel)); ?>

</div>