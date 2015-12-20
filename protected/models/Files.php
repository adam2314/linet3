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
 * This is the model class for table "files".
 *
 * The followings are the available columns in table 'files':
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property string $hidden
 * @property string $public
 * @property integer $parent_id
 * @property string $parent_type //parent module name Items,Docs,Accounts...
 * @property $date
 * @property integer $expire //0 nonoe needs to have auto cleanup for temps
 * @property string $hash
 */

namespace app\models;

use Yii;

class Files extends Record {

    const table = '{{%files}}';

    public $handle;

    public function save($runValidation = true, $attributes = NULL) {

        $a = parent::save($runValidation, $attributes);
        if (($this->public) && ($this->hash == '')&& $a) {
            $download = new \app\models\Download;
            $download->file_id = $this->id;
            $download->company_id = Yii::$app->controller->company;
            $this->hash = $download->id = md5(mt_rand());

            $download->save();
            
            $a = parent::save($runValidation, $attributes);
        }

        return $a;
    }

    public function delete() {
        unlink($this->getFullFilePath());
        return parent::delete();
    }

    public function open() {
        $path_parts = pathinfo($this->getFullPath());
        if (!is_dir($path_parts['dirname']))
            mkdir($path_parts['dirname']);
        $this->handle = fopen($this->getFullFilePath(), 'w');
        $this->save();
    }

    public function close() {
        fclose($this->handle);
    }

    public function readFile() {

        return file_get_contents($this->getFullFilePath());
    }

    public function writeFile($text) {
        $this->open();
        fwrite($this->handle, $text);
        $this->close();
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
            array(['name', 'path'], 'required'),
            array(['id', 'expire', 'hidden'], 'number', 'integerOnly' => true),
            array(['name', 'path', 'parent_type', 'hash'], 'string', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'name', 'path', 'hidden', 'public', 'parent_id', 'parent_type', 'date', 'expire', 'hash'], 'safe', 'on' => 'search'),
        );
    }

    public function getFullPath() {
        return Company::getFilePath() . $this->path;
    }

    public function getFullFilePath() {

        return $this->getFullPath() . $this->id;
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
            'path' => Yii::t('app', 'Path'),
            'hidden' => Yii::t('app', 'Hidden'),
            'public' => Yii::t('app', 'Public'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'parent_type' => Yii::t('app', 'Parent Type'),
            'date' => Yii::t('app', 'Date'),
            'expire' => Yii::t('app', 'Expire'), //0-none
            'hash' => Yii::t('app', 'Hash')
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {

        $query = Files::find();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        //if (!$this->validate()) {
        //    return $dataProvider;
        //}

        $query->andFilterWhere([
            //'id' => $this->id,
            'hidden' => $this->hidden,
            //'public' => $this->public,
            'parent_id' => $this->parent_id,
            //'date' => $this->date,
            //'expire' => $this->expire,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'path', $this->path])
                ->andFilterWhere(['like', 'parent_type', $this->parent_type]);
                //->andFilterWhere(['like', 'hash', $this->hash]);
        return $dataProvider;
    }

}
