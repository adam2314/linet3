<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
/**
 * This is the model class for table "bankName".
 *
 * The followings are the available columns in table 'bankName':
 * @property integer $id
 * @property string $name
 */
namespace app\models;

use Yii;
class Bankbook extends Record {
    private $dateDBformat = true;
    public $file;

    const table = '{{%bankbook}}';


    public function beforeSave($insert) {
        if($this->extCorrelation===null)
            $this->extCorrelation='0';
        return parent::beforeSave($insert);
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array(['account_id', 'date', 'sum'], 'required'),
            array(['id', 'account_id'], 'number', 'integerOnly' => true),
            array(['details', 'refnum'], 'string', 'max' => 255),
            array(['date'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'account_id', 'date', 'sum', 'total', 'extCorrelation', 'details', 'refnum'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'details' => Yii::t('app', 'Details'), //, , , , , extCorrelation 
            'account_id' => Yii::t('app', 'Account id'),
            'date' => Yii::t('app', 'Date'),
            'sum' => Yii::t('app', 'Sum'),
            'total' => Yii::t('app', 'Total'),
            'refnum' => Yii::t('app', 'Ref. No.'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {
        $query = Bankbook::find();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 100),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'account_id' => $this->account_id,
            'date' => $this->date,
            'extCorrelation' => $this->extCorrelation,
            'refnum' => $this->refnum,
        ]);

        $query->andFilterWhere(['like', 'details', $this->details])
                ->andFilterWhere(['like', 'sum', $this->sum])
                ->andFilterWhere(['like', 'total', $this->total])
                ->andFilterWhere(['like', 'details', $this->details]);
        return $dataProvider;
        //$criteria->order = 'id';
        
        
    }

    /*     * ************************imports************************ */

    function import($account) {
        $file = \yii\web\UploadedFile::getInstance($this, 'file');
        //echo 'not file';
        if (is_object($file) && get_class($file) === 'yii\web\UploadedFile') {
            //echo 'is file';
            $filename = Company::getFilePath() . "TNout"; //x
            if ($file->saveAs($filename)) {
                //read file...
                $fp = fopen($filename, 'r');
                return $this->readFile($fp,$account);
            } else {
                throw new \Exception(Yii('app', 'cannot save bankbook'));
            }
        }
    }

    function readFile($fp,$account) {
        $first = true;
        while ($line = fgets($fp)) {
            if ($first) {
                if ((strlen($line) == 83) && (substr($line, 0, 1) == '#'))
                    $type = 'HashDos';
                else if (strlen($line) == 2)
                    $type = 'HashWin';
                else if ((strlen($line) == 81) && (substr($line, 7, 1) == ','))
                    $type = 'leumi';
                $first = false;
                //return;
            }
            if (isset($type))
                switch ($type) {
                    case 'HashDos':
                        $this->readlineHashDos($line, $account);
                        break;
                    case 'HashWin':
                        $this->readlineHashWin($line, $account);
                        break;
                    case 'leumi':
                        $this->readlineLeumi($line, $account);
                        break;
                } else {
                throw new \Exception(Yii('app', 'bankbook Import Unkown file format'));
            }
        }//while end
        //echo 'done';
        //Yii::$app->end();
        return true;
    }

    function readlineHashDos($line, $account) {//mizrahi
        $refnum = ltrim(substr($line, 12, 6), ' ');
        if ($refnum > 0) {
            $bank = new Bankbook;
            $bank->account_id = $account;

            $bank->refnum = ltrim(substr($line, 12, 5), ' ');
            $bank->details = iconv("ISO-8859-8", "utf-8", hebrev(iconv("ibm862", "ISO-8859-8", substr($line, 19, 11))));
            $bank->date = date("Y") . "-" . substr($line, 34, 2) . "-" . substr($line, 31, 2);

            $zachot = ltrim(substr($line, 38, 12), ' ');
            $hova = ltrim(substr($line, 51, 13), ' ');
            $bank->sum = $zachot - $hova;
            $bank->total = ltrim(substr($line, 65, 14), ' ');
            //if (!$bank->searchBankbook()) {
                $bank->extCorrelation = 0;
                //mybe save output? num
                return $bank->save();
            //}
        }
    }

    function readlineHashWin($line, $account) {//discount
        if (strlen($line) == 56)
            return false;
        $refnum = ltrim(substr($line, 21, 9), '0 ');
        if ($refnum > 0) {
            $bank = new Bankbook;
            $bank->account_id = $account;

            $bank->refnum = $refnum; //ltrim(substr($line,22,7),' ');	
            $bank->details = iconv("ISO-8859-8", "utf-8", hebrev(iconv("ibm862", "ISO-8859-8", substr($line, 30, 7))));
            $bank->date = "20" . substr($line, 2, 2) . "-" . substr($line, 4, 2) . "-" . substr($line, 6, 2);
            $sighn = substr($line, 20, 1) . '1';
            $value = (ltrim(substr($line, 9, 12), '0 ')) * $sighn / 100;
            //$hova=ltrim(substr($line,51,13),' ');
            $bank->sum = $value; //$zachot-$hova;
            //$bank->total=ltrim(substr($line,65,14),' ');
            if (!$bank->searchBankbook()) {
                //mybe save output? num
                $bank->extCorrelation = 0;
                //print_r($bank);
                return $bank->save();
            }
        }
    }

    function readlineLeumi($line, $account) {//leumi wtf???
        //if(strlen($line)==56)
        //	return false;
        $refnum = ltrim(substr($line, 0, 7), '0');
        if ($refnum > 0) {
            $bank = new Bankbook;
            $bank->account_id = $account;

            $bank->refnum = $refnum; //ltrim(substr($line,22,7),' ');	
            $bank->details = iconv("ISO-8859-8", "utf-8", hebrev(iconv("ibm862", "ISO-8859-8", substr($line, 16, 14))));
            $bank->date = "20" . substr($line, 12, 2) . "-" . substr($line, 10, 2) . "-" . substr($line, 8, 2);
            $sighn = substr($line, 32, 1) . '1';
            $value = (ltrim(substr($line, 33, 12), '0 ')) * $sighn;
            $bank->sum = $value; //$zachot-$hova;

            $sighn = substr($line, 46, 1) . '1';
            $bank->total = (ltrim(substr($line, 47, 12), '0 ')) * $sighn;
            if (!$bank->searchBankbook()) {
                //mybe save output? num
                $bank->extCorrelation = 0;
                return $bank->save();
            }
        }
    }

}
