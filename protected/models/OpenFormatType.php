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
use app\components\mainRecord;
class OpenFormatType extends mainRecord{
         const table='openformattype';

	/**
	 * @return string the associated database table name
	 */
	public static function tableName() {
            return self::table;
        }
        public static function primaryKey(){
	    return ['id','type'];
	}
        
        public static function getDesc($id){
             $tmp=OpenFormatType::find()->where(array('id'=>$id,'type'=>'INI'))->one();
             if($tmp)
                 return $tmp->description;
             else
                 return '';
        }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(['id', 'description', 'type'], 'required'),
			array(['id'], 'string', 'max'=>30),
			array(['type'], 'string', 'max'=>4),
			array(['description'], 'string', 'max'=>255),
			array(['id', 'description', 'type'], 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations(){
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'description' => 'Descrieption',
			'type' => 'Type',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($params){
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$query = Accounts::find();          $dataProvider = new ActiveDataProvider([             'query' => $query,         ]);          $this->load($params);          if (!$this->validate()) {                                     return $dataProvider;         }

		$criteria->compare('id',$this->id);
		$criteria->compare('description',$this->desc,true);
		$criteria->compare('type',$this->type,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}