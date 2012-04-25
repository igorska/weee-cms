<?php

class CommentsModule extends WebModule
{

    public static function name()
    {
        return 'Комментарии';
    }


    public static function description()
    {
        return 'Модуль комментариев';
    }


    public function init()
    {
        parent::init();

        $this->setImport(array(
            'comments.models.*',
            'users.models.*',
        ));
    }


}
