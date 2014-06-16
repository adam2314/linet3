<?php

class Linet3 {

    public static function beginRequest(CEvent $event) {

        if (!isset(Yii::app()->user->install)) {//new install?
            
            if (!Yii::app()->params['newInstall']) {//install process
                ini_set('date.timezone', 'Asia/Tel_Aviv');
                if (!isset(Yii::app()->user->Company)) {
                    Yii::app()->user->setState('Company', 0);
                }

                if (!Yii::app()->user->isGuest) {
                    self::startLinet();
                }
            } else {

                
                Yii::app()->user->setState('install', true);
                Yii::app()->request->redirect('install');
            }
        }
    }

/*     * end beginRequest */

    public static function startLinet() {
        
        if (isset(Yii::app()->user->timezone)) {
            ini_set('date.timezone', Yii::app()->user->timezone);
        }
        if (isset(Yii::app()->user->language)) {
            Yii::app()->language = Yii::app()->user->language;
        }
        if (isset(Yii::app()->user->theme)) {
            Yii::app()->theme = Yii::app()->user->theme;
        }
        if (!isset(Yii::app()->user->OrgDatabase)) {
            $org = array('string' => Yii::app()->db->connectionString, 'prefix' => Yii::app()->db->tablePrefix);
            Yii::app()->user->setState('OrgDatabase', $org);
        }

        if (!isset(Yii::app()->user->menu)) {
            Yii::app()->user->setState('menu', Menu::model()->buildUserMenu());
            //echo 'hell';
        }
        //echo 'hell';
        //EXIT;

        if (Yii::app()->user->Company == 0) {
            //Yii::app()->db->setActive(false);
            //Yii::app()->db->connectionString = Yii::app()->user->OrgDatabase['string'];
            //Yii::app()->db->tablePrefix=Yii::app()->user->OrgDatabase['prefix'];
            //Yii::app()->db->setActive(true);
        } else
        if (isset(Yii::app()->user->Database)) {
            Company::model()->loadComp();
            /*
              Yii::app()->db->setActive(false);
              Yii::app()->db->connectionString = Yii::app()->user->Database->string;
              Yii::app()->db->tablePrefix=Yii::app()->user->Database->prefix;
              Yii::app()->db->setActive(true);

              if(!isset(Yii::app()->user->settings)) { //adam: shuld be cached in memory
              //echo 'run';
              $temp=  Settings::model()->findAll();
              $settings=array();
              foreach ($temp as $key) {
              $settings[$key->id]=$key->value;
              }

              Yii::app()->user->setState('settings',$settings);
              Yii::app()->user->setState('menu',Menu::model()->buildUserMenu());
              } */
        } else {
            //Yii::app()->setController('company');//->redirect(array('company/admin'));
            echo 'לך תבחר חברה!';
            //Yii::app()->end();
            //if(Yii::app()->controller!='company'){
            //echo Yii::app()->controller->id;
            //Yii::app()->redirect('company');
            // Yii::app()->end();
            //}
            //Yii::app()->user->setState('Database','1');
        }
    }

}
