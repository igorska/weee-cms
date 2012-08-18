<?php

/**
 * Модель для таблицы "{{pages}}".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $text
 */
class Page extends ActiveRecord
{
    /**
     * Возращает экземпляр модели
     * @param string $className Название модели
     * @return Page     
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string Название таблицы
     */
    public function tableName()
    {
        return '{{pages}}';
    }
    
    /**
     * @return string Название модели
     */
    public function name() 
    {
        return 'Pages';
    }

    /**
     * @return array Массив правил валидации для атрибутов модели
     */
    public function rules()
    {
        return array(
            array('url, title, text', 'required'),
            array('url, title', 'length', 'max' => 255),
            array('id, url, title, text', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array Связи
     */
    public function relations()
    {
        return array(
        );
    }

    /**
     * @return array Лейблы
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'url' => 'Url',
            'title' => 'Заголовок',
            'text' => 'Текст',
        );
    }

    /**
     * @return CActiveDataProvider 
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('text', $this->text, true);
    
        return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
        ));
    }
}