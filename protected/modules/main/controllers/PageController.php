<?php

/**
 * @author Troy <troytft@gmail.com>
 */
class PageController extends BaseController
{

    /**
     * View page
     * @param string $url Url
     */
    public function actionView($url)
    {
        $this->render('view', array(
            'model' => $this->loadModel('Page', $url, 'url'),
        ));
    }


    /**
     * Index page
     */
    public function actionIndex()
    {
        $this->render('index');
    }


}
