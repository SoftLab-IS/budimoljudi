<?php
/* @var $this ActionController */
/* @var $model Action */
$this->renderPartial('//_shared/_stranica_akcije', array(
	'header' => true,
	'model'=>$model,
	'finishedActions'=>$finishedActions,
	'pageDescription'=>'Akcije koje sam ja pokrenuo.'
));

