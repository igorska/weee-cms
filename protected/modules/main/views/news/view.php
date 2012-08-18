<?php
    $this->pageTitle = $model->seo_title;
    $this->pageDescription = $model->seo_description;
    $this->pageKeywords = $model->seo_keywords;
?>

<h4><?php echo $model->title; ?></h4>
<div class="news-item-shorttext">
    <?php echo $model->text; ?>
</div>

<div class="news-item-bar">
    <?php echo $model->author->name; ?>
    <?php echo $model->cdate; ?>
    в категории <a href="<?php echo $model->category->href; ?>"><?php echo $model->category->name; ?></a>
</div>
