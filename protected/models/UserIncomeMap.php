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
 * This is the model class for table "userIncomeMap".
 *
 * The followings are the available columns in table 'userIncomeMap':
 * @property integer $user_id
 * @property integer $itemVatCat_id
 * @property string $account_id
 *
 * The followings are the available model relations:
 * @property Accounts $account
 * @property User $user
 * @property ItemVatCat $itemVatCat
 */
class UserIncomeMap extends CActiveRecord{
    const table='{{userIncomeMap}}';
    
     public function primaryKey(){
       return array('user_id', 'itemVatCat_id');
    }
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserIncomeMap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName(){
		return self::table;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, itemVatCat_id, account_id', 'required'),
			array('user_id, itemVatCat_id', 'numerical', 'integerOnly'=>true),
			array('account_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, itemVatCat_id, account_id', 'safe', 'on'=>'search'),
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
			//'account' => array(self::BELONGS_TO, 'Accounts', 'account_id'),
			//'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			//'itemVatCat' => array(self::BELONGS_TO, 'ItemVatCat', 'itemVatCat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'itemVatCat_id' => 'Item Vat Cat',
			'account_id' => 'Account',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('itemVatCat_id',$this->itemVatCat_id);
		$criteria->compare('account_id',$this->account_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}