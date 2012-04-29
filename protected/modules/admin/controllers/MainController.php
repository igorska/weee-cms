<?php

class MainController extends AdminController
{

    public function actionIndex()
    {
        $this->render('index', array(
            'modules' => $this->module->modules,
        ));
    }


    public function actionModelList($module_name, $model_name)
    {
        $model = $this->module->loadModel($module_name, $model_name);

        if (!method_exists($model, 'search'))
            throw new CException('Don\'t find the "search" method.');

        $settings = array(
            'id' => "{$model_name}-grid",
            'dataProvider' => $model->search(),
            'template' => '{items} <br/> {pager}',
        );

        if (method_exists($model, 'adminGridSettings'))
            $settings = CMap::mergeArray($settings, $model->adminGridSettings());

        $settings['columns'][] = array(
            'class' => 'CButtonColumn',
            'updateButtonUrl' => 'Yii::app()->createUrl("/admin/main/modelupdate" ,array("module_name"=>"' . $module_name . '", "model_name" => "' . $model_name . '", "pk" => $data->primaryKey))',
            'viewButtonUrl' => 'Yii::app()->createUrl("/admin/main/modelview" ,array("module_name"=>"' . $module_name . '", "model_name" => "' . $model_name . '", "pk" => $data->primaryKey))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/main/modeldelete" ,array("module_name"=>"' . $module_name . '", "model_name" => "' . $model_name . '", "pk" => $data->primaryKey))',
        );

        $this->render('list', array(
            'model' => $model,
            'model_name' => $model_name,
            'module_name' => $module_name,
            'settings' => $settings,
        ));
    }


    public function actionModelView($module_name, $model_name, $pk)
    {
        $model = $this->module->loadModel($module_name, $model_name)->findByPk($pk);

        $settings = array(
            'data' => $model,
        );

        if (method_exists($model, 'adminViewSettings'))
            $settings = CMap::mergeArray($settings, $model->adminViewSettings());

        $this->render('view', array(
            'model' => $model,
            'model_name' => $model_name,
            'module_name' => $module_name,
            'settings' => $settings,
        ));
    }


    public function actionModelUpdate($module_name, $model_name, $pk)
    {
        $model = $this->module->loadModel($module_name, $model_name)->findByPk($pk);

        if (isset($_POST[get_class($model)]))
        {
            $model->attributes = $_POST[get_class($model)];

            if ($model->save())
            {
                Yii::app()->user->setFlash('flashMessage', 'Запись сохраненна.');
                $this->redirect(Yii::app()->controller->createUrl("/admin/main/modelview", array("module_name" => $module_name, "model_name" => $model_name, "pk" => $model->primaryKey)));
            }
        }
        $this->render('update', array(
            'model' => $model,
            'model_name' => $model_name,
            'module_name' => $module_name,
            'attributes' => $this->module->getModelAttributes($model),
        ));
    }


    public function actionModelCreate($module_name, $model_name)
    {
        $model = $this->module->loadModel($module_name, $model_name);

        if (isset($_POST[get_class($model)]))
        {
            $model->attributes = $_POST[get_class($model)];

            if ($model->save())
            {
                Yii::app()->user->setFlash('flashMessage', 'Запись добавлена.');
                $this->redirect(Yii::app()->controller->createUrl("/admin/main/modelview", array("module_name" => $module_name, "model_name" => $model_name, "pk" => $model->primaryKey)));
            }
        }
        $this->render('create', array(
            'model' => $model,
            'model_name' => $model_name,
            'module_name' => $module_name,
            'attributes' => $this->module->getModelAttributes($model),
        ));
    }


    public function actionModelDelete($module_name, $model_name, $pk)
    {
        $this->module->loadModel($module_name, $model_name)->deleteByPk($pk);

        Yii::app()->user->setFlash('flashMessage', 'Запись удалена.');
        $this->redirect(Yii::app()->controller->createUrl("/admin/main/modellist", array("module_name" => $module_name, "model_name" => $model_name)));
    }


}