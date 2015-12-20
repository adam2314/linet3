<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
/**
 * This is the model class for table "docStatus".
 *
 * The followings are the available columns in table 'docStatus':
 * @property integer $id
 * @property integer $num
 * @property integer $doc_type
 * @property string $name
 * @property integer $looked
 * @property string $action
 */
namespace app\models;

use Yii;
class Docstatus extends Record{
    const table='{{%docStatus}}';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Docstatus the static model class
	 */
        public static function primaryKey(){
	    return array('num','doc_type');
	}


	/**
	 * @return string the associated database table name
	 */
	public static function tableName(){
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
			array(['num', 'doc_type', 'name', 'looked', 'action'], 'required'),
			array(['num', 'doc_type', 'looked'], 'number', 'integerOnly'=>true),
			array(['name', 'action'], 'string', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(['id', 'num', 'doc_type', 'name', 'looked', 'action'], 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'num' => Yii::t('app','Num'),
			'doc_type' => Yii::t('app','Documenet Type'),
			'name' => Yii::t('app','Name'),
			'looked' => Yii::t('app','Looked'),
			'action' => Yii::t('app','Action'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($params)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$query = Accounts::find();          $dataProvider = new ActiveDataProvider([             'query' => $query,         ]);          $this->load($params);          if (!$this->validate()) {                                     return $dataProvider;         }

		$criteria->compare('id',$this->id);
		$criteria->compare('num',$this->num);
		$criteria->compare('doc_type',$this->doc_type);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('looked',$this->looked);
		$criteria->compare('action',$this->action,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}