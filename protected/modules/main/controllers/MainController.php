<?php

/**
 * @author Troy <troytft@gmail.com>
 */
class MainController extends BaseController
{

    /**
     * Главная
     */
    public function actionIndex()
    {
        $this->render('index');
    }


    /**
     * Вывод ошибок 
     */
    public function actionError()
    {
        $this->layout = '//layouts/main';
        if ($error = Yii::app()->errorHandler->error)
            $this->render('error', array(
                'error' => $error
            ));
    }


}