<?php

Yii::import('ext.tinymce.*');

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class RightsController extends RController {
   public $company=null;
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    //public $layout='//layouts/column1';
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
    public $layout = '//layouts/single';

    public function actions() {
        return array(
            'spellchecker' => array(
                'class' => 'TinyMceSpellcheckerAction',
            ),
        );
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }

    public function render($view, $data = NULL, $return = false) {
        if (isset($_POST['minimal'])) {
            echo CJSON::encode(parent::renderPartial($view, $data, true));
        } else {
            return parent::render($view, $data, $return);
        }
    }

    public function init() {
        /*
          if(!isset(Yii::app()->user->Company)){
          Yii::app()->user->setState('Company',0);
          } */
        Yii::log("Selected Company ID: " . Yii::app()->user->Company, 'info', 'app');
        if (Yii::app()->user->Company == 0) {
            if (Yii::app()->controller->id != 'company') {
                //print "'".Yii::app()->controller->id."'";
                $this->redirect(Yii::app()->createAbsoluteUrl('company/index'));
                Yii::app()->end();
            } else {

                Yii::app()->db->setActive(false);
                Yii::app()->db->connectionString = Yii::app()->dbMain->connectionString;
                Yii::app()->db->tablePrefix =Yii::app()->dbMain->tablePrefix;
                Yii::app()->db->username = Yii::app()->dbMain->username;
                Yii::app()->db->password = Yii::app()->dbMain->password;
                Yii::app()->db->setActive(true);
            }
        } else {
            //hasAccess!

            $this->company = Company::model()->findByPk(Yii::app()->user->Company);

            Company::model()->loadComp($this->company);
        }

//*/



        return parent::init();
    }

    /**
     * Denies the access of the user.
     * @param string $message the message to display to the user.
     * This method may be invoked when access check fails.
     * @throws CHttpException when called unless login is required.
     */
    public function accessDenied($message = null) {
        if ($message === null) {
            $message = Rights::t('app', 'No sufficient permissions for current user to perform this action');
        }
        $user = Yii::app()->getUser();
        if ($user->isGuest === true)
            $user->loginRequired();
        else
            throw new CHttpException(403, $message);
    }

}
