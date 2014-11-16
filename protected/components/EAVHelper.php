<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EAVHelper
 *
 * @author adam
 */
class EAVHelper {
    
    
    public static function addRow($key, $value, $sModel) {
    
        /**Settings**/
    return self::label($key).self::field($key, $value, $sModel).self::error($key);
}


public static function addField($name,$value,$model){
    
    
   return self::field($name,$value, $model);
    
}



private static function field($key, $value, $sModel){
    
    if (strpos($sModel->eavType, "list(") === 0) {
        $modelName = str_replace("list(", "", $sModel->eavType);
        $modelName = str_replace(")", "", $modelName);
        $temp = CHtml::listData($modelName::model()->findAll(), 'id', 'name');
        $temp[''] = Yii::t('app', 'None');
        //$label = Yii::t('app', $sModel->id) ;
        $field = CHtml::dropDownList('Settings[' . $key . '][value]', $value, $temp);
    } elseif (strpos($sModel->eavType, "select(") === 0) {
        $list = str_replace("select(", "", $sModel->eavType);
        $list = CJSON::decode(str_replace(")", "", $list));
        foreach ($list as &$item) {
            //print $item;
            $item = Yii::t('app', $item);
        }
        //$temp = CHtml::listData(CJSON::decode($list), 'id', 'name');
        $temp[''] = Yii::t('app', 'None');
        //$label = Yii::t('app', $sModel->id);
        $field = CHtml::dropDownList('Settings[' . $key . '][value]', $value, $list);
    } elseif ($sModel->eavType == 'file') {


        //$label = Yii::t('app', $sModel->id) ;
        $field = CHtml::fileField('Settings[' . $key . '][value]', $value) .
                CHtml::hiddenField('Settings[' . $key . '][value]', $value) .
                "<a href='javascript:del();'>" . Yii::t('app', 'Delete') . "</a><br />";
    } elseif ($sModel->eavType == 'boolean') {

        //$label = Yii::t('app', $sModel->id);
        
        $field = CHtml::hiddenField('Settings[' . $key . '][value]', false) .
                CHtml::checkbox('Settings[' . $key . '][value]', ($value=='true')?true:false);
    } else {
        //$label = Yii::t('app', $sModel->id);
        $field = CHtml::textField('Settings[' . $key . '][value]', $value);
    }
    return $field;
}

/*
 * 
private static function field($key, $value, $sModel){
    
    if (strpos($sModel->eavType, "list(") === 0) {
        $modelName = str_replace("list(", "", $sModel->eavType);
        $modelName = str_replace(")", "", $modelName);
        $temp = CHtml::listData($modelName::model()->findAll(), 'id', 'name');
        $temp[''] = Yii::t('app', 'None');
        //$label = Yii::t('app', $sModel->id) ;
        $field = CHtml::dropDownList('Settings[' . $sModel->id . '][value]', $sModel->value, $temp);
    } elseif (strpos($sModel->eavType, "select(") === 0) {
        $list = str_replace("select(", "", $sModel->eavType);
        $list = CJSON::decode(str_replace(")", "", $list));
        foreach ($list as &$item) {
            //print $item;
            $item = Yii::t('app', $item);
        }
        //$temp = CHtml::listData(CJSON::decode($list), 'id', 'name');
        $temp[''] = Yii::t('app', 'None');
        //$label = Yii::t('app', $sModel->id);
        $field = CHtml::dropDownList('Settings[' . $sModel->id . '][value]', $sModel->value, $list);
    } elseif ($sModel->eavType == 'file') {


        //$label = Yii::t('app', $sModel->id) ;
        $field = CHtml::fileField('Settings[' . $sModel->id . '][value]', $sModel->value) .
                CHtml::hiddenField('Settings[' . $sModel->id . '][value]', $sModel->value) .
                "<a href='javascript:del();'>" . Yii::t('app', 'Delete') . "</a><br />";
    } elseif ($sModel->eavType == 'boolean') {

        //$label = Yii::t('app', $sModel->id);

        $field = CHtml::checkbox('Settings[' . $sModel->id . '][value]', $sModel->value) .
                CHtml::hiddenField('Settings[' . $sModel->id . '][value]', $sModel->value);
    } else {
        //$label = Yii::t('app', $sModel->id);
        $field = CHtml::textField('Settings[' . $sModel->id . '][value]', $sModel->value);
    }
    return $field;
}
 * 
 * 
 */




private static function label($id){
    return "<label for='$id'>".Yii::t('app', $id)."</label>";
    
}
private static function error($id){
    return '<span style="display: none" id="Settings_' . $id . '_em" class="help-block error"></span>';
}
    //put your code here
}
