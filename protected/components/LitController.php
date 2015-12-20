<?php

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
use yii\web\Controller;

class LitController extends Controller {
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $layout = 'single';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
                //'accessControl', // perform access control for CRUD operations
        );
    }

    public function init() {
        date_default_timezone_set('Asia/Tel_Aviv');
        if (!\Yii::$app->user->isGuest) {
            \app\helpers\Linet3Helper::SetTheme();
            date_default_timezone_set(\Yii::$app->user->getParam('timezone'));
            \Yii::$app->language = Yii::$app->user->getParam('language');
        }



        if (Yii::$app->params['newInstall']) {
            if ($this->id != 'install') {
                //print "'".Yii::$app->controller->id."'";
                $this->redirect(\yii\helpers\BaseUrl::base() . '/install/index');
                Yii::$app->end();
            }
        } else {

            //include('upgrade.php');
        }

        //Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/yourscript.js');
        return parent::init();
    }

}
