<?php
    $this->layout = '//layouts/main_small';
?>

<?php foreach ($models as $model): ?>
    <?php $this->renderPartial('_view', array(
        'model' => $model,
    )); ?>
<?php endforeach; ?>

<?php $this->renderPartial('//layouts/_pagination', array(
        'pages' => $pages,
    )); ?>