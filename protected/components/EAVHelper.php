<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class EAVHelper {

    public static function addRow($key, $value, $sModel, $model = "Settings") {

        /*         * Settings* */
        if (isset($sModel->eavType))
            $sModel = $sModel->eavType;

        return self::label($key) . self::field($key, $value, $sModel, $model) . self::error($key, $model);
    }

    public static function addField($name, $value, $model) {


        return self::field($name, $value, $model);
    }

    private static function field($key, $value, $sModel, $model) {

        if (strpos($sModel, "listT(") === 0) {
            $modelName = str_replace("listT(", "", $sModel);
            $modelName = str_replace(")", "", $modelName);
            $type = substr($modelName, strpos($modelName, '[') + 1, strpos($modelName, '[') - strpos($modelName, ']') + 1);
            //echo $type;
            //exit;

            $modelName = str_replace("[" . $type . "]", "", $modelName);
            $temp = CHtml::listData($modelName::model()->findAllByType($type), 'id', 'name');
            $temp[''] = Yii::t('app', 'None');
            //$label = Yii::t('app', $sModel->id) ;
            $field = CHtml::dropDownList($model . '[' . $key . '][value]', $value, $temp) . "<br/>";
        } elseif (strpos($sModel, "list(") === 0) {
            $modelName = str_replace("list(", "", $sModel);
            $modelName = str_replace(")", "", $modelName);
            $temp = CHtml::listData($modelName::model()->findAll(), 'id', 'name');
            $temp[''] = Yii::t('app', 'None');
            //$label = Yii::t('app', $sModel->id) ;
            $field = CHtml::dropDownList($model . '[' . $key . '][value]', $value, $temp) . "<br/>";
        } elseif (strpos($sModel, "select(") === 0) {
            $list = str_replace("select(", "", $sModel);
            $list = CJSON::decode(str_replace(")", "", $list));
            foreach ($list as &$item) {
                //print $item;
                $item = Yii::t('app', $item);
            }
            //$temp = CHtml::listData(CJSON::decode($list), 'id', 'name');
            $temp[''] = Yii::t('app', 'None');
            //$label = Yii::t('app', $sModel->id);
            $field = CHtml::dropDownList($model . '[' . $key . '][value]', $value, $list) . "<br/>";
        } elseif ($sModel == 'file') {


            //$label = Yii::t('app', $sModel->id) ;
            $field = CHtml::fileField($model . '[' . $key . '][value]', $value) .
                    CHtml::hiddenField($model . '[' . $key . '][value]', $value) .
                    "<a href='javascript:del();'>" . Yii::t('app', 'Delete') . "</a><br />";
        } elseif ($sModel == 'boolean') {

            //$label = Yii::t('app', $sModel->id);

            $field = CHtml::hiddenField($model . '[' . $key . '][value]', false) .
                    CHtml::checkbox($model . '[' . $key . '][value]', ($value == 'true') ? true : false);
        } elseif ($sModel == 'date') {

            //$label = Yii::t('app', $sModel->id);

            $field = CHtml::textField($model . '[' . $key . '][value]', $value, array('class' => 'date'));
            $name = str_replace("[", "_", str_replace("]", "_", $model));
            $field.="<script>
jQuery('#{$name}{$key}_value').datepicker();</script>";
        } else {
            //$label = Yii::t('app', $sModel->id);
            $field = CHtml::textField($model . '[' . $key . '][value]', $value);
        }
        return $field;
    }

    private static function label($id) {
        return "<label for='$id'>" . Yii::t('app', $id) . "</label>";
    }

    private static function error($id, $model) {
        return '<span style="display: none" id="' . $model . '_' . $id . '_em" class="help-block error"></span>';
    }

}
