<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class InstallConfig extends CFormModel {

    public $dbtype = 'sqlite';
    public $dbname = 'linet';
    public $dbuser = 'root';
    public $dbpassword = 'linet';
    public $dbhost = 'localhost';
    public $dbstring = 'mysql:protected/linet';

    public function make() {
        //make conf file
        //echo $this->dbtype;
        //Yii::app()->end();

        if ($this->dbtype == 'sqlite') {
            $str = "'connectionString' => '" . $this->dbstring . "',";
        } else {
            $str = "'connectionString' => '" . $this->dbstring . "',
                        'username' => '" . $this->dbuser . "',
                        'password' => '" . $this->dbpassword . "',";
        }

        $new = include('protected/data/config.php');
        $new = str_replace("<placeholder>", $str, $new);

        $handle = fopen('protected/config/install.php', 'w');
        fwrite($handle, $new);
        fclose($handle);

        //make main db
        try {
            Yii::app()->db->setActive(false);
            Yii::app()->db->connectionString = $this->dbstring;
            Yii::app()->db->username = $this->dbuser;
            Yii::app()->db->password = $this->dbpassword;
            Yii::app()->db->setActive(true);
            
            $master = new dbMaster();
            $master->loadFile("protected/data/main.sql");
            $master->loadFile("protected/data/main-data.sql");

            
        } catch (CDbException $e) {
            $message = $e->getMessage();
            print $message;
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


