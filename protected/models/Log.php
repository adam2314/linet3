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
class Log extends \app\components\mainRecord {
    const table = 'log';

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['level', 'category'], 'required'),
            array(['level', 'category', 'message'], 'string', 'max' => 255),
            array(['IP_User'], 'string', 'max' => 255),
            array(['request_URL', 'message'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['level', 'category', 'message', 'IP_User', 'request_URL', 'user_id', 'logtime'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
             //'Owner' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }
    
       
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'level' => Yii::t('app', 'Level'),
            'category' => Yii::t('app', 'Category'),
            'logtime' => Yii::t('app', 'Time'),
            'IP_User' => Yii::t('app', 'Src IP'),
            'user_id' => Yii::t('app', 'User'),
            'request_URL' => Yii::t('app', 'Request'),
            'message' => Yii::t('app', 'Message'),
            
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('level', $this->level, true);
        $criteria->compare('category', $this->category, true);
        //$criteria->compare('logtime', $this->logtime);
        $criteria->compare('IP_User', $this->IP_User, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('request_URL', $this->request_URL, true);
        $criteria->compare('message', $this->message);

        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
   
}