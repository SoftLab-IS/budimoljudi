<?php
/* @var $this ActionController */
/* @var $model Action */

$this->breadcrumbs=array(
	'Actions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Action', 'url'=>array('index')),
	array('label'=>'Create Action', 'url'=>array('create')),
	array('label'=>'Update Action', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Action', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Action', 'url'=>array('admin')),
);
?>

<h1>Akcija #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'time_start',
		'description',
		'user_id',
		'time_end',
		'city_ptt',
		'number_of_participants',
	),
)); ?>

<div class="col-sm-6">
    <h2><?php echo $model->title; ?></h2>
    <div class="action-content">
        <?php echo $model->description; ?>
    </div>
</div>

<div class="col-sm-6">
    <?php $this->renderPartial('//_shared/_akcije', array('model'=>$actions)); ?>
</div>