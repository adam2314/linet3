<?php

//Yii::import('ext.tinymce.*');

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\components;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Company;

//use app\models\LoginForm;
//use app\models\ContactForm;

class RightsController extends Controller {

    public $company = 0;

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    //public $layout='//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = [];

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = [];
    public $layout = '//single';

    public function actions() {
        return array(
                //'spellchecker' => array(
                //    'class' => 'TinyMceSpellcheckerAction',
                //),
        );
    }

    /**
     * @return array action filters
     */
    public function filters() {
        //return array(
        //    'rights', // perform access control for CRUD operations
        //);
    }

    /*
      public function beforeAction($action) {
      if(Yii::$app->user->isGuest){
      throw new \Exception('Go Login');
      }
      if (Yii::$app->user->can($action->controller->id . "/" . $action->id)) {
      return parent::beforeAction($action);
      } else
      throw new \Exception('access dinaied');
      }
     */

    public function render($view, $data = NULL, $return = false) {
        if (isset($_POST['minimal'])) {
            echo \yii\helpers\Json::encode(parent::renderPartial($view, $data, true));
        } else {
            return parent::render($view, $data, $return);
        }
    }

    public function init() {
        date_default_timezone_set('Asia/Tel_Aviv');
        //\Yii::$app->language = 'he_il';
        //if ($this->company==null) {
        //    Yii::$app->user->Set('Company', 0);
        //}

        if (!Yii::$app->user->isGuest) {
            \app\helpers\Linet3Helper::SetTheme();
            date_default_timezone_set(Yii::$app->user->getParam('timezone'));
            Yii::$app->language = Yii::$app->user->getParam('language');
            Yii::$app->timezone = Yii::$app->user->getParam('timezone');
            //Yii::$app->theme = Yii::$app->user->getParam('theme');
            if (isset(Yii::$app->session['company'])) {
                $this->company = Yii::$app->session['company'];
                //if(Yii::$app->user->getParam('company')!=0){
                //    $this->company = Yii::$app->user->getParam('company');
                //Yii::$app->session['company']=0;
                //}
            }
        } else {
            //default theme
            //Yii::$app->theme = 'admin4';
        }


        Yii::info("Selected Company ID: " . $this->company);
        if ($this->company == 0) {
            if ($this->id != 'company') {
                //print "'".Yii::$app->controller->id."'";
                $this->redirect(\yii\helpers\BaseUrl::base() . '/company/index');
                Yii::$app->end();
            } else {

                //echo $this->id;
                //Yii::$app->end();
                Yii::$app->db->close();
                Yii::$app->db->dsn = Yii::$app->dbMain->dsn;
                Yii::$app->db->tablePrefix = Yii::$app->dbMain->tablePrefix;
                Yii::$app->db->username = Yii::$app->dbMain->username;
                Yii::$app->db->password = Yii::$app->dbMain->password;
                Yii::$app->db->open();
            }
        } else {
            //hasAccess!
            //$this->company = Company::findByPk($this->company);
            $company = Company::findOne($this->company);
            if ($company !== null)
                Company::loadComp($company);
            else
                $this->redirect(\yii\helpers\BaseUrl::base() . '/company/index');
        }

//*/



        return parent::init();
    }

    /**
     * Denies the access of the user.
     * @param string $message the message to display to the user.
     * This method may be invoked when access check fails.
     * @throws HttpException when called unless login is required.
     */
    public function accessDenied($message = null) {
        if ($message === null) {
            $message = Rights::t('app', 'No sufficient permissions for current user to perform this action');
        }
        $user = Yii::$app->getUser();
        if ($user->isGuest === true)
            $user->loginRequired();
        else
            throw new \yii\web\HttpException(403, $message);
    }

    public function hasCallback() {
        if (Yii::$app->request->get('callback')) {
            $this->redirect($this->callback());
            return 1;
        }
        return 0;
    }

    public function callback() {
        if (Yii::$app->request->get('callback')) {
            return "/" . Yii::$app->request->get('callback');
        }
        return "";
    }

}
