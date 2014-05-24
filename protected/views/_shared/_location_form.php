<div class="col-md-3">
	<?php echo $form->labelEx($locationModel,"state_id"); ?>
</div>
<div class="col-md-9">
	<?php
	$list = CHtml::listData(State::model()->findAll(), 'id', 'name');
	echo CHtml::dropDownList('Location[state_id]', $locationModel->state_id, $list,
		array(
			'class'=>'form-control',
			'prompt'=>'Izaberite državu',
			'ajax' => array(
				'type'=>'POST',
				'url'=>Yii::app()->createUrl('region/loadregions'), //or $this->createUrl('loadcities') if '$this' extends CController
				'update'=>'#Location_region_id', //or 'success' => 'function(data){...handle the data in the way you want...}',
				'data'=>array('state_id'=>'js:this.value'),
			)));
	?>
	<?php echo $form->error($locationModel,'state_id', array('class'=>'alert alert-danger')); ?>
</div>
<div class="col-md-3">
	<?php echo $form->labelEx($locationModel,'region_id'); ?>
</div>
<div class="col-md-9">
	<?php
	$list = CHtml::listData(Region::model()->findAllByAttributes(array('state_id'=>$locationModel->state_id)), 'id', 'name');
	echo CHtml::dropDownList('Location[region_id]', $locationModel->region_id, $list,
		array(
			'class'=>'form-control',
			'prompt'=>'Sve regije',
			'ajax' => array(
				'type'=>'POST',
				'url'=>Yii::app()->createUrl('city/loadcities'), //or $this->createUrl('loadcities') if '$this' extends CController
				'update'=>'#Location_city_ptt', //or 'success' => 'function(data){...handle the data in the way you want...}',
				'data'=>array('region_id'=>'js:this.value'),
			)));
	?>
	<?php echo $form->error($locationModel,'region_id', array('class'=>'alert alert-danger')); ?>
</div>
<div class="col-md-3">
	<?php echo $form->labelEx($locationModel,'city_ptt'); ?>
</div>
<div class="col-md-9">
	<?php
	$list = CHtml::listData(City::model()->findAllByAttributes(array('region_id'=>$locationModel->region_id)), 'ptt', 'name');
	echo CHtml::dropDownList('Location[city_ptt]', $locationModel->city_ptt, $list,
		array(
			'class'=>'form-control',
			'empty' => 'Svi gradovi'
		));
	?>
	<?php echo $form->error($locationModel,'city_ptt', array('class'=>'alert alert-danger')); ?>
</div>