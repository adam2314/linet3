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
 * This is the model class for table "docs".
 *
 * The followings are the available columns in table 'docs':
 * @property string $id
 * @property string $doctype
 * @property string $docnum
 * @property string $account
 * @property string $company
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property string $vatnum
 * @property string $refnum
 * @property string $issue_date
 * @property string $due_date
 * @property string $sub_total
 * @property string $novat_total
 * @property string $vat
 * @property string $total
 * @property string $src_tax
 * @property integer $status
 * @property integer $currency_id
 * @property integer $printed
 * @property string $comments
 * @property integer $owner
 */
namespace app\models;

use Yii;
use app\components\fileRecord;
use app\models\Item;
use app\models\Doccheques;
use app\models\Docdetails;
use app\models\Doctype;
use app\models\Transactions;

class docs extends fileRecord {

    const table = '{{%docs}}';
    //public $lang;
    public $oppt_account_id='';
    public $preview=0;
    //public $discount=0;//overide
    public $docDet = NULL;
    public $docDetArray = NULL;
    
    public $docCheq = NULL;
    public $docCheqArray = NULL;
    public $Docs = NULL;
    public $rcptsum = 0;
    public $issue_from;
    public $issue_to;
    public $stockSwitch = 1;
    public $refnum_ids = '';
    private $dateDBformat = true;
    public $maxDocnum;

    public $docAction='';
    const STATUS_OPEN = 0;
    const STATUS_CLOSED = 1;

    public function fields() {
        $fields = parent::fields();
        $fields['rcptsum']='rcptsum';
        return $fields;
    }
  

    public function hasAttribute($name) {
        if ($name == "docDet" || $name == "docCheq")
            return true;
        else
            return parent::hasAttribute($name);
    }

    public function init() {
        $this->issue_date = $this->readDate('now');
        $this->due_date = $this->readDate('now');
        $this->ref_date = $this->readDate('now');
        $this->language=Yii::$app->language;
        return parent::init();
    }

    public static function findAllByType($doctype) {

        return docs::find()->where(array('doctype' => $doctype))->All();
    }

    public function draftSave() {
        $status = Docstatus::find()->where(array('looked' => 0, 'doc_type' => $this->doctype))->one();
        if ($status !== null) {
            $this->status = $status->num;
        }
    }

    /*
     * for open format export 
     */

    public function findByNum($docnum, $doctype) {

        return docs::find()->where(array('docnum' => $docnum, 'doctype' => $doctype))->All();
    }

    public function getRef() {
        $this->refnum_ids = '';
        $this->Docs = docs::find()->where(array('refnum' => $this->id))->All();
        if ($this->Docs !== null) {
            foreach ($this->Docs as $doc)
                $this->refnum_ids.=$doc->id . ",";
        }
    }

    public static function getRefStatuses() {
        return self::getConstants('STATUS_', __CLASS__);
    }

    public function getRefStatus() {
        $list = $this->getRefStatuses();
        //print_r($list);
        //return "";
        return Yii::t('app', $list[$this->refstatus]['name']);
    }

    public function TypeName() {
        if ($this->docType)
            return Yii::t("app", $this->docType->name);
        else
            return $this->doctype;
    }

    public function StatusName() {
        if ($this->docStatus)
            return Yii::t('app', $this->docStatus->name);
        else
            return $this->status;
    }

    public function OpenfrmtType($type = '') {
        if ($type == '') {
            return isset($this->docType) ? $this->docType->openformat : "";
        } else {
            $this->doctype = Doctype::getOType($type);
            return $this->doctype;
        }
    }
    
    public function OpenfrmtNoVatTotal(){
        return  $this->sub_total + $this->novat_total;
        
    }

    public function openfrmt($line) {
        $docs = '';

        //get all fields (m100) sort by id
        $fields = OpenFormat::find()->where(['type_id' => "C100"])->All();
        //loop strfgy
        foreach ($fields as $field) {
            $docs.=$this->openfrmtFieldStr($field, $line);
        }
        return $docs . "\r\n";
    }

    public function pcn874() {
        //stringfy a doc by pcn874
        //A1    type
        //N9    oppt-vatid
        //N8    inv date YYYYMMDD
        //A4    0000
        //N9    doc number
        //N9    vat sum(round)
        //A1    +\-
        //N10   inv sum(round)
        //N9    000000000
        //S
        //3,4,9,11
        //T
        //13,14  
        $a = "T";
        if (in_array($this->doctype, array(3, 4, 9, 11)))
            $a = "S";
        else if (in_array($this->doctype, array(13, 14)))
            $a = "T";
        else//else irelvent!
            echo $this->docnum;
        $opptacc = $this->vatnum;
        $docdate = $this->readYmd($this->issue_date);
        $doctype = $this->doctype;
        $docnum = $this->docnum;
        $vatsum = $this->vat;
        $plusmin = ($this->total >= 0) ? "+" : "-";
        $docsum = $this->total;
        return sprintf("%1s%09d%08d0000%02d%07d%09d%1s%010d000000000", $a, $opptacc, $docdate, $doctype, $docnum, $vatsum, $plusmin, $docsum);
    }

    public function beforeSave($inseret) {
        if ($this->isNewRecord) {
            $this->dateDBformat = false;
        }
        if ($this->reg_date == null)
            $this->reg_date = $this->writeDate('now');


        return parent::beforeSave($inseret);
    }

 

    public function afterFind() {
        
        $this->getRef();
        return parent::afterFind();
    }
    private function accountLoader(){
        $account=  Accounts::findOne(['id'=>$this->account_id]);
        if($account!==null){
            if($this->company==null)
                $this->company=$account->name;
            if($this->address==null)
                $this->address=$account->address;
            if($this->city==null)
                $this->city=$account->city;
            if($this->zip==null)
                $this->zip=$account->zip;
            if($this->vatnum==null)
                $this->vatnum=$account->vatnum;
            if($this->phone == null)
                $this->phone=$account->phone;
            if($this->email == null)
                $this->email=$account->email;
            
        }
        if($this->status==null)
            $this->status = $this->docType->docStatus_id;
        
    }
    public function save($runValidation = true, $attributes = NULL) {
        if(isset(Yii::$app->user)){
            $this->owner = Yii::$app->user->id;
        }
        if (is_null($this->discount))
            $this->discount=0;
        if ($this->total == 0)
            $this->total = $this->rcptsum;
        
        
        $this->accountLoader();
        
        $a = parent::save($runValidation, $attributes);

        if (!$a)
            return $a;
        
        //if think we can skip this
        //if (!is_null($attributes))
        //    return $a;




        //shuld be valid and calced by now
        //if ($a) { //if switch no save
        $this->saveRef(); //load docs and re-save them
        if (!$this->action) {
            if ($this->status === null)
                throw new \Exception(Yii::t('app', 'No status recived'));//500
            //$this->docStatus = Docstatus::findOne(array('num' => $this->status, 'doc_type' => $this->doctype));
            if ($this->docStatus === null)
                throw new \Exception(Yii::t('app', 'Status is Invalid'));//500

            $this->saveDet();
            $this->saveCheq();
                
            
            if(count($this->errors)!=0)
                return $a;
            //$this->calc();
            //$this->validate();
            //if (count($this->getErrors()) != 0)
            //    return false;
            if (isset($this->docStatus)) {
                if ($this->docStatus->action != 0) {//will run only once 
                    $transaction = Yii::$app->db->beginTransaction(\yii\db\Transaction::READ_UNCOMMITTED);//-shuld start transaction here
                    try {
                    $this->docnum = $this->newNum(); //get num 
                    if(!$this->docnum){
                        $this->addError('docnum', Yii::t('app','Document exists please fix last_num Value'));
                        return false;
                    }
                    $this->action = 1;
                    
                    $a = parent::save($runValidation, $attributes);
                    
                    
                    $this->transaction((int) $this->docStatus->action);
                    if (is_null($this->docType->transactionType_id)) {//only if !transaction stock
                        foreach ($this->docDetailes as $docdetail) {
                            $this->stock($docdetail->item_id, $docdetail->qty);
                        }
                    }
                    
                    //commit it here
                    $transaction->commit();
                    } catch (\Exception $e) {
                        $transaction->rollBack();
                        $message = $e->getMessage();
                        $this->addError('docnum',  $message );
                    }
                }
            }
        }

        return $a;
    }

    public function saveRef() {
        $str = $this->refnum_ids; //save new values

        $this->getRef();    //load old
        
        $newIds=explode(",", rtrim($str,','));
        $oldIds=explode(",", rtrim($this->refnum_ids,','));
        sort($newIds);
        sort($oldIds);
        //var_dump($newIds);
        //var_dump($oldIds);
        //        exit;
        if($newIds==$oldIds)//($this->refnum_ids==$str)
            return true;//nochange

        if ($this->Docs !== null) {//clear!
            foreach ($this->Docs as $doc) {
                $doc->refstatus = docs::STATUS_OPEN;
                $doc->refnum = '';
                $doc->save();
            }
        }
        
        if($str==''){
            return true;
        }
        $sum = 0;
        //$tmp = explode(",", rtrim($str,','));
        
        foreach ($newIds as $id) {//lets do this
            if ($id == $this->id) {
                throw new \Exception(Yii::t('app', 'You cannot save doc as a refnum'));//500
            }
            $doc = docs::find()->where(['id'=>(int) $id])->one();
            if ($doc !== null) {
                $sum+=$doc->total; //adam: need to multi currency!
                if ($sum <= $this->total) {
                    $doc->refstatus = docs::STATUS_CLOSED;
                } else {
                    $doc->refstatus = docs::STATUS_OPEN;
                }
                $doc->refnum = $this->id;
                $doc->save();
                
            }
        }
        $this->refnum_ids = $str;
        return true;
    }

    /*     * *********************doc******************* */

    public function calc() {
        $precision = Yii::$app->params['precision'];
        $user = $this->owner;
        if (isset(Yii::$app->user)) {
            $user = Yii::$app->user->id;
        }
        $this->knownVat = 0;
        $this->vat = 0;
        $this->sub_total = 0;
        $this->novat_total = 0;
        $this->total = 0;
        $this->rcptsum = 0;
        
        $newTotal=0;

        if (!is_null($this->docDet)) {
            foreach ($this->docDet as $key => $detial) {
                $id = isset($detial['item_id']) ? $detial['item_id'] : 1;
                $qty = isset($detial['qty']) ? $detial['qty'] : 0;
                $iTotalVat = isset($detial['iTotalVat']) ? $detial['iTotalVat'] : 0;
                $currency = isset($detial['currency_id']) ? $detial['currency_id'] : 'ILS';
                $currency_rate = isset($detial['currency_rate']) ? $detial['currency_rate'] : '1';
		$vat_cat = isset($detial['vat_cat_id']) ? $detial['vat_cat_id'] : '1';
                if ($qty != 0) {


                    $det = $this->calcDet($id, $qty, $iTotalVat, $currency,$currency_rate,$vat_cat);


                    $vat = $det->vatCalc();
                    if ($vat != 0) {
                        $this->vat += round($vat, $precision);
                        $this->sub_total += round($det->ihTotal, $precision);
                    } else {
                        $this->novat_total += round($det->ihTotal, $precision);
                    }
                    $this->knownVat+=$det->knownVatCalc($this->oppt_account_id);
                    $newTotal+=$det->iTotalVat;
                }
            }
        }

        if (!is_null($this->docCheq)) {
            foreach ($this->docCheq as $key => $rcpt) {
                $this->rcptsum += $rcpt['sum'];
            }
        }

        
        if ($this->discount !== 0) {
            $docdetail = $this->calcDiscount();
            $iVat = round($docdetail->vatCalc(), $precision);
            $this->vat += $iVat;
            $this->sub_total += $docdetail->iTotal;
            $newTotal+=$docdetail->iTotalVat;
        }
        

        
        //autoDiff!
        $this->total =$newTotal;
        //$this->total = $this->vat + $this->sub_total + $this->novat_total;

        
        if ($this->doctype == 8) {//recipt
            $this->total = $this->rcptsum;
        }
        
        return $this;
    }

    private function calcDet($id, $qty, $total, $currency_id,$currency_rate,$vat_cat) {
        $docdetail = new Docdetails;
        $docdetail->currency_id = $currency_id;
        $docdetail->item_id = $id;
        $docdetail->qty = $qty;
        $docdetail->iTotalVat = $total;
        $docdetail->valuedate = $this->{$this->VatDate};
        $docdetail->currency_rate = $currency_rate;
        //$docdetail->doc_rate = $this->currency_rate;
	$docdetail->vat_cat_id = $vat_cat;
        $docdetail->CalcPriceWithVat();
        //echo $docdetail->iTotalVat.'calc<br>';
       
        return $docdetail;
    }

    private function calcDiscount() {
        $docdetail = new Docdetails;
        $docdetail->currency_id = $this->currency_id;
        $docdetail->item_id = 1;
        $docdetail->qty = 1;
        $docdetail->iTotalVat = $this->discount * -1;
        $docdetail->valuedate = $this->{$this->VatDate};
        $docdetail->currency_rate = $this->currency_rate;
        //$docdetail->doc_rate = $this->currency_rate;
	$docdetail->vat_cat_id = 1;
        
        $docdetail->account_id=100;
        
        
        $docdetail->CalcPriceWithVat();
        return $docdetail;
    }

    private function saveDet() {
        if (!is_null($this->docDet)) {
            $line = 1;
            foreach ($this->docDet as $key => $detial) {
                $fline = isset($detial['line']) ? $detial['line'] : 0;
                $submodel = Docdetails::findOne(array('doc_id' => $this->id, 'line' => $fline));
                if ($submodel === null) {//new line
                    $submodel = new Docdetails;
                }

                $submodel->attributes = $detial;
                $submodel->valuedate=$this->issue_date;
                $submodel->line = $line;
                $submodel->doc_id = $this->id;
                //if (Item::findOne((int) $detial["item_id"]) !== null) {
                    $submodel->iItem=null;
                    if ($submodel->save()) {
                        $this->docDet[$key]['iTotalVat'] = $submodel->iTotalVat;
                        $this->docDet[$key]['ihTotal'] = $submodel->ihTotal;
                        $saved = true;
                        $line++;
                    } else {
                        $this->addError('docDet', $submodel->errors);
                        Yii::error("fatel error cant save docdetial,doc_id:" . $submodel->line . "," . $submodel->doc_id.":".\yii\helpers\Json::encode($submodel->errors));
                    }
                //}
            }
            if (count($this->docDetailes) != $line - 1) {//if more items in $docdetails delete them
                for ($curLine = $line; $curLine < count($this->docDetailes); $curLine++)
                    $this->docDetailes[$curLine]->delete();
            }
        }
        return true;
    }

    /*     * ***********************rcpt***************************** */

    private function saveCheq() {
        if (!is_null($this->docCheq)) {
            $line = 1;
            foreach ($this->docCheq as $key => $rcpt) {
                $submodel = Doccheques::findOne(array('doc_id' => $this->id, 'line' => $rcpt['line']));
                if ($submodel==null) {//new line
                    $submodel = new Doccheques;
                }


                //go throw attr if no save new
                foreach ($rcpt as $key => $value) {
                    if ($submodel->hasAttribute($key))
                        $submodel->$key = $value;
                    else {
                        $eav = new DocchequesEav;
                        $eav->line = $line;
                        $eav->doc_id = $this->id;
                        $eav->attribute = $key;
                        $eav->value = $value['value'];
                        $eav->save();
                    }
                }
                $submodel->line = $line;
                $submodel->doc_id = $this->id;
                //if ((int) $rcpt["type"] != 0) {
                    if ($submodel->save()) {
                        //$saved = true;
                        $line++;
                    } else {
                        $this->addError('docCheq', $submodel->errors);
                        Yii::error("fatel error cant save rcptdetial,doc_id:" . $submodel->line . "," . $submodel->doc_id);

                        //Yii::$app->end();
                    }
                //}

                //Yii::$app->end();
            }
            if (count($this->docCheques) != $line) {//if more items in $docCheques delete them
                for ($curLine = $line; $curLine < count($this->docCheques); $curLine++)
                    $this->docCheques[$curLine]->delete();
            }
        }
        return true;
    }

    private function stock($item_id, $qty) {
        if (\app\helpers\Linet3Helper::getSetting('company.stock')) {// remove from stock.
            $stockAction = $this->docType->stockAction;
            if ($stockAction) {

                if ($this->docType->stockSwitch) {//if has check box
                    if (!$this->stockSwitch)//if not checked
                        return;
                }

                $account_id = \app\models\User::getWarehouse($this->owner);
                $oppt_account_id = $this->account_id;
                if ((int) $this->oppt_account_id != 0) {
                    if ($this->doctype == 15) {//only if transfer //mybe shuld be only if oppt_account_type==8 wherehouse
                        $account_id = $this->account_id;
                        $oppt_account_id = $this->oppt_account_id;
                    }
                }
                return stockAction::newTransaction($this->id, $account_id, $oppt_account_id, $item_id, $qty * $stockAction);
            }
        }
        return false;
    }

    private function transaction($action) {
        //income account -
        //vat account +
        //costmer accout +
        $precision = Yii::$app->params['precision'];
        $valuedate = $this->issue_date;

        $tranType = $this->docType->transactionType_id;
        $round = 0;
        if ($this->refnum_ext === null) {
            $this->refnum_ext = '';
        }



        if (!is_null($tranType)) {//has trans action!
            $docAction = new Transactions();
            $docAction->num = 0;
            $docAction->account_id = $this->account_id;
            $docAction->type = $tranType;
            $docAction->linenum = 1;
            $docAction->refnum1 = $this->id;
            $docAction->refnum2 = $this->refnum_ext;
            $docAction->valuedate = $valuedate;
            $docAction->details = $this->company;
            $docAction->currency_id = $this->currency_id;
            $docAction->currency_rate = $this->currency_rate;
            $docAction->owner_id = $this->owner;



            if ($this->docType->isdoc) {
                $vatSum = 0;
                $sum = 0;
                $rSum=0;


                foreach ($this->docDetailes as $docdetail) {
                    $docdetail->valuedate = $valuedate;

                    $stockAction = $this->stock($docdetail->item_id, $docdetail->qty);

                    $multi = 1;
                    if (!is_null($this->oppt_account_id))
                        if ($oppt = Accounts::findOne($this->oppt_account_id))
                            $multi = ($oppt->src_tax / 100);

                    $iVat = $docdetail->vatCalc();//iTotalVat - $docdetail->iTotal;
                    $sum+=($docdetail->iTotal + $iVat) * $action;
                    $rSum+=$docdetail->iTotalVat;
                    

                    $iVat*=$multi;
                    $vatSum+= $iVat * $action;
                }

                //******************Discount*******************//

                if ((double) $this->discount != 0) {
                    $docdetail = $this->calcDiscount();
                    $docAction = $docdetail->transaction($docAction, $action, $this->oppt_account_id);
                    $multi = 1;
                    if (!is_null($this->oppt_account_id))
                        if ($oppt = Accounts::findOne($this->oppt_account_id))
                            $multi = ($oppt->src_tax / 100);

                    $iVat =  $docdetail->vatCalc();
                    $sum+=($docdetail->iTotal + $iVat) * $action;
                    $rSum+=$docdetail->iTotalVat;
                    $iVat*=$multi;
                    $vatSum+= $iVat * $action;
                }



                //*******************Account*******************//
                $docAction = $docAction->addSingleLine($this->account_id, round(($sum * -1), $precision));

                
                
                //*******************ROUND***********************//
                
                
                //$diff =  $sum - round($sum, $precision);
                //if ($diff) {//diif
                //    $docAction = $docAction->addDoubleLine(6, $this->account_id, ($diff));
                //}
                
                //auto diff
                $autoDiff =  round($rSum*$action-$sum, $precision);
                if ($autoDiff) {//diif
                    $docAction = $docAction->addDoubleLine(6, $this->account_id, ($autoDiff));
                }


                //*******************VAT***********************//
                if ((double) $vatSum != 0) {
                    $docAction = $docAction->addSingleLine($this->docType->vat_acc_id, round($vatSum, $precision));
                }
            }

            if ($this->docType->isrecipet) {
                foreach ($this->docCheques as $docrcpt) {
                    $docAction = $docrcpt->transaction($docAction, $action, $this->account_id, $this->doctype);
                }
            }
        }


        //Yii::$app->end();
    }

    public function delete() {
        if ($this->action == 0) {//if type==1
            foreach ($this->docDetailes as $detail) {
                $detail->delete();
            }
            foreach ($this->docCheques as $detail) {
                $detail->delete();
            }
            return parent::delete();
        } else {
            return false;
        }
    }

    public static function primaryKey() {
        return ['id'];
    }

   

    private function newNum() {
        if ($this->doctype == 0) {
            return false;
        }

        if (!$this->docnum) {
            $this->docType->last_docnum = $this->docType->last_docnum + 1;
            if($this->getMax($this->docType->id)==$this->docType->last_docnum){
                return false;
            }
            
            $this->docType->save(false);
            return $this->docType->last_docnum;
        } else {
            return $this->docnum;
        }
    }

    public static function getMax($type_id) {
        $num = docs::find()->select('max(docnum)')->where(['doctype'=>$type_id])->scalar();
        
        return $num;

        
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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['company', 'account_id', 'currency_id'], 'required','on'=>'default'),
            array(['doctype',  'oppt_account_id', 'account_id', 'docnum', 'stockSwitch', 'disType', 'status', 'printed', 'owner', 'refnum', 'refstatus', 'vatnum'], 'number', 'integerOnly' => true,'on'=>'default'),
            array(['city'], 'string', 'max' => 40),
            //array([], 'double'),
            [['phone', 'email', 'language'], 'string', 'max' => 255],
            array(['company', 'address'], 'string', 'max' => 80),
            array(['currency_id'], 'string', 'max' => 3),
            array(['zip'], 'string', 'max' => 20),
            array(['account_id'], 'accountVal'),
            array(['vatnum'], 'vatnumVal'),
            array(['docDet'], 'docDetVal'),
            array(['docCheq'], 'docCheqVal'),
            array(['rcptsum', 'sub_total', 'novat_total', 'vat', 'total', 'src_tax', 'discount'], 'double','on'=>'default'),
            array(['ref_date', 'issue_date', 'due_date', 'comments', 'description', 'refnum_ext', 'refnum_ids'], 'safe'),
            //array('oppt_account_id, discount, issue_from, issue_to, id, doctype, docnum, account_id, company, address, city, zip, vatnum, refnum, issue_date, due_date, sub_total, novat_total, vat, total, src_tax, status, currency_id, printed, comments, description, owner', 'safe'),
            

            array(['rcptsum', 'sub_total', 'novat_total', 'vat', 'total', 'src_tax', 'discount'], 'double','on'=>'opppt_req'),
            array(['company', 'account_id', 'currency_id'], 'required','on'=>'opppt_req'),
            array(['doctype',  'oppt_account_id', 'account_id', 'docnum', 'stockSwitch', 'disType', 'status', 'printed', 'owner', 'refnum', 'refstatus', 'vatnum'], 'number', 'integerOnly' => true,'on'=>'opppt_req'),
            array(['oppt_account_id'], 'required', 'on' => 'opppt_req'),
            
            
            
            array(['rcptsum', 'sub_total', 'novat_total', 'vat', 'total', 'src_tax', 'discount'], 'double','on'=>'invrcpt'),
            array(['company', 'account_id', 'currency_id'], 'required','on'=>'invrcpt'),
            array(['doctype',  'oppt_account_id', 'account_id', 'docnum', 'stockSwitch', 'disType', 'status', 'printed', 'owner', 'refnum', 'refstatus', 'vatnum'], 'number', 'integerOnly' => true,'on'=>'invrcpt'),
            array(['rcptsum', 'sub_total', 'novat_total', 'vat', 'total', 'src_tax', 'discount'], 'double','on'=>'invrcpt'),
            array(['total'], 'compare', 'compareAttribute' => 'rcptsum', 'on' => 'invrcpt'),
            
            
            
            
            [['status', 'printed', 'refnum', 'refstatus'], 'number', 'integerOnly' => true,'on'=>'vupdate'],
            [['refnum_ids', 'Files'], 'safe','on'=>'vupdate'],
            
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['oppt_account_id', 'issue_from', 'refnum_ext', 'issue_to', 'id', 'doctype', 'docnum', 'account_id', 'company', 'address', 'city', 'zip', 'vatnum', 'refnum', 'issue_date', 'due_date', 'sub_total', 'novat_total', 'vat', 'total', 'src_tax', 'status', 'currency_id', 'printed', 'comments', 'description', 'owner', 'refstatus'], 'safe', 'on' => 'search'),
        );
    }
    
    public function docTypeVal($attribute, $params) {
        $model=  Doctype::findOne(['id'=>$this->$attribute]);
        if($model==null){
            $this->addError($attribute, Yii::t('app', 'Not a valid Doc Type'));
        }
    }
    
    public function accountVal($attribute, $params) {
        $doctype=  Doctype::findOne(['id'=>$this->doctype]);
        $type=null;
       
        if($doctype==null){
            $this->addError($attribute, Yii::t('app', 'Not a valid Doc Type'));
            
        }else{
            if($attribute=='account_id'){
                $type=$doctype->account_type;
            }else{
                $type=$doctype->oppt_account_type;
            }
        }
        
        $model=Accounts::findOne(['id'=>$this->$attribute,'type'=>$type]);
        if($model==null){
            $this->addError($attribute, Yii::t('app', 'Not a valid account id'));
        }
    }

    public function vatnumVal($attribute, $params) {
        if (\app\helpers\Linet3Helper::vatnumVal($this->$attribute)) {
            $this->addError($attribute, Yii::t('app', 'Not a valid VAT id'));
        }
    }

    public function docCheqVal($attribute, $params) {
        $line = 1;
        $sum = 0;
        if (!is_null($this->docCheq)) {
            $det=[];
            foreach ($this->docCheq as $key => $rcpt) {
                
                //if (!is_array($rcpt)) {
                //    return $this->addError($attribute, Yii::t('app', 'Not a valid doc Cheq array'));
                //}
                $submodel = new Doccheques;

                //go throw attr if no save new
                foreach ($rcpt as $key1 => $value) {
                    if ($submodel->hasAttribute($key1))
                        $submodel->$key1 = $value;
                }
                $submodel->line = $line;
                $submodel->doc_id = 0;
                //if (\app\models\PaymentType::findOne((int) $rcpt["type"]) !== null) {
                    if ($submodel->validate()) {
                        $sum+=$submodel->sum;
                    } else {
                        $this->addError($attribute, Yii::t('app', 'Not a valid doc Cheq').print_r($submodel->errors,true));
                    }
                //} else {
                //    $this->addError($attribute, Yii::t('app', 'Not a valid paymenet type'));
                //}
                    $det[]=$submodel;
                    $line++;
            }
            $this->docCheqArray=$det;
        }
        if ($line) {

            if ($this->total==0)
                $this->total = $this->rcptsum;
            //if (!Linet3Helper::numDiff($sum, (double) $this->rcptsum))
            if ( abs($sum -  $this->total)>0.0001){
                
                $this->addError($attribute, Yii::t('app', 'Total and recipt does not mach') . " rcpt_sum(calc):" . $sum . " doc_total:" . $this->total);
                
            }
        }
    }

    public function docDetVal($attribute, $params) {
        $line = 1;
        $sum = 0;
        
        if (!is_null($this->docDet)) {
            
            $det=[];
            foreach ($this->docDet as $key => $detial) {


                $submodel = new Docdetails;
                $submodel->attributes = $detial;
                $submodel->line = $line;
                $submodel->doc_id = 0;

                $submodel->valuedate=$this->issue_date;

                if (!$submodel->validate()) {
                    $this->addError($attribute, $line.": ".Yii::t('app', 'Not a valid doc item').print_r($submodel->errors,true));
                }
                $det[]=$submodel;
                $line++;
            }
            
            $this->docDetArray=$det;
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Account' => array(self::BELONGS_TO, 'Accounts', 'account_id'),
            'docCheques' => array(self::HAS_MANY, 'Doccheques', 'doc_id'),
            'docDetailes' => array(self::HAS_MANY, 'Docdetails', 'doc_id'),
            'docType' => array(self::BELONGS_TO, 'Doctype', 'doctype'),
            'docStatus' => array(self::BELONGS_TO, 'Docstatus', array('status', 'doctype')),
            'docOwner' => array(self::BELONGS_TO, 'User', 'owner'),
                //'Files'=>array(self::HAS_MANY, 'Files',array('parent_id'=>'id','parent_type'=>'Docs')),
                //'Currency' => array(self::BELONGS_TO, 'Currecies', 'currency_id'),
        //
            );
    }
    public function getAccount() {
        return $this->hasOne(Accounts::className(), array('id' => 'account_id'));
    }
    public function getDocs() {
        return $this->hasOne(Doctype::className(), array('id' => 'doctype'));
    }
    public function getDocType() {
        return $this->hasOne(Doctype::className(), array('id' => 'doctype'));
    }
    public function getDocStatus() {
        return $this->hasOne(Docstatus::className(),  ['num'=>'status', 'doc_type'=>'doctype']);
    }
    public function getDocDetailes(){
        return $this->hasMany(Docdetails::className(), array('doc_id' => 'id'));
    }
    public function getDocCheques(){
        return $this->hasMany(Doccheques::className(), array('doc_id' => 'id'));
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'doctype' => Yii::t('app', 'Document Type'),
            'docnum' => Yii::t('app', 'Document No.'),
            'account_id' => Yii::t('app', 'Account Id'),
            'oppt_account_id' => Yii::t('app', 'Opposite account'),
            'company' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'city' => Yii::t('app', 'City'),
            'zip' => Yii::t('app', 'Zip'),
            'vatnum' => Yii::t('app', 'VAT No.'),
            'refnum' => Yii::t('app', 'Reference No.'),
            'refnum_ext' => Yii::t('app', 'External Reference'),
            'issue_date' => isset($this->docType)?$this->docType->issue_label(): Yii::t('app','Issue Date'),
            'due_date' => isset($this->docType)?$this->docType->due_label(): Yii::t('app','Due Date'),
            'ref_date' => isset($this->docType)?$this->docType->ref_label(): Yii::t('app','Reference Date'),
            'reg_date' => Yii::t('app', 'Create Date'),
            'sub_total' => Yii::t('app', 'Sub Total'),
            'novat_total' => Yii::t('app', 'No VAT Total'),
            'vat' => Yii::t('app', 'VAT'),
            'total' => Yii::t('app', 'Subtotal to pay'),
            'currency_id' => Yii::t('app', 'Currency'),
            'src_tax' => Yii::t('app', 'Src Tax'),
            'status' => Yii::t('app', 'Status'),
            'printed' => Yii::t('app', 'Printed'),
            'description' => Yii::t('app', 'Comments for document'),
            'comments' => Yii::t('app', 'Hidden internal comments'),
            'owner' => Yii::t('app', 'Owner'),
            'discount' => Yii::t('app', 'Discount'),
            'refstatus' => Yii::t('app', 'Reference Status'),
            'stockSwitch' => Yii::t('app', 'Stock Switch'),
        );
    }

    public function printedDoc() {

        if ($this->action == 1)
            $this->printed = (int) $this->printed + 1;
        $this->save(false);
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {
        $query = docs::find();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            "sort"=> ['defaultOrder' => [
                'reg_date'=>SORT_DESC,
                'docnum'=>SORT_DESC
                
                ]]
        ]);
        //exit;
        $this->load($params);

        if (!$this->validate()) {
            var_dump($this->getErrors());
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'doctype' => $this->doctype,
            'docnum' => $this->docnum,
            'account_id' => $this->account_id,
            'vatnum' => $this->vatnum,
            'refnum' => $this->refnum,
            'sub_total' => $this->sub_total,
            'novat_total' => $this->novat_total,
            'vat' => $this->vat,
            'total' => $this->total,
            'src_tax' => $this->src_tax,
            'printed' => $this->printed,
            'currency_id' => $this->currency_id,
            'owner' => $this->owner,
            'refstatus' => $this->refstatus,
        ]);

        $query->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        //$sort->defaultOrder = 'issue_date DESC';
        return $dataProvider;

        
        $criteria->compare('issue_date', $this->issue_date, true);
        $criteria->compare('due_date', $this->due_date, true);
        if (!empty($this->issue_from) && empty($this->issue_to)) {
            $this->issue_from = date("Y-m-d", CDateTimeParser::parse($this->issue_from, Yii::$app->locale->getDateFormat('yiishort')));

            $criteria->addCondition("issue_date>=:date_from");
            $criteria->params[':date_from'] = $this->issue_from;
        } elseif (!empty($this->issue_to) && empty($this->issue_from)) {
            $this->issue_to = date("Y-m-d", CDateTimeParser::parse($this->issue_to, Yii::$app->locale->getDateFormat('yiishort')));

            $criteria->addCondition("issue_date>=:date_to");
            $criteria->params[':date_to'] = $this->issue_to;
        } elseif (!empty($this->issue_to) && !empty($this->issue_from)) {
            $this->issue_from = date("Y-m-d", CDateTimeParser::parse($this->issue_from, Yii::$app->locale->getDateFormat('yiishort')));
            $this->issue_to = date("Y-m-d", CDateTimeParser::parse($this->issue_to, Yii::$app->locale->getDateFormat('yiishort')));

            $criteria->addCondition("issue_date>=:date_from");
            $criteria->addCondition("issue_date<=:date_to");
            $criteria->params[':date_from'] = $this->issue_from;
            $criteria->params[':date_to'] = $this->issue_to;
        }

        

    }

    public function printDoc() {
        return PrintDoc::printMe($this);
    }

    public function getPdf() {


        return PrintDoc::getPdf($this);
    }

    public function pdf() {
        return PrintDoc::pdfDoc($this);
    }
    
    
    public function mail() {
        return PrintDoc::mailDoc($this);
    }
    
    public static function linkById($id) {
        $doc = Docs::findOne(['id' => $id]);
        if ($doc !== null) {
            return \yii\helpers\Html::a(\yii\helpers\Html::encode(Yii::t('app', $doc->docType->name) . " #" . $doc->docnum), yii\helpers\BaseUrl::base() . ("/docs/view/$id"));
        } else {
            return false;
        }
    }

}
