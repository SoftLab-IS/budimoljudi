<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="col-sm-12 slider">
    <div class="slider-item">
        <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/img/poplave-u-republici-srpskoj.jpg" alt=""/>

        <div class="cta-holder col-sm-4 col-sm-push-1">
            <div class="col-sm-12 text-right">
                <p>Mnogi su izgubili sve. Pomozimo im da izgrade novi početak.</p>
            </div>

                <div class="col-sm-8 col-sm-push-4">
                    <?php
                        if(!Yii::app()->user->haveHelp())
                            echo CHtml::link("Ponudite pomoć",array("help/create"), array('class'=>"btn btn-lg btn-primary btn-block"));
                        else
                            echo CHtml::link("Ponudite pomoć",array("help/update",'id'=>Yii::app()->session['id']), array('class'=>"btn btn-lg btn-primary btn-block"));
                    ?>
                    <?php //echo CHtml::link("Pokreni akciju",array("action/create"), array('class'=>"btn btn-md btn-default btn-block")); ?>
                </div>
        </div>
    </div>
</div>

<div class="col-md-8">
	<?php $this->renderPartial('//_shared/_akcije', array('model'=>$akcije, 'naslov' => 'Najavljene akcije pomoći')); ?>
</div>

<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			Članci na blogu
		</div>
		<table class="table">
			<?php
                if($vijesti):
                foreach($vijesti as $vijest):
            ?>
					<tr>
						<td class="col-md-2"><?php echo date('d.m.Y.',strtotime($vijest->date)); ?></td>
						<td><?php echo CHtml::link($vijest->title, array('post/view','id'=>$vijest->id)); ?></td>
					</tr>
			<?php
                endforeach;
                else:
            ?>
                <tr>
                    <td>Trenutno ne postoji ni jedan post na blogu.</td>
                </tr>
            <?php endif; ?>
		</table>
	</div>
</div>

<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Pozovite ili pošaljite prazan SMS za pomoć stanovništvu ugroženom od poplava
		</div>
		<div class="panel-body">
			<div class="col-sm-3">
                <h3>Bosna i Hercegovina</h3>
                m:tel - <strong>1458</strong> (1 KM)<br/>
                BH Telekom - <strong>090 291 032</strong> (2 KM)<br/>
                HT Mostar - <strong>092 890 830</strong> (2 KM)
			</div>
            <div class="col-sm-3">
                <h3>Srbija</h3>
                Sve mreže - <strong>1003</strong> (100 RSD)<br/>
            </div>
            <div class="col-sm-3">
                <h3>Hrvatska</h3>
                Sve mreže - <strong>060 90 11</strong> (6,25 Kn)<br/>
            </div>
            <div class="col-sm-3">
                <h3>Crna Gora</h3>
                Sve mreže - <strong>14543</strong> (1 &euro;)<br/>
            </div>
		</div>
	</div>
</div>
