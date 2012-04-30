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


    public function adminGridSettings()
    {
        return array(
            'columns' => array(
                'title',
                'url',
            )
        );
    }


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


    public function adminFormAttributes()
    {
        return array(
            'title' => array('type' => 'textField', 'htmlOptions' => array('style' => 'width: 500px;')),
            'url' => array('type' => 'textField', 'htmlOptions' => array('style' => 'width: 500px;')),
            'text' => array('type' => 'editor'),
        );
    }


}