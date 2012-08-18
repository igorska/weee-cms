<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->crumbs=array(
	\$model->name() => array('index'),
	'Редактирование записи',
);\n";
?>
?>

<h4>Редактирование записи #<?php echo '<?php echo $model->id; ?>'; ?></h4><br/>

<?php echo "<?php echo \$this->renderPartial('_form', array('model' => \$model)); ?>"; ?>