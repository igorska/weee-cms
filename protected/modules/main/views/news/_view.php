<div class="news-item">
    <a href="<?php echo $model->href; ?>" class="news-item-title"><?php echo $model->title; ?></a>
    <div class="news-item-shorttext">
        <?php echo $model->short_text; ?>
    </div>
    
    <div class="news-item-bar">
        <?php echo $model->author->name; ?>
        <?php echo $model->cdate; ?>
        в категории <a href="<?php echo $model->category->href; ?>"><?php echo $model->category->name; ?></a>
    </div>
</div>