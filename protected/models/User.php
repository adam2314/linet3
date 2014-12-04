<?php

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
class User extends mainRecord {

    const table = 'user';

    public $warehouse;
    public $passwd;
    public $certfile;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, lname, email, timezone', 'required'),
            array('username', 'length', 'max' => 100),
            array('fname, lname, certpasswd, salt, email', 'length', 'max' => 255),
            array('language', 'length', 'max' => 10),
            array('password', 'length', 'max' => 255),
            array('passwd', 'required', 'on' => 'create'),
            array('cookie, hash', 'length', 'max' => 32),
            array('certpasswd, salt, email', 'length', 'max' => 255),
            array('lastlogin, theme, warehouse, passwd, certfile', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, fname, lname, password, lastlogin, cookie, hash, certpasswd, salt, email, language', 'safe', 'on' => 'search'),
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
            'userIncomeMaps' => array(self::HAS_MANY, 'UserIncomeMap', 'user_id'),
        );
    }

    public function saveWidget($widget) {



        $model = Settings::model()->findByPk("company." . $this->id . ".widget");
        if ($model === null) {
            $model = new Settings();
            $model->id = "company." . $this->id . ".widget";
            $model->eavType = 'integer';
            $model->hidden = 1;
            $model->value = CJSON::encode(array());
        }//
        //$model->value = !$model->value;


        $key = $this->getWidgets();
        if (isset($key[$widget])) {
            $key[$widget] = !$key[$widget];
        } else {
            $key[$widget] = false;
        }

        $model->value = CJSON::encode($key);
        $model->save();
        Yii::app()->user->setState('widget', $this->getWidgets());
    }

    private function getWidgets() {
        if (Yii::app()->user->Company != 0) {
            $a = Settings::model()->findByPk("company." . $this->id . ".widget");

            if ($a !== null) {
                return CJSON::decode($a->value);
            }
        }
        return array();
    }

    private function getWarehouse() {
        if (Yii::app()->user->Company != 0) {
            $a = Settings::model()->findByPk("company." . $this->id . ".warehouse");
            if ($a !== null) {
                $this->warehouse = $a->value;
            }
        }
        return $this->warehouse;
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
        if ((Yii::app()->user->Company != 0) && ($res)) {
            $this->compSave();
            //echo $this->warehouse;
            //exit;
            if(isset($this->warehouse))
                $this->warehouseSave($this->warehouse);
        }
        return $res;
    }

    private function warehouseSave($id) {
        $model = Settings::model()->findByPk("company." . $this->id . ".warehouse");
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
        $catagories = ItemVatCat::model()->findAll();

        foreach ($catagories as $catagory) {
            if (!UserIncomeMap::model()->findByPk(array('user_id' => $this->id, 'itemVatCat_id' => $catagory->id))) {//'user_id', 'itemVatCat_id'
                $model = new UserIncomeMap;
                $attr = array("user_id" => $this->id, "itemVatCat_id" => $catagory->id, "account_id" => 100);
                $model->attributes = $attr;
                if (!$model->save())
                    return false;
            }
        }


        Yii::log('user save catagory', 'info', 'app');

        $tmps = CUploadedFile::getInstanceByName('User[certfile]');
        if ($tmps) {
            Yii::log('saved', 'info', 'app');

            if ($tmps->saveAs($this->getCertFilePath($this->id))) {
                // add it to the main model now
            } else {
                echo 'Cannot upload!';
            }
            //}
        }
    }

    function hasCert() {
        $configPath = Yii::app()->user->settings["company.path"];
        return file_exists($this->getCertFilePath());
    }

    static public function getCertFilePath($id=null) {
        if($id==null)
            $id=Yii::app()->user->id;
        $user=User::model()->findByPk($id);
        if($user!==null)
            return Company::getFilePath() . "cert/" . $id . ".p12";
    }

    //public function delete() {
    /*
      $users=User::model()->findAll();

      foreach ($users as $user){
      $IncomeMap=UserIncomeMap::model()->findByPk(array('user_id'=>$user->id, 'itemVatCat_id'=>$this->id));
      if($IncomeMap){//'user_id', 'itemVatCat_id'
      $IncomeMap->delete();
      }

      } */
    //no user delete only disable
    //parent::delete();
    //}

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('labels', 'ID'),
            'username' => Yii::t('labels', 'User Name'),
            'fname' => Yii::t('labels', 'First Name'),
            'lname' => Yii::t('labels', 'Last Name'),
            'password' => Yii::t('labels', 'Password'),
            'lastlogin' => Yii::t('labels', 'Last Login'),
            'cookie' => Yii::t('labels', 'Cookie'),
            'hash' => Yii::t('labels', 'Hash'),
            'certpasswd' => Yii::t('labels', 'Certifcate Password'),
            'salt' => Yii::t('labels', 'Salt'),
            'email' => Yii::t('labels', 'Email'),
            'language' => Yii::t('labels', 'Language'),
            'warehouse' => Yii::t('labels', 'Warehouse'),
            'timezone' => Yii::t('labels', 'Timezone'),
            'theme' => Yii::t('labels', 'Theme'),
            'passwd' => Yii::t('labels', 'Set Password'),
            'ItemVatCat' => Yii::t('labels', 'Item VAT Catagory'),
            'account_id' => Yii::t('labels', 'Account id'),
            'certfile' => Yii::t('labels', 'Certificate file'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
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
        return $this->hashPassword($password, $this->salt) === $this->password;
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


        Yii::app()->user->setState('certpasswd', $this->certpasswd);
        Yii::app()->user->setState('language', $this->language);
        Yii::app()->user->setState('timezone', $this->timezone);
        Yii::app()->user->setState('theme', $this->theme);
        Yii::app()->user->setState('fname', $this->fname);
        Yii::app()->user->setState('lname', $this->lname);
        Yii::app()->user->setState('username', $this->username);
        Yii::app()->user->setState('warehouse', $this->getWarehouse());
        Yii::app()->user->setState('widget', $this->getWidgets());
    }

}
