<?php

/**
 * @author Troy <troytft@gmail.com> 
 */
class MainModule extends CWebModule
{

    public function init()
    {
        parent::init();
        Yii::import('m.main.models.*');
    }


}
