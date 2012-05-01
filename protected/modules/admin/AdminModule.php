<?php

class AdminModule extends WebModule
{

    private $_modules = array();

    public static function name()
    {
        return 'Админ-панель';
    }


    public static function description()
    {
        return 'Модуль универсальной админ-панели';
    }


    public function init()
    {
        parent::init();

        $this->setImport(array(
            'admin.models.*',
        ));

        $this->_loadModelsList();
    }


    /**
     * Рекурсивный поиск всех моделей по модулям 
     */
    private function _loadModelsList()
    {
        $modules = Yii::app()->modules;

        foreach ($modules as $name => $module)
        {
            if ($name != 'admin')
            {
                $class_name = ucfirst($name) . "Module";
                Yii::import("application.modules.{$name}.{$class_name}");

                $this->_modules[$name]['name'] = call_user_func(array($class_name, 'name'));
                $this->_modules[$name]['description'] = call_user_func(array($class_name, 'description'));

                $files = CFileHelper::findFiles(Yii::getPathOfAlias("$name.models.*"));
                foreach ($files as $file)
                {
                    $this->_modules[$name]['models'][] = str_replace('.php', '', substr(strrchr($file, DIRECTORY_SEPARATOR), 1));
                }
            }
        }
    }


    /**
     * Получение массива с модулями
     * @todo add cache
     * @return array array of modules
     */
    public function getModules()
    {
        return $this->_modules;
    }


    /**
     * Получение объекта модели
     * @param string $module_name
     * @param string $model_name
     * @return object model 
     */
    public function loadModel($module_name, $model_name)
    {
        Yii::import("application.modules." . mb_strtolower($module_name) . ".models." . ucfirst($model_name));

        $class_name = ucfirst($model_name);
        $model = new $class_name;

        return $model;
    }


    /**
     * Получение полей для редатирования, вместе с их типом данных
     * @param object $model
     * @return array array of attributes 
     */
    public function getModelAttributes($model)
    {
        $attributes = array();

        if (method_exists($model, 'adminFormAttributes'))
            return $model->adminFormAttributes();

        foreach ($model->attributes as $k => $v)
        {
            if ($model->tableSchema->columns[$k]->isPrimaryKey)
                continue;

            if ($model->tableSchema->columns[$k]->dbType == 'text')
                $attributes[$k] = array('type' => 'textArea');
            else
                $attributes[$k] = array('type' => 'textField');
        }

        return $attributes;
    }

    /**
     * Создает виджет редактирования для поля
     * @param object $form
     * @param object $model
     * @param string $attribute
     * @param array $data
     */
    public function createWidget($form, $model, $attribute, $data)
    {
        $type = isset($data['type']) ? $data['type'] : 'textField';
        $html_options = isset($data['htmlOptions']) ? $data['htmlOptions'] : array();
        
        switch (mb_strtolower($type))
        {
            case 'textarea';
                return $form->textArea($model, $attribute, $html_options);
                break;

            case 'textfield';
                return $form->textField($model, $attribute, $html_options);
                break;
            
            case 'dropdown';
                return $form->dropDownList($model, $attribute, $data['items'], $html_options);
                break;

            case 'editor';
                Yii::app()->controller->widget('application.modules.admin.extensions.ckeditor.CKEditor', array('model' => $model, 'attribute' => $attribute));
                break;
            
            default;
                return $form->textField($model, $attribute, $html_options);
                break;
        }
    }

    /**
     * Полочение названия модели
     * @param object $model
     * @return string name of model 
     */
    public function getModelName($model)
    {
        if (method_exists($model, 'getAdminName'))
            return $model->getAdminName();

        return get_class($model);
    }


}
