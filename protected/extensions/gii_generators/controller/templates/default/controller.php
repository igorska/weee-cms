<?php
/**
 * This is the template for generating a controller class file.
 * The following variables are available in this template:
 * - $this: the ControllerCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{

    /**
     * Просмотр записи
     * @param integer $id 
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel('<?php echo str_replace('Controller', '', $this->controllerClass); ?>', $id),
        ));
    }
    

    /**
     * Просмотр списка записей 
     */
    public function actionIndex()
    {
        $criteria = new CDbCriteria;
        $criteria->order = "id DESC";

        $count = <?php echo str_replace('Controller', '', $this->controllerClass); ?>::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $models = <?php echo str_replace('Controller', '', $this->controllerClass); ?>::model()->findAll($criteria);

        $this->render('index', array(
            'models' => $models,
            'pages' => $pages,
        ));
    }
    
    
}