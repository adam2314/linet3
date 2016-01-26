<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
namespace app\helpers;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use Yii;
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
            $temp = ArrayHelper::map($modelName::findAllByType($type), 'id', 'name');
            $temp[''] = Yii::t('app', 'None');
            //$label = Yii::t('app', $sModel->id) ;
            $field = Html::dropDownList($model . '[' . $key . '][value]', $value, $temp) . "<br/>";
        } elseif (strpos($sModel, "list(") === 0) {
            $modelName = str_replace("list(", "", $sModel);
            $modelName = str_replace(")", "", $modelName);
            $temp = ArrayHelper::map($modelName::find()->All(), 'id', 'name');
            $temp[''] = Yii::t('app', 'None');
            //$label = Yii::t('app', $sModel->id) ;
            $field = \kartik\select2\Select2::widget([
                "name"=>$model . '[' . $key . '][value]',
                "data"=>$temp,
                "value"=>$value,
                    ]);
        } elseif (strpos($sModel, "select(") === 0) {
            $list = str_replace("select(", "", $sModel);
            //echo str_replace(")", "", $list);
            //exit;
            $list = Json::decode(str_replace(")", "", $list));
            foreach ($list as &$item) {
                //print $item;
                $item = Yii::t('app', $item);
            }
            //$temp = Html::listData(\yii\helpers\Json::decode($list), 'id', 'name');
            $temp[''] = Yii::t('app', 'None');
            //$label = Yii::t('app', $sModel->id);
            $field = \kartik\select2\Select2::widget([
                "name"=>$model . '[' . $key . '][value]',
                "data"=>$list,
                "value"=>$value,
                    ]);
        } elseif ($sModel == 'file') {

            $rKey=  str_replace(".", "", $key);
            //$label = Yii::t('app', $sModel->id) ;
            $field = "<div class='row'><div class='btn-group '>".
                    Html::fileInput($model . '[' . $key . '][value]', $value,['style'=>'display:none;','id'=>$model."_". $rKey."_input","accept"=>"image/gif,image/jpeg"]) .
                    Html::hiddenInput($model . '[' . $key . '][value]', $value) .
                    Html::buttonInput(Yii::t('app', 'Choose'), ['id'=>$model ."_". $rKey."_upload"]).
                    Html::buttonInput(Yii::t('app', 'Delete'), ['id'=>$model ."_". $rKey."_remove"]).
                    //"<a href='javascript:del();' class='btn btn-danger'>" . Yii::t('app', 'Delete') . "</a>.
                    "</div></div>";
            $idf=$model."_". $rKey."_input";
            $script = "
                    $(document).on('click','#{$model}_{$rKey}_upload', function () {
                        $('#$idf').click();
                    });
                    $(document).on('click','#{$model}_{$rKey}_remove', function () {
                        //del();
                    });
                        
                    ";
                        Yii::$app->controller->view->registerJs($script, \yii\web\View::POS_READY);
        } elseif ($sModel == 'boolean') {

            //$label = Yii::t('app', $sModel->id);

            $field = Html::hiddenInput($model . '[' . $key . '][value]', false) .
                    Html::checkbox($model . '[' . $key . '][value]', ($value == 'true') ? true : false,['class'=>'form-control']);
        } elseif ($sModel == 'date') {

            //$label = Yii::t('app', $sModel->id);
            $name = str_replace("[", "_", str_replace("]", "_", $model));
            $id= $name."-".$key;
            $rname = $model."[".$key."][value]";
            $timezone=Yii::$app->timezone;
            $base=\yii\helpers\BaseUrl::base();
            $field = <<<java
                    <div class="input-group date">
                        <span class="input-group-addon kv-date-calendar" title="Select date">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    <input type="text" id="$id-disp" class="form-control" name="$rname-w0" value="$value" data-krajee-datecontrol="datecontrol_b5142286" data-datepicker-type="2" data-krajee-kvdatepicker="kvDatepicker_158f0063"></div>
                    <input type="hidden" id="$id" name="$rname">
                    <script>
                        var kvDatepicker_158f0063 = {"autoclose":true,"format":"dd/mm/yyyy"};
                        var datecontrol_37eef6f1 = {"idSave":"$id","url":"$base/datecontrol/parse/convert","type":"date","saveFormat":"Y-m-d","dispFormat":"d/m/Y","asyncRequest":true};
                        jQuery('#$id-disp').datecontrol(datecontrol_37eef6f1);
                        jQuery('#$id-disp').parent().kvDatepicker(kvDatepicker_158f0063);
                    </script>
java;
                    
            //$field.="<script>jQuery('#{$name}{$key}_value').datepicker();</script>";
        } else {
            //$label = Yii::t('app', $sModel->id);
            $field = Html::textInput($model . '[' . $key . '][value]', $value,['class'=>'form-control']);
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
