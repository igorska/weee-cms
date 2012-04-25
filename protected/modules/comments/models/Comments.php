<?php

class Comments extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function tableName()
    {
        return '{{comments}}';
    }
    
    public function rules()
    {
        return array(
            array('model_name, model_id, text, author_id', 'required'),
            array('model_name, model_id, text, author_id', 'safe'),
        );
    }

    public function beforeSave() {
        parent::beforeSave();
        
        if ($this->isNewRecord)
            $this->date = date('Y-m-d H:i:s');
        
        return true;
    }
    public function relations()
    {
        return array(
            'author_model' => array(self::BELONGS_TO, 'User', 'author_id'),
        );
    }
}
