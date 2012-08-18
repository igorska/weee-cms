<?php

/**
 * Модель для таблицы "{{news_categories}}".
 *
 * @property string $id
 * @property string $url
 * @property string $name
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 */
class NewsCategory extends ActiveRecord
{

    /**
     * Возращает экземпляр модели
     * @param string $className Название модели
     * @return NewsCategory     
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
        return '{{news_categories}}';
    }


    /**
     * @return string Название модели
     */
    public function name()
    {
        return 'Категории новостей';
    }


    /**
     * @return array Массив правил валидации для атрибутов модели
     */
    public function rules()
    {
        return array(
            array('url, name, seo_title, seo_description, seo_keywords', 'length', 'max' => 255),
            array('id, url, name, seo_title, seo_description, seo_keywords', 'safe', 'on' => 'search'),
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
            'name' => 'Название',
            'seo_title' => 'SEO Заголовок',
            'seo_description' => 'SEO Описание',
            'seo_keywords' => 'SEO Ключевые слова',
        );
    }


    /**
     * @return CActiveDataProvider 
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('name', $this->name, true);
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

        if ($this->url == '')
        {
            Yii::import('ext.Transliterator');
            $component = new Transliterator;
            $this->url = strtolower(str_replace(' ', '_', $component->transliterate($this->name)));
        }

        if ($this->seo_title == '')
            $this->seo_title = $this->name;

        if ($this->seo_description == '')
            $this->seo_description = $this->name;

        if ($this->seo_keywords == '')
            $this->seo_keywords = $this->name;
        
        return true;
    }


    public function getHref()
    {
        return "/news/{$this->url}";
    }


}