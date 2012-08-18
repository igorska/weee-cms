<?php

class ControllerCode extends CCodeModel
{

    public $controller;
    public $baseClass = 'BaseController';
    public $actions = 'index,view';
    public $basePath = 'application';

    public function rules()
    {
        return array_merge(parent::rules(), array(
                    array('controller, actions, baseClass', 'filter', 'filter' => 'trim'),
                    array('controller, baseClass', 'required'),
                    array('controller', 'match', 'pattern' => '/^\w+[\w+\\/]*$/', 'message' => '{attribute} should only contain word characters and slashes.'),
                    array('actions', 'match', 'pattern' => '/^\w+[\w\s,]*$/', 'message' => '{attribute} should only contain word characters, spaces and commas.'),
                    array('baseClass', 'match', 'pattern' => '/^[a-zA-Z_]\w*$/', 'message' => '{attribute} should only contain word characters.'),
                    array('baseClass', 'validateReservedWord', 'skipOnError' => true),
                    array('baseClass, actions', 'sticky'),
                ));
    }


    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
                    'baseClass' => 'Base Class',
                    'controller' => 'Controller ID',
                    'actions' => 'Action IDs',
                    'basePath' => 'Дериктория'
                ));
    }


    public function requiredTemplates()
    {
        return array(
            'controller.php',
            'view.php',
        );
    }


    public function successMessage()
    {
        $link = CHtml::link('try it now', Yii::app()->createUrl($this->controller), array('target' => '_blank'));
        return "The controller has been generated successfully. You may $link.";
    }


    public function prepare()
    {
        $this->files = array();
        $templatePath = $this->templatePath;

        $this->files[] = new CCodeFile(
                        $this->controllerFile,
                        $this->render($templatePath . '/controller.php')
        );
        
        $files = scandir($templatePath);
        foreach ($files as $file)
        {
            if (is_file($templatePath . '/' . $file) && CFileHelper::getExtension($file) === 'php' && $file !== 'controller.php')
            {
                $this->files[] = new CCodeFile(
                    $this->getViewFile(str_replace('.php', '', $file)),
                    $this->render($templatePath . '/' . $file)
                );
            }
        }
    }


    public function getActionIDs()
    {
        $actions = preg_split('/[\s,]+/', $this->actions, -1, PREG_SPLIT_NO_EMPTY);
        $actions = array_unique($actions);
        sort($actions);
        return $actions;
    }


    public function getControllerClass()
    {
        if (($pos = strrpos($this->controller, '/')) !== false)
            return ucfirst(substr($this->controller, $pos + 1)) . 'Controller';
        else
            return ucfirst($this->controller) . 'Controller';
    }


    public function getModule()
    {
        if (($pos = strpos($this->controller, '/')) !== false)
        {
            $id = substr($this->controller, 0, $pos);
            if (($module = Yii::app()->getModule($id)) !== null)
                return $module;
        }
        return Yii::app();
    }


    public function getControllerID()
    {
        if ($this->getModule() !== Yii::app())
            $id = substr($this->controller, strpos($this->controller, '/') + 1);
        else
            $id = $this->controller;
        if (($pos = strrpos($id, '/')) !== false)
            $id[$pos + 1] = strtolower($id[$pos + 1]);
        else
            $id[0] = strtolower($id[0]);
        return $id;
    }


    public function getUniqueControllerID()
    {
        $id = $this->controller;
        if (($pos = strrpos($id, '/')) !== false)
            $id[$pos + 1] = strtolower($id[$pos + 1]);
        else
            $id[0] = strtolower($id[0]);
        return $id;
    }


    public function getControllerFile()
    {
        $module = $this->getModule();
        $id = $this->getControllerID();
        if (($pos = strrpos($id, '/')) !== false)
            $id[$pos + 1] = strtoupper($id[$pos + 1]);
        else
            $id[0] = strtoupper($id[0]);
        return Yii::getPathOfAlias($this->basePath)  . '/controllers/' . $id . 'Controller.php';
    }


    public function getViewFile($action)
    {
        return Yii::getPathOfAlias($this->basePath) . '/views/' . $this->getControllerID() . '/' . $action . '.php';
    }


}