<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

/**
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property string $id
 * @property string $value
 */
class Settings extends basicRecord {

    const table = '{{config}}';

    public static function Tmvalidate($attr) {
        //print_r($attr);
        foreach ($attr as $key => $value) {
            if (($key == 'company.name') && ($value['value'] == '')) {
                //echo 'bla';
                Settings::model()->addError('company.name', 'Field "company.name" is invalid...');
            }

            if ($key == 'company.vat.id') {
                if ($value['value'] == '') {
                    Settings::model()->addError('company.vat.id', Yii::t('app', 'Not a valid VAT id'));
                }
                Settings::model()->vatnumVal($key, $value['value']);
            }
        }

        echo CJSON::encode(Settings::model()->getErrors());
        //return parent::validate($attr);
    }

    public function vatnumVal($attribute, $value) {
        if (Linet3Helper::vatnumVal($value)) {
            $this->addError($attribute, Yii::t('app', 'Not a valid VAT id'));
        }
    }

    public function save($runValidation = true, $attributes = NULL) {
        //adam:
        if ($this->eavType == 'boolean') {
            if ($this->value == '1')
                $this->value = 'true';
            else
                $this->value = 'false';
        }else if ($this->eavType == 'file') {


            $configPath = Yii::app()->user->getSetting("company.path");



            $a = CUploadedFile::getInstanceByName('Settings[' . $this->id . '][value]');
            if ($a) {
                //exit;
                $this->value = $a;
                $ext = $this->value->extensionName;

                //$fileName = $yiiBasepath."/files/".$configPath."/settings/".$this->id.".".$ext; 
                //echo $this->id.get_class($this);
                $logo = new Files();
                $logo->name = $this->id . "." . $ext; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                $logo->path = "settings/";
                $logo->parent_type = get_class($this);
                $logo->parent_id = $this->id; // this links your picture model to the main model (like your user, or profile model)
                $logo->public = true;
                $id = $logo->save(); // DONE
                //echo $logo->id;
                //Yii::app()->end();
                if ($this->value->saveAs($logo->getFullFilePath())) {
                    $this->value = $logo->hash; //"/files/".$configPath."/settings/".$this->id.".".$ext;
                }


                //Yii::app()->end();
            }
        }
        return parent::save($runValidation, $attributes);
    }

    public function a000($line, $id, $count) {
        $rec = '';

        //get all fields (b110) sort by id
        $criteria = new CDbCriteria;
        $criteria->condition = "type_id = :type_id";
        $criteria->params = array(':type_id' => "A000");
        $fields = OpenFormat::model()->findAll($criteria);

        //loop strfgy
        foreach ($fields as $field) {
            //$rec.=basicRecord::model()->openfrmtFieldStr($field,$line);
            if ($field->id == 1004) {
                $rec.=sprintf("%015d", $id);
                continue;
            }
            if ($field->id == 1002) {
                $rec.=sprintf("%015d", $count);
                continue;
            }
            $rec.=$this->openfrmtFieldStr($field, $line);
        }
        return $rec . "\r\n";
    }

    public function a100($line, $id) {
        $rec = '';

        //get all fields (b110) sort by id
        $criteria = new CDbCriteria;
        $criteria->condition = "type_id = :type_id";
        $criteria->params = array(':type_id' => "A100");
        $fields = OpenFormat::model()->findAll($criteria);

        //loop strfgy
        foreach ($fields as $field) {
            //$rec.=basicRecord::model()->openfrmtFieldStr($field,$line);
            if ($field->id == 1103) {
                $rec.=sprintf("%015d", $id);
                continue;
            }

            $rec.=$this->openfrmtFieldStr($field, $line);
        }
        return $rec . "\r\n";
    }

    public function z900($line, $id, $count) {
        $rec = '';

        //get all fields (b110) sort by id
        $criteria = new CDbCriteria;
        $criteria->condition = "type_id = :type_id";
        $criteria->params = array(':type_id' => "Z900");
        $fields = OpenFormat::model()->findAll($criteria);

        //loop strfgy
        foreach ($fields as $field) {
            if ($field->id == 1153) {
                $rec.=sprintf("%015d", $id);
                continue;
            }
            if ($field->id == 1155) {
                $rec.=sprintf("%015d", $count);
                continue;
            }
            $rec.=$this->openfrmtFieldStr($field, $line);
        }
        return $rec . "\r\n";
    }

    public function primaryKey() {
        return 'id';
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Config the static model class
     */
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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id', 'required'),
            array('id', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('value', 'safe'),
            array('id, value', 'safe', 'on' => 'search'),
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
            'id' => Yii::t('labels', 'ID'),
            'value' => Yii::t('labels', 'Value'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('value', $this->value, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
