<?php
    $this->crumbs = array(
        'Админ-панель' => Yii::app()->createUrl('/admin/main'),
        $this->module->getModelName($model),
    );
?>

<?php if (Yii::app()->user->hasFlash('flashMessage')): ?>
    <div class="alert alert-info"><?php echo Yii::app()->user->getFlash('flashMessage'); ?></div>
<?php endif; ?>

<h3>Список записей</h3>

<a href="<?php echo $this->createUrl("/admin/main/modelcreate", array("module_name" => $module_name, "model_name" => $model_name)); ?>" class="btn btn-mini" style="float: right; clear: both; margin-bottom: 5px;">Добавить новую запись</a>
<?php
    $this->widget('zii.widgets.grid.CGridView', $settings);
?>