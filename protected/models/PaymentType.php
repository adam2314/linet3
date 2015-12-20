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
 * This is the model class for table "paymentType".
 *
 * The followings are the available columns in table 'paymentType':
 * @property integer $id
 * @property string $name
 * @property string $value
 */
namespace app\models;

use Yii;
use app\models\Settings;
class PaymentType extends Record {

    const table = '{{%paymentType}}';



    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    public static function getList() {
        //if($const===null){
        $arr = self::find()->All();

        //
        //}

        foreach ($arr as &$item) {
            $item->name = Yii::t('app', $item->name);
        }


        return \yii\helpers\ArrayHelper::map($arr, 'id', 'name');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['name', 'value'], 'required'),
            array(['name', 'value'], 'string', 'max' => 80),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'name', 'value'], 'safe', 'on' => 'search'),
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
            'value' => Yii::t('app', 'Value'),
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('value', $this->value, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getSettings() {
        $arr = array();
        foreach ($this->loadPayment()->settings() as $setting) {
            $arr[] = Settings::findOne($setting);
        }
        return $arr;
    }

    public function loadPayment() {
        if (class_exists($this->value))
            return new $this->value;
        else
            throw new \Exception(Yii::t('errors', 'The requested payment type is Invalid.') . $this->id);
    }

}
