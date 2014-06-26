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
        'docdetails'=>'Docdetails',
        'doccheques' => 'Doccheques',
        'item' => 'Item',
        'itemcategory' => 'Itemcategory',
        'inventoryitem' => 'InventoryItem',
        'itemunit' => 'Itemunit',
        'itemvatcat' => 'ItemVatCat',
        'userincomemap' => 'UserIncomeMap',
        'transaction' => 'Transaction',
        'files' => 'Files',
    );


    public function init() {
        if (Yii::app()->user->Company != 0) {
            Company::model()->loadComp();
        }
        return parent::init();
    }

    private function hasAccess($path) {
        //if isGuest() return false
        return true;

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

    ///*

    public function actionLogin() {
        $entityBody = CJSON::decode(file_get_contents('php://input'));
        if (isset($entityBody)) {

            $model = new FormLogin;
            $model->attributes = $entityBody;
            if ($model->validate() && $model->login()) {
                $this->_sendResponse(200, CJSON::encode("ok"));
            } else {
                $this->_sendResponse(500, CJSON::encode("not ok"));

            }
        }
        Yii::app()->end();
    }

//*/


    public function actionSelect($id) {
        if ($this->hasAccess('/select')) {
            if (Company::model()->select((int) $id))
                $this->_sendResponse(200, CJSON::encode("ok"));
            else {
                $this->_sendResponse(401, CJSON::encode("not ok"));
            }
            Yii::app()->end();
        }
    }

///*





    public function actionLogout() {
        Yii::app()->user->logout();
        $this->_sendResponse(200, CJSON::encode("ok"));

        Yii::app()->end();
    }

//*/


    /*
     * 
     * Api List (get without id)
     * 
     */
/*

    private function search($attr, $modelName) {
        $model = new $modelName;
        $find = array();
        foreach ($attr as $var => $value) {
            if ($model->hasAttribute($var)) {
                $find[$var] = $value;
            }//else throw unkown field?

        }


        return $modelName::model()->findAllByAttributes($find);
    }*/


    public function actionSearch($model) {


        if ($this->hasAccess($model . '/search')) {
            $modelName = $this->translate[$model];
            $loadedModel = new $modelName;



            $entityBody = CJSON::decode(file_get_contents('php://input'));
            // Try to assign POST values to attributes
            foreach ($entityBody as $var => $value) {
                // Does the model have this attribute? If not raise an error
                $find=array();
                if ($loadedModel->hasAttribute($var)) {
                    $find[$var] = $value;
                    //echo $value;
                } else
                    $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $model));

            }

            $models = $modelName::model()->findAllByAttributes($find);
        } else {
            $this->_sendResponse(403, sprintf(
                            'Error: Mode <b>Search</b> is not implemented for model <b>%s</b>', $model));
            Yii::app()->end();
        }

        // Did we get some results?
        if (empty($models)) {
            // No
            $this->_sendResponse(200, sprintf('No items where found for model <b>%s</b>', $_GET['model']));
        } else {
            // Prepare response
            $rows = array();
            foreach ($models as $submodel)
                $rows[] = $submodel->attributes;
            // Send the response
            $this->_sendResponse(200, CJSON::encode($rows));
        }
    }

    public function actionList($model) {
        // Get the respective model instance
        if ($this->hasAccess($model . '/list')) {
            $modelName = $this->translate[$model];

            $models = $modelName::model()->findAll();
        } else {
            $this->_sendResponse(403, sprintf(
                            'Error: Mode <b>list</b> is not implemented for model <b>%s</b>', $model));
            Yii::app()->end();
        }

        // Did we get some results?
        if (empty($models)) {
            // No
            $this->_sendResponse(200, sprintf('No items where found for model <b>%s</b>', $_GET['model']));
        } else {
            // Prepare response
            $rows = array();
            foreach ($models as $submodel)
                $rows[] = $submodel->attributes;
            // Send the response
            $this->_sendResponse(200, CJSON::encode($rows));
        }
    }

    /*
     * 
     * Api View (get)
     * 
     */

    public function actionView($model, $id) {
        // Check if id was submitted via GET
        if (!isset($id))
            $this->_sendResponse(403, 'Error: Parameter <b>id</b> is missing');

        if ($this->hasAccess($model . '/view')) {
            $modelName = $this->translate[$model];
            $loadedModel = $modelName::model()->findByPk($id);
        } else {
            $this->_sendResponse(501, sprintf(
                            'Mode <b>view</b> is not implemented for model <b>%s</b>', $model));
            Yii::app()->end();
        }



        // Did we find the requested model? If not, raise an error
        if (is_null($model))
            $this->_sendResponse(404, 'No Item found with id ' . $id);
        else
            $this->_sendResponse(200, CJSON::encode($loadedModel));
    }

    /*
     * 
     * Api Create
     * 
     */

    public function actionCreate($model) {
        if ($this->hasAccess($model . '/create')) {
            $modelName = $this->translate[$model];
            $loadedModel = new $modelName;
        } else {
            $this->_sendResponse(403, sprintf(
                            'Mode <b>create</b> is not implemented for model <b>%s</b>', $model));
            Yii::app()->end();
        }



        $entityBody = CJSON::decode(file_get_contents('php://input'));

        // Try to assign POST values to attributes
        foreach ($entityBody as $var => $value) {
            // Does the model have this attribute? If not raise an error
            if ($loadedModel->hasAttribute($var)) {
                $loadedModel->$var = $value;
                //echo $value;
            } else


                $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $model));
        }
        // Try to save the model
        if ($loadedModel->save())
            $this->_sendResponse(200, CJSON::encode($loadedModel));
        else {
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
            $this->_sendResponse(500, $msg);
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
            $modelName = $this->translate[$model];
            $loadedModel = $modelName::model()->findByPk($id);
        } else {
            $this->_sendResponse(403, sprintf(
                            'Error: Mode <b>update</b> is not implemented for model <b>%s</b>', $model));
            Yii::app()->end();
        }




        // Did we find the requested model? If not, raise an error
        if ($loadedModel === null)
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.", $model, $id));

        $entityBody = CJSON::decode(file_get_contents('php://input'));
        // Try to assign PUT parameters to attributes
        foreach ($entityBody as $var => $value) {
            // Does model have this attribute? If not, raise an error
            if ($loadedModel->hasAttribute($var))
                $loadedModel->$var = $value;
            else {
                $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $model));
            }
        }
        // Try to save the model
        if ($loadedModel->save())
            $this->_sendResponse(200, CJSON::encode($loadedModel));
        else
        // prepare the error $msg
        // see actionCreate
        // ...
            $this->_sendResponse(500, $msg);
    }

    /*
     * Api Delete
     * 
     */

    public function actionDelete($model, $id) {

        if ($this->hasAccess($model . '/delete')) {
            $modelName = $this->translate[$model];
            $loadedModel = $modelName::model()->findByPk($id);
        } else {
            $this->_sendResponse(403, sprintf(
                            'Error: Mode <b>delete</b> is not implemented for model <b>%s</b>', $model));
            Yii::app()->end();
        }



        // Was a model found? If not, raise an error
        if ($loadedModel === null)
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.", $model, $id));

        // Delete the model
        $num = $loadedModel->delete();
        if ($num > 0)
            $this->_sendResponse(200, CJSON::encode($num));    //this is the only way to work with backbone
        else
            $this->_sendResponse(500, sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.", $model, $id));
    }

    private function _sendResponse($status = 200, $body = '', $content_type = 'text/html') {
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if ($body != '') {
            // send the body
            echo $body;
        } else {
            // create some body messages
            $message = '';

            // this is purely optional, but makes the pages a little nicer to read
            // for your users.  Since you won't likely send a lot of different status codes,
            // this also shouldn't be too ponderous to maintain
            switch ($status) {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            // servers don't always have a signature turned on 
            // (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

            // this should be templated in a real-world solution
            $body = '
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
        </head>
        <body>
            <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
            <p>' . $message . '</p>
            <hr />
            <address>' . $signature . '</address>
        </body>
        </html>';

            echo $body;
        }
        Yii::app()->end();
    }

    private function _getStatusCodeMessage($status) {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

}
