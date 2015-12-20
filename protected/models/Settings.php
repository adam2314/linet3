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
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property string $id
 * @property string $value
 */
namespace app\models;

use Yii;
use app\components\basicRecord;
use app\helpers\Linet3Helper;
class Settings extends basicRecord {

    const table = '{{%config}}';

    public function Tmvalidate($attr) {
        //print_r($attr);
        foreach ($attr as $key => $value) {
            if (($key == 'company.name') && ($value['value'] == '')) {
                //echo 'bla';
                Settings::addError('company.name', 'Field "company.name" is invalid...');
            }

            if ($key == 'company.vat.id') {
                if ($value['value'] == '') {
                    Settings::addError('company.vat.id', Yii::t('app', 'Not a valid VAT id'));
                }
                Settings::vatnumVal($key, $value['value']);
            }
        }

        echo \yii\helpers\Json::encode(Settings::getErrors());
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


            $configPath = Linet3Helper::getSetting("company.path");



            $a = \yii\web\UploadedFile::getInstanceByName('Settings[' . $this->id . '][value]');
            //var_dump($a);
            //exit;
            if ($a) {
                
                $this->value = $a;
                $ext = $this->value->extension;

                //$fileName = $yiiBasepath."/files/".$configPath."/settings/".$this->id.".".$ext; 
                //echo $this->id.get_class($this);
                $logo = new \app\models\Files();
                $logo->name = $this->id . "." . $ext; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                $logo->path = "settings/";
                $logo->parent_type = get_class($this);
                $logo->parent_id = $this->id; // this links your picture model to the main model (like your user, or profile model)
                $logo->public = true;
                $id = $logo->save(); // DONE
                //echo $logo->id;
                //Yii::$app->end();
                if ($this->value->saveAs($logo->getFullFilePath())) {
                    $this->value = $logo->hash; //"/files/".$configPath."/settings/".$this->id.".".$ext;
                }


                //Yii::$app->end();
            }
        }
        return parent::save($runValidation, $attributes);
    }

    public function getVersion(){
        return \app\helpers\Linet3Helper::getVersion();
    }
            
    public function a000($line, $id, $count,$begin,$end) {
        $rec = '';

        //get all fields (a000) sort by id
        $fields = OpenFormat::find()->where(['type_id' => "A000"])->all();

        //loop strfgy
        foreach ($fields as $field) {
            //$rec.=basicRecord::openfrmtFieldStr($field,$line);
            if ($field->id == 1004) {
                $rec.=sprintf("%015d", $id);
                continue;
            }
            if ($field->id == 1002) {
                $rec.=sprintf("%015d", $count);
                continue;
            }
            $rec.=$this->openfrmtFieldStr($field, $line,$begin,$end);
        }
        return $rec . "\r\n";
    }

    public function a100($line, $id,$begin,$end) {
        $rec = '';

        //get all fields (b110) sort by id
        $fields = OpenFormat::find()->where(['type_id' => "A100"])->all();

        //loop strfgy
        foreach ($fields as $field) {
            //$rec.=basicRecord::openfrmtFieldStr($field,$line);
            if ($field->id == 1103) {
                $rec.=sprintf("%015d", $id);
                continue;
            }

            $rec.=$this->openfrmtFieldStr($field, $line,$begin,$end);
        }
        return $rec . "\r\n";
    }

    public function z900($line, $id, $count) {
        $rec = '';

        //get all fields (z900) sort by id
        $fields = OpenFormat::find()->where(['type_id' => "Z900"])->all();

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
            array(['id'], 'required'),
            array(['id'], 'string', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['value'], 'safe'),
            array(['id', 'value'], 'safe', 'on' => 'search'),
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
        $criteria->compare('value', $this->value, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
