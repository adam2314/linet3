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
 * This is the model class for table "itemVatCat".
 *
 * The followings are the available columns in table 'itemVatCat':
 * @property integer $id
 * @property string $name
 */
class ItemVatCat extends CActiveRecord{
    const table='{{itemVatCat}}';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemVatCat the static model class
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
		return self::table;
	}

        
        public function save($runValidation = true, $attributes = NULL) {
            $users=User::model()->findAll();
            parent::save($runValidation,$attributes);
            foreach ($users as $user){
                if(!UserIncomeMap::model()->findByPk(array('user_id'=>$user->id, 'itemVatCat_id'=>$this->id))){//'user_id', 'itemVatCat_id'
                    $model=new UserIncomeMap;
                    $attr=array("user_id"=>$user->id,"itemVatCat_id"=>$this->id,"account_id"=>100);
                    $model->attributes=$attr;
                    if(!$model->save())
                        return false;
                }
                
            }
        }

        public function delete() {
            $users=User::model()->findAll();
            
            foreach ($users as $user){
                $IncomeMap=UserIncomeMap::model()->findByPk(array('user_id'=>$user->id, 'itemVatCat_id'=>$this->id));
                if($IncomeMap){//'user_id', 'itemVatCat_id'
                   $IncomeMap->delete();
                }
                
            }
            parent::delete();
        }
        
        
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('labels', 'ID'),
			'name' => Yii::t('labels', 'Name'),
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
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}