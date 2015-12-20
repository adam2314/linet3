<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
/**
 * This is the model class for table "databasesPerm".
 *
 * The followings are the available columns in table 'databasesPerm':
 * @property integer $id
 * @property integer $user_id
 * @property integer $database_id
 * @property integer $level_id
 */

namespace app\models;

use Yii;
use app\components\mainRecord;

class DatabasesPerm extends mainRecord {

    const table = 'databasesPerm';

    public static function primaryKey() {
        return ['id'];
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return (self::table);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['user_id', 'database_id', 'level_id'], 'required','on'=>'default'),
            array(['user_id', 'database_id', 'level_id'], 'number', 'integerOnly' => true),
            array(['id', 'user_id', 'database_id', 'level_id'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Company' => array(self::BELONGS_TO, 'company', 'database_id'),
            'User' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }
    public function getCompany(){
        return $this->hasOne(Company::className(), array('id' => 'database_id'));
    }
    public function getUser(){
        return $this->hasOne(User::className(), array('id' => 'user_id'));
    }

    
    public function getName(){
        if(isset($this->company))
            return $this->company->getName();
        return 'NA';
        
    }
    
    public function save($runValidation = true, $attributes = NULL) {
        $a = parent::save($runValidation, $attributes);
        if ($a) {

            Yii::$app->db->close();
            Yii::$app->db->dsn = $this->company->string;
            Yii::$app->db->tablePrefix = $this->company->prefix;
            Yii::$app->db->open();

            $user = User::findOne($this->user_id);
            $user->save();
        }
        return $a;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'database_id' => 'Database',
            'level_id' => 'Level',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search($params) {
        $query = DatabasesPerm::find();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            "sort"=> ['defaultOrder' => [
                //'reg_date'=>SORT_DESC,
                //'docnum'=>SORT_DESC
                
                ]]
        ]);
        //exit;
        $this->load($params);

        if (!$this->validate()) {
            var_dump($this->getErrors());
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'database_id' => $this->database_id,
            'level_id' => $this->level_id,
        ]);

        

        //$sort->defaultOrder = 'issue_date DESC';
        return $dataProvider;


    }
    
    
    
    public function search1($params) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('database_id', $this->database_id);
        $criteria->compare('level_id', $this->level_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

   

}
