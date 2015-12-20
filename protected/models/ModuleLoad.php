<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use app\helpers\dbMaster;
use Yii;

class ModuleLoad {

    public $moduleName = '';
    public $fullName='';
    public $errors = [];

    public function save() {
        return \app\helpers\Linet3Helper::getOverride("buildDB",["dbMaster"=>new dbMaster()],$this->moduleName);
    }

    public function delete() {
        return \app\helpers\Linet3Helper::getOverride("removeDB",["dbMaster"=>new dbMaster()],$this->moduleName);
    }

    public function findOne($moduleName) {//(id like)

        if (Yii::$app->getModule($moduleName) !== null) {
            $model = new ModuleLoad;
            $model->moduleName = $moduleName;
            $model->fullName=Yii::$app->getModule($moduleName)->className();
            
            return $model;
        }

        return null;
    }

    public function hasAttribute($var) {
        if ($var == "moduleName")
            return true;
        return false;
    }

}
