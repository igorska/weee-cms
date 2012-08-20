<?php

/**
 * Модель для таблицы "{{news}}".
 *
 * @property string $id
 * @property string $cdate
 * @property integer $author_id
 * @property integer $category_id
 * @property string $url
 * @property string $title
 * @property string $short_text
 * @property string $text
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 */
class News extends ActiveRecord
{

    /**
     * Возращает экземпляр модели
     * @param string $className Название модели
     * @return News
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
        return '{{news}}';
    }


    public function behaviors()
    {
        return array_merge(parent::behaviors(), array(
                    'sortable' => array(
                        'class' => 'ext.sortable.SortableBehavior',
                        'column' => 'sort',
                    )
                ));
    }


    /**
     * @return string Название модели
     */
    public function name()
    {
        return 'Новости';
    }


    /**
     * @return array Массив правил валидации для атрибутов модели
     */
    public function rules()
    {
        return array(
            array('author_id, category_id', 'numerical', 'integerOnly' => true),
            array('url, title, seo_title, seo_description, seo_keywords', 'length', 'max' => 255),
            array('cdate, short_text, text', 'safe'),
            array('title, text', 'required'),
            array('id, cdate, author_id, category_id, url, title, short_text, text, seo_title, seo_description, seo_keywords', 'safe', 'on' => 'search'),
        );
    }


    /**
     * @return array Связи
     */
    public function relations()
    {
        return array(
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
            'category' => array(self::BELONGS_TO, 'NewsCategory', 'category_id'),
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
            'category_id' => 'Категория',
            'url' => 'Url',
            'title' => 'Заголовок',
            'short_text' => 'Краткий анонс',
            'text' => 'Текст',
            'seo_title' => 'SEO Заголовок',
            'seo_description' => 'SEO Описание',
            'seo_keywords' => 'SEO Ключевые слова',
            'category.name' => 'Категория',
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
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('short_text', $this->short_text, true);
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
            $this->url = strtolower(str_replace(' ', '_', $component->transliterate($this->title)));
        }

        if ($this->short_text == '')
            $this->short_text = $this->text;

        if ($this->seo_title == '')
            $this->seo_title = $this->title;

        if ($this->seo_description == '')
            $this->seo_description = $this->title;

        if ($this->seo_keywords == '')
            $this->seo_keywords = $this->title;

        return true;
    }


    /**
     * Ссылка на запись
     * @return string
     */
    public function getHref()
    {
        return "/news/{$this->id}-{$this->url}.html";
    }


}