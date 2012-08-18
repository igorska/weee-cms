<?php
    $this->crumbs = array(
        $model->name(),
    );
?>

<h4>Управление категориями новостей</h4><br/>
<a href="<?php echo $this->createUrl("create"); ?>" class="btn btn-mini">Добавить запись</a>
<?php
$this->widget('GridView', array(
    'id' => 'news-category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        'url',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
