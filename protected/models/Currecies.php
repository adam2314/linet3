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
 * @property string $code
 * @property string $name
 * @property string $symbol
 */
namespace app\models;

use Yii;
use app\components\mainRecord;
class Currecies extends mainRecord{
        const table='currencies';
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
			array(['id', 'code'], 'string', 'max'=>3),
			array('name', 'string', 'max'=>255),
			array('symbol', 'string', 'max'=>17),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(['id', 'code', 'name', 'symbol'], 'safe', 'on'=>'search'),
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
                        'code'=>Yii::t('app','Code'),
                        'name'=>Yii::t('app','Name'),
                        'symbol'=>Yii::t('app','Symbol'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($params){
		
		$query = Accounts::find();          $dataProvider = new ActiveDataProvider([             'query' => $query,         ]);          $this->load($params);          if (!$this->validate()) {                                     return $dataProvider;         }

		$criteria->compare('id',$this->id,true);
		$criteria->compare('code',$this->num,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('symbol',$this->symbol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        
        public static function AutoComplete($name='') {
	    $res =array();
	 

            $qtxt ="SELECT id ,name as label FROM `".Self::table."` WHERE name LIKE :term";
            $command =Yii::$app->db->createCommand($qtxt);
            $command->bindValue(":term", '%'.$name.'%', PDO::PARAM_STR);
            //$command->bindValue(":prefix", $this->prefix, PDO::PARAM_STR);
           // $command->bindValue(":type", $type, PDO::PARAM_STR);

            return $command->queryAll();


	    //return \yii\helpers\Json::encode($res);
	    //Yii::$app->end();//*/
	}
}