<?php
/* @var $this ActionController */
/* @var $model Action */

?>

<div class="one-action-wrapper col-sm-12">
    <h1><?php echo $model->title; ?></h1>

    <div class="row">
        <div class="col-sm-3">
            <div class="action-info text-center">
                <ul class="list-group">
                    <li class="list-group-item"><span>Grad </span><strong><?php echo City::getCityName($model->location->city_ptt); ?></strong></li>
                    <li class="list-group-item"><span>Početak akcije </span><strong><?php echo date('d.m.Y \u H:m', strtotime($model->time_start)); ?></strong><sup>h</sup></li>
                    <li class="list-group-item"><span>Kraj akcije </span><strong><?php echo date('d.m.Y \u H:m', strtotime($model->time_end)); ?></strong><sup>h</sup></li>
                </ul>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="action-description">
                <?php echo $model->description; ?>
            </div>
        </div>

        <div class="col-sm-3 col-sm-push-1 text-center">
            <div class="action-cta-wrapper">
                <div class="action-participants">
                    <?php if ($model->number_of_participants): ?>
                        <p>Broj prijavljenih volontera</p>
                        <span class="label label-default participants-count"><?php echo $model->number_of_participants; ?></span>
                    <?php else: ?>
                    <p>Budite prvi volonter koji će podržati ovu akciju</p>
                    <?php endif; ?>
                </div>
				<?php if(Actionusers::is_user_in_action($model->id,Yii::app()->session['id']))
						  echo 'Prijavljeni ste na ovu akciju';
					  else
						  echo CHtml::link('Podrži akciju', array('action/ucesce', 'id'=>$model->id), array('class'=>'btn btn-success'));
				?>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <small class="action-meta">Akciju je pokrenuo <?php echo User::model()->findByPk($model->user_id)->name; ?></small>
    </div>
</div>

<div class="col-sm-12">
    <?php $this->renderPartial('//_shared/_akcije', array('model'=>$actions, 'windowTitle' => 'Ostale akcije koje možete podržati')); ?>
</div>