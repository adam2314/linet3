<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
/**
 * This is the model class for table "accounts".
 *
 * The followings are the available columns in table 'accounts':
 * @property string $id
 * @property integer $type
 * @property string $id6111
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
 * @property string $comments
 * @property integer $cat_id
 * @property integer $currency_id
 * @property integer $system_acc
 * @property integer $owner
 */
class Accounts extends fileRecord {//CActiveRecord

    const table = '{{accounts}}';

    private $dateDBformat = true;

    public function findAllByType($type) {

        return Accounts::model()->findAllByAttributes(array('type' => $type));
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Accounts the static model class
     */
    public function tableName() {
        return self::table;
    }

    public function getSrcTax($id) {
        $model = Accounts::model()->findByPk($id);
        if ($model === null) {
            return false;
        } else {
            return $model->src_tax;
        }
    }

    public function openfrmt($line) {
        $accs = '';

        //get all fields (b110) sort by id
        $criteria = new CDbCriteria;
        $criteria->condition = "type_id = :type_id";
        $criteria->params = array(':type_id' => "B110");
        $fields = OpenFormat::model()->findAll($criteria);

        //loop strfgy
        foreach ($fields as $field) {
            $accs.=$this->openfrmtFieldStr($field, $line);
        }
        return $accs . "\r\n";
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function primaryKey() {
        return 'id';
    }

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

        $yiidatetimesec = Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime = Yii::app()->locale->getDateFormat('phpdbdatetime');


        $from_date = date($phpdbdatetime, CDateTimeParser::parse($from_date, $yiidatetimesec));
        $to_date = date($phpdbdatetime, CDateTimeParser::parse($to_date, $yiidatetimesec));


        $criteria = new CDbCriteria;
        $criteria->condition = "account_id = :id";
        $criteria->addCondition("valuedate BETWEEN :from_date AND :to_date");
        $criteria->params = array(
            ':id' => $this->id,
            ':from_date' => $from_date,
            ':to_date' => $to_date,
        );

        $transactions = Transactions::model()->findAll($criteria);
        foreach ($transactions as $transaction) {
            if ($transaction->sum > 0)
                $sum+=$transaction->sum;
        }
        return $sum;
    }

    public function getNeg($from_date, $to_date) {
        $sum = 0;

        $yiidatetimesec = Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime = Yii::app()->locale->getDateFormat('phpdbdatetime');


        $from_date = date($phpdbdatetime, CDateTimeParser::parse($from_date, $yiidatetimesec));
        $to_date = date($phpdbdatetime, CDateTimeParser::parse($to_date, $yiidatetimesec));


        $criteria = new CDbCriteria;
        $criteria->condition = "account_id = :id";
        $criteria->addCondition("valuedate BETWEEN :from_date AND :to_date");
        $criteria->params = array(
            ':id' => $this->id,
            ':from_date' => $from_date,
            ':to_date' => $to_date,
        );

        $transactions = Transactions::model()->findAll($criteria);
        foreach ($transactions as $transaction) {
            if ($transaction->sum < 0)
                $sum+=$transaction->sum;
        }
        return $sum;
    }

    public function getTotal($from_date, $to_date) {
        $sum = 0;

        $yiidatetimesec = Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime = Yii::app()->locale->getDateFormat('phpdbdatetime');


        $from_date = date($phpdbdatetime, CDateTimeParser::parse($from_date, $yiidatetimesec));
        $to_date = date($phpdbdatetime, CDateTimeParser::parse($to_date, $yiidatetimesec));


        $criteria = new CDbCriteria;
        $criteria->condition = "account_id = :id";
        $criteria->addCondition("valuedate BETWEEN :from_date AND :to_date");
        $criteria->params = array(
            ':id' => $this->id,
            ':from_date' => $from_date,
            ':to_date' => $to_date,
        );

        $transactions = Transactions::model()->findAll($criteria);
        foreach ($transactions as $transaction) {
            $sum+=$transaction->sum;
        }

        return $sum;
    }

    function behaviors() {
        return array(
            'eavAttr' => array(
                'class' => 'application.modules.eav.extensions.EEavBehavior',
                'tableName' => '{{accEav}}',
                'entityField' => 'entity',
                'attributeField' => 'attribute',
                'valueField' => 'value',
                'modelTableFk' => 'primaryKey',
                'safeAttributes' => array(),
                'attributesPrefix' => '',
            )
        );
    }

    public function beforeSave() {
        if ($this->isNewRecord)
            $this->created = new CDbExpression('NOW()');
        else
            $this->modified = new CDbExpression('NOW()');


        if ($this->isNewRecord) {
            $this->dateDBformat = false;
        }

        if (!$this->dateDBformat) {
            $this->dateDBformat = true;
            $this->src_date = date("Y-m-d H:i:s", CDateTimeParser::parse($this->src_date, Yii::app()->locale->getDateFormat('yiishort')));
        }



        return parent::beforeSave();
    }

    public function save($runValidation = true, $attributes = NULL) {
        if (isset($this->system_acc)) {
            if ($this->system_acc != 1)
                return parent::save($runValidation, $attributes);
        }
        //else 
        //    parent::save($runValidation,$attributes);
        //else no save
        return false;
    }

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

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, type, currency_id', 'required'),
            array('cat_id, type, pay_terms, parent_account_id, system_acc, owner', 'numerical', 'integerOnly' => true),
            //array('vatnum', 'length', 'max'=>9),
            //array('vatnum', 'length', 'min'=>9),
            array('vatnum', 'vatnumVal'),
            array('id6111, zip', 'length', 'max' => 10),
            array('src_tax', 'length', 'max' => 6),
            array('currency_id', 'length', 'max' => 3),
            array('name, contact, address', 'length', 'max' => 80),
            //array('department, web', 'length', 'max'=>60),
            array('vatnum, phone, dir_phone, cellular, fax', 'length', 'max' => 20),
            array('email', 'length', 'max' => 50),
            array('city', 'length', 'max' => 40),
            array('src_date, comments, web, department', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, type, cat_id, id6111, pay_terms, src_tax, src_date, parent_account_id, company, contact, department, vatnum, email, phone, dir_phone, cellular, fax, web, address, currency_id, city, zip, comments, owner', 'safe', 'on' => 'search'),
        );
    }

    public function vatnumVal($attribute, $params) {
        $value=$this->$attribute;
        if (Linet3Helper::vatnumVal($value)) {
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
                //'author' => array(self::BELONGS_TO, 'User', 'author_id'),
                //'comments' => array(self::HAS_MANY, 'Comment', 'post_id','condition'=>'comments.status='.Comment::STATUS_APPROVED,'order'=>'comments.create_time DESC'),
                //'commentCount' => array(self::STAT, 'Comment', 'post_id','condition'=>'status='.Comment::STATUS_APPROVED),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('labels', 'ID'),
            'type' => Yii::t('labels', 'Type'),
            'id6111' => Yii::t('labels', 'Id6111'),
            'cat_id' => Yii::t('labels', 'Category'),
            'pay_terms' => Yii::t('labels', 'Pay Terms'),
            'src_tax' => Yii::t('labels', 'Tax Rate'),
            'src_date' => Yii::t('labels', 'Tax Auth Date'),
            'parent_account_id' => Yii::t('labels', 'Parent Account Id'),
            'name' => Yii::t('labels', 'Name'),
            'contact' => Yii::t('labels', 'Contact'),
            'department' => Yii::t('labels', 'Department'),
            'vatnum' => Yii::t('labels', 'Vat No.'),
            'email' => Yii::t('labels', 'Email'),
            'phone' => Yii::t('labels', 'Phone No.'),
            'dir_phone' => Yii::t('labels', 'Dir Phone'),
            'cellular' => Yii::t('labels', 'Mobile No.'),
            'fax' => Yii::t('labels', 'Fax No.'),
            'web' => Yii::t('labels', 'Website'),
            'address' => Yii::t('labels', 'Address'),
            'currency_id' => Yii::t('labels', 'Currency'),
            'city' => Yii::t('labels', 'City'),
            'zip' => Yii::t('labels', 'Zip'),
            'comments' => Yii::t('labels', 'Comments'),
            'system_acc' => Yii::t('labels', 'System Account'),
            'owner' => Yii::t('labels', 'Owner'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function owes() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $filter = 1; //small change
        //$type = (int) $this->type;

        $accounts = $this->findAllByType($this->type);
        // or using: $rawData=User::model()->findAll();
        $list = array();
        foreach ($accounts as $account) {
            $tmp = $account->getBalance();
            if (($tmp > $filter) || ($tmp < $filter * -1))
                $list[] = array('id' => $account->id, 'name' => $account->name, 'sum' => $tmp);
        }


        $dataProvider = new CArrayDataProvider($list, array(
            'id' => 'user',
            'sort' => array(
                'attributes' => array(
                    'id', 'name', 'sum',
                ),
            ),
            'pagination' => false
        ));

        return $dataProvider;
// $dataProvider->getData() will return a list of arrays.
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('cat_id', $this->cat_id);
        $criteria->compare('id6111', $this->id6111, true);
        $criteria->compare('pay_terms', $this->pay_terms);
        $criteria->compare('src_tax', $this->src_tax, true);
        $criteria->compare('src_date', $this->src_date, true);
        $criteria->compare('parent_account_id', $this->parent_account_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('contact', $this->contact, true);
        $criteria->compare('department', $this->department, true);
        $criteria->compare('vatnum', $this->vatnum, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('dir_phone', $this->dir_phone, true);
        $criteria->compare('cellular', $this->cellular, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('web', $this->web, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('zip', $this->zip, true);
        $criteria->compare('comments', $this->comments, true);
        $criteria->compare('currency_id', $this->currency_id, true);
        //$criteria->compare('system_acc',$this->system_acc,true);
        $criteria->compare('owner', $this->owner);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }

    public static function AutoComplete($name = '', $type = 1) {
        $name = $name . '%';
        if ($type != 'all') {
            $sql = 'SELECT id as value, name AS label FROM `' . Accounts::table . '` WHERE name LIKE :name AND type=:type';
            return Yii::app()->db->createCommand($sql)->queryAll(true, array(':name' => $name, ':type' => $type));
        } else {
            $sql = 'SELECT id as value, name AS label FROM `' . Accounts::table . '` WHERE name LIKE :name';
            return Yii::app()->db->createCommand($sql)->queryAll(true, array(':name' => $name));
        }
        //$type = $type;
    }

    public function afterSave() {
        if ($this->dateDBformat) {
            $this->dateDBformat = false;
            $this->src_date = date(Yii::app()->locale->getDateFormat('phpshort'), strtotime($this->src_date));
        }
        return parent::afterSave();
    }

    public function afterFind() {
        if ($this->dateDBformat) {
            $this->dateDBformat = false;
            $this->src_date = date(Yii::app()->locale->getDateFormat('phpshort'), strtotime($this->src_date));
        }
        return parent::afterFind();
    }

}
