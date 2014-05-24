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
                    <li class="list-group-item"><span>Grad </span><strong><?php echo City::getCityName($model->city_ptt); ?></strong></li>
                    <li class="list-group-item"><span>Početak akcije </span><strong><?php echo date('d.m.Y \u h:m', strtotime($model->time_start)); ?></strong><sup>h</sup></li>
                    <li class="list-group-item"><span>Kraj akcije </span><strong><?php echo date('d.m.Y \u h:m', strtotime($model->time_end)); ?></strong><sup>h</sup></li>
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
                        <span>Broj prijavljenih volontera</span>
                        <span class="lable label-default"><?php echo $model->number_of_participants; ?></span>
                    <?php else: ?>
                    Budite prvi volonter koji će podržati ovu akciju
                    <?php endif; ?>
                </div>

                <?php echo CHtml::link('Podrži akciju', array('action/ucesce', 'id'=>$model->id), array('class'=>'btn btn-success')) ?>

                <p class="action-meta">Akciju je pokrenuo <?php echo User::model()->findByPk($model->user_id)->name; ?></p>
            </div>

        </div>
    </div>
</div>

<div class="col-sm-12">
    <?php $this->renderPartial('//_shared/_akcije', array('model'=>$actions, 'windowTitle' => 'Ostale akcije koje možete podržati')); ?>
</div>