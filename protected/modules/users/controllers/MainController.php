<?php

/**
 * @author Troy <troytft@gmail.com>
 */
class MainController extends BaseController
{

    public $layout = '//layouts/main';

    /**
     * Авторизация 
     */
    public function actionLogin()
    {
        if (!Yii::app()->user->isGuest)
            $this->redirect('/');

        Yii::import('m.users.models.LoginForm');
        $model = new LoginForm;

        if (isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }

        $this->render('login', array(
            'model' => $model,
        ));
    }


    /**
     * Выход 
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }


    /**
     * Просмотр профиля пользователя
     * @param string $login Login пользователя
     * @throws CHttpException 
     */
    public function actionView($login)
    {
        $model = $this->loadModel('User', $login, 'login');

        Yii::import('m.posts.models.Tag');

        $this->render('view', array(
            'model' => $model,
            'subscribes' => Tag::model()->findAll("id IN(SELECT tag_id FROM {{subscribes}} WHERE user_id = {$model->id})"),
        ));
    }


    public function actionRegister()
    {
        if (!Yii::app()->user->isGuest)
            $this->redirect('/');

        $model = new User('register');

        if (isset($_POST[get_class($model)]))
        {
            $model->attributes = $_POST[get_class($model)];
            if ($model->save())
            {
                Yii::import('m.users.models.LoginForm');
                $loginForml = new LoginForm;
                $loginForml->login = $_POST[get_class($model)]['login'];
                $loginForml->password = $_POST[get_class($model)]['password'];
                $loginForml->login();

                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->render('register', array(
            'model' => $model,
        ));
    }


}
