<?php

class BaseController extends CController
{

    public $pageDescription;
    public $pageKeywords;
    public $layout = '//layouts/main';
    public $crumbs = array();

    protected function pageNotFound()
    {
        throw new CHttpException(404, 'Страница не найдена!');
    }


    protected function forbidden()
    {
        throw new CHttpException(403, 'Запрещено!');
    }


    public function loadModel($model_name, $value, $attribute = 'id')
    {
        $model = ActiveRecord::model($model_name)->findByAttributes(array($attribute => $value));

        if ($model == null)
            $this->pageNotFound();

        return $model;
    }


}