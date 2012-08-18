<?php

/**
 * Description of LoginForm
 *
 * @author troy
 */
class LoginForm extends CFormModel
{

    public $login;
    public $password;
    private $_identity;

    public function rules()
    {
        return array(
            array('login, password', 'required'),
            array('password', 'authenticate'),
        );
    }


    public function authenticate($attribute, $params)
    {
        $this->_identity = new UserIdentity($this->login, $this->password);
        if (!$this->_identity->authenticate())
            $this->addError('password', 'Неверный логин или пароль.');
    }


    public function login()
    {

        if ($this->_identity === null)
        {
            $this->_identity = new UserIdentity($this->login, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE)
        {
            $duration = 3600 * 24 * 30;
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }
        else
            return false;
    }


}
