<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

namespace app\models;

use Yii;
use yii\base\Model;
use app\components\UserIdentity;
class FormLogin extends Model {

    public $username;
    public $password;
    public $id;//api
    public $hash;//api
    //public $rememberMe;
    private $_identity;//api
    public $rememberMe = true;

    private $_user = false;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required','on' =>'login'],
            [['username'],'safe'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            
            [['id','hash'], 'required','on' =>'api'],
            ['hash', 'validateHash'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
    
    
    public function validateHash($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUserID();

            if (!$user || !$user->validateHash($this->hash)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'rememberMe' => Yii::t('app', 'Remember me next time'),
            'password' => Yii::t('app', 'Password'),
            'username' => Yii::t('app', 'Username'),
        );
    }

  
    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        $this->scenario='login';
        if ($this->validate()) {
            //update user login date:
            $user = $this->getUser();
            $user->lastlogin=$user->writeDateTime(time());
            $user->save();       
            
            $auth=Yii::$app->authManager;
            $authenticatedRole = $auth->getRole('authenticated');
            if(!$auth->getAssignment('authenticated',$this->_user->id))
                $auth->assign($authenticatedRole, $this->_user->id);
            
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }

    public function apiLogin() {
        $this->scenario='api';
         if ($this->validate()) {
            return Yii::$app->user->login($this->getUserID(), $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }
    
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

        public function getUserID()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne($this->id);
        }

        return $this->_user;
    }
}
