<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
/**
 * This is the model class for table "cheques".
 *
 * The followings are the available columns in table 'cheques':
 */
class DocchequesEav extends basicRecord {

    const table = '{{docChequesAttr}}';

    //private $dateDBformat = true;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Cheques the static model class
     */
    public function primaryKey() {
        return array('doc_id', 'line','attribute');
    }

//*/

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('doc_id, line', 'numerical', 'integerOnly' => true),
            array('currency_id, refnum, cheque_date, dep_date', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Doc' => array(self::BELONGS_TO, 'Docs', 'doc_id'),
            'DocLine' => array(self::BELONGS_TO, 'Doccheques', array("doc_id",'line')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'doc_id' => Yii::t('labels', 'Documenet ID'),
            'line' => Yii::t('labels', 'Line'),
            'attribute' => Yii::t('labels', 'Attribute'),
            'value' => Yii::t('labels', 'Value'),
        );
    }

    
    public function printDetailes(){
        $model=  PaymentType::model()->findByPk($this->type);
        //echo CJSON::encode("echo ".$model->value);
        
        if($model->value==''){
            echo CJSON::encode(array($_POST['bill']['line'],false));
            Yii::app()->end();
        }
        
        
        $form=new $model->value;
        //$form->type=$id;
        //$form->sum=$_POST['bill']['sum'];
        //$form->line=$_POST['bill']['line'];
        $text='';
        foreach($form->printDetailes() as $field=>$type){
            $text.=$field.':'."value".", ";
            
        }
        return $text;
    }
    
    
    
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('doc_id', $this->doc_id, true);
        $criteria->compare('attribute',$this->attribute);
        $criteria->compare('line', $this->line);
        $criteria->compare('value', $this->value, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
        ));
    }

}
