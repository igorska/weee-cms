<?php

class BaseAdminController extends BaseController
{

    public $layout = '//admin_layouts/main';

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
                'roles' => array('administrator', 'root'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }


}