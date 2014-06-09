<?php
/* @var $this ActionController */
/* @var $model Action */

if(Yii::app()->user->haveAction())
$this->renderPartial('//_shared/_stranica_akcije', array(
	'header' => true,
	'model'=>$model,
	'finishedActions'=>$finishedActions,
	'pageDescription'=>'Akcije koje sam ja pokrenuo.'
));
if(Yii::app()->user->haveHelp())
$this->renderPartial('//_shared/_stranica_akcije', array(
	'header' => false,
	'model'=>$podrzaneAkcije,
	'finishedActions'=>$zavrsenePodrzaneAkcije,
	'pageDescription'=>'Akcije u kojima ucestvujem'
));
