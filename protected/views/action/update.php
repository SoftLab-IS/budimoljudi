<?php
/* @var $this ActionController */
/* @var $model Action */

?>

<div class="col-sm-12">
    <header class="page-header">
        <h1 class="row">
            <span class="col-sm-10">Izmjena akcije</span>
        </h1>
    </header>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'locationModel'=>$locationModel)); ?>