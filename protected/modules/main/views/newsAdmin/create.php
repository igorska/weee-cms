<?php
$this->crumbs=array(
	$model->name() => array('index'),
	'Добавление новой записи',
);
?>

<h4>Добавление новой записи</h4><br/>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>