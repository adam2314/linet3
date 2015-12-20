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
 * This is the model class for table "curRates".
 *
 * The followings are the available columns in table 'curRates':
 * @property string $id
 * @property string $currency_id
 * @property string $date
 * @property string $value
 */

namespace app\models;

use Yii;
use app\models\Currecies;

class Currates extends Record {

    const table = '{{%curRates}}';

    public $from;
    public $to;
    public $name;
    public $code;

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
            array(['currency_id'], 'required'),
            array(['id'], 'string', 'max' => 10),
            array(['currency_id'], 'string', 'max' => 3),
            array(['value'], 'string', 'max' => 7),
            array(['to', 'from', 'date'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'currency_id', 'date', 'value'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Currency' => array(self::BELONGS_TO, 'Currecies', 'currency_id'),
        );
    }

    public function getCurrency() {
        return $this->hasOne(Currecies::className(), array('id' => 'currency_id'));
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'currency_id' => Yii::t('app', 'Currency'),
            'date' => Yii::t('app', 'Date'),
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('currency_id', $this->currency_id, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('value', $this->value, true);

        if (!empty($this->from) && empty($this->to)) {
            $this->from = date("Y-m-d", CDateTimeParser::parse($this->from, Yii::$app->locale->getDateFormat('yiishort')));

            $criteria->addCondition("date>=:date_from");
            $criteria->params[':date_from'] = $this->from;
        } elseif (!empty($this->to) && empty($this->from)) {
            $this->to = date("Y-m-d", CDateTimeParser::parse($this->to, Yii::$app->locale->getDateFormat('yiishort')));

            $criteria->addCondition("date>=:date_to");
            $criteria->params[':date_to'] = $this->to;
        } elseif (!empty($this->to) && !empty($this->from)) {
            $this->from = date("Y-m-d", CDateTimeParser::parse($this->from, Yii::$app->locale->getDateFormat('yiishort')));
            $this->to = date("Y-m-d", CDateTimeParser::parse($this->to, Yii::$app->locale->getDateFormat('yiishort')));

            $criteria->addCondition("date>=:date_from");
            $criteria->addCondition("date<=:date_to");
            $criteria->params[':date_from'] = $this->from;
            $criteria->params[':date_to'] = $this->to;
        }
        $sort = new CSort();
        $sort->defaultOrder = 'date DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => $sort,
        ));
    }

    public static function GetRateList() {
        $list = Currates::find()->All();
        $rates = [];
        foreach ($list as $rate) {
            //print ".1.".$rate->currency_id;
            //print $rate->value;
            //print $rate->Currency->name;
            $rate->name = $rate->currency->id;//was name
            $rate->code = $rate->currency->code; //.":".$rate->value;
            //$rates[$rate->currency_id.":".$rate->value]=$rate->Currency->name;
        }
        return $list;
    }

    public static function GetRate($id,$time=null) {
        if($time==null){
            $time=Record::writeDate(time());
        }
        $date = Currates::find()->andWhere(['currency_id' => $id])
                ->andFilterWhere(['>=', 'date', $time])
                ->orderBy(['date'=>SORT_ASC])
                ->One();
        
        if($date==null){//no value then get latest
            $date = Currates::find()->andWhere(['currency_id' => $id])
                    ->orderBy(['date'=>SORT_DESC])
                    ->One();
        }
        if($date==null){//no rate
            return 1;
        }
        
        return $date->value;
    }

    public function GetRateForDate($id, $date) {
        $criteria = new CDbCriteria;
        $criteria->select = 'value';
        $criteria->addColumnCondition(array('currency_id' => $id));
        $criteria->addColumnCondition(array('date' => $date));
        $model = Currates::model();
        $value = $model->commandBuilder->createFindCommand($model->tableName(), $criteria)->queryScalar();

        return $value;
    }

}
