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
 * This is the model class for table "AccCat".
 *
 * The followings are the available columns in table 'AccCat':
 * @property integer $id
 * @property string $name
 * @property integer $type_id
 */

namespace app\models;

use Yii;

class AccCat extends Record {

    const table = '{{%accCat}}';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AccId6111 the static model class
     */

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }
    
    public function TypeName(){
        $account= Acctype::findOne(['id'=>$this->type_id]);
        if($account==null)
            return \Yii::t('app','NA');
        return $account->name;
        
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['name', 'type_id'], 'required', 'on' => 'defualt'),
            array(['id', 'type_id'], 'number', 'integerOnly' => true),
            array(['name'], 'string', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'name', 'type_id'], 'safe', 'on' => 'search'),
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'type_id' => Yii::t('app', 'Type'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {
        $query = AccCat::find();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);


        return $dataProvider;
    }

}
