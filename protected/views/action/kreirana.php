<?php
/* @var $this ActionController */
/* @var $model Action */
?>


<div class="col-sm-8 col-sm-push-2">
    <div class="panel panel-success text-center">
        <div class="panel-heading">
            <h2>Uspješno ste pokrenuli novu akciju</h2>
        </div>
        <div class="panel-body">
            <div class="col-sm-12">
                <h3><?php echo $model->title; ?></h3>
            </div>

            <div class="col-sm-12">
                <p>Da bi akcija bila uspješna potrebno je naći dovoljan broj volontera koji će se uključiti. Pozovite svoje prijatelje
                    da se pridruže ovoj akciji.</p>

            </div>

            <div class="col-sm-12 text-center">
                <div class="social-share-buttons">
                    Ovde ce ici dugmad za socijalu
                </div>

            </div>
            <div class="col-sm-12 text-center">
                <?php echo CHtml::link('Pogledajte ostale akcije', array('action/index'), array('class' => 'btn btn-primary')); ?>
            </div>

        </div>

    </div>
</div>
