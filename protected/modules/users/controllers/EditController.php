<?php

/**
 * @author Troy <troytft@gmail.com>
 */
class EditController extends BaseAuthController
{

    public function actionUploadAvatar($account_id)
    {
        $account = $this->loadModel('Account', $account_id);

        if (!empty($_FILES))
        {
            $ih = new CImageHandler();
            $ih->load($_FILES['Account']['tmp_name']['avatar']);
            $ih->adaptiveThumb(50, 50);
            $ih->save(Yii::getPathOfAlias('www') . '/uploads/accounts_avatars/account_' . $account->id . '.png', CImageHandler::IMG_PNG);

            $account->avatar = '/uploads/accounts_avatars/account_' . $account->id . '.png';
            $account->save();

            Yii::app()->user->setFlash('success', 'Аватар успешно загружен');

            $this->refresh();
        }

        $this->render('upload_avatar', array(
            'model' => $account,
        ));
    }


    /**
     * Редактирование профиля пользователя 
     */
    public function actionProfile()
    {
        $model = User::model()->findByPk(Yii::app()->user->id);

        if (isset($_POST[get_class($model)]))
        {
            $model->attributes = $_POST[get_class($model)];

            if ($model->save())
            {
                Yii::app()->user->setFlash('success', 'Профиль успешно сохранен');
                $this->refresh();
            }
        }
    }


}
