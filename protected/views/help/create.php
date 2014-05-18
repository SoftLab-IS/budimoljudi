<?php
/* @var $this HelpController */
/* @var $model Help */
?>

<div class="col-md-12">

    <hgroup>
        <h2>Ponudi pomoć</h2>
        <h3>Opis nudjenja pomoci</h3>
    </hgroup>

<?php $this->renderPartial('_form', array('model'=>$model, 'userModel'=>$userModel)); ?>

</div>