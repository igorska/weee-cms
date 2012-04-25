<?php

class MainController extends BaseController
{

    public function actionCreate()
    {
        $model = new Comments;
        $model->attributes = $_POST['Comment'];
        $model->author_id = Yii::app()->user->id;

        if ($model->save())
            echo CJSON::encode(array('status' => 'success', 'html' => $this->renderPartial('view', array('model' => $model), true)));
    }


}
