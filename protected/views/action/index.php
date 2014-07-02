<?php
/* @var $this ActionController */
/* @var $model Action */
$this->renderPartial('//_shared/_stranica_akcije', array(
	'header' => true,
	'model'=>$model,
	'finishedActions'=>$finishedActions,
	'pageDescription'=>'Pregled svih aktivnih i završenih akcija. Budi human, pridruži se akciji!'
));

