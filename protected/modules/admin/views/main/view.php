<?php
    $this->crumbs = array(
        'Админ-панель' => Yii::app()->createUrl('/admin/main'),
        $this->module->getModelName($model) => Yii::app()->createUrl('/admin/main/modellist', array('module_name' => $module_name, 'model_name' => $model_name)),
        'Просмотр записи',
    );
?>

<?php if (Yii::app()->user->hasFlash('flashMessage')): ?>
    <div class="alert alert-info"><?php echo Yii::app()->user->getFlash('flashMessage'); ?></div>
<?php endif; ?>
    
<h3>Просмотр записи</h3>

<?php
    $this->widget('zii.widgets.CDetailView', $settings);
?>