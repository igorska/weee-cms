<?php
    $this->crumbs=array(
        $model->name(),
    );
?>

<h4>Управление статическими страницами</h4><br/>
<a href="<?php echo $this->createUrl("create"); ?>" class="btn btn-mini">Добавить запись</a>
<?php $this->widget('GridView', array(
    'id' => 'page-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'title',
            'value' => 'CHtml::link($data->title, $data->href)',
            'type' => 'html',
        ),
        'url',
        'cdate',
        'author.name',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
