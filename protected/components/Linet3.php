<?php

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
        if (isset(Yii::app()->user->theme)) {
            Yii::app()->theme = Yii::app()->user->theme;
        }
    }
}
