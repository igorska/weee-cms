<?php

/**
 * @author Troy <troytft@gmail.com>
 */
class AdminController extends BaseAdminController
{
    public function actionIndex() {
        $this->render('index');
    }
}
