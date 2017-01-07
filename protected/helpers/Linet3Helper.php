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

use yii;

class Linet3Helper {

    public static function getOverride($function, $params = [],$module=null) {
        if($module!==null){
            //Yii::$app->setModule($module,Yii::$app->modules[$module]);
            $rModule=Yii::$app->getModule($module);
             if(Linet3Helper::ModuleFunction($rModule, $function)){
                 return $rModule->$function($params);
             }
             return null;
        }
        
        foreach (Yii::$app->loadedModules as  $module) {
            \Yii::info("Loded Module: ".$module->className());
            
            if (Linet3Helper::ModuleFunction($module, $function)) {
                return $module->$function($params);
            }
        }
        return null;
    }
    
    
     public static function getOverrides($function, $params = []) {
         $value=[];
        foreach (Yii::$app->loadedModules as  $module) {
            if (Linet3Helper::ModuleFunction($module, $function)) {
                $value[$module->className()]=$module->$function($params);
            }
        }
        return $value;
    }

    public static function ModuleFunction($rModule, $function) {
        return $rModule->hasMethod($function);
        
    }

    public static function getVersion() {
        if (file_exists(Yii::$app->basePath . '/data/version'))
            return file_get_contents(Yii::$app->basePath . '/data/version');
        else
            return "3.1";
    }

    public static function isConsole() {
        if (Yii::$app->defaultRoute == 'help')
            return true;
        else
            return false;
    }

    public static function getUserId() {
        if (isset(Yii::$app->user))
            return Yii::$app->user->id;
        else
            return Yii::$app->params["uid"];
    }

    public static function getSetting($id) {
        if (\Yii::$app->db->schema->getTableSchema('{{%config}}') === null) {
            return false;
        }
        $setting = \app\models\Settings::findOne($id);
        if ($setting === null)
            return '';

        if ($setting->eavType == 'boolean')
            if ($setting->value == 'false')
                return false;
            else
                return true;

        return $setting->value;
    }

    public static function setTheme() {
        $theme = \Yii::$app->user->getParam('theme');
        if ($theme && $theme !== '') {
            Yii::$app->view->theme->pathMap = [
                '@app/views' => '@webroot/themes/' . $theme,
                '@app/widgets' => '@webroot/themes/' . $theme . '/widgets',
                '@app/modules' => '@webroot/themes/' . $theme . '/modules',
            ];
        }
    }

    public static function setSetting($id, $value) {
        if (\Yii::$app->db->schema->getTableSchema('{{%config}}') === null) {
            return false;
        }
        $setting = \app\models\Settings::findOne($id);
        if ($setting === null) {
            return false;
        } else {
            $setting->value = $value;
            return $setting->save();
        }
    }

    public static function numDiff($first, $second, $error = null) {
        if ($error === null)
            $error = self::getSetting("company.sumDiff");
        $diff = $first - $second;

        if (($diff < $error) && ($diff >= $error * -1))
            return true;
        else
            return false;
    }

    public static function vatnumVal($num) {
        /**/
        $counter = 0;
        for ($i = 0; $i < strlen($num); $i++) {
            $digi = substr($num, $i, 1);
            $incNum = $digi * (($i % 2) + 1); //multiply digit by 1 or 2
            $counter += ($incNum > 9) ? $incNum - 9 : $incNum; //sum the digits up and add to counter
        }
        if (!($counter % 10 == 0)) {
            return true;
        }

        return false;
    }
    
    public static function lastDay($month,$year){
        $last = 31;
        while (!checkdate($month, $last, $year)) {
            $last--;
        }
        return $last;
    }
    
    public static function hasLogo() {
        if ($logo = Linet3Helper::getSetting('company.logo') == false) {
            return false;
        }
        
        
        $download = \app\models\Download::findOne(["id" => Linet3Helper::getSetting('company.logo')]);
        if ($download == null)
            return false;
        
        $logo = \app\models\Files::findOne(['id'=>(int) $download->file_id]);
        if($logo==null)
            return false;
        
        return file_exists($logo->getFullFilePath());
    }

    public static function getLogo() {
        if (!\app\helpers\Linet3Helper::isConsole()) {
            return \Yii::$app->urlManager->createAbsoluteUrl("/site/download/" . Linet3Helper::getSetting('company.logo'));
            
            //$base . ;
        } else {   //console
            $download = \app\models\Download::findOne(["id" => Linet3Helper::getSetting('company.logo')]);
            $id = (int) $download->file_id;
            $logo = \app\models\Files::findOne($id);
            return $logo->getFullFilePath();
        }
    }
}
