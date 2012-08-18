<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'form-horizontal')
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

        
        <div class="control-group">
            <?php echo $form->labelEx($model,'url', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'url',array('class' => 'span7')); ?>
		<?php echo $form->error($model,'url'); ?>
            </div>
        </div>
                
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'title', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'title',array('class' => 'span7')); ?>
		<?php echo $form->error($model,'title'); ?>
            </div>
        </div>
                
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'text', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model,'text', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model,'text'); ?>
            </div>
        </div>
                
        
        <p class="note">Поля помеченные <span class="required">*</span> обязательные.</p>
        <div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', array('class' => 'btn btn-primary')); ?> <a href="<?php echo $this->createUrl("index"); ?>" class="btn">Вернуться к общему списку →</a>
        </div>
        
<?php $this->endWidget(); ?>
