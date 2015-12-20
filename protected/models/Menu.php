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
 * This is the model class for table "databasesPerm".
 *
 * The followings are the available columns in table 'databasesPerm':
 * @property integer $id
 * @property string $label
 * @property array $url
 * @property string $icon
 * @property integer $perant
 */

namespace app\models;

use Yii;
use app\components\mainRecord;
class Menu extends mainRecord {

    const table = 'menu';

    public static function primaryKey() {
        return ['id'];
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return (self::table);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['id', 'name'], 'required'),
            array(['id', 'parent', 'order'], 'number', 'integerOnly' => true),
            array(['icon','route'], 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(['id', 'name', 'route', 'icon', 'parent', 'order'], 'safe', 'on' => 'search'),
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Label'),
            'route' => Yii::t('app', 'Url'),
            'icon' => Yii::t('app', 'Icon'),
            'parent' => Yii::t('app', 'parent'),
            'order' => Yii::t('app', 'Sort'),
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
   

    public static function buildUserMenu($settings=[]) {
        if (Yii::$app->user->isGuest) {
            return array(array('label' => Yii::t('app', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::$app->user->isGuest));
        }
        
        $settings['company.doublebook']=\app\helpers\Linet3Helper::getSetting('company.doublebook');
        
        return Menu::buildMenu(0,$settings);
    }

    private static function buildMenu($id,$settings) {

        $known = Menu::find()->where(['parent' => $id])->orderBy('order')->all();//()->where
        $menu = array();
        //var_dump($known);
        //exit;
        foreach ($known as $item) {
            if ((($item->id == 43) ||  ($item->parent == 43)) && ($settings['company.doublebook'] == false)) {//??($item->id == 43) ||
                continue;
            }
            //echo "  ".$item->id." ".$item->label."<br />";
            //$url = str_replace('/', '.', $item->route);
            $url =  $item->route;
            //echo "/".$url.Yii::$app->user->can("/".$url)."<br>\n";
            //echo yii\rbac\ManagerInterface::checkAccess(1,$url);
            //if ((Yii::$app->user->can("/".$url))||($url===null)) {//if has access 
                if(is_null($item->route)){
                    $url='';
                }else{
                    $url =  yii\helpers\BaseUrl::base()."/".$item->route;
                }
                $menu[$item->id] = array('label' => Yii::t('app', $item->name), 'url' => $url, 'icon' => $item->icon, 'items' => Menu::buildMenu($item->id,$settings));
            //}
            //}
        }

        return $menu;
    }

//end menu
}
