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
use app\components\fileRecord;
use app\models\AccCat;
use yii\data\ActiveDataProvider;
/**
 * This is the model class for table "{{%CA15_accounts}}".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $id6111
 * @property integer $cat_id
 * @property integer $pay_terms
 * @property string $src_tax
 * @property string $src_date
 * @property integer $parent_account_id
 * @property string $name
 * @property string $contact
 * @property string $department
 * @property string $vatnum
 * @property string $email
 * @property string $phone
 * @property string $dir_phone
 * @property string $cellular
 * @property string $fax
 * @property string $web
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property string $currency_id
 * @property string $comments
 * @property integer $system_acc
 * @property integer $owner
 * @property string $modified
 * @property string $created
 */
class Accounts extends fileRecord {

    const table = '{{%accounts}}';

    private $dateDBformat = true;

    public static function findAllByType($type) {

        return Accounts::find()->where(array('type' => $type))->All();
    }
    
    public static function findName($id){
        $account=  Accounts::findOne(['id'=>$id]);
        if($account==null)
            return \Yii::t('app','NA');
        return $account->name;
        
    }

    public static function tableName() {
        return self::table;
    }

    public static function SrcTax($id) {
        $model = Accounts::findOne($id);
        if ($model === null) {
            return false;
        } else {
            $value=\app\helpers\Linet3Helper::getOverride("SrcTax",["account"=>$model]);
            if ($value!==null)
                    return $value;
            return $model->src_tax;
        }
    }

    public function openfrmt($line,$from_date,$to_date) {
        $accs = '';

        //get all fields (b110) sort by id
        $fields = OpenFormat::find()->where(['type_id' => "B110"])->All();
        

        //loop strfgy
        foreach ($fields as $field) {
            $accs.=$this->openfrmtFieldStr($field, $line,$from_date,$to_date);
        }
        return $accs . "\r\n";
    }

    /*
      public static function primaryKey() {
      return 'id';
      }
     */

    public function getBalance() {
        $sum = 0;
        foreach ($this->transactions as $transaction)
            $sum+=$transaction->sum;
        return $sum;
    }

    /*
     * for open format export 
     * get name of accType
     */

    public function getType() {
        return isset($this->accType) ? $this->accType->name : "";
    }

    public function getPos($from_date, $to_date) {
        $sum = 0;

        $transactions = Transactions::find()->where(['between', 'valuedate', $from_date, $to_date])->andWhere(['account_id' => $this->id])->all();
        foreach ($transactions as $transaction) {
            if ($transaction->sum > 0)
                $sum+=$transaction->sum;
        }
        return $sum;
    }

    public function getNeg($from_date, $to_date) {
        $sum = 0;

        $transactions = Transactions::find()->where(['between', 'valuedate', $from_date, $to_date])->andWhere(['account_id' => $this->id])->all();
        foreach ($transactions as $transaction) {
            if ($transaction->sum < 0)
                $sum+=$transaction->sum;
        }
        return $sum;
    }

    public function getTotal($from_date, $to_date) {
        $sum = 0;


        $transactions = Transactions::find()->where(['between', 'valuedate', $from_date, $to_date])->andWhere(['account_id' => $this->id])->all();
        //$transactions = Transactions::findAll($criteria);
        foreach ($transactions as $transaction) {
            $sum+=$transaction->sum;
        }

        return $sum;
    }

    ///*
      
      
      function behaviors() {

        return array(
                ///*
                  'properties' => array(
                  //'class' => 'ext.eav.EEavBehavior',
                  'class' => \adam2314\EavBehavior::className(),
                  // Table that stores attributes (required)
                  'tableName' => '{{%accEav}}',
                  'entityField' => 'entity',
                  'attributeField' => 'attribute',
                  'valueField' => 'value',

                  'modelPrimaryKey' => 'id',
                  //'safeAttributes' => array(),
                  //'attributesPrefix' => '',
                  )// */
        );
    }
     //*/

    ///*
    public function beforeSave($insert) {
        if ( $insert)
            $this->created = new \yii\db\Expression('NOW()');
        else
            $this->modified = new \yii\db\Expression('NOW()');
        return parent::beforeSave($insert);
    }

    public function save($runValidation = true, $attributes = NULL) {
        if (isset($this->system_acc)) {
            if ($this->system_acc != 1)
                return parent::save($runValidation, $attributes);
        }
        else 
            return parent::save($runValidation,$attributes);
        //else no save
        return false;
    }

//*/

    public function delete() {
        if ($this->system_acc != 1) {
            if (!$this->hasHistory()) {
                return parent::delete();
            }
        }
        return false;
    }

    private function hasHistory() {
        if (count($this->transactions) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function vatnumVal($attribute, $params) {
        $value = $this->$attribute;
        if (\app\helpers\Linet3Helper::vatnumVal($value)) {
            $this->addError($attribute, Yii::t('app', 'Not a valid VAT id'));
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'accType' => array(self::BELONGS_TO, 'Acctype', 'type'),
            'Category' => array(self::BELONGS_TO, 'AccCat', 'cat_id'),
            'accId6111' => array(self::BELONGS_TO, 'Id6111', 'id6111'),
            'accOwner' => array(self::BELONGS_TO, 'Users', 'owner'),
            'Currency' => array(self::BELONGS_TO, 'Currecies', 'currency_id'),
            'accHist' => array(self::HAS_MANY, 'AccHist', 'id'),
            'transactions' => array(self::HAS_MANY, 'Transactions', 'account_id'),
        );
    }
    
    public function getAccType(){
        return $this->hasOne(Acctype::className(), array('id' => 'type'));
    }
    public function getCategory(){
        return $this->hasOne(AccCat::className(), array('id' => 'cat_id'));
    }
    public function getAccId6111(){
        return $this->hasOne(accId6111::className(), array('id' => 'id6111'));
    }
    public function getTransactions(){
        return $this->hasMany(Transactions::className(), array('account_id' => 'id'));
    }
    
    
    public function getAccHist() {
        return $this->hasMany(AccHist::className(), array('account_id' => 'id'));
    }
    public function getAccs() {
        return $this->hasMany(Accounts::className(), array('parent_account_id' => 'id'));
    }
    public function getDocs() {
        return $this->hasMany(Docs::className(), array('account_id' => 'id'));
    }
    
    public function AccHisDp() {
        $query = $this->getAccHist();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $dataProvider;
    }
    
    
    public function AccsDp() {
        $query = $this->getAccs();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $dataProvider;
    }
    
    public function DocsDp() {
        $query = $this->getDocs();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $dataProvider;
    }
    
    
    
    

    public function owes() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $filter = 1; //small change
        //$type = (int) $this->type;

        $accounts = $this->findAllByType($this->type);
        // or using: $rawData=User::find()->All();
        $list = [];
        foreach ($accounts as $account) {
            $tmp = $account->getBalance();
            if (($tmp > $filter) || ($tmp < $filter * -1))
                $list[] = array('id' => $account->id, 'name' => $account->name, 'sum' => $tmp);
        }


        $dataProvider = new \yii\data\ArrayDataProvider(array(
            'allModels'=>$list,
            'id' => 'user',
            'sort' => array(
                'attributes' => [ 'id', 'name', 'sum']
            ),
            'pagination' => false
        ));

        return $dataProvider;
// $dataProvider->getData() will return a list of arrays.
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['type', 'id6111', 'cat_id', 'pay_terms', 'parent_account_id', 'system_acc', 'owner'], 'integer'],
            [['src_tax'], 'number'],
            [['src_date', 'modified', 'created'], 'safe'],
            [['currency_id'], 'required'],
            [['comments'], 'string'],
            [['name', 'contact', 'address'], 'string', 'max' => 80],
            [['department', 'web'], 'string', 'max' => 60],
            [['phone', 'dir_phone', 'cellular', 'fax'], 'string', 'max' => 20],
            array('vatnum', 'vatnumVal'),
            [['email'], 'string', 'max' => 50],
            [['city'], 'string', 'max' => 40],
            [['zip'], 'string', 'max' => 10],
            [['currency_id'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'id6111' => Yii::t('app', 'Id6111'),
            'cat_id' => Yii::t('app', 'Category'),
            'pay_terms' => Yii::t('app', 'Pay Terms'),
            'src_tax' => Yii::t('app', 'Tax Rate'),
            'src_date' => Yii::t('app', 'Tax Auth Date'),
            'parent_account_id' => Yii::t('app', 'Parent Account Id'),
            'name' => Yii::t('app', 'Name'),
            'contact' => Yii::t('app', 'Contact'),
            'department' => Yii::t('app', 'Department'),
            'vatnum' => Yii::t('app', 'Vat No.'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone No.'),
            'dir_phone' => Yii::t('app', 'Dir Phone'),
            'cellular' => Yii::t('app', 'Mobile No.'),
            'fax' => Yii::t('app', 'Fax No.'),
            'web' => Yii::t('app', 'Website'),
            'address' => Yii::t('app', 'Address'),
            'currency_id' => Yii::t('app', 'Currency'),
            'city' => Yii::t('app', 'City'),
            'zip' => Yii::t('app', 'Zip'),
            'comments' => Yii::t('app', 'Comments'),
            'system_acc' => Yii::t('app', 'System Account'),
            'owner' => Yii::t('app', 'Owner'),
        ];
    }

}
