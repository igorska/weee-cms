<?php

class NewComment extends CWidget
{

    public $model;

    public function run()
    {
        $this->render('form', array(
            'model_name' => get_class($this->model),
            'model_id' => $this->model->id,
        ));
    }


}