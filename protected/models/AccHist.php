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
 * This is the model class for table "accHist".
 *
 * The followings are the available columns in table 'accHist':
 * @property integer $id
 * @property string $account_id
 * @property string $dt
 * @property string $details
 *
 * The followings are the available model relations:
 * @property Accounts $account
 */

namespace app\models;
use app\components\fileRecord;
use Yii;
use \yii\helpers\Html;

class AccHist extends fileRecord {

    const table = '{{%accHist}}';
    const STATUS_DONE=0;
    const STATUS_UPCOMING=1;
    const STATUS_CANCELLED=2;
    
    const TYPE_PHONE=0;
    const TYPE_SMS=1;
    const TYPE_FAX=2;
    const TYPE_EMAIL=3;
    const TYPE_MEETING=4;
    const TYPE_MAIL=5;
    /**
     * @return string the associated database table name
     */
    
    public static function getStatuses() {
        return self::getConstants('STATUS_', __CLASS__);
    }
    
    public static function getTypes() {
        return self::getConstants('TYPE_', __CLASS__);
    }
    
     public function getTypeName() {
        $list = $this->getTypes();
        //print_r($list);
        //return "";
        if(isset($list[$this->type]))
            return Yii::t('app', $list[$this->type]['name']);
        
        return $this->type;
    }
    public function getStatusName() {
        $list = $this->getStatuses();
        //print_r($list);
        //return "";
        return Yii::t('app', $list[$this->status]['name']);
    }
    
    
    
    public static function tableName() {
        return self::table;
    }

    public function brief() {
        if (strlen($this->details) > 50) {
            $str = Html::a(Html::encode("[" . Yii::t('app', 'Read More') . "]"), Yii::$app->createAbsoluteUrl("/rm/update/" . $this->id));
            return substr($this->details, 0, 50) . "...$str";
        } else {
            return $this->details;
        }
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['account_id'], 'string', 'max' => 11),
            array(['dt', 'details','subject','type','status'], 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(['id', 'account_id', 'dt', 'details'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Account' => array(self::BELONGS_TO, 'Accounts', 'account_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'account_id' => Yii::t('app', 'Account'),
            'dt' => Yii::t('app', 'Timestamp'),
            'details' => Yii::t('app', 'Details'),
            'type' => Yii::t('app', 'Type'),
            'subject' => Yii::t('app', 'Subject'),
            'status' => Yii::t('app', 'Status'),
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
        $query = AccHist::find();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'account_id' => $this->account_id,
            'dt' => $this->dt,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'details', $this->details]);
        return $dataProvider;

    }

}
