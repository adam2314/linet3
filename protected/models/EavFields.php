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
 * This is the model class for table "eavFields".
 *
 * The followings are the available columns in table 'eavFields':
 * @property integer $id
 * @property string $name
 * @property string $eavType
 * @property integer $min
 * @property integer $max
 */
namespace app\models;

use Yii;
use app\components\basicRecord;
class EavFields extends basicRecord{
    const table='{{%eavFields}}';
    
    const TYPE_STRING='string';
    const TYPE_SELECT='select(X)';//json_encode
    const TYPE_INT='integer';
    const TYPE_LIST='list(X)';
    const TYPE_BOOLEAN='boolean';
    const TYPE_FILE='file';
    const TYPE_URL='url';
    
    public function getTypes() {
        return  self::getConstants('TYPE_', __CLASS__);
        //print_r($list);
        //return "";
        return Yii::t('app', $list[$this->refstatus]['name']);
    }
    

    public function getType() {
        $list = $this->getTypes();
        //print_r($list);
        //return "";
        return Yii::t('app', $list[$this->refstatus]['name']);
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
			array(['name', 'eavType', 'min', 'max'], 'required'),
			array(['min', 'max'], 'number', 'integerOnly'=>true),
			array(['name', 'eavType'], 'string', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(['id', 'name', 'eavType', 'min', 'max'], 'safe', 'on'=>'search'),
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
                    'items'=>array(self::HAS_MANY, 'AccTemplateItem', 'eavFields_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'name' => Yii::t('app','Name'),
			'eavType' => Yii::t('app','Eav Type'),
			'min' => Yii::t('app','Min'),
			'max' => Yii::t('app','Max'),
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

		$query = Accounts::find();          
                $dataProvider = new ActiveDataProvider([            
                    'query' => $query,         ]);          
                $this->load($params);          
                if (!$this->validate()) {                                     
                    return $dataProvider;         
                    
                }

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('eavType',$this->eavType,true);
		$criteria->compare('min',$this->min);
		$criteria->compare('max',$this->max);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}