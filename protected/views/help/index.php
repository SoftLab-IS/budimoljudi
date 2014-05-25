<?php
/* @var $this HelpController */
/* @var $dataProvider CActiveDataProvider */

?>

<div class="col-sm-12">
    <header class="page-header">
        <h1 class="row">
            <span class="col-sm-10">Registrovani volonteri</span>
            <div class="col-sm-2 text-right">
                <?php echo CHtml::link('Ponudite pomoć', array('help/create'), array('class' => 'btn btn-primary')); ?>
            </div>
        </h1>
        <p class="page-description">
            Svi koji ponude pomoć upisuju se u bazu volontera koji mogu da se priključe nekoj akciji ili da pokrenu neku
            humanitarnu akciju.
        </p>
    </header>
</div>

<div class="col-sm-12">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); ?>
</div>

