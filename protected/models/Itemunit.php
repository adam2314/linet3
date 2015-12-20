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
 * This is the model class for table "itemUnits".
 *
 * The followings are the available columns in table 'itemUnits':
 * @property integer $id
 * @property string $name
 * @property integer $precision
 */
namespace app\models;

use Yii;
class Itemunit extends Record{
     const table='{{%itemUnits}}';

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
			array(['name', 'precision'], 'required'),
			array('precision', 'number', 'integerOnly'=>true),
			array('name', 'string', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(['id', 'name', 'precision'], 'safe', 'on'=>'search'),
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
			'id'=>array(self::HAS_MANY, 'Item','unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'precision' => 'Precision',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('precision',$this->precision);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}