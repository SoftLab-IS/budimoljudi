<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="col-sm-12 slider">
    <div class="slider-item">
        <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/img/poplave-u-republici-srpskoj.jpg" alt=""/>

        <div class="cta-holder col-sm-6">
            <div class="col-sm-8">
                <p>Mnogi su izgubili sve. Pomozimo im da ponovo stanu na noge.</p>
            </div>
            <div class="col-sm-4 text-center">
                <?php
                    if(Yii::app()->user->checkAccess("ponudi_pomoc"))
                        echo CHtml::link("Ponudi pomoć",array("help/create"), array('class'=>"btn btn-lg btn-primary btn-block"));
                    else
	                    echo CHtml::link("Ponudi pomoć",array("help/update",'id'=>Yii::app()->session['id']), array('class'=>"btn btn-lg btn-primary btn-block"));
                ?>
                <?php //echo CHtml::link("Pokreni akciju",array("action/create"), array('class'=>"btn btn-md btn-default btn-block")); ?>
            </div>
        </div>
    </div>
</div>

<div class="col-md-7">
	<?php $this->renderPartial('//_shared/_akcije', array('model'=>$akcije)); ?>
</div>

<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">
			Vijesti
		</div>
		<table class="table">
			<?php $i=1; foreach($vijesti as $vijest): ?>
					<tr>
						<td class="col-md-2"><?php echo date('d.m.Y.',strtotime($vijest->date)); ?></td>
						<td><?php echo CHtml::link($vijest->title, array('post/view','id'=>$vijest->id)); ?></td>
					</tr>
			<?php endforeach; ?>
		</table>
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
