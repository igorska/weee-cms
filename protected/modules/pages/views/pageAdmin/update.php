<?php
$this->crumbs=array(
	$model->name() => array('index'),
	'Редактирование записи',
);
?>

<h4>Редактирование записи #<?php echo $model->id; ?></h4><br/>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>