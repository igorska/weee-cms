<?php

class WebUser extends CWebUser
{

    private $_model = null;

    function getRole()
    {
        return $this->getModel()->role;
    }


    public function getModel()
    {
        if (!$this->isGuest && $this->_model === null)
            $this->_model = User::model()->findByPk($this->id);

        return $this->_model;
    }


    public function getReturnUrl($defaultUrl = null)
    {
        return $defaultUrl === null ? '/' : CHtml::normalizeUrl($defaultUrl);
    }


}