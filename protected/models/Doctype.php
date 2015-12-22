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
 * This is the model class for table "docType".
 *
 * The followings are the available columns in table 'docType':
 * @property integer $id
 * @property string $name
 * @property integer $openformat
 * @property integer $isdoc
 * @property integer $isrecipet
 * @property integer $iscontract
 * @property integer $stockAction
 * @property integer $account_type
 * @property integer $docStatus_id
 * @property integer $last_docnum
 */
namespace app\models;

use Yii;

class Doctype extends Record {

    
    
    
    const table = '{{%docType}}';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Doctype the static model class
     */
   
     public static function getList($const=null){
        //if($const===null){
            $arr= self::find()->All();
            
            //
        //}
        
        foreach($arr as &$item){
            $item->name=Yii::t('app',$item->name);
        }
        
        
        return \yii\helpers\ArrayHelper::map($arr, 'id', 'name');
    }
    
    
    public static function getOpenType($key) {
        //$this->find
        $tmp = Doctype::find()->where(['openformat' => $key])->one();
        if ($tmp !== null)
            return Yii::t('app', $tmp->name);
        else {
            Yii::log("OpenFormat Import: no type:" . $key, 'error', 'app');
            //Yii::$app->end();
            return '';
        }
        // return isset($this->docType)?$this->docType->openformat:"";
    }

    public static function primaryKey() {
        return ['id'];
    }

    /**
     * @return string the associated database table name
     */
    public function delete() {
        if ($this->id >= 16) {//protect all sys docs
            return parent::delete();
        } else {
            return false;
        }
    }

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
            array(['name', 'openformat', 'isdoc', 'isrecipet', 'iscontract', 'stockAction', 'account_type', 'docStatus_id', 'last_docnum'], 'required'),
            array(['openformat', 'isdoc', 'isrecipet', 'iscontract', 'stockAction', 'account_type', 'docStatus_id', 'last_docnum'], 'number', 'integerOnly' => true),
            array(['name'], 'string', 'max' => 255),
            array(['header', 'footer'], 'safe'),
            [['last_docnum'], 'last_docnumVal'],
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'name', 'openformat', 'isdoc', 'isrecipet', 'iscontract', 'stockAction', 'account_type', 'docStatus_id', 'last_docnum'], 'safe', 'on' => 'search'),
        );
    }

    public function last_docnumVal($attribute, $params) {
        $num=Docs::getMax($this->id);
        if($num!=null){
            if ((docs::getMax($this->id)!=($this->$attribute))) {
                $this->addError($attribute, Yii::t('app', 'Not a valid number, last number:').$num);
            }
        }
        
        return true;
    }
    public function issue_label(){
        if($this->issueLabel==null)
            return false;
        return Yii::t('app', $this->issueLabel);
        
    }
    public function due_label(){
        if($this->dueLabel==null)
            return false;
        return Yii::t('app', $this->dueLabel);
        
    }
    public function ref_label(){
        if($this->refLabel==null)
            return false;
        return Yii::t('app', $this->refLabel);
        
    }
    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.);

        return array(
            'docStatus' => array(self::BELONGS_TO, 'Docstatus', array('docStatus_id' => 'num', 'id' => 'doc_type')),
        );
    }

    public function getType($name) {
        $model = Doctype::find()->where(['name'=> ucfirst($name)])->one();
        return $model->id;
    }

    public function getOType($type) {
        $model = Doctype::find()->where(['openformat' => $type])->one();
        if ($model === null)
            return 0;

        return $model->id;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'openformat' => Yii::t('app', 'Open Format'),
            'isdoc' => Yii::t('app', 'Is Document'),
            'isrecipet' => Yii::t('app', 'Is Recipet'),
            'iscontract' => Yii::t('app', 'Is Contract'),
            'stockAction' => Yii::t('app', 'Stock Action'),
            'account_type' => Yii::t('app', 'Account Type'),
            'docStatus_id' => Yii::t('app', 'Document Status'),
            'last_docnum' => Yii::t('app', 'Last Document num'),
            'header' => Yii::t('app', 'Header'),
            'footer' => Yii::t('app', 'Footer'),
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
        $criteria->compare('openformat', $this->openformat);
        $criteria->compare('isdoc', $this->isdoc);
        $criteria->compare('isrecipet', $this->isrecipet);
        $criteria->compare('iscontract', $this->iscontract);
        $criteria->compare('stockAction', $this->stockAction);
        $criteria->compare('account_type', $this->account_type);
        $criteria->compare('docStatus_id', $this->docStatus_id);
        $criteria->compare('last_docnum', $this->last_docnum);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function tlist(){
        $array=\yii\helpers\ArrayHelper::map(\app\models\Doctype::find()->All(), 'id', 'name');
        foreach($array as $id=>$name){
            $array[$id]=Yii::t('app',$name);
        }
        return $array;
    }
}
