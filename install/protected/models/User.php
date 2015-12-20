<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $fname
 * @property string $lname
 * @property string $password
 * @property string $lastlogin
 * @property string $cookie
 * @property string $hash
 * @property string $certpasswd
 * @property string $salt
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Docs[] $docs
 * @property UserIncomeMap[] $userIncomeMaps
 */

namespace app\models;

use Yii;
//use app\components\mainRecord;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
class User extends ActiveRecord implements IdentityInterface {

    //const STATUS_DELETED = 0;
    //const STATUS_ACTIVE = 10;
    const table = 'user';

    public $auth_key;
    //public $warehouse;
    public $passwd = '';
    //public $certfile;
    //public $certpasswd;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    //public static function model($className = __CLASS__) {
    //    return parent::model($className);
    // }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id]); //, 'status' => self::STATUS_ACTIVE
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['username', 'lname', 'email', 'timezone'], 'required'),
            array(['username'], 'string', 'max' => 100),
            array(['fname', 'lname', 'certpasswd', 'salt', 'email'], 'string', 'max' => 255),
            array(['language'], 'string', 'max' => 10),
            array(['password'], 'string', 'max' => 255),
            array(['passwd'], 'required', 'on' => 'create'),
            array(['cookie', 'hash'], 'string', 'max' => 32),
            array(['certpasswd', 'salt', 'email'], 'string', 'max' => 255),
            array(['lastlogin', 'theme', 'passwd','company', 'home'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'username', 'fname', 'lname', 'password', 'lastlogin', 'cookie', 'hash', 'certpasswd', 'salt', 'email', 'language'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    


    public function save($runValidation = true, $attributes = NULL) {
        //$this->id=0;
        if ($this->salt == '')
            $this->salt = $this->generateSalt();
        if ($this->passwd != '')
            $this->password = $this->hashPassword($this->passwd, $this->salt);


        return parent::save($runValidation, $attributes);
    }


    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'User Name'),
            'fname' => Yii::t('app', 'First Name'),
            'lname' => Yii::t('app', 'Last Name'),
            'password' => Yii::t('app', 'Password'),
            'lastlogin' => Yii::t('app', 'Last Login'),
            'cookie' => Yii::t('app', 'Cookie'),
            'hash' => Yii::t('app', 'Hash'),
            'certpasswd' => Yii::t('app', 'Certifcate Password'),
            'salt' => Yii::t('app', 'Salt'),
            'email' => Yii::t('app', 'Email'),
            'language' => Yii::t('app', 'Language'),
            
            'timezone' => Yii::t('app', 'Timezone'),
            'theme' => Yii::t('app', 'Theme'),
            'passwd' => Yii::t('app', 'Set Password'),
            'ItemVatCat' => Yii::t('app', 'Item VAT Catagory'),
            'account_id' => Yii::t('app', 'Account id'),
            
        );
    }

    
    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password) {
        //return true;
        //$this->setPassword($password);
        //return Yii::$app->security->validatePassword($password, $this->password);
        return $this->hashPassword($password, $this->salt) === $this->password;
    }

    public function setPassword($password) {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function validateHash($hash) {
        return $hash === $this->hash;
    }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    public static function hashPassword($password, $salt) {
        return md5($salt . $password);
    }

    /**
     * Generates a salt that can be used to generate a password hash.
     * @return string the salt
     */
    public static function generateSalt() {
        return uniqid('', true);
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username]); //, 'status' => self::STATUS_ACTIVE
    }

    public static function findByPk($id) {
        return static::findOne(['id' => $id]); //, 'status' => self::STATUS_ACTIVE
    }

}
