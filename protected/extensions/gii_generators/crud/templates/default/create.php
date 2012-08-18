<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php
\$this->crumbs=array(
	\$model->name() => array('index'),
	'Добавление новой записи',
);\n";
?>
?>

<h4>Добавление новой записи</h4><br/>

<?php echo "<?php echo \$this->renderPartial('_form', array('model' => \$model)); ?>"; ?>
