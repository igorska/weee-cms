<?php
    $this->pageTitle = $model->seo_title;
    $this->pageDescription = $model->seo_description;
    $this->pageKeywords = $model->seo_keywords;
?>

<h4><?php echo $model->title; ?></h4><br/>
<?php echo $model->text; ?>