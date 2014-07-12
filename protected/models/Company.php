<?php

/**
 * This is the model class for table "databases".
 *
 * The followings are the available columns in table 'databases':
 * @property integer $id
 * @property string $string
 * @property string $prefix
 */
class Company extends mainRecord {

    const table = 'databases';

    public function loadSettings() {
        //load also income maps
        $temp = Settings::model()->findAll();
        $settings = array();
        foreach ($temp as $key) {
            $settings[$key->id] = $key->value;
        }

        Yii::app()->user->setState('settings', $settings);
        Yii::app()->user->setState('menu', Menu::model()->buildUserMenu());
    }

    public function loadComp($database = '') {
        if ($database == '') {
            $database = Yii::app()->user->Database;
        } else {
            
        }

        Yii::app()->db->setActive(false);
        Yii::app()->db->connectionString = $database->string;
        Yii::app()->db->tablePrefix = $database->prefix;
        Yii::app()->db->username = $database->user;
        Yii::app()->db->password = $database->password;
        Yii::app()->db->charset = 'utf8';
        Yii::app()->db->setActive(true);

        if (!isset(Yii::app()->user->settings)) { //adam: shuld be cached in memory
            //echo 'run';
            $this->loadSettings();
        }
    }

    public function select($id) {
        $database = Company::model()->findByPk($id);
        Yii::app()->user->setState('Database', $database);
        Yii::app()->user->setState('Company', $database->id);
        unset(Yii::app()->user->settings);
        $this->loadComp($database);

        //need to chk user income map save
        $user = User::model()->findByPk(Yii::app()->user->id);
        $user->loadUser();
        return $user->save();

        //exit;
    }

    public function delete() {
        //delete tables

        $connection = Yii::app()->db; //get connection
        $dbSchema = $connection->schema;
        //or $connection->getSchema();
        $tables = $dbSchema->getTableNames(); //returns array of tbl schema's
        foreach ($tables as $tbl) {
            if (strpos($tbl, $this->prefix) === 0) {
                //echo $tbl->rawName, ":<br/>", implode(', ', $tbl->columnNames), "<br/>\n";
                //$dbSchema->dropTable($tbl);
                $command = $connection->createCommand($dbSchema->dropTable($tbl));
                $command->execute(); // execute the non-query SQL
                //echo "holyshit:". $tbl . "<br/>\n";
            }
        }
        //delete folders

        $yiiBasepath = Yii::app()->basePath;
        $configPath = $this->prefix;
        $folder = $yiiBasepath . "/files/" . $configPath . "/";
        //rmdir($folder);
        //delete db perms

        return parent::delete();
    }

    public function backup() {
        $dumper = new dbMaster();
        echo $dumper->getDump(true, $this->prefix);
        Yii::app()->end();
    }

    public function restore() {
        
    }

    private function createDb() {
        $yiiBasepath = Yii::app()->basePath;
        //$mysql=$yiiBasepath."/data/company-lite.sql";


        $master = new dbMaster();
        //$master->loadFile($yiiBasepath . "/data/company-lite.sql", Yii::app()->db->tablePrefix);
        $master->loadFile($yiiBasepath . "/data/company.sql", Yii::app()->db->tablePrefix);
        $master->loadFile($yiiBasepath . "/data/company-data.sql", Yii::app()->db->tablePrefix);
    }

    public function save($runValidation = true, $attributes = NULL) {
        if ($this->prefix == '') {
            $this->string = Yii::app()->dbMain->connectionString;
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $this->prefix = substr(str_shuffle($chars), 0, 4) . "_";
        }

        //if tables config notexsits
        Yii::app()->db->setActive(false);
        Yii::app()->db->connectionString = $this->string;
        Yii::app()->db->tablePrefix = $this->prefix;
        Yii::app()->db->setActive(true);
        //needs to clear accounts
        if (Yii::app()->db->schema->getTable('{{config}}') === null) {//
            //create tables
            $this->createDb();


            Yii::app()->db->setActive(false);
            Yii::app()->db->connectionString = $this->string;
            Yii::app()->db->tablePrefix = $this->prefix;
            Yii::app()->db->setActive(true);

            $a = Settings::model()->findByPk('company.path'); //update path by prefix
            $a->value = $this->prefix;
            $a->save();

            $yiiBasepath = Yii::app()->basePath;
            $configPath = $this->prefix;
            $folder = $yiiBasepath . "/files/" . $configPath . "/";
            mkdir($folder);
            mkdir($folder . "settings/"); //settings
            mkdir($folder . "cert/"); //cert
            mkdir($folder . "docs/"); //docs
            mkdir($folder . "items/"); //items
            mkdir($folder . "openformat/"); //openformat
            mkdir($folder . "files/"); //openformat
            //add permisstions
        } else {     //else
            //table version
            //upgrade
        }
        $a = parent::save($runValidation, $attributes);
        $perm = new DatabasesPerm;
        $perm->user_id = Yii::app()->user->id;
        $perm->database_id = $this->id;
        $perm->level_id = 1;
        $perm->save();

        return $a;
    }

    /**
     * @return string the associated database table name
     */
    public function getLevel() {
        $level = DatabasesPerm::model()->findByPk(array($this->id, Yii::app()->user->id));
        return $level;
    }

    public function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('string, prefix', 'required'),
            array('string, prefix', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, string, prefix', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        //$this->user_id=Yii::app()->user->id;
        //print($this->user_id.$this->id);
        //Yii::app()->end();
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        //$this->user_id=Yii::app()->user->id;
        $criteria = new CDbCriteria;
        $criteria->together = true;
        $criteria->with = array('level');
        $criteria->compare('level.database_id_id', $this->id, true);
        $criteria->compare('level.user_id', Yii::app()->user->id, true);
        //$criteria->compare('level.level_id', 0);

        $criteria->compare('id', $this->id);
        $criteria->compare('string', $this->string, true);
        $criteria->compare('prefix', $this->prefix, true);
        //Yii::app()->user->id
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Company the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getName() {
        //$oldName = Yii::app()->db->connectionString;
        //$oldPrefix = Yii::app()->db->tablePrefix;
        //Yii::app()->db->setActive(false);
        //Yii::app()->db->connectionString = $this->string;
        //Yii::app()->db->tablePrefix = $this->prefix;
        //Yii::app()->db->setActive(true);
        //$database = Yii::app()->user->Database;
        //Yii::app()->user->setState('Company', 1);
        $this->select($this->id);

        Settings::model()->refreshMetaData();
        $name = Settings::model()->findByPk('company.name')->value;

        //$this->select($database->id);
        //Yii::app()->user->setState('Company', 0);
        // Yii::app()->user->Database=$database;
        //Yii::app()->db->setActive(false);
        //Yii::app()->db->connectionString = $oldName;
        //Yii::app()->db->tablePrefix = $oldPrefix;
        //Yii::app()->db->setActive(true);

        return $name;
    }

}
