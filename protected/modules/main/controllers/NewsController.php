<?php

/**
 * @author Troy <troytft@gmail.com>
 */
class NewsController extends BaseController
{

    /**
     * Просмотр записи
     * @param integer $id 
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel('News', $id),
        ));
    }


    /**
     * Просмотр списка записей 
     */
    public function actionIndex()
    {
        $criteria = new CDbCriteria;
        $criteria->order = "id DESC";

        $count = News::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $models = News::model()->findAll($criteria);

        $this->render('index', array(
            'models' => $models,
            'pages' => $pages,
        ));
    }


    /**
     * Просмотр записей из категории
     */
    public function actionCategory($url)
    {
        $category = $this->loadModel('NewsCategory', $url, 'url');
        
        $criteria = new CDbCriteria;
        $criteria->order = "id DESC";
        $criteria->condition = "category_id = $category->id";

        $count = News::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $models = News::model()->findAll($criteria);

        $this->render('category', array(
            'category' => $category,
            'models' => $models,
            'pages' => $pages,
        ));
    }


}
