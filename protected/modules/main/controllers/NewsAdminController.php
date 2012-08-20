<?php

class NewsAdminController extends BaseAdminController
{

    public function actions()
    {
        return array(
            'sortable' => array(
                'class' => 'ext.sortable.SortableAction',
                'column' => 'sort',
                'model' => News::model(),
            )
        );
    }


    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }


    public function actionCreate()
    {
        Yii::import('application.modules.main.models.News');
        $model = new News;

        if (isset($_POST['News']))
        {
            $model->attributes = $_POST['News'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }


    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['News']))
        {
            $model->attributes = $_POST['News'];
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

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }


    public function actionIndex()
    {
        Yii::import('application.modules.main.models.News');
        $model = new News('search');
        $model->unsetAttributes();
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }


    public function loadModel($id)
    {
        Yii::import('application.modules.main.models.News');
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Запись не найдена');

        return $model;
    }


}