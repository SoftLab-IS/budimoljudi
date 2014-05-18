<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="col-md-6 col-md-push-3 cta-holder">
	<div class="col-md-4 col-md-push-4 text-center">
        <?php echo CHtml::link("Ponudi pomoć",array("help/create"), array('class'=>"btn btn-lg btn-primary btn-block")); ?>
        <?php echo CHtml::link("Pokreni akciju",array("action/create"), array('class'=>"btn btn-md btn-default btn-block")); ?>
	</div>
</div>

<div class="col-md-7">
	<?php $this->renderPartial('_akcije', array('model'=>$akcije)); ?>
</div>

<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">
			Vijesti
		</div>
		<div class="panel-body">
			<p>fdg
				dfg
				sd
				f
				gsd</p>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Informacije
		</div>
		<div class="panel-body">
			<p>fdg
				dfg
				sd
				f
				gsd</p>
		</div>
	</div>
</div>
