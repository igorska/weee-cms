<?php

/**
 * Модель для таблицы "{{pages}}".
 *
 * @property string $id
 * @property string $cdate
 * @property integer $author_id
 * @property string $url
 * @property string $title
 * @property string $text
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 */
class Page extends ActiveRecord
{

    /**
     * Возращает экземпляр модели
     * @param string $className Название модели
     * @return Page     
     */
    public static function model($className = __CLASS__)
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
        return 'Статические страницы';
    }


    /**
     * @return array Массив правил валидации для атрибутов модели
     */
    public function rules()
    {
        return array(
            array('title, text', 'required'),
            array('author_id', 'numerical', 'integerOnly' => true),
            array('url, title, seo_title, seo_description, seo_keywords', 'length', 'max' => 255),
            array('text, cdate', 'safe'),
            array('id, cdate, author_id, url, title, text, seo_title, seo_description, seo_keywords', 'safe', 'on' => 'search'),
        );
    }


    /**
     * @return array Связи
     */
    public function relations()
    {
        return array(
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
        );
    }


    /**
     * @return array Лейблы
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'cdate' => 'Дата создания',
            'author_id' => 'Автор',
            'url' => 'Url',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'seo_title' => 'SEO Заголовок',
            'seo_description' => 'SEO Описание',
            'seo_keywords' => 'SEO Ключевые слова',
            'author.name' => 'Автор',
        );
    }


    /**
     * @return CActiveDataProvider 
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('cdate', $this->cdate, true);
        $criteria->compare('author_id', $this->author_id);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('seo_title', $this->seo_title, true);
        $criteria->compare('seo_description', $this->seo_description, true);
        $criteria->compare('seo_keywords', $this->seo_keywords, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }


    public function beforeSave()
    {
        parent::beforeSave();

        if ($this->isNewRecord)
        {
            $this->cdate = date('Y-m-d H:i:s');
            $this->author_id = Yii::app()->user->id;
        }

        if ($this->url == '')
        {
            Yii::import('ext.Transliterator');
            $component = new Transliterator;
            $this->url = strtolower(str_replace(' ', '_', $component->transliterate(preg_replace("#^[^a-z0-9а-яё]$#i", "", $this->title))));
        }

        if ($this->seo_title == '')
            $this->seo_title = $this->title;

        if ($this->seo_description == '')
            $this->seo_description = $this->title;

        if ($this->seo_keywords == '')
            $this->seo_keywords = $this->title;

        return true;
    }


    public function getHref()
    {
        return "/page/{$this->url}";
    }


}