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
 * This is the model class for table "databasesPerm".
 *
 * The followings are the available columns in table 'databasesPerm':
 * @property integer $id
 * @property string $label
 * @property array $url
 * @property string $icon
 * @property integer $perant
 */
class Menu extends mainRecord {

    const table = 'menu';

    public function primaryKey() {
        return 'id';
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return (self::table);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, label', 'required'),
            array('id, parent, sort', 'numerical', 'integerOnly' => true),
            array('icon', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, label, url, icon, parent, sort', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Parent' => array(self::BELONGS_TO, 'Menu', 'parent'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('label', 'ID'),
            'label' => Yii::t('label', 'Label'),
            'url' => Yii::t('label', 'Url'),
            'icon' => Yii::t('label', 'Icon'),
            'parent' => Yii::t('label', 'parent'),
            'sort' => Yii::t('label', 'Sort'),
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('label', $this->label, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('icon', $this->icon, true);
        $criteria->compare('parent', $this->parent);
        $criteria->compare('sort', $this->sort, true);
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DatabasesPerm the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function buildUserMenu() {
        if (Yii::app()->user->isGuest) {
            return array(array('label' => Yii::t('app', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest));
        }

        return Menu::buildMenu(0);
    }

    private static function buildMenu($id) {

        $known = Menu::model()->findAllByAttributes(array('parent' => $id),array('order'=>'sort'));
        $menu = array();
        foreach ($known as $item) {
            if ((($item->id == 43) || ($item->id == 43) || ($item->parent == 43)) && (Yii::app()->user->settings['company.doublebook'] == 'false')) {
                continue;
            }
            //echo "  ".$item->id." ".$item->label."<br />";
            $url = str_replace('/', '.', $item->url);
            if (Yii::app()->user->checkAccess($url)) {//if has access
                $url = Yii::app()->createAbsoluteUrl('/' . $item->url);
                
                $menu[$item->id] = array('label' => Yii::t('app', $item->label), 'url' => $url, 'icon' => $item->icon, 'items' => Menu::buildMenu($item->id));
            }
            //}
        }
        return $menu;
    }

//end menu
}
