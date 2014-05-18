<?php
/* @var $this ActionController */
/* @var $model Action */
?>

<div class="col-md-12">
    <h2>Akcije</h2>
</div>

<div class="col-md-8">
	<?php $this->renderPartial('_akcije', array('model'=>$model)); ?>
</div>

<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            Završene akcije
        </div>
	    <table class="table">
		    <?php $i=1; foreach($model as $akcija): ?>
			    <?php if(strtotime(date('Y-m-d h:m:s'))>strtotime($akcija->time_end)): ?>
				    <tr>
					    <td><?php echo $i++; ?></td>
					    <td><?php echo $akcija->title; ?></td>
					    <td><?php echo City::getCityName($akcija->city_ptt); ?></td>
				    </tr>
			    <?php endif; ?>
		    <?php endforeach; ?>
	    </table>
    </div>
</div>
