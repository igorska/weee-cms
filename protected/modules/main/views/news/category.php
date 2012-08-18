<?php 
    $this->pageTitle = $category->seo_title;
    $this->pageDescription = $category->seo_description;
    $this->pageKeywords = $category->seo_keywords;
?>

<h4><?php echo $category->name; ?></h4>
<?php if ($models == null): ?>
    <div class="alert alert-info">Записей не найдено</div>
<?php else: ?>
    <?php foreach ($models as $model): ?>
        <?php $this->renderPartial('_view', array('model' => $model)); ?>
    <?php endforeach; ?>
<?php endif; ?>
