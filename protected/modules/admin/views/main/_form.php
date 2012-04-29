<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'model-edit-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
        'htmlOptions' => array('class' => 'well')
            ));
?>
    <?php foreach ($attributes as $name => $type): ?>
        <?php echo $form->labelEx($model, $name); ?>
        <?php echo $this->module->createWidget($form, $model, $name, $type); ?>
        <?php echo $form->error($model, $name); ?>
    <?php endforeach; ?>

    <br/> <input type="submit" name="save" value="<?php echo $model->isNewRecord ? 'Создать' : 'Сохранить'; ?>" class="btn btn-primary">
<?php $this->endWidget(); ?>