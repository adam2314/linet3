<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
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
            //Yii::app()->end();
            
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
                
                Yii::app()->db->setActive(false);
                Yii::app()->db->connectionString = $this->dbstring;
                Yii::app()->db->username=$this->dbuser;
                Yii::app()->db->password=$this->dbpassword;
                Yii::app()->db->setActive(true);
                
                dbMaster::loadFile($mysql);
                
                /*
                $sqlArray = file_get_contents($mysql);


                //print $sqlArray;
                $cmd = Yii::app()->db->createCommand($sqlArray);
                //$cmd->execute();
                try{
                        $cmd->execute();
                }
                catch(CDbException $e){
                        $message = $e->getMessage();
                        print $message;
                }*/
            } else{
                throw new CDbException(Yii::t('app','Cant find Company template file unable to create database'));
                
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