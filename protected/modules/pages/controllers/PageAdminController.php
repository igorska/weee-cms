<?php

class PageAdminController extends BaseAdminController
{

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        Yii::import('m.pages.models.Page');
        $model = new Page;

        if (isset($_POST['Page']))
        {
            $model->attributes = $_POST['Page'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['Page']))
        {
            $model->attributes = $_POST['Page'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest)
        {
            $this->loadModel($id)->delete();

            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex()
    {
        Yii::import('m.pages.models.Page');
        $model = new Page('search');
        $model->unsetAttributes();
        if (isset($_GET['Page']))
            $model->attributes = $_GET['Page'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id)
    {
        Yii::import('m.pages.models.Page');
        $model = Page::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Запись не найдена');

        return $model;
    }

}