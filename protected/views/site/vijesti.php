<?php foreach($model as $vijest): ?>
	<?php echo $vijest->title; ?><br />
	<?php echo $vijest->content; ?><br />
	<?php echo $vijest->image; ?><br />
	<?php echo $vijest->user_id; ?><br />
	<?php echo $vijest->date; ?><br />
	<hr />
<?php endforeach; ?>