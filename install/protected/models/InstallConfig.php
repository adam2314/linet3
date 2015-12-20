<?php
/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\models;

use yii\base\Model;
use Yii;

class InstallConfig extends Model {

    public $dbtype;
    public $dbname;
    public $dbuser;
    public $dbpassword;
    public $dbhost;
    public $dbstring;

    public function attributeLabels() {
        return array(
            'dbtype' => Yii::t('app', 'Database Type'),
            'dbname' => Yii::t('app', 'Database Name'),
            'dbuser' => Yii::t('app', 'Database User'),
            'dbpassword' => Yii::t('app', 'Database Password'),
            'dbhost' => Yii::t('app', 'Database Host'),
            'dbstring' => Yii::t('app', 'Database String'),
        );
    }

    public function make() {
        //make conf file
        //echo $this->dbtype;
        //Yii::$app->end();
        //if ($this->dbtype == 'sqlite') {
        //    $str = "'connectionString' => '" . $this->dbstring . "',";
        //} else {
        $str = "
                'dsn' => 'mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . "',
                'username' => '" . $this->dbuser . "',
                'password' => '" . $this->dbpassword . "',";
        //}

        $new = str_replace("<placeholder>", $str, require 'protected/data/db.php');

        file_put_contents('../protected/config/db.php', $new);
        if (!is_dir("../protected/files/")) {
            mkdir("../protected/files/");
        }
        //make main db
        return $this->makeDB();
    }
    
    public function con(){
         return Yii::$app->set('db',  require('../protected/config/db.php'));
    }
    

    private function makeDB() {
        try {
            $this->con();

            return $this->createDB();
            //$master->loadFile("protected/data/main-data.sql");
        } catch (\yii\db\Exception $e) {

            if ($e->getCode() == 1049) {
                Yii::$app->set('dbTemp1', array(
                    'class' => 'yii\db\Connection',
                    'dsn' => 'mysql:host=' . $this->dbhost . ';',
                    'username' => $this->dbuser,
                    'password' => $this->dbpassword,
                    'charset' => 'utf8',
                        )
                );
                $sql = "CREATE DATABASE " . $this->dbname ." DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
                Yii::$app->dbTemp1->createCommand($sql)->execute();
                echo "Database created successfully";

                $this->con();
                return $this->createDB();
            }

            //var_dump($e);
            throw $e;
            //echo "Crash and Burn:";
            //echo "<br>" . $message;
            //exit;
        }
        return false;
    }

    private function createDB() {
        $master = new \app\helpers\dbMaster;
        return $master->loadFile("../protected/data/main.sql");
    }

    public function rules() {
        return array(
            array(['dbhost', 'dbpassword', 'dbuser', 'dbname', 'dbtype', 'dbstring'], 'safe'),
                //array('type', 'required'),
        );
    }

}
