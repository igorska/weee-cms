<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'form-horizontal')
)); ?>\n"; ?>

	

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
        <?php if ($column->name == 'seo_title'): ?>
            <div class="control-group">
                <div class="controls">
                    <a href="#" onClick="$('#seoparams_spoiler').toggle(); return false;" class="ajax-link">Показать дополнительные SEO-поля</a>
                </div>
            </div>

            <div class="display-none" id="seoparams_spoiler">
        <?php endif; ?>

        <div class="control-group">
            <?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
            <div class="controls">
                <?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
            </div>
        </div>
                
        <?php if ($column->name == 'seo_keywords'): ?>
            </div>
        <?php endif; ?>

<?php
}
?>
        <p class="note">Поля помеченные <span class="required">*</span> обязательные.</p>
        <div class="form-actions">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Добавить' : 'Сохранить', array('class' => 'btn btn-primary')); ?>"; ?> <a href="<?php echo '<?php echo $this->createUrl("index"); ?>'; ?>" class="btn">Вернуться к общему списку →</a>
        </div>
        
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
