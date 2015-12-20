<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
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
use app\components\mainRecord;
use yii\web\IdentityInterface;

class User extends mainRecord implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const table = 'user';

    public $auth_key;
    public $warehouse;
    public $passwd = '';
    public $certfile;
    public $certpasswd;

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
            array(['lastlogin', 'theme', 'warehouse', 'passwd', 'certfile', 'company', 'home'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'username', 'fname', 'lname', 'password', 'lastlogin', 'cookie', 'hash', 'certpasswd', 'salt', 'email', 'language'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'docs' => array(self::HAS_MANY, 'Docs', 'owner'),
            'UserIncomeMap' => array(self::HAS_MANY, 'UserIncomeMap', 'user_id'),
        );
    }

    public function getUserIncomeMaps() {
        return $this->hasMany(UserIncomeMap::className(), array('user_id' => 'id'));
    }

    public function saveWidget($widget) {



        $model = Settings::findOne("company." . $this->id . ".widget");
        if ($model === null) {
            $model = new Settings();
            $model->id = "company." . $this->id . ".widget";
            $model->eavType = 'integer';
            $model->hidden = 1;
            $model->value = \yii\helpers\Json::encode(array());
        }//
        //$model->value = !$model->value;


        $key = $this->getWidgets();
        if (isset($key[$widget])) {
            $key[$widget] = !$key[$widget];
        } else {
            $key[$widget] = false;
        }

        $model->value = \yii\helpers\Json::encode($key);
        $model->save();
        //out:Yii::$app->user->setState('widget', $this->getWidgets());
    }

    public function getWidgets() {
        if (Yii::$app->db->schema->getTableSchema('{{%config}}') !== null) {
            return \yii\helpers\Json::decode(\app\helpers\Linet3Helper::getSetting("company." . $this->id . ".widget"));
        }
        return array();
    }

    public static function getWarehouse($id=null) {
        $warehouse=0;
        if($id===null)
            $id=$this->id;
        if (Yii::$app->db->schema->getTableSchema('{{%config}}') !== null) {

                $warehouse = \app\helpers\Linet3Helper::getSetting("company." . $id . ".warehouse");

        }
        return $warehouse;
    }

    public function getCertPasswd() {
        if (Yii::$app->db->schema->getTableSchema('{{%config}}') !== null) {
            $this->certpasswd = \app\helpers\Linet3Helper::getSetting("company." . $this->id . ".certpasswd");
            
        }
        return $this->certpasswd;
    }

    public function saveAttr() {
        
    }

    public function save($runValidation = true, $attributes = NULL) {
        //$this->id=0;
        if ($this->salt == '')
            $this->salt = $this->generateSalt();
        if ($this->passwd != '')
            $this->password = $this->hashPassword($this->passwd, $this->salt);

        $res = parent::save($runValidation, $attributes);
        if ((Yii::$app->db->schema->getTableSchema('{{%config}}') !== null) && ($res)) {
            $this->compSave();
            //echo $this->warehouse;
            //exit;
            if (isset($this->warehouse))
                $this->warehouseSave($this->warehouse);
            if (isset($this->certpasswd))
                $this->certpasswdSave($this->certpasswd);
        }
        return $res;
    }

    public function afterFind() {

        $this->certpasswd = $this->getCertPasswd();
        return parent::afterFind();
    }

    private function certpasswdSave($passwd) {
        $model = Settings::findOne("company." . $this->id . ".certpasswd");
        if ($model === null) {
            $model = new Settings();
            $model->id = "company." . $this->id . ".certpasswd";
            $model->eavType = 'integer';
            $model->hidden = 1;
        }
        $model->value = $passwd;
        $this->certpasswd = $model->value;

        $model->save();
    }

    private function warehouseSave($id) {
        $model = Settings::findOne("company." . $this->id . ".warehouse");
        if ($model === null) {
            $model = new Settings();
            $model->id = "company." . $this->id . ".warehouse";
            $model->eavType = 'integer';
            $model->hidden = 1;
        }
        $model->value = $id;
        $this->warehouse = $model->value;

        $model->save();
    }

    private function compSave() {
        $catagories = ItemVatCat::find()->All();

        foreach ($catagories as $catagory) {
            if (!UserIncomeMap::findOne(array('user_id' => $this->id, 'itemVatCat_id' => $catagory->id))) {//'user_id', 'itemVatCat_id'
                $model = new UserIncomeMap;
                $attr = array("user_id" => $this->id, "itemVatCat_id" => $catagory->id, "account_id" => 100);
                $model->attributes = $attr;
                if (!$model->save()){
                    Yii::error('fatel error unable to save cat');
                    return false;
                }
            }
        }


        Yii::info('user save catagory');

        $tmps = \yii\web\UploadedFile::getInstanceByName('User[certfile]');
        if ($tmps) {
            Yii::info('cert file loaded');

            if ($tmps->saveAs($this->getCertFilePath($this->id))) {
                // add it to the main model now
            } else {
                echo 'Cannot upload!';
            }
            //}
        }
    }

    function hasCert() {
        $configPath = \app\helpers\Linet3Helper::getSetting("company.path");
        return file_exists($this->getCertFilePath());
    }

    static public function getCertFilePath($id = null) {
        if ($id == null)
            $id = \app\helpers\Linet3Helper::getUserId();
        $user = User::findOne($id);
        if ($user !== null)
            return Company::getFilePath() . "cert/" . $id . ".p12";
    }
/*
    public function delete() {
        /*
          $users=User::find()->All();

          foreach ($users as $user){
          $IncomeMap=UserIncomeMap::findOne(array('user_id'=>$user->id, 'itemVatCat_id'=>$this->id));
          if($IncomeMap){//'user_id', 'itemVatCat_id'
          $IncomeMap->delete();
          }

          } */
        //no user delete only disable
        //parent::delete();
  //  }

    /**
     * @return array customized attribute labels (name=>label)
     */
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
            'warehouse' => Yii::t('app', 'Warehouse'),
            'timezone' => Yii::t('app', 'Timezone'),
            'theme' => Yii::t('app', 'Theme'),
            'passwd' => Yii::t('app', 'Set Password'),
            'ItemVatCat' => Yii::t('app', 'Item VAT Catagory'),
            'account_id' => Yii::t('app', 'Account id'),
            'certfile' => Yii::t('app', 'Certificate file'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('fname', $this->fname, true);
        $criteria->compare('lname', $this->lname, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('lastlogin', $this->lastlogin, true);
        $criteria->compare('cookie', $this->cookie, true);
        $criteria->compare('hash', $this->hash, true);
        $criteria->compare('certpasswd', $this->certpasswd, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('email', $this->email, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
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

    public function loadUser() {
        //$this->save();
        //after select company

        /*
          Yii::$app->user->setState('User', $this);
          //Yii::$app->user->setState('certpasswd', $this->getCertPasswd());
          Yii::$app->user->setState('language', $this->language);
          Yii::$app->user->setState('timezone', $this->timezone);
          //Yii::$app->user->setState('theme', $this->theme);
          Yii::$app->user->setState('fname', $this->fname);
          Yii::$app->user->setState('lname', $this->lname);
          Yii::$app->user->setState('username', $this->username);
          Yii::$app->user->setState('warehouse', $this->getWarehouse());
          Yii::$app->user->setState('widget', $this->getWidgets());
         * 
         * 
         */
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username]); //, 'status' => self::STATUS_ACTIVE
    }

    public static function findByPk($id) {
        return static::findOne(['id' => $id]); //, 'status' => self::STATUS_ACTIVE
    }

}
