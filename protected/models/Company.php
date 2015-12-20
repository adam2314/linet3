<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

/**
 * This is the model class for table "databases".
 *
 * The followings are the available columns in table 'databases':
 * @property integer $id
 * @property string $string
 * @property string $prefix
 */

namespace app\models;

use Yii;
use app\components\mainRecord;
use yii\data\ActiveDataProvider;
use app\helpers\dbMaster;
use app\helpers\Zipper;
use app\models\Accounts;


class Company extends mainRecord {

    const table = 'databases';

    
    public static function primaryKey() {
        return ['id'];
    }
    
    public static function findByPk($id)
    {
        return static::findOne( $id);//, 'status' => self::STATUS_ACTIVE
    }
    
    public function loadSettings() {
        echo 'loadSettings(company) exit';
        exit;
        
        //load also income maps
        $settings = array();
        if (Yii::$app->db->schema->getTableSchema('{{config}}') !== null) {
            Yii::$app->session['menu'] = Menu::buildUserMenu();
        }

        //Yii::$app->session['settings'] = $settings;
    }

    public static function loadComp($database = '') {
        
        //if ($database == '') {
        //    throw new \Exception( Yii::t('app', 'The requested page does not exist.'));
            //$database = Company::findByPk(1);
        //} else {
            
        //}

        Yii::$app->db->close();
        Yii::$app->db->dsn = $database->string;
        Yii::$app->db->tablePrefix = $database->prefix;
        Yii::$app->db->username = $database->user;
        Yii::$app->db->password = $database->password;
        Yii::$app->db->charset = 'utf8';
        Yii::$app->db->open();
        
        
        
        $folder = Yii::$app->params["filePath"] . $database->prefix . DIRECTORY_SEPARATOR;
        if(!is_dir($folder))
            mkdir($folder);
        if(!is_dir($folder . "settings"))
            mkdir($folder . "settings"); //settings
        if(!is_dir($folder . "cert"))
            mkdir($folder . "cert"); //cert
        if(!is_dir($folder . "docs"))
            mkdir($folder . "docs"); //docs
        if(!is_dir($folder . "items"))
            mkdir($folder . "items"); //items
        if(!is_dir($folder . "files"))
            mkdir($folder . "files"); //files
        if(!is_dir($folder . "openformat"))
            mkdir($folder . "openformat"); //openformat
        if(!is_dir($folder . "backup"))
            mkdir($folder . "backup"); //backup
        
        //Yii::$app->user->setState('settings', Yii::$app->session['settings']);
        //Yii::$app->user->setState('menu', Yii::$app->session['menu']);
        //Yii::$app->user->setState('settingsID', $this->id);


        //if (!isset(Yii::$app->user->warehouse)) { //adam: shuld be cached in memory
        if(isset(Yii::$app->user)){
            $user = User::findOne(Yii::$app->user->id);
            if ($user != null) {
                $user->loadUser();
            }
        }
        //}
        //*/
    }

    public function select($id=null) {
        //echo 'run';
        if($id==null){
            $database=$this;
        }else{
            $database = Company::findOne($id);
        }
        //Yii::$app->user->setState('Database', $database);
        //Yii::$app->user->setState('Company', $database->id);

        //Yii::$app->user->Company = $database->id;
        //unset(Yii::$app->user->settings);
        self::loadComp($database);

        //need to chk user income map save
        $user = User::findOne(Yii::$app->user->id);
        if ($user !== null) {
            $user->loadUser();
            return $user->save();
        }
        //Yii::$app->end();
        //exit;
    }

    public function delete() {
        //delete tables

        $connection = Yii::$app->db; //get connection
        $dbSchema = $connection->schema;
        //or $connection->getSchema();
        $tables = $dbSchema->getTableNames(); //returns array of tbl schema's
        foreach ($tables as $tbl) {
            if (strpos($tbl, $this->prefix) === 0) {
                //echo $tbl->rawName, ":<br/>", implode(', ', $tbl->columnNames), "<br/>\n";
                //$dbSchema->dropTable($tbl);
                $command = $connection->createCommand()->dropTable($tbl);
                $command->execute(); // execute the non-query SQL
                //echo "holyshit:". $tbl . "<br/>\n";
            }
        }
        //delete folders

        $folder = $this->getFilePath($this);
        \yii\helpers\FileHelper::removeDirectory($folder);
        //delete db perms

        return parent::delete();
    }

    public function backup() {
        $folder = $this->getFilePath($this);
        $file = $folder . "db.json";
        $dumper = new dbMaster();

        $handle = fopen($file, 'w');
        fwrite($handle, \yii\helpers\Json::encode($dumper->newBackup($this->prefix)));
        fclose($handle);
        Zipper::zip($folder, $folder . "tenant.zip", "backup");



        $file = new Files;
        $file->name = date("d-m-Y_H_i") . ".zip";
        $file->path = 'backup' . DIRECTORY_SEPARATOR;
        $file->save();



        if (!is_dir($folder . $file->path))
            mkdir($folder . $file->path);
        rename($folder . "tenant.zip", $folder . $file->path . $file->id);
        return true;
    }

    public function restore($file) {
        $folder = $this->getFilePath($this);
        if (file_exists($file)) {

            Zipper::unzip($file, $folder);
            $db = new dbMaster;
            //$backup=[];
            if (file_exists($folder . "db.json")) {
                $backup = \yii\helpers\Json::decode(file_get_contents($folder . "db.json"));
                $db->newRestore($backup, Yii::$app->db->tablePrefix);
            }
            
        } else {
            throw new \Exception('The backup file does not exist.');
        }
    }

    static public function getFilePath($company = null) {
        if ($company !== null)
            $configPath = $company->prefix;
        else
            $configPath = Yii::$app->db->tablePrefix;
        return Yii::$app->params["filePath"] . $configPath . DIRECTORY_SEPARATOR;
    }

    private function createDb() {
        $yiiBasepath = Yii::$app->basePath;
        //$mysql=$yiiBasepath."/data/company-lite.sql";


        $master = new dbMaster();
        //$master->loadFile($yiiBasepath . "/data/company-lite.sql", Yii::$app->db->tablePrefix);
        $master->loadFile($yiiBasepath . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "company.sql", $this->prefix);
        
        \app\helpers\Linet3Helper::getOverrides("buildCompany",["dbMaster"=>new $master,'prefix'=>$this->prefix]);
        
        
    }

    public function save($runValidation = true, $attributes = NULL) {
        $a = parent::save($runValidation, $attributes);
        if ($this->prefix == '') {
            $this->string = Yii::$app->dbMain->dsn;
            //$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $this->prefix = "CA" . $this->id . "_";
            //got prefix
            $a = parent::save($runValidation, $attributes);
        }


        //if tables config notexsits
        Yii::$app->db->close();
        Yii::$app->db->dsn = $this->string;
        Yii::$app->db->tablePrefix = $this->prefix;
        Yii::$app->db->open();
        //needs to clear accounts
        if (Yii::$app->db->schema->getTableSchema('{{config}}') === null) {//
            //create tables
            $this->createDb();


            Yii::$app->db->close();
            Yii::$app->db->dsn = $this->string;
            Yii::$app->db->tablePrefix = $this->prefix;
            Yii::$app->db->open();

            \app\helpers\Linet3Helper::setSetting('company.path',$this->prefix);//update path by prefix
            

            //$yiiBasepath = Yii::$app->basePath;

            
            //add permisstions
        } else {     //else
            //table version
            //upgrade
        }

        $perm = new DatabasesPerm;
        $perm->user_id = Yii::$app->user->id;
        $perm->database_id = $this->id;
        $perm->level_id = 1;
        $perm->save();

        return $a;
    }

    /**
     * @return string the associated database table name
     */
    public function getLevel() {
        $level = DatabasesPerm::findOne(array($this->id, Yii::$app->user->id));
        return $level;
    }

    public static function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['string'], 'required'),
            array(['string', 'prefix'], 'string', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(['id', 'string', 'prefix'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        //$this->user_id=Yii::$app->user->id;
        //print($this->user_id.$this->id);
        //Yii::$app->end();
        return array(
            'level' => array(self::HAS_ONE, 'DatabasesPerm', array('database_id' => 'id')),
        );

        //
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'string' => Yii::t('app', 'String'),
            'prefix' => Yii::t('app', 'Prefix'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search($params) {
        //$query = new Query();
        $provider = new ActiveDataProvider([
            'query' => Company::find(),
            'sort' => [
               
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

// get the posts in the current page
        return $provider->getModels();
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Company the static model class
     */


    public function getName() {

        $this->select($this->id);

        //ettings::refresh();
        $name = \app\helpers\Linet3Helper::getSetting('company.name');

        return $name;
    }

}
