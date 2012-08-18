<?php
$this->crumbs=array(
	$model->name() => array('index'),
	'Просмотр записи',
);

?>

<h4>Просмотр записи #<?php echo $model->id; ?></h4><br/>

<?php $this->widget('DetailView', array(
    'data' => $model,
    'attributes' => array(
    'id',
    'url',
    'name',
    'seo_title',
    'seo_description',
    'seo_keywords',
	),
)); ?>
