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
 * This is the model class for table "accType".
 *
 * The followings are the available columns in table 'accType':
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property string $openformat
 */

namespace app\models;

use Yii;

class Acctype extends Record {

    const table = '{{%accType}}';

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    public static function primaryKey() {
        return ['id'];
    }

    public function getName($id) {
        $model = Acctype::findOne(['id' => $id]);
        if ($model == NULL) {
            return 'ERROR';
        } else {
            return Yii::t('app', $model->desc);
        }
    }

    public function switchType($old, $new) {

        $accounts = Accounts::find()->where(['type' => $old])->All();
        foreach ($accounts as $account) {
            $account->type = $new;
            $account->save();
        }
    }

    public function getTotal($from_date, $to_date) {
        $sum = 0;

        $accounts = Accounts::find()->where(['type' => $this->id])->All();
        foreach ($accounts as $account) {
            $sum+=$account->getTotal($from_date, $to_date);
        }
        return $sum;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['name', 'desc'], 'required'),
            array(['name', 'desc'], 'string', 'max' => 40),
            array(['openformat'], 'string', 'max' => 5),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'name', 'desc', 'openformat'], 'safe', 'on' => 'search'),
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

    public function getType($name) {
        $model = Acctype::find()->where(['name' => $name])->one();
        //print_r($this);
        return $model->id;
    }

//*/
    /**
     * @return array customized attribute labels (name=>label)
     */

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'desc' => Yii::t('app', 'Description'),
            'openformat' => Yii::t('app', 'Open Format'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $query = Accounts::find();
        $dataProvider = new ActiveDataProvider([ 'query' => $query,]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('desc', $this->desc, true);
        $criteria->compare('openformat', $this->openformat, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
