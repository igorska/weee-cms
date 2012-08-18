<?php $this->layout = '//layouts/main_small'; ?>

<h4>Страница пользователя <?php echo $model->name; ?></h4>
<img src="<?php echo $model->avatar; ?>" class="avatar"/> <br/>

<strong>Дата регистрации:</strong> <?php echo $model->cdate; ?> <br/>
<strong>Написал комментариев:</strong> <?php echo $model->comments_count; ?> шт. <br/>
<strong>Подписки:</strong> <br/>
<div class="subscribes">
    <?php if ($subscribes == null): ?>
        <br/><center><i><?php echo $model->name; ?> не подписан на теги</i></center>
    <?php else: ?>
        <?php foreach ($subscribes as $i => $tag): 
            if ($i == 0) 
                    echo '<a class="tag" href="/tag/' . $tag->id . '">#' . $tag->name . '</a>';
                else
                    echo ', <a class="tag" href="/tag/' . $tag->id . '">#' . $tag->name . '</a>';
            endforeach; ?>
    <?php endif; ?>
</div>