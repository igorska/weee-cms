<h5>Новый комментарий:</h5>

<?php if (!Yii::app()->user->isGuest): ?>
    <form method="post" action="<?php echo Yii::app()->controller->createUrl('/comments/main/create'); ?>" class="well" id="comment_form_<?php echo $model_name; ?>_<?php echo $model_id; ?>">
        <input type="hidden" name="Comment[model_name]" value="<?php echo $model_name; ?>"/>
        <input type="hidden" name="Comment[model_id]" value="<?php echo $model_id; ?>"/>
        <textarea name="Comment[text]" style="width: 100%;" placeholder="Текст комментария"></textarea> <br/>
        <button class="btn btn-mini comment_form_submit" data-model_name="<?php echo $model_name; ?>" data-model_id="<?php echo $model_id; ?>">Добавить комментарий</button>
    </form>
<?php else: ?>
    <center><h5>Необходимо <a href="<?php echo Yii::app()->controller->createUrl('/users/main/login'); ?>">авторизироваться</a> или <a href="<?php echo Yii::app()->controller->createUrl('/users/main/register'); ?>">зарегистрироваться</a>, чтобы оставить комментарий.</h5></center>
<?php endif; ?>
