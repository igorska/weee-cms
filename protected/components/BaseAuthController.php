<?php

/**
 * @author Troy <troytft@gmail.com>
 */
class BaseAuthController extends BaseController
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
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }


}
