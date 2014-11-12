<?php

class ApiController extends Controller {//RightsController
    // Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    //Const APPLICATION_ID = 'ASCCPE';

    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';
    private $translate = array(
        //'permissionts'
        //'install' => 'Company',   //main
        'company' => 'Company', //main
        'user' => 'User', //main
        'language' => 'Language', //main
        'acccountry' => 'AccCountry', //main
        'AuthAssignment' => 'User', //dual
        'AuthItem' => 'User', //dual
        'AuthItemChild' => 'User', //dual
        'bankbook' => 'Bankbook',
        'bankname' => 'BankName',
        'settings' => 'Settings',
        'accounts' => 'Accounts',
        'acctype' => 'Acctype',
        'accid6111' => 'AccId6111',
        'acchist' => 'AccHist',
        'docs' => 'Docs',
        'docctype' => 'Doctype',
        'docdetails' => 'Docdetails',
        'doccheques' => 'Doccheques',
        'item' => 'Item',
        'itemcategory' => 'Itemcategory',
        'inventoryitem' => 'InventoryItem',
        'itemunit' => 'Itemunit',
        'itemvatcat' => 'ItemVatCat',
        'userincomemap' => 'UserIncomeMap',
        'transactions' => 'Transactions',
        'files' => 'Files',
    );

    public function init() {
        if (Yii::app()->user->Company != 0) {
            Company::model()->loadComp();
        }
        parent::init();

        Yii::app()->errorHandler->errorAction = 'api/error';
    }

    public function actionError() {

        Response::send(500, 'Unknown error');
    }

    private function translate($item) {
        if (isset($this->translate[$item]))
            return $this->translate[$item];
        Response::send(501, 'Model does not exstis');
    }

    private function hasAccess($path) {
        //echo file_get_contents('php://input');
        $entityBody = CJSON::decode(file_get_contents('php://input')); //CJSON::decode
        Yii::log("input jsond: " . CJSON::encode($entityBody), 'info', 'app');
        Yii::log("input: " . file_get_contents('php://input'), 'info', 'app');
        //
        //var_dump($entityBody);
        //exit;

        if (isset($entityBody["login_id"])) {
            $model = new FormLogin;
            $model->id = $entityBody['login_id'];
            $model->hash = $entityBody['login_hash'];
            //$model->company= $entityBody['login_company'];
            //return true;

            if ($model->apiLogin()) {
                if ((int) $entityBody['login_company'] == 0)
                    return true; //no company
                if (Company::model()->select((int) $entityBody['login_company']))
                    return true; //needs to check access
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
        return Yii::app()->user->checkAccess($path);
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array();
    }

    private function getVar() {
        $entityBody = CJSON::decode(file_get_contents('php://input'));
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

            $models = $modelName::model()->findAllByAttributes($find);
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
        if ($this->hasAccess($model . '/list')) {
            $modelName = $this->translate($model);

            $models = $modelName::model()->findAll();


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
            $loadedModel = $modelName::model()->findByPk($id);
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
            $loadedModel = $modelName::model()->findByPk($id);
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
    

    /*
     * 
     * Api Create
     * 
     */

    public function actionCountSum($model) {//docs,account,user,
        if ($this->hasAccess($model . '/countSum')) {
            $modelName = $this->translate($model);
            $companys = Company::model()->findAll();
            $sum = 0;
            foreach ($companys as $company) {
                //$this->actionSelect();
                Company::model()->select($company->id);
                //echo $company->id.';';
                $modelName::model()->refreshMetaData();
                $sum+=count($modelName::model()->findAll());
            }
            Response::send(200, $sum);
        } else {
            Response::send(403, sprintf(
                            'Mode <b>CountSum</b> is not implemented for model <b>%s</b>', $model));
        }
    }

    public function actionCountSumMonth($model) {//docs,account,user,
        if ($this->hasAccess($model . '/countSumMonth')) {
            $modelName = $this->translate($model);
            $companys = Company::model()->findAll();
            $sum = 0;
            ///*
            foreach ($companys as $company) {
                //$this->actionSelect();
                Company::model()->select($company->id);
                //echo $company->id.';';
                $modelName::model()->refreshMetaData();

                $criteria = new CDbCriteria();
                $start = date("Y-m") . "-1 00:00:01";
                $end = date("Y-m-d H:m:i");
                $criteria->addBetweenCondition('issue_date', $start, $end);
                $sum+=count($modelName::model()->findAllByAttributes(array(), $criteria));
            }//*/
            Response::send(200, $sum);
        } else {
            Response::send(403, sprintf(
                            'Mode <b>CountSumMonth</b> is not implemented for model <b>%s</b>', $model));
        }
    }

    public function actionCount($model, $type = null) {//docs,account,user,
        if ($this->hasAccess($model . '/count')) {
            $modelName = $this->translate($model);
            $loadedModel = new $modelName;
            if (($modelName == 'Docs') && ($type != null)) {
                $models = $modelName::model()->findAllByType($type);
                //$models =Docs::model()->findByAttributes(array('doctype' => 8));
            } else {
                $models = $modelName::model()->findAll();
            }
            Response::send(200, count($models));
        } else {
            Response::send(403, sprintf(
                            'Mode <b>Count</b> is not implemented for model <b>%s</b>', $model));
        }
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
                if ($loadedModel->save()){
                    Response::send(200, $loadedModel);
                }else {
                    // Errors occurred
                    $msg = "<h1>Error</h1>";
                    $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
                    $msg .= "<ul>";
                    foreach ($loadedModel->errors as $attribute => $attr_errors) {
                        $msg .= "<li>Attribute: $attribute</li>";
                        $msg .= "<ul>";
                        foreach ($attr_errors as $attr_error)
                            $msg .= "<li>$attr_error</li>";
                        $msg .= "</ul>";
                    }
                    $msg .= "</ul>";
                    Response::send(200, $msg,1001);
                }
            } catch (CHttpException $e) {
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
        //$put_vars = CJSON::decode($json, true);  //true means use associative array


        if ($this->hasAccess($model . '/update')) {
            $modelName = $this->translate($model);
            $loadedModel = $modelName::model()->findByPk($id);


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
                Response::send(500, $msg);
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
            $loadedModel = $modelName::model()->findByPk($id);

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
