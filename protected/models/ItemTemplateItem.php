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
 * This is the model class for table "accTemplateItem".
 *
 * The followings are the available columns in table 'accTemplateItem':
 * @property integer $id
 * @property integer $itemTemplate_id
 * @property integer $eavFields_id
 */
namespace app\models;
use Yii;
class ItemTemplateItem extends Record{
        const table='{{%itemTemplateItem}}';


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
			array('ItemTemplate_id, eavFields_id', 'required'),
			array('ItemTemplate_id, eavFields_id', 'number', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ItemTemplate_id, eavFields_id', 'safe', 'on'=>'search'),
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
                    'ItemTemplate'=>array(self::BELONGS_TO, 'ItemTemplate', 'ItemTemplate_id'),
                    'EavFields'=>array(self::BELONGS_TO, 'EavFields', 'eavFields_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'ItemTemplate_id' => Yii::t('app', 'Item Template'),
			'eavFields_id' => Yii::t('app', 'Eav Fields'),
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
		$criteria->compare('ItemTemplate_id',$this->ItemTemplate_id);
		$criteria->compare('eavFields_id',$this->eavFields_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}