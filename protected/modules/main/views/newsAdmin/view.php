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
    'cdate',
    'title',
    'short_text:html',
    'text:html',
    'author.name',
    'category.name',
    'url',
    'seo_title',
    'seo_description',
    'seo_keywords',
	),
)); ?>
