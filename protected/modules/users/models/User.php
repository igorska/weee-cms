<?php

class User extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function tableName()
    {
        return '{{users}}';
    }


    public function validatePassword($password)
    {
        return $this->hashPassword($password) === $this->password;
    }


    public function hashPassword($password)
    {
        return md5(md5($password));
    }

    public function getUsername() {
        return "#user_{$this->id}";
    }

}