<?php

class CommentsList extends CWidget
{

    public $model;

    public function run()
    {
        Yii::import('comments.models.*');
        
        $model_name = get_class($this->model);
        $model_id = $this->model->id;
        
        $comments = Comments::model()->findAllByAttributes(array('model_name' => $model_name, 'model_id' => $model_id));
        
        $this->render('comments', array(
            'comments' => $comments,
            'model_name' => $model_name,
            'model_id' => $model_id,
        ));
    }


}