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
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, lname, certpasswd, salt, email', 'required'),
			array('username', 'length', 'max'=>100),
			array('fname, lname, certpasswd, salt, email', 'length', 'max'=>255),
                        array('language', 'length', 'max'=>10),
			array('password', 'length', 'max'=>41),
			array('cookie, hash', 'length', 'max'=>32),
			array('certpasswd, salt, email', 'length', 'max'=>255),
			array('lastlogin', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, fname, lname, password, lastlogin, cookie, hash, certpasswd, salt, email, language', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'docs' => array(self::HAS_MANY, 'Docs', 'owner'),
			'userIncomeMaps' => array(self::HAS_MANY, 'UserIncomeMap', 'user_id'),
		);
	}

        public function save($runValidation = true, $attributes = NULL) {
            $catagories=ItemVatCat::model()->findAll();
            parent::save($runValidation,$attributes);
            foreach ($catagories as $catagory){
                if(!UserIncomeMap::model()->findByPk(array('user_id'=>$this->id, 'itemVatCat_id'=>$catagory->id))){//'user_id', 'itemVatCat_id'
                    $model=new UserIncomeMap;
                    $attr=array("user_id"=>$this->id,"itemVatCat_id"=>$catagory->id,"account_id"=>100);
                    $model->attributes=$attr;
                    if(!$model->save())
                        return false;
                }
                
            }
        }
        
        public function delete() {
            /*
            $users=User::model()->findAll();
            
            foreach ($users as $user){
                $IncomeMap=UserIncomeMap::model()->findByPk(array('user_id'=>$user->id, 'itemVatCat_id'=>$this->id));
                if($IncomeMap){//'user_id', 'itemVatCat_id'
                   $IncomeMap->delete();
                }
                
            }*/
            //no user delete only disable
            //parent::delete();
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'=>Yii::t('labels','ID'),
                        'username'=>Yii::t('labels','User Name'),
                        'fname'=>Yii::t('labels','First Name'),
                        'lname'=>Yii::t('labels','Last Name'),
                        'password'=>Yii::t('labels','Password'),
                        'lastlogin'=>Yii::t('labels','Last Login'),
                        'cookie'=>Yii::t('labels','Cookie'),
                        'hash'=>Yii::t('labels','Hash'),
                        'certpasswd'=>Yii::t('labels','Certifcate Password'),
                        'salt'=>Yii::t('labels','Salt'),
                        'email'=>Yii::t('labels','Email'),
                        'language'=>Yii::t('labels','Language'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('lastlogin',$this->lastlogin,true);
		$criteria->compare('cookie',$this->cookie,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('certpasswd',$this->certpasswd,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	protected function generateSalt()
	{
		return uniqid('',true);
	}
}