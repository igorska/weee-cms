<?php
    $this->crumbs=array(
        $model->name(),
    );
?>

<h4>Управление Page</h4><br/>
<a href="<?php echo $this->createUrl("create"); ?>" class="btn btn-mini">Добавить запись</a>
<?php $this->widget('GridView', array(
    'id' => 'page-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
		'id',
		'url',
		'title',
		'text',
            array(
                'class'=>'CButtonColumn',
            ),
	),
)); ?>
