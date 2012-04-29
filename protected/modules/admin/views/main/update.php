<?php
    $this->crumbs = array(
        'Админ-панель' => Yii::app()->createUrl('/admin/main'),
        $this->module->getModelName($model) => Yii::app()->createUrl('/admin/main/modellist', array('module_name' => $module_name, 'model_name' => $model_name)),
        'Редактирование записи',
    );
?>

<h3>Редактирование записи</h3>

<?php
    $this->renderPartial('_form', array(
        'model' => $model,
        'attributes' => $attributes,
    ));
?>