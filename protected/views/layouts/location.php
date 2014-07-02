<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div class="row">
		<div class="col-md-6">
			<?php
			$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->locationMenu,
			'htmlOptions'=>array('class'=>'operations'),
			)); ?>
		</div>
		<div class="col-md-6">
			<?php
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			)); ?>
		</div>
		<div id="content" class="col-md-12">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
<?php $this->endContent(); ?>