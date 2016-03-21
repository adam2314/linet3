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
 * This is the model class for table "bankName".
 *
 * The followings are the available columns in table 'bankName':
 * @property integer $id
 * @property string $name
 * @property string $subject
 * @property string $body
 * @property string $cc
 * @property string $bcc
 * @property string $entity_type
 * @property string $entity_id
 */
namespace app\models;

use Yii;

class MailTemplate extends Record {
    //public $to;
    const table = '{{%mailTemplate}}';



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
            array(['name'], 'required'),
            array(['id','rtl'], 'number', 'integerOnly' => true),
            array(['name'], 'string', 'max' => 255),
            array(['name', 'bcc', 'cc', 'subject', 'body', 'entity_type', 'entity_id'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'name'], 'safe', 'on' => 'search'),
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
            'subject' => Yii::t('app', 'Subject'),
            'entity_type' => Yii::t('app', 'Entity Type'),
            'entity_id' => Yii::t('app', 'Entity Id'),
            'bcc' => Yii::t('app', 'Bcc'),
            'cc' => Yii::t('app', 'Cc'),
            'body' => Yii::t('app', 'Body'),
                //'id' => Yii::t('app', 'ID'),
                //'name' => Yii::t('app', 'Name'),
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

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function templateRplc($data) {
        //subject
        //body
        
        
        
        if (preg_match_all('~%([^%]*?)%~', $this->body, $arr)) {
            //print_r($arr);
            foreach ($arr[0] as $result) {
                
                if ($data->hasAttribute(str_replace("%", "", $result)))
                    $this->body = str_replace($result, $data->{str_replace("%", "", $result)}, $this->body);
            }
        }
        
        if (preg_match_all('~%([^%]*?)%~', $this->subject, $arr)) {
            foreach ($arr[0] as $result) {
                if ($data->hasAttribute(str_replace("%", "", $result)))
                    $this->subject = str_replace($result, $data->{str_replace("%", "", $result)}, $this->subject);
            }
        }
        
        if($this->bcc==null)
            $this->bcc='';
        if($this->subject==null)
            $this->subject='NO TEMPLATE';
        if($this->body==null)
            $this->body='NO BODY';
        
        
    }

}
