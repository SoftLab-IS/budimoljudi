<?php
/* @var $this ActionController */
/* @var $model Action */
?>

<?php if($header): ?>
	<div class="col-sm-12">
		<header class="page-header">
			<h1 class="row">
				<span class="col-sm-10">Akcije pomoći</span>
				<div class="col-sm-2 text-right">
					<?php echo CHtml::link('Pokrenite akciju', array('action/create'), array('class' => 'btn btn-primary')); ?>
				</div>
			</h1>
			<p class="page-description">
				<?php echo $pageDescription; ?>
			</p>
		</header>
	</div>
<?php else: ?>
	<div class="col-sm-12">
		<header class="page-header">
			<p class="page-description">
				<?php echo $pageDescription; ?>
			</p>
		</header>
	</div>
<?php endif; ?>

<div class="col-md-8">
	<?php $this->renderPartial('//_shared/_akcije', array('model'=>$model)); ?>
</div>

<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			Završene akcije
		</div>
		<table class="table">
			<?php
			if($finishedActions):
				foreach($finishedActions as $finishedAction):
					?>
					<tr>
						<td><?php echo $finishedAction->title; ?></td>
						<td><?php echo City::getCityName($finishedAction->location->city_ptt); ?></td>
					</tr>
				<?php
				endforeach;
			else:
				?>
				<tr>
					<td>Ni jedna akcija još nije završena.</td>
				</tr>
			<?php endif; ?>
		</table>
	</div>
</div>
