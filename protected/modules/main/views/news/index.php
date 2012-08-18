<?php 
    $this->pageTitle = 'Новости';
?>

<h4>Последние записи</h4>
<?php if ($models == null): ?>
    <div class="alert alert-info">Записей не найдено</div>
<?php else: ?>
    <?php foreach ($models as $model): ?>
        <?php $this->renderPartial('_view', array('model' => $model)); ?>
    <?php endforeach; ?>
<?php endif; ?>
