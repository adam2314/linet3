<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\controllers;

use Yii;
use app\components\LitController;
use app\helpers\Response;
use app\models\Company;
use yii\filters\auth\QueryParamAuth;

class ApiController extends LitController {//RightsController

    public $enableCsrfValidation = false;
    public $company = null;
    private $format = 'json';
    private $translate = array(
        //'permissionts'
        //'install' => 'Company',   //main
        'module' => 'app\models\ModuleLoad',
        'company' => 'app\models\Company', //main
        'user' => 'app\models\User', //main
        'language' => 'app\models\Language', //main
        'acccountry' => 'app\models\AccCountry', //main
        'AuthAssignment' => 'app\models\User', //dual
        'AuthItem' => 'app\models\User', //dual
        'AuthItemChild' => 'app\models\User', //dual
        'bankbook' => 'app\models\Bankbook',
        'bankname' => 'app\models\BankName',
        'settings' => 'app\models\Settings',
        'accounts' => 'app\models\Accounts',
        'acctype' => 'app\models\Acctype',
        'accid6111' => 'app\models\AccId6111',
        'acchist' => 'app\models\AccHist',
        'currates' => 'app\models\Currates',
        'docs' => 'app\models\Docs',
        'doctype' => 'app\models\Doctype',
        'docdetails' => 'app\models\Docdetails',
        'doccheques' => 'app\models\Doccheques',
        'item' => 'app\models\Item',
        'itemcategory' => 'app\models\Itemcategory',
        'inventoryitem' => 'app\models\InventoryItem',
        'itemunit' => 'app\models\Itemunit',
        'itemvatcat' => 'app\models\ItemVatCat',
        'userincomemap' => 'app\models\UserIncomeMap',
        'transactions' => 'app\models\Transactions',
        'files' => 'app\models\Files',
        'paymenttype' => 'app\models\PaymentType',
        'migration' => 'app\models\Migration',
    );

    private function translate($item) {
        if (isset($this->translate[$item]))
            return $this->translate[$item];
        Response::send(404, 'Model does not exists');
    }

    private function hasAccess($path) {
        //echo file_get_contents('php://input');
        //return true;

        $entityBody = \yii\helpers\Json::decode(file_get_contents('php://input')); //\yii\helpers\Json::decode
        Yii::info("input jsond: " . \yii\helpers\Json::encode($entityBody));
        Yii::info("input: " . file_get_contents('php://input'));
        //



        if (isset($entityBody["login_id"])) {
            $model = new \app\models\FormLogin;
            $model->id = $entityBody['login_id'];
            $model->hash = $entityBody['login_hash'];
            //$model->company= $entityBody['login_company'];
            //return true;

            if ($model->apiLogin()) {
                Yii::$app->timezone = Yii::$app->user->getParam('timezone');
                Yii::$app->language = Yii::$app->user->getParam('language');

                if ((int) $entityBody['login_company'] == 0)
                    return true; //no company

                $company = Company::findOne($entityBody['login_company']);
                if ($company !== null) {
                    $this->company = $company->id;
                    Company::loadComp($company);

                    return true;
                }
            } else {
                return false;
            }
        }
        return false;

        //if isGuest() return false

        $arr = explode('/', $path);
        if (!isset($this->translate[$arr[0]])) {
            return false;
        }
        return Yii::$app->user->checkAccess($path);
    }

    private function getVar() {
        $entityBody = \yii\helpers\Json::decode(file_get_contents('php://input'));
        unset($entityBody['login_id']);
        unset($entityBody['login_hash']);
        unset($entityBody['login_company']);
        return $entityBody;
    }

    public function actionSearch($model) {


        if ($this->hasAccess($model . '/search')) {
            $modelName = $this->translate($model);
            $loadedModel = new $modelName;


            $entityBody = $this->getVar();
            // Try to assign POST values to attributes
            foreach ($entityBody as $var => $value) {
                // Does the model have this attribute? If not raise an error
                $find = array();
                if ($loadedModel->hasAttribute($var)) {
                    $find[$var] = $value;
                    //echo $value;
                } else
                    Response::send(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $model));
            }

            $models = $modelName::find()->where($find)->all();
        } else {
            Response::send(403, sprintf(
                            'Error: Mode <b>Search</b> is not implemented for model <b>%s</b>', $model));
        }

        // Did we get some results?
        if (empty($models)) {// No
            Response::send(200, "", 1000);
        } else {
            // Prepare response
            $rows = array();
            foreach ($models as $submodel)
                $rows[] = $submodel->attributes;
            // Send the response
            Response::send(200, $rows);
        }
    }

    public function actionList($model) {
        // Get the respective model instance
        //echo "one";
        //exit;

        if ($this->hasAccess($model . '/list')) {
            $modelName = $this->translate($model);

            $models = $modelName::find()->All();


            if (empty($models)) {
                // No
                Response::send(200, "", 1000);
            } else {
                // Prepare response
                $rows = array();
                foreach ($models as $submodel)
                    $rows[] = $submodel->attributes;
                // Send the response
                Response::send(200, $rows);
            }
        } else {
            Response::send(403, sprintf(
                            'Error: Mode <b>list</b> is not implemented for model <b>%s</b>', $model));
        }

        // Did we get some results?
    }

    /*
     * 
     * Api View (get)
     * 
     */

    public function actionView($model, $id) {
        // Check if id was submitted via GET


        if ($this->hasAccess($model . '/view')) {
            if (!isset($id))
                Response::send(403, 'Error: Parameter <b>id</b> is missing');
            $modelName = $this->translate($model);
            $loadedModel = $modelName::findOne($id);
            if ($loadedModel === null)
                Response::send(404, 'No ' . $model . ' found with id ' . $id);
            else
                Response::send(200, $loadedModel);
        } else {
            Response::send(501, sprintf(
                            'Mode <b>view</b> is not implemented for model <b>%s</b>', $model));
        }



        // Did we find the requested model? If not, raise an error
    }

    public function actionPrint($model, $id) {

        if ($this->hasAccess($model . '/view')) {
            $modelName = $this->translate($model);
            $loadedModel = $modelName::findOne($id);
            if ($loadedModel === null)
                Response::send(404, 'No ' . $model . ' found with id ' . $id);
            else
                Response::send(200, $loadedModel->pdf());
        } else {
            Response::send(501, sprintf(
                            'Mode <b>Print</b> is not implemented for model <b>%s</b>', $model));
        }



        // Did we find the requested model? If not, raise an error
    }

    public function actionSend($model, $id) {

        if ($this->hasAccess($model . '/view')) {
            $modelName = $this->translate($model);
            $loadedModel = $modelName::findOne($id);
            if ($loadedModel === null)
                Response::send(404, 'No ' . $model . ' found with id ' . $id);
            else
                Response::send(200, $loadedModel->mail());
        } else {
            Response::send(501, sprintf(
                            'Mode <b>Send</b> is not implemented for model <b>%s</b>', $model));
        }
    }
    /*
     * 
     * Api Create
     * 
     */

    public function actionCountsum($model) {//docs,account,user,
        if ($this->hasAccess($model . '/countSum')) {
            $modelName = $this->translate($model);
            $companys = Company::find()->All();
            $sum = 0;
            foreach ($companys as $company) {
                //$this->actionSelect();
                $company->select();
                //echo $company->id.';';
                //$modelName::refreshMetaData();
                $sum+=count($modelName::find()->All());
            }
            Response::send(200, $sum);
        } else {
            Response::send(403, sprintf(
                            'Mode <b>CountSum</b> is not implemented for model <b>%s</b>', $model));
        }
    }

    public function actionCountsummonth($model) {//docs,account,user,
        if ($this->hasAccess($model . '/countSumMonth')) {
            $modelName = $this->translate($model);
            $companys = Company::find()->All();
            $sum = 0;
            ///*
            foreach ($companys as $company) {
                //$this->actionSelect();
                $company->select();
                //echo $company->id.';';
                //$modelName::refreshMetaData();

                //$criteria = new CDbCriteria();
                $start = date("Y-m") . "-1 00:00:01";
                $end = date("Y-m-d H:m:i");
                //$criteria->addBetweenCondition('issue_date', $start, $end);
                $sum+=count($modelName::find(['between', 'issue_date', $start, $end])->all());
            }//*/
            Response::send(200, $sum);
        } else {
            Response::send(403, sprintf(
                            'Mode <b>CountSumMonth</b> is not implemented for model <b>%s</b>', $model));
        }
    }

    public function actionCount($model, $type = null) {//docs,account,user,
        //if ($this->hasAccess($model . '/count')) {
            $modelName = $this->translate($model);
            $loadedModel = new $modelName;
            if (($modelName == 'Docs') && ($type != null)) {
                $models = $modelName::findAllByType($type);
                //$models =Docs::findByAttributes(array('doctype' => 8));
            } else {
                $models = $modelName::find()->All();
            }
            Response::send(200, count($models));
        //} else {
            Response::send(403, sprintf(
                            'Mode <b>Count</b> is not implemented for model <b>%s</b>', $model));
        //}
    }

    /*
     * 
     * Api Create
     * 
     */

    public function actionCreate($model) {
        if ($this->hasAccess($model . '/create')) {
            $modelName = $this->translate($model);
            $loadedModel = new $modelName;

            $entityBody = $this->getVar();

            // Try to assign POST values to attributes
            foreach ($entityBody as $var => $value) {
                // Does the model have this attribute? If not raise an error

                if ($loadedModel->hasAttribute($var)) {
                    $loadedModel->$var = $value;
                    //echo $value;
                } else
                    Response::send(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $model));
            }
            // Try to save the model

            try {
                if ($loadedModel->save()) {
                    Response::send(200, $loadedModel);
                } else {

                    Response::send(200, $loadedModel->errors, 1001);
                }
            } catch (\yii\web\HttpException $e) {
                Response::send(500, $e->getMessage());
                //echo 'Caught exception: ', , "\n";
            }
        } else {
            Response::send(403, sprintf(
                            'Mode <b>create</b> is not implemented for model <b>%s</b>', $model));
        }
    }

    /*
     * 
     * Api Update
     * 
     */

    public function actionUpdate($model, $id) {
        // Parse the PUT parameters. This didn't work: parse_str(file_get_contents('php://input'), $put_vars);
        //$json = file_get_contents('php://input'); //$GLOBALS['HTTP_RAW_POST_DATA'] is not preferred: http://www.php.net/manual/en/ini.core.php#ini.always-populate-raw-post-data
        //$put_vars = \yii\helpers\Json::decode($json, true);  //true means use associative array


        if ($this->hasAccess($model . '/update')) {
            $modelName = $this->translate($model);
            $loadedModel = $modelName::findOne($id);

            // Did we find the requested model? If not, raise an error
            if ($loadedModel === null)
                Response::send(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.", $model, $id));

            $entityBody = $this->getVar();
            // Try to assign PUT parameters to attributes
            foreach ($entityBody as $var => $value) {
                // Does model have this attribute? If not, raise an error
                if ($loadedModel->hasAttribute($var))
                    $loadedModel->$var = $value;
                else {
                    Response::send(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $model));
                }
            }
            // Try to save the model
            if ($loadedModel->save())
                Response::send(200, $loadedModel);
            else
            // prepare the error $msg
            // see actionCreate
            // ...
                Response::send(500, $loadedModel->errors, 1001);
        } else {
            Response::send(403, sprintf(
                            'Error: Mode <b>update</b> is not implemented for model <b>%s</b>', $model));
        }
    }

    /*
     * Api Delete
     * 
     */

    public function actionDelete($model, $id) {

        if ($this->hasAccess($model . '/delete')) {
            $modelName = $this->translate($model);
            $loadedModel = $modelName::findOne($id);

            // Was a model found? If not, raise an error
            if ($loadedModel === null)
                Response::send(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.", $model, $id));

            // Delete the model
            $num = $loadedModel->delete();
            if ($num > 0)
                Response::send(200, $num);    //this is the only way to work with backbone
            else
                Response::send(500, sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.", $model, $id));
        } else {
            Response::send(403, sprintf(
                            'Error: Mode <b>delete</b> is not implemented for model <b>%s</b>', $model));
        }
    }

}
