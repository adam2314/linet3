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
 * This is the model class for table "inventoryItem".
 *
 * The followings are the available columns in table 'inventoryItem':
 * @property integer $account_id
 * @property integer $item_id
 * @property integer $ammount
 * @property string $idcode
 */
namespace app\models;

use Yii;

class InventoryItem extends Record {

    const table = '{{%inventoryItem}}';

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
            array('account_id, item_id, ammount, idcode', 'required'),
            array('account_id, item_id, ammount', 'number', 'integerOnly' => true),
            array('idcode', 'string', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('account_id, item_id, ammount, idcode', 'safe', 'on' => 'search'),
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
            'account_id' => Yii::t('app', 'Account'),
            'item_id' => Yii::t('app', 'Item'),
            'ammount' => Yii::t('app', 'Ammount'),
            'idcode' => Yii::t('app', 'Idcode'),
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

        $criteria->compare('account_id', $this->account_id);
        $criteria->compare('item_id', $this->item_id);
        $criteria->compare('ammount', $this->ammount);
        $criteria->compare('idcode', $this->idcode, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
