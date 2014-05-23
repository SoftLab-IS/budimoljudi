<?php
/* @var $this ActionController */
/* @var $model Action */

?>

<h1>Akcije</h1>
<p>Opis akcija</p>

<?php $this->renderPartial('_form', array('model'=>$model,'userModel'=>$userModel)); ?>
