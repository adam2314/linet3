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
 * This is the model class for table "currencies".
 *
 * The followings are the available columns in table 'currencies':
 * @property string $id
 * @property string $company_id
 * @property string $file_id

 */
namespace app\models;

use Yii;
use app\components\mainRecord;
class Download extends mainRecord{
        const table='download';
        public static function primaryKey()     {
                return ['id'];
                // For composite primary key, return an array like the following
                //return array('prefix', 'num');
            }

	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
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
			array(['id'], 'string', 'max'=>255),
			array(['company_id', 'file_id'], 'integer'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(['id', 'company_id', 'file_id'], 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		//return array();
                 return array(
                        
                        
                    );
	}

        
        
        
        
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'=>Yii::t('app','ID'),
                        'company_id'=>Yii::t('app','Company'),
                        'file_id'=>Yii::t('app','File'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($params){
		
		$query = Accounts::find();          $dataProvider = new ActiveDataProvider([             'query' => $query,         ]);          $this->load($params);          if (!$this->validate()) {                                     return $dataProvider;         }

		$criteria->compare('id',$this->id,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('file_id',$this->file_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

}