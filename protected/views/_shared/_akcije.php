<div class="panel panel-default">
	<div class="panel-heading">
		<div class="">
            <?php echo (isset($windowTitle))?$windowTitle : "Najavljene akcije"; ?>
		</div>
	</div>

	<table class="table">
		<tr>
			<th class="col-sm-6">Naziv akcije</th>
			<th class="col-sm-3">Grad</th>
			<th class="col-sm-3">Početak akcije</th>
		</tr>
		<?php foreach($model as $akcija): ?>
			<?php if(strtotime(date('Y-m-d h:m:s'))<strtotime($akcija->time_end)): ?>
				<tr>
					<td><?php echo CHtml::link($akcija->title, array('action/view','id'=>$akcija->id)); ?></td>
					<td><?php echo City::getCityName($akcija->location->city_ptt); ?></td>
					<td><?php echo date('d.m.Y. \u h:m<\s\u\p>\h</\s\u\p>',strtotime($akcija->time_start)); ?></td>
                </tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
</div>