<?php
/**
 * @author Troy <troytft@gmail.com>
 */

namespace weee\modules\main;

class MainModule extends \WebModule
{

    public function init()
    {
        parent::init();
        \Yii::import('m.main.models.*');
    }


}
