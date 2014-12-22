<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class UserIdentity extends CUserIdentity {

    private $_id;

    public function __construct($username='', $password='') {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->id;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
            Yii::app()->user->setState('Company', 0); //must
            
            $auth=Yii::app()->authManager;
            $auth->assign('Authenticated',$user->id);
            $auth->save();
            
            $user->loadUser();
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    public function apiAuthenticate($id, $hash) {
        $user = User::model()->findByPk($id);
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID.";";
        else if (!$user->validateHash($hash))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->id;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
            Yii::app()->user->setState('Company', 0); //must
            $user->loadUser();
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

}
