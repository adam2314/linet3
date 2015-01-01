<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class Linet3 {

    public static function beginRequest(CEvent $event) {

        date_default_timezone_set('Asia/Tel_Aviv');

        if (!isset(Yii::app()->user->Company)) {
            Yii::app()->user->setState('Company', 0);
        }

        if (!Yii::app()->user->isGuest) {
            self::setAppData();
            //self::setUserData();
        }
    }

    /*     * end beginRequest */

    private static function setAppData() {
        if (isset(Yii::app()->user->timezone)) {
            date_default_timezone_set(Yii::app()->user->timezone);
        }
        if (isset(Yii::app()->user->language)) {
            Yii::app()->language = Yii::app()->user->language;
        }
        if (isset(Yii::app()->user->User)) {
            Yii::app()->theme = Yii::app()->user->User->theme;
        }
        //Yii::app()->theme = 'admin4';
        //Yii::app()->theme = 'classic';
    }
}
