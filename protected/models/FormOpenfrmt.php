<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\models;

use Yii;
use yii\base\Model;
//use app\models\OpenFormatType;
//use app\models\Docs;
//use app\models\Transactions;
class FormOpenfrmt extends Model {

    public $year;
    public $from_date;
    public $to_date;
    private $id;
    private $line = 1;
    private $iniArr;
    private $docArr;
    private $docSumArr;
    public $bkmvId;
    public $iniId;
    public $bkmvFile;
    public $iniFile;
    public $accDesc = array();
    public $accTypeIndex = array();
    public $companyId;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['to_date', 'from_date', 'year'], 'safe'),
            array(['to_date', 'from_date', 'year'], 'safe', 'on' => 'search'),
        );
    }

    private function sortBkmvFile($data = 2) {

        //$bkmv = $yiiBasepath."/files/".$configPath."/openformt/bkmvdata.txt";
        $bkmv = $this->bkmvFile;
        if ($fp = fopen($bkmv, 'r')) {
            $A100 = '';
            $Z900 = '';
            $fhB100 = fopen($bkmv . "b100", 'w') or die("can't open file");
            $fhB110 = fopen($bkmv . "b110", 'w') or die("can't open file");
            $fhC100 = fopen($bkmv . "c100", 'w') or die("can't open file");
            $fhD110 = fopen($bkmv . "d110", 'w') or die("can't open file");
            $fhD120 = fopen($bkmv . "d120", 'w') or die("can't open file");
            $fhM100 = fopen($bkmv . "m100", 'w') or die("can't open file");
            //$data=$_REQUEST['data'];
            while ($line = fgets($fp)) {
                switch (substr($line, 0, 4)) {
                    case "A100":
                        $A100 = $line;
                        break;
                    case "B110":
                        fwrite($fhB110, $line);
                        break;
                    case "B100":
                        if ($data >= 2)
                            fwrite($fhB100, $line);
                        break;
                    case "C100":
                        if ($data >= 2)
                            fwrite($fhC100, $line);
                        break;
                    case "D110":
                        if ($data >= 2)
                            fwrite($fhD110, $line);
                        break;
                    case "D120":
                        if ($data >= 2)
                            fwrite($fhD120, $line);
                        break;
                    case "M100":
                        if ($data >= 1)
                            fwrite($fhM100, $line);
                        break;
                    case "Z900":
                        $Z900 = $line;
                        break;
                }
            }//end while and file
            fclose($fhB100);
            fclose($fhB110);
            fclose($fhC100);
            fclose($fhD110);
            fclose($fhD120);
            fclose($fhM100);

            $fh = fopen($bkmv . "-sorted", 'w') or die(_("can't open file"));

            fwrite($fh, $A100);

            $fp = fopen($bkmv . "b110", 'r');
            while ($line = fgets($fp))
                fwrite($fh, $line);
            fclose($fp);
            $fp = fopen($bkmv . "m100", 'r');
            while ($line = fgets($fp))
                fwrite($fh, $line);
            fclose($fp);

            $fp = fopen($bkmv . "c100", 'r');
            while ($line = fgets($fp))
                fwrite($fh, $line);
            fclose($fp);
            $fp = fopen($bkmv . "d110", 'r');
            while ($line = fgets($fp))
                fwrite($fh, $line);
            fclose($fp);
            $fp = fopen($bkmv . "d120", 'r');
            while ($line = fgets($fp))
                fwrite($fh, $line);
            fclose($fp);

            $fp = fopen($bkmv . "b100", 'r');
            while ($line = fgets($fp))
                fwrite($fh, $line);
            fclose($fp);
            unlink($bkmv . "b100");
            unlink($bkmv . "m100");
            unlink($bkmv . "d120");
            unlink($bkmv . "d110");
            unlink($bkmv . "c100");
            unlink($bkmv . "b110");

            fwrite($fh, $Z900);
            fclose($fh);
        }else {
            print _("must die unable to sort data");
            die;
        }
    }

    private function clearCompany() {
        Accounts::deleteAll();
        Item::deleteAll();
        Docs::deleteAll();
        Docdetails::deleteAll();
        Doccheques::deleteAll();
        Transactions::deleteAll();
    }

    /*
      function typeline($str, $filter){
      foreach ($filter as $key=>$value){
      if ($str==$key)
      return $key;
      }
      return "UNKO";//need to stop from entring readline
      } */

    public function readIni() {
        //new company
        //
        //
        //get perm from ini
        $encoding = "windows-1255";
        //$encoding="ibm862";
        $ini = $this->iniFile;

        if ($fp = fopen($ini, 'r')) {
            while ($line = fgets($fp)) {

                @$line = iconv($encoding, "UTF-8//IGNORE", $line);
                //$line=utf8_encode($line);
                $type = substr($line, 0, 4);
                //$obj=$this->readline($line,$type);
                $obj = true;

                if (!$obj) {
                    //$suc[$type]--;
                } else {

                    //foreach ($obj as &$value)
                    //	if ($encoding=="ibm862") 
                    //		$value = iconv("ISO-8859-8", "UTF-8", hebrev(iconv("UTF-8", "ISO-8859-8", $value)));

                    if ($type == 'A000') {//Acc Haeder
                        /* Account Import */
                        $comp = new Company;
                        $comp->string = Yii::$app->dbMain->dsn;
                        $comp->user = Yii::$app->dbMain->username;
                        $comp->password = Yii::$app->dbMain->password;                        

                        
                        /*
                          $obj["type"]=(int)$obj["type"]+50;
                          if(isset($accTypeIndex[$obj["type"]]))
                          $accTypeIndex[$obj["type"]]=$accTypeIndex[$obj["type"]].",".$obj["name"];
                          else
                          $accTypeIndex[$obj["type"]]=$obj["typedesc"].":".$obj["name"];
                          unset($obj["typedesc"]); */
                        //1405 acc type code
                        //1406 acc type name
                        //print_r($obj);//Yii::$app->end();
                        //$comp->createDb();

                        $comp->save();
                        $this->companyId = $comp->id;
                        $comp->readLine($line, $type);
                        $this->clearCompany();
                        //$accIndex[$obj["id"]]=$acc->save();
                        //get new acc index save old
                        //$this->companyId=$comp->id;
                        //echo $this->companyId;
                        //Yii::$app->end();
                        unset($comp);
                    }
                }
            }
        }
    }

    public function readBkmv() {
        //sort
        $this->sortBkmvFile(); //skip for testing
        //
        //new company
        //get perm from ini
        //if (substr($line,395,1)=='2')
        //    $encoding="ibm862";
        //else 
        $encoding = "windows-1255";
        //$encoding="ibm862";


        Yii::info('start Openimport');
        //$bkmv = $yiiBasepath."/files/".$configPath."/openformt/bkmvdata.txt-sorted";
        $bkmv = $this->bkmvFile . "-sorted";

        $suc = array();
        $suc['B110'] = 0;
        $suc['A100'] = 0;
        $suc['B100'] = 0;
        $suc['C100'] = 0;
        $suc['M100'] = 0;
        $suc['D110'] = 0;
        $suc['D120'] = 0;
        $suc['Z900'] = 0;

        $analze = array();
        $analze['B110'] = 0;
        $analze['A100'] = 0;
        $analze['B100'] = 0;
        $analze['C100'] = 0;
        $analze['M100'] = 0;
        $analze['D110'] = 0;
        $analze['D120'] = 0;
        $analze['Z900'] = 0;


        $accType = 200;
        //DELETE FROM `qwe_docCheques` WHERE 1;DELETE FROM `qwe_docDetails` WHERE 1;DELETE FROM `qwe_accounts` WHERE 1;DELETE FROM `qwe_items` WHERE 1;DELETE FROM `qwe_docs` WHERE 1;

        if ($fp = fopen($bkmv, 'r')) {
            while ($line = fgets($fp)) {

                @$line = iconv($encoding, "UTF-8//IGNORE", $line);
                //$line=utf8_encode($line);
                $type = substr($line, 0, 4);
                //$obj=$this->readline($line,$type);
                $obj = true;

                if (!$obj) {
                    //$suc[$type]--;
                } else {
                    //foreach ($obj as &$value)
                    //	if ($encoding=="ibm862") 
                    //		$value = iconv("ISO-8859-8", "UTF-8", hebrev(iconv("UTF-8", "ISO-8859-8", $value)));

                    if ($type == 'B110') {//Acc Haeder
                        /* Account Import */

                        $acc = new Accounts;
                        $acc->readLine($line, $type);


                        if (isset($this->accTypeIndex[$acc->type])) {
                            $this->accDesc[$acc->type] = $this->accDesc[$acc->type] . "," . $acc->name;
                        } else {
                            $this->accDesc[$acc->type] = $acc->name;

                            $this->accTypeIndex[$acc->type] = $accType;

                            $accType++;
                        }
                        $acc->type = $this->accTypeIndex[$acc->type];

                        if($acc->currency_id=='')
                            $acc->currency_id='ILS';
                        $acc->system_acc=0;
                        
                        
                        if(!$acc->save()){
                            var_dump($acc->errors);
                        }

                        //get new acc index save old
                        unset($acc);
                        //*/
                    }
                    if ($type == 'M100') {//Item In Stock
                        $item = new Item;
                        $item->category_id = 0;
                        $item->parent_item_id = 0;
                        $item->isProduct = 0;
                        $item->profit = 0;
                        $item->stockType = 0;

                        $item->readLine($line, $type);
                        
                        
                        if($item->currency_id=='')
                            $item->currency_id='ILS';
                        if($item->sku=='')
                            $item->sku=$item->id;
                        if($item->itemVatCat_id=='')
                            $item->itemVatCat_id='1';
                        if($item->unit_id=='')
                            $item->unit_id='1';
                        
                        if(!$item->save()){
                            var_dump($item->errors);
                        }
                        unset($item);
                        //*/
                    }


                    if ($type == 'C100') {//Doc Haeder
                        //return "done!";
                        //Yii::$app->end();
                        //find type
                        //global $DocOpenType;
                        $doc = new Docs;


                        $doc->readLine($line, $type);
                        $doc->action = true;
                        $doc->status = true; //needtoChange
                        //Yii::log($doc,'info','app');

                         if($doc->currency_id=='')
                            $doc->currency_id='ILS';
                        
                        if(!$doc->save()){
                            var_dump($doc->errors);
                        }

                        unset($doc);
                        /*
                          if ((isset($DocOpenType[$obj['doctype']])) && (isset($accIndex[$obj['account']]))){
                          $obj['doctype']=$DocOpenType[$obj['doctype']];
                          $doc=new document($obj['doctype']);
                          $stype=$obj['doctype'];
                          foreach($obj as $key=>$value){
                          $doc->$key=$value;//print "$key <br />";
                          }
                          $doc->account=$accIndex[$doc->account];
                          //search for old acc index
                          if (isset($doc->rcptdetials)) unset($doc->rcptdetials);
                          if (isset($doc->docdetials)) unset($doc->docdetials);

                          if($check){
                          if((strtotime($doc->issue_date)>$begindmy)&&(strtotime($doc->issue_date)<$enddmy))
                          $docIndex[$stype.$obj["docnum"]]=$doc->newDocument();
                          //print "we are chking!";
                          }else{
                          $docIndex[$stype.$obj["docnum"]]=$doc->newDocument();
                          }
                          //get new doc index save old
                          unset($doc);
                          } */
                    }
                    if ($type == 'D110') {//Doc Detial
                        $docdetial = new Docdetails;
                        $docdetial->readLine($line, $type);
                        if($docdetial->unit_id=='')
                            $docdetial->unit_id=1;
                        if($docdetial->currency_id=='')
                            $docdetial->currency_id='ILS';
                        //Yii::log($docdetial,'info','app');
                        if(!$docdetial->save()){
                            var_dump($docdetial->errors);
                        }
                        unset($docdetial);

                        /*
                          global $DocOpenType;
                          $stype=$DocOpenType[$obj['doctype']];
                          if (isset($docIndex[$stype.$obj["num"]])){
                          $docdetial=new documentDetail;
                          $docdetial->price=$obj['price'];
                          unset($obj['doctype']);
                          unset($obj['price']);

                          foreach($obj as $key=>$value){
                          $docdetial->{$key}=$value;//print "$key <br />";

                          }

                          $docdetial->num=$docIndex[$stype.$obj["num"]];
                          $docdetial->newDetial();

                          //search for old doc index
                          //die;
                          //update to new index
                          unset($docdetial);
                          }// */
                    }
                    if ($type == 'D120') {//Kaballa Detial
                        $rcptdetial = new Doccheques;
                        $rcptdetial->readLine($line, $type);
                        //Yii::log($rcptdetial, 'info', 'app');
                        if($rcptdetial->currency_id=='')
                            $rcptdetial->currency_id='ILS';
                        if(!$rcptdetial->save()){
                            var_dump($rcptdetial->errors);
                        }
                        unset($rcptdetial);
                        /*
                          global $DocOpenType;
                          $stype=$DocOpenType[$obj['doctype']];
                          if (isset($docIndex[$stype.$obj["refnum"]])){
                          $rcptdetial=new receiptDetail();
                          //$stype=$DocOpenType[$obj['doctype']];
                          $rcptdetial->sum=(float)$obj['sum'];
                          unset($obj['sum']);
                          unset($obj['doctype']);
                          foreach($obj as $key=>$value){
                          $rcptdetial->$key=$value;
                          }
                          $rcptdetial->refnum=$docIndex[$stype.$obj["refnum"]];
                          $rcptdetial->newDetial();
                          //search for old doc index
                          //update to new index
                          unset($rcptdetial);
                          } */
                    }
                    if ($type == 'B100') {//Move Recored
                        $transaction = new Transactions;
                        $transaction->readLine($line, $type);
                        if($transaction->type=='')
                            $transaction->type=1;
                        if($transaction->currency_id=='')
                            $transaction->currency_id='ILS';
                        if(!$transaction->save()){
                            var_dump($transaction->errors);
                        }
                        //Yii::log($transaction,'info','app');

                        unset($transaction);
                        /*
                          //print $obj['value'].":".$obj['type'];
                          global $openTransType;

                          if (isset($accIndex[$obj['account']])){
                          $bsum= $obj['sum'];
                          if($obj['value']==1)
                          $bsum= -1 * $obj['sum'];
                          //print $bsum."<br />\n";
                          $usum=$bsum*-1;

                          $uaccount=$obj['account1'];
                          $stype=$openTransType[$obj['type']];
                          unset($obj['sum']);
                          unset($obj['value']);
                          unset($obj['account1']);
                          //adam:! need to reset type of action!

                          $transaction=new transaction;

                          foreach($obj as $key=>$value){
                          $transaction->$key=$value;//print "$key <br />";
                          }
                          $transaction->type=$stype;
                          $transaction->sum=$bsum;
                          $transaction->account=$accIndex[$obj['account']];

                          if($check){
                          if((strtotime($transaction->date)>$begindmy)&&(strtotime($transaction->date)<$enddmy)){
                          // "gone";
                          $transaction->newTransactions();
                          }
                          //print "gone2";
                          }else{
                          //print "gone1";
                          $transaction->newTransactions();
                          }
                          unset($transaction);
                          }// */
                    }

                    unset($obj);
                    $suc[$type] ++;
                }
                $analze[$type] ++;
                //if ($analze[$type]>100)	break;
            }
            Yii::info("End OpenImport");
            //print_r($docIndex);
            //end loop
            //print_r($accIndex);
        } else {
            echo Yii::t('app', "error cant open file!");
        }
    }

    public function make($cid) {
        $this->id = rand(0, 999999);
        //$this->iniArr=array('b110'=>0,'b100'=>0,'m100'=>0,'c100'=>0,'d100'=>0,'d110'=>0,'d120'=>0,);
        //$this->docArr=array(0=>0,305=>0,300=>0,);
        $bkmv = '';
        //$this->line=1;
        //$yiidatetimesec=Yii::$app->locale->getDateFormat('yiidatetimesec');
        //$phpdbdatetime=Yii::$app->locale->getDateFormat('phpdbdatetime');

        $from_date = $this->from_date . " 00:00:00";
        $to_date = $this->to_date . " 23:59:59";

        //$types=array(3,4,9,11,13,14);
        //accounts
        $accounts = Accounts::find()->All();
        $record = array('id' => 'B110', 'name' => OpenFormatType::getDesc('B110'), 'count' => 0);
        foreach ($accounts as $account) {
            $this->line++;
            $bkmv.=$account->openfrmt($this->line, $from_date, $to_date);
            $record['count'] ++;
        }
        $this->iniArr[] = $record;


        //items
        $items = Item::find()->All();
        $record = array('id' => 'M100', 'name' => OpenFormatType::getDesc('M100'), 'count' => 0);
        foreach ($items as $item) {
            $this->line++;
            $bkmv.=$item->openfrmt($this->line, $from_date, $to_date);
            $record['count'] ++;
        }
        $this->iniArr[] = $record;
        //
        //transactions
        $transactions = Transactions::find()->where(['BETWEEN', 'valuedate', $from_date, $to_date])->All();
        $record = array('id' => 'B100', 'name' => OpenFormatType::getDesc('B100'), 'count' => 0);
        foreach ($transactions as $transaction) {
            $this->line++;
            $bkmv.=$transaction->openfrmt($this->line, $from_date, $to_date);
            $record['count'] ++;
        }
        $this->iniArr[] = $record;

        //docs
        $docs = Docs::find()->where(['BETWEEN', 'due_date', $from_date, $to_date])->All();
        //OpenFormatType::getDesc('C100')
        $record = array('id' => 'C100', 'name' => OpenFormatType::getDesc('C100'), 'count' => 0);
        $d110 = array('id' => 'D110', 'name' => OpenFormatType::getDesc('D110'), 'count' => 0);
        $d120 = array('id' => 'D120', 'name' => OpenFormatType::getDesc('D120'), 'count' => 0);


        foreach ($docs as $doc) {

            if ($doc->docType->openformat != '0') {
                $this->line++;
                $bkmv.=$doc->openfrmt($this->line, $from_date, $to_date);
                foreach ($doc->docDetailes as $detial) {
                    $this->line++;
                    $bkmv.=$detial->openfrmt($this->line, $from_date, $to_date);
                    $d110['count'] ++;
                }
                foreach ($doc->docCheques as $detial) {
                    $this->line++;
                    $bkmv.=$detial->openfrmt($this->line,$from_date,$to_date);
                    $d120['count'] ++;
                }
                $type = $doc->OpenfrmtType();
                $this->docArr[$type] = isset($this->docArr[$type]) ? $this->docArr[$type] + 1 : 0;
                $this->docSumArr[$type] = isset($this->docSumArr[$type]) ? $this->docSumArr[$type] + $doc->total : $doc->total;
                $record['count'] ++;
            }
        }
        $this->iniArr[] = $record;
        $this->iniArr[] = $d110;
        $this->iniArr[] = $d120;


        $company = \app\models\Settings::findOne(['company.name']);
        //A100
        $bkmv = $company->a100(1, $this->id, $from_date, $to_date) . $bkmv;

        //Z900
        $bkmv = $bkmv . $company->z900($this->line + 1, $this->id, $this->line + 1);



        $bkmvFile = new Files;
        $bkmvFile->name = 'bkmvdata.txt';
        $bkmvFile->path = 'openformat/'; //
        $bkmvFile->expire = 360;
        $bkmvFile->save();
        $bkmvFile->writeFile($bkmv);
        $this->bkmvId = $bkmvFile->id;



        //A000
        $ini = $company->a000(1, $this->id, $this->line + 1, $from_date, $to_date);
        foreach ($this->iniArr as $line) {
            $ini.=$line['id'] . sprintf("%015d", $line['count']) . "\r\n";
        }
        //Z

        $iniFile = new Files;
        $iniFile->name = 'ini.txt';
        $iniFile->path = 'openformat/'; //
        $iniFile->expire = 360;
        $iniFile->save();
        $iniFile->writeFile($ini);
        $this->iniId = $iniFile->id;



        return $this->id;
    }

    public function docsTable() {

        $array = array();
        if (isset($this->docArr)) {
            foreach ($this->docArr as $key => $value) {
                $tmp = OpenFormatType::findOne(array('id' => $key, 'type' => 'INI'));
                //echo OpenFormatType::findOne($key)->description;
                if ($tmp)
                    print_r($tmp);
                $array[] = array('id' => $key, 'name' => Doctype::getOpenType($key), 'count' => $value, 'sum' => $this->docSumArr[$key]);
            }
        }

        return new \yii\data\ArrayDataProvider(
                array(
            'allModels' => $array,
            'pagination' => array(
                'pageSize' => 100,
            ),
                )
        );
    }

    public function bkmvTable() {
        return new \yii\data\ArrayDataProvider(
                array(
            'allModels' => $this->iniArr,
            'pagination' => array(
                'pageSize' => 100,
            ),
                )
        );
    }

}
