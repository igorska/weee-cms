<?php

class Page extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function tableName()
    {
        return '{{pages}}';
    }

    /**
     * Название модели в админ панеле
     */
    public function getAdminName()
    {
        return 'Страницы';
    }


    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria
                ));
    }


    public function attributeLabels()
    {
        return array(
            'title' => 'Заголовок',
            'text' => 'Текст',
        );
    }


    /**
     * Настройки для списка страниц в админ-панеле
     */
    public function adminGridSettings()
    {
        return array(
            'columns' => array(
                'title',
                'url',
            )
        );
    }


    /**
     * Настройки просмотра конкретной страницы в админ-панеле
     */
    public function adminViewSettings()
    {
        return array(
            'attributes' => array(
                'title',
                'url',
                'text:html'
            )
        );
    }

    /**
     * Настройки полей при редактировании в адми-панеле
     */
    public function adminFormAttributes()
    {
        return array(
            'title' => array('type' => 'textField', 'htmlOptions' => array('style' => 'width: 500px;')),
            'url' => array('type' => 'textField', 'htmlOptions' => array('style' => 'width: 500px;')),
            'text' => array('type' => 'editor'),
        );
    }


}