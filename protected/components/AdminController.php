<?php

class AdminController extends BaseController
{

    public function filters()
    {
        return array(
            'accessControl',
        );
    }


    public function accessRules()
    {
        return array(
            array('allow',
                'roles' => array('root'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }


}