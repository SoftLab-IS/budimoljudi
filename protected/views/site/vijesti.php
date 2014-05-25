<h2>Najnovije vijesti</h2>

<?php foreach($model as $vijest): ?>
    <article>

        <h3><?php echo $vijest->title; ?>
            <em><?php echo date('d.m.Y. \u H:i', strtotime($vijest->date)); ?></em>
        </h3>

        <?php echo $vijest->content; ?><br />
        <?php echo $vijest->image; ?><br />

    </article>
    <hr />
<?php endforeach; ?>