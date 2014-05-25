<?php
/* @var $this ActionController */
/* @var $model Action */
?>

<div class="col-sm-10">
    <h1>Akcije</h1>
    <p>Opis akcija</p>
</div>
<div class="col-sm-2 text-right">
    <?php echo CHtml::link('Pokreni akciju', array('action/create'), array('class' => 'btn btn-primary')); ?>
</div>

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
