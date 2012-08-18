<?php

/**
 * @author Troy <troytft@gmail.com> 
 */
class Menu extends CWidget
{

    public function run()
    {
        if (Yii::app()->user->isGuest)
            $this->render('guest');

        else
            $this->render('user', array(
                'model' => Yii::app()->user->model,
            ));
    }


}
