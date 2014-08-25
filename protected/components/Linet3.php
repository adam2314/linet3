<?php

class Linet3 {

    public static function beginRequest(CEvent $event) {
//Yii::app()->user->logout();
        //if (!isset(Yii::app()->user->install)) {//new install?
        //if (!Yii::app()->params['newInstall']) {//install process
        date_default_timezone_set('Asia/Tel_Aviv');
        
        if (!isset(Yii::app()->user->Company)) {
            Yii::app()->user->setState('Company', 0);
        }

        if (!Yii::app()->user->isGuest) {
            self::setAppData();
            //self::setUserData();
        }
        //check db
        self::checkDb();
        //}
        /* } else {


          Yii::app()->user->setState('install', true);
          Yii::app()->request->redirect('install');
          } */
        //}
    }

    /*     * end beginRequest */

    private static function setAppData() {
        if (isset(Yii::app()->user->timezone)) {
            //ini_set('date.timezone', Yii::app()->user->timezone);
            date_default_timezone_set(Yii::app()->user->timezone);
        }
        if (isset(Yii::app()->user->language)) {
            Yii::app()->language = Yii::app()->user->language;
        }
        if (isset(Yii::app()->user->theme)) {
            Yii::app()->theme = Yii::app()->user->theme;
        }
    }

    private static function checkDb() {
        $install = substr(Yii::app()->request->url, 0, strlen('/install')) === '/install';
        if (!$install) {
            if(!isset(Yii::app()->dbMain)) {
                Yii::app()->request->redirect('/install');
                Yii::app()->end();
            }
        }
    }

    private static function setUserData() {
        //out!
        //if (!isset(Yii::app()->user->OrgDatabase)) {
        //    $org = array('string' => Yii::app()->db->connectionString, 'prefix' => Yii::app()->db->tablePrefix);
        //    Yii::app()->user->setState('OrgDatabase', $org);
        //}
        //if (!isset(Yii::app()->user->menu)) {//company select needs to trigger
        //    Yii::app()->user->setState('menu', Menu::model()->buildUserMenu());
        //}
        //no more in the controller level
        //if (isset(Yii::app()->user->Database)) {
        //Company::model()->loadComp();
        //exit;
        //} else {
        //    echo 'לך תבחר חברה!';
        //Yii::app()->end();
        //}
    }

}
