<div class="panel panel-default">
	<div class="panel-heading">
		<div class="">
			Najavljene akcije
		</div>
	</div>

	<table class="table">
		<tr>
			<th>#</th>
			<th>Naziv akcije</th>
			<th>Lokacija</th>
			<th>Početak akcije</th>
			<th>&nbsp;</th>
		</tr>
		<?php $i=1; foreach($model as $akcija): ?>
			<?php if(strtotime(date('Y-m-d h:m:s'))<strtotime($akcija->time_end)): ?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $akcija->title; ?></td>
					<td><?php echo City::getCityName($akcija->city_ptt); ?></td>
					<td><?php echo date('d.m.Y. \u h:m<\s\u\p>\h</\s\u\p>',strtotime($akcija->time_start)); ?></td>
					<td><a class="btn btn-success" href="#">Priključi se</a></td>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
</div>