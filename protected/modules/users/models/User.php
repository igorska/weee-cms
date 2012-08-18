<?php

/**
 * This is the model class for table "{{accounts}}".
 *
 * The followings are the available columns in table '{{accounts}}':
 * @property string $id
 * @property string $login
 * @property string $cdate
 * @property integer $is_game
 * @property string $email
 * @property string $password
 */
class User extends ActiveRecord
{

    public function name()
    {
        return 'Пользователи';
    }


    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Account the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{users}}';
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('login, password, email', 'required', 'on' => 'register'),
            array('email, login', 'unique', 'on' => 'register'),
            array('login, email, password', 'length', 'max' => 255),
            array('id, login, cdate, email, password, game_id', 'safe', 'on' => 'search'),
        );
    }


    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
        );
    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'login' => 'Логин',
            'cdate' => 'Cdate',
            'email' => 'Email',
            'password' => 'Пароль',
        );
    }


    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('cdate', $this->cdate, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('game_id', $this->game_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }


    public function getHref()
    {
        return "/user/{$this->login}";
    }


    public function validatePassword($password)
    {
        return $this->hashPassword($password) === $this->password;
    }


    public function hashPassword($password)
    {
        return md5(md5($password));
    }


    public function beforeSave()
    {
        parent::beforeSave();

        if ($this->isNewRecord)
        {
            $this->cdate = date('Y-m-d H:i:s');
            $this->password = $this->hashPassword($this->password);
            $this->name = ucfirst($this->login);
        }

        return true;
    }


}