<h5>Комментарии (<?php echo count($comments); ?>):</h5>
<div id="comments_list_<?php echo $model_name; ?>_<?php echo $model_id; ?>">
    <?php if ($comments == null): ?>
        <div class="alert alert-info">
            Комментариев нет
        </div>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <?php $this->render('application.modules.comments.views.main.view', array('model' => $comment)); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>