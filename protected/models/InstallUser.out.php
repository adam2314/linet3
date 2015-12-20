<?php

/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class InstallUser extends CFormModel {
	public $fname='sqlite';
        public $lname='linet.db';
        public $dbuser='linet';
        public $dbpassword='linet';
        public $dbhost='localhost';
        
        public $dbstring='sqlite:protected/data/linet.db';
        
        
        public function make(){
            //make conf file
            //echo $this->dbtype;
            //Yii::$app->end();
            
            if($this->dbtype=='sqlite'){
                $str="'connectionString' => '".$this->dbstring."',"; 
            }else{
                $str="'connectionString' => '".$this->dbstring."',
                        'username' => '".$this->dbuser."',
                        'password' => '".$this->dbpassword."',";
            }
            
            $new=include('protected/data/config.php');
            $new=  str_replace("<placeholder>", $str, $new);
            
            $handle=fopen('protected/config/install.php', 'w');
            fwrite($handle, $new);
            fclose($handle);
            
            
            
            
            //make main db
            
            $mysql="protected/data/main.sql";
            if (file_exists($mysql)){
                
                Yii::$app->db->close();
                Yii::$app->db->dsn = $this->dbstring;
                Yii::$app->db->username=$this->dbuser;
                Yii::$app->db->password=$this->dbpassword;
                Yii::$app->db->open();
                
                dbMaster::loadFile($mysql);
                
                /*
                $sqlArray = file_get_contents($mysql);


                //print $sqlArray;
                $cmd = Yii::$app->db->createCommand($sqlArray);
                //$cmd->execute();
                try{
                        $cmd->execute();
                }
                catch(\yii\db\Exception $e){
                        $message = $e->getMessage();
                        print $message;
                }*/
            } else{
                throw new \yii\db\Exception(Yii::t('app','Cant find Company template file unable to create database'));
                
            }
            
            
            
            return true;
        }
        
        
	public function rules() {
		return array(
                        array('dbhost, dbpassword, dbuser, dbname, dbtype, dbstring', 'safe'),
			//array('type', 'required'),
		);
	}

	
}