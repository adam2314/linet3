<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\models;

use Yii;

class OpenFormat extends \app\components\mainRecord {

    const table = 'openformat';

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    public static function primaryKey() {
        return ['id'];
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['id', 'desc', 'type'], 'required'),
            array(['id'], 'string', 'max' => 30),
            array(['type'], 'string', 'max' => 4),
            array(['description'], 'string', 'max' => 255),
            array(['id', 'description', 'type', 'size', 'record', 'type_id'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'description' => 'Descrieption',
            'type' => 'Type',
            'size' => 'Size',
            'record' => 'Record', //out
            //'action' => 'Action',
            'type_id' => 'Type Id',
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
        $criteria->compare('description', $this->description, true);
        $criteria->compare('type', $this->type, true);

        $criteria->compare('size', $this->size, true);
        $criteria->compare('record', $this->record, true); //out
        //$criteria->compare('action',$this->action,true);
        $criteria->compare('type_id', $this->type_id);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
