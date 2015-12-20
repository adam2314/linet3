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
 * This is the model class for table "docStatus".
 *
 * The followings are the available columns in table 'docStatus':
 * @property integer $id
 * @property integer $num
 * @property integer $doc_type
 * @property string $name
 * @property integer $looked
 * @property string $action
 */

namespace app\models;

use Yii;
use yii\helpers\Html;

class stockAction extends Record {

    const table = '{{%stockAction}}';

    public $from_date;
    public $to_date;
    public $sum;

    public static function newTransaction($doc_id, $account_id, $oppt_account_id, $item_id, $qty = 1, $serial = '') {
        if(isset(Yii::$app->user)){
            $uid=Yii::$app->user->id;
        }else{
            $uid=Yii::$app->params['uid'];
        }
        
        
        
        $model = new stockAction();
        $model->doc_id = $doc_id;
        $model->account_id = $account_id;
        $model->oppt_account_id = $oppt_account_id;
        $model->item_id = $item_id;
        $model->qty = $qty;
        $model->serial = $serial;
        $model->user_id = $uid;
        if ($model->save()) {
            return $model->id;
        } else {
            return false;
        }
    }

    public static function primaryKey() {
        return ['id'];
    }

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
            array(['doc_id', 'account_id', 'oppt_account_id', 'item_id', 'qty', 'user_id'], 'required'),
            array(['doc_id', 'account_id', 'oppt_account_id', 'item_id', 'qty', 'user_id'], 'number', 'integerOnly' => true),
            array(['serial'], 'string', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'doc_id', 'account_id', 'oppt_account_id', 'item_id', 'serial', 'qty', 'user_id', 'date', 'sum'], 'safe', 'on' => 'search'),
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
            'OpptAccount' => array(self::BELONGS_TO, 'Accounts', 'oppt_account_id'),
            'Doc' => array(self::BELONGS_TO, 'Docs', 'doc_id'),
            'Item' => array(self::BELONGS_TO, 'Item', 'item_id'),
            'User' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }
    public function getAccount(){
        return $this->hasOne(Accounts::className(), array('id' => 'account_id'));
    }
    public function getOpptAccount(){
        return $this->hasOne(Accounts::className(), array('id' => 'oppt_account_id'));
    }
    public function getDoc(){
        return $this->hasOne(Docs::className(), array('id' => 'doc_id'));
    }
    public function getItem(){
        return $this->hasOne(Item::className(), array('id' => 'item_id'));
    }
    public function getUser(){
        return $this->hasOne(User::className(), array('id' => 'user_id'));
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'doc_id' => Yii::t('app', 'Documenet'),
            'account_id' => Yii::t('app', 'Account'),
            'oppt_account_id' => Yii::t('app', 'Opposite Account'),
            'item_id' => Yii::t('app', 'Item'),
            'serial' => Yii::t('app', 'Serial No.'),
            'qty' => Yii::t('app', 'Qty'),
            'doc_id' => Yii::t('app', 'Document'),
            'user_id' => Yii::t('app', 'User'),
            'date' => Yii::t('app', 'Date'),
            'createDate' => Yii::t('app', 'Action Date'),
            'sum' => Yii::t('app', 'Qty'),
        );
    }

    public function getSearchCriteria($params = []) {
        $query = stockAction::find();




        $query->andFilterWhere([
            'id' => $this->id,
            'item_id' => $this->item_id,
            'account_id' => $this->account_id,
            'oppt_account_id' => $this->oppt_account_id,
            'qty' => $this->qty,
            'user_id' => $this->user_id,
        ]);





        return $query;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $query = $this->getSearchCriteria();




        //$sort = new CSort();
        //$sort->defaultOrder = 'id DESC';


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }





        return new $dataProvider;
    }

    public function getAccountName() {
        if (isset($this->account))
            return $this->account->name;
        return "ERROR:" . $this->account_id;
    }

    public function getItemName() {
        if (isset($this->item))
            return $this->item->name;
        return "ERROR:" . $this->item_id;
    }

    public function getItemSum() {
        $num = stockAction::find()->select('SUM(qty)')->where(['item_id' => $this->item_id])->scalar();
        return $num;
    }

    public function getRefDocLink() {
        if(isset($this->doc))
            $num=$this->doc->docnum;
        else
            $num=$this->doc_id."error";
        
        if(isset($this->doc->docType->name))
            $type=$this->doc->docType->name;
        else
            $type=$this->doc_id."error";

        return Html::a(Html::encode(Yii::t("app", $type) . " #" . $num), yii\helpers\BaseUrl::base() . ("/docs/view/$this->doc_id"));
    }

    public function sum() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = $this->getSearchCriteria();
        $criteria->select = ['account_id','item_id','sum(qty) AS sum'];


        $criteria->groupBy = ['account_id','item_id'];
        //  $criteria->select='SUM(qty)';


        //$sort = new CSort();
        //$sort->defaultOrder = 'id DESC';



        return new \yii\data\ActiveDataProvider( array(
            //$this,
            'query' => $criteria,
            'pagination' => array('pageSize' => 50),
            //'qtySum' => Yii::$app->db->createCommand('SELECT SUM(`qty`) FROM `' . stockAction::table . '`')->queryScalar(),
            //'sort' => $sort,
        ));
    }

}
