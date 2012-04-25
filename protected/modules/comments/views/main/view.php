<div class="well" style="margin-bottom: 10px;">
    <strong><?php echo $model->author_model->username; ?></strong> <?php echo date('d.m.y в H:i', strtotime($model->date)); ?>: <br/> <?php echo $model->text; ?>
</div>