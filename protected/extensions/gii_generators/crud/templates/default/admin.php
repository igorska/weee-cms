<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php
    \$this->crumbs=array(
        \$model->name(),
    );\n";
?>
?>

<h4>Управление <?php echo $this->class2name($this->modelClass); ?></h4><br/>
<a href="<?php echo '<?php echo $this->createUrl("create"); ?>'; ?>" class="btn btn-mini">Добавить запись</a>
<?php echo "<?php"; ?> $this->widget('GridView', array(
    'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
            array(
                'class'=>'CButtonColumn',
            ),
	),
)); ?>
