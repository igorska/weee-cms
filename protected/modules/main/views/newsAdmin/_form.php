<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'form-horizontal')
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

        <div class="control-group">
            <?php echo $form->labelEx($model,'title', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'title',array('class' => 'span7')); ?>
		<?php echo $form->error($model,'title'); ?>
            </div>
        </div>
                
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'category_id', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropdownList($model, 'category_id', CHtml::listData(NewsCategory::model()->findAll(), 'id', 'name'), array('class' => 'span7')); ?>
		<?php echo $form->error($model,'category_id'); ?>
            </div>
        </div>
                
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'url', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'url',array('class' => 'span7')); ?>
		<?php echo $form->error($model,'url'); ?>
            </div>
        </div>
                        
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'text', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('ext.ckeditor.CKEditor', array('model' => $model, 'attribute' => 'text')); ?>
		<?php echo $form->error($model,'text'); ?>
            </div>
        </div>
                
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'short_text', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('ext.ckeditor.CKEditor', array('model' => $model, 'attribute' => 'short_text')); ?>
		<?php echo $form->error($model,'short_text'); ?>
            </div>
        </div>
                
        
                    <div class="control-group">
                <div class="controls">
                    <a href="#" onClick="$('#seoparams_spoiler').toggle(); return false;" class="ajax-link">Показать дополнительные SEO-поля</a>
                </div>
            </div>

            <div class="display-none" id="seoparams_spoiler">
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'seo_title', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'seo_title',array('class' => 'span7')); ?>
		<?php echo $form->error($model,'seo_title'); ?>
            </div>
        </div>
                
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'seo_description', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'seo_description',array('class' => 'span7')); ?>
		<?php echo $form->error($model,'seo_description'); ?>
            </div>
        </div>
                
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'seo_keywords', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'seo_keywords',array('class' => 'span7')); ?>
		<?php echo $form->error($model,'seo_keywords'); ?>
            </div>
        </div>
                
                    </div>
        
        <p class="note">Поля помеченные <span class="required">*</span> обязательные.</p>
        <div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', array('class' => 'btn btn-primary')); ?> <a href="<?php echo $this->createUrl("index"); ?>" class="btn">Вернуться к общему списку →</a>
        </div>
        
<?php $this->endWidget(); ?>
