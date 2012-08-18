<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass."\n"; ?>
{

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        Yii::import('<?php echo $this->crudPath; ?>.models.<?php echo $this->modelClass; ?>');
        $model = new <?php echo $this->modelClass; ?>;

        if (isset($_POST['<?php echo $this->modelClass; ?>']))
        {
            $model->attributes = $_POST['<?php echo $this->modelClass; ?>'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['<?php echo $this->modelClass; ?>']))
        {
            $model->attributes = $_POST['<?php echo $this->modelClass; ?>'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest)
        {
            $this->loadModel($id)->delete();

            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex()
    {
        Yii::import('<?php echo $this->crudPath; ?>.models.<?php echo $this->modelClass; ?>');
        $model = new <?php echo $this->modelClass; ?>('search');
        $model->unsetAttributes();
        if (isset($_GET['<?php echo $this->modelClass; ?>']))
            $model->attributes = $_GET['<?php echo $this->modelClass; ?>'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id)
    {
        Yii::import('<?php echo $this->crudPath; ?>.models.<?php echo $this->modelClass; ?>');
        $model = <?php echo $this->modelClass; ?>::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Запись не найдена');

        return $model;
    }

}