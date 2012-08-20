<?php
$this->crumbs = array(
    $model->name(),
);
?>


<h4>Управление новостями</h4><br/>
<a href="<?php echo $this->createUrl("create"); ?>" class="btn btn-mini">Добавить запись</a>

<?php
$this->widget('GridView', array(
    'id' => 'news-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'title',
            'type' => 'html',
            'value' => 'CHtml::link($data->title, $data->href)',
        ),
        array(
            'name' => 'category_id',
            'value' => '$data->category->name',
            'filter' => CHtml::listData(NewsCategory::model()->findAll(), "id", "name"),
        ),
        'cdate',
        array(
            'name' => 'author_id',
            'value' => '$data->author->name',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));