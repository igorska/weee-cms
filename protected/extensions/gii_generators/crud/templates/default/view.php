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
	'Просмотр записи',
);\n";
?>

?>

<h4>Просмотр записи #<?php echo '<?php echo $model->id; ?>'; ?></h4><br/>

<?php echo "<?php"; ?> $this->widget('DetailView', array(
    'data' => $model,
    'attributes' => array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "    '".$column->name."',\n";
?>
	),
)); ?>
