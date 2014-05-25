<?php
/* @var $this ActionController */
/* @var $model Action */

?>

<div class="col-sm-12">
    <header class="page-header">
        <h1 class="row">
            <span class="col-sm-12">Pokrenite novu akciju</span>
        </h1>
        <p class="page-description">
            Akcije pomoći se organizuju sa ciljem da se pomogne ugroženom stanovništvu, na bilo koji način.
            Akcija može biti skupljanje materijalne ili finansijske pomoći, radna akcija za popravku nečije kuće ili
            bilo koja druga vrsta pomoći koja će nekome vratiti ljudsko dostojanstvo i omogućiti normalan život.
        </p>
    </header>
</div>

<?php $this->renderPartial('_form', array('model'=>$model,'userModel'=>$userModel, 'locationModel'=>$locationModel)); ?>
