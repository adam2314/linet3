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
 * This is the model class for table "itemVatCat".
 *
 * The followings are the available columns in table 'itemVatCat':
 * @property integer $id
 * @property string $name
 */

namespace app\models;

use Yii;

class ItemVatCat extends Record {

    const table = '{{%itemVatCat}}';

    public static function findName($id) {
        $account = ItemVatCat::findOne(['id' => $id]);
        if ($account == null)
            return \Yii::t('app', 'NA');
        return $account->name;
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }
    
    public static function TaxRate($id, $date = null) {
        //return 8.5;
        $model = Self::findOne(['id'=>$id]);
        if ($model != null) {
        //    return false;
        //} else {
            $value = \app\helpers\Linet3Helper::getOverride("TaxRate", ["vat_cat" => $model, "date" => $date]);
            if ($value != null)
                return $value;
            return $model->tax_rate;
        }
        
        return false;
        
    }
    
    

    public function save($runValidation = true, $attributes = NULL) {
        $users = User::find()->All();
        parent::save($runValidation, $attributes);
        foreach ($users as $user) {
            if (!UserIncomeMap::findOne(array('user_id' => $user->id, 'itemVatCat_id' => $this->id))) {//'user_id', 'itemVatCat_id'
                $model = new UserIncomeMap;
                $attr = array("user_id" => $user->id, "itemVatCat_id" => $this->id, "account_id" => 100);
                $model->attributes = $attr;
                if (!$model->save())
                    return false;
            }
        }
    }

    public function delete() {
        $users = User::find()->All();

        foreach ($users as $user) {
            $IncomeMap = UserIncomeMap::findOne(array('user_id' => $user->id, 'itemVatCat_id' => $this->id));
            if ($IncomeMap) {//'user_id', 'itemVatCat_id'
                $IncomeMap->delete();
            }
        }
        parent::delete();
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'string', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name', 'safe', 'on' => 'search'),
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

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
