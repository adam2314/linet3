<?php

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
class Docs extends basicRecord{
    const table='{{docs}}';
    //public $lang;
    public $docDet=NULL;
    public $docCheq=NULL;

    
    public $issue_from;
    public $issue_to;
    
    /*
    public function __construct($arg = NULL) {
    //    public function __construct($type=0) {
        parent::_construct(); 
        //$doctype=Doctype::model()->findByPk($type);
        //$this->docType=model;
        //$this->doctype=$type;
        
    }//*/
    
    /*
     * for open format export 
     */
    public function getType(){
             return isset($this->docType)?$this->docType->openformat:"";
         }
    
    
    
    public function openfrmt($line){
            $docs='';
            
            //get all fields (m100) sort by id
            $criteria=new CDbCriteria;
            $criteria->condition="type_id = :type_id";
            $criteria->params=array(':type_id' => "C100");
            $fields= OpenFormat::model()->findAll($criteria);
            
            //loop strfgy
            foreach ($fields as $field) {
                $docs.=$this->openfrmtFieldStr($field,$line);
            }
            return $docs."\r\n";
        }
        
    public function pcn874(){
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
        $a="T";
        if(in_array($this->doctype, array(3,4,9,11)))
                $a="S";
        else if (in_array($this->doctype, array(13,14  )))
                $a="T";
        else
             echo $this->docnum;
        $opptacc=$this->vatnum;
        $docdate=date("Ymd",CDateTimeParser::parse($this->issue_date,Yii::app()->locale->getDateFormat('yiidatetimesec')));
        $doctype=$this->doctype;
        $docnum=$this->docnum;
        $vatsum=$this->vat;
        $plusmin=($this->total>=0)?"+":"-";
        $docsum=$this->total;
        return sprintf("%1s%09d%08d0000%02d%07d%09d%1s%010d000000000",
			$a, $opptacc, $docdate,$doctype,$docnum, $vatsum, $plusmin,$docsum);
        
    }
    
    
    public function beforeSave(){
            if ($this->isNewRecord) 
                $this->issue_date = date(Yii::app()->locale->getDateFormat('phpdatetime'));
            $this->modified = date(Yii::app()->locale->getDateFormat('phpshort'));

            $this->due_date=date("Y-m-d H:m:s",CDateTimeParser::parse($this->due_date,Yii::app()->locale->getDateFormat('yiishort')));
            $this->issue_date=date("Y-m-d H:m:s",CDateTimeParser::parse($this->issue_date,Yii::app()->locale->getDateFormat('yiidatetime')));
            $this->modified=date("Y-m-d H:m:s",CDateTimeParser::parse($this->modified,Yii::app()->locale->getDateFormat('yiishort')));
            
            //return true;
            return parent::beforeSave();
        }
        
        public function afterSave(){
           $this->due_date=date(Yii::app()->locale->getDateFormat('phpshort'),strtotime($this->due_date));
           $this->issue_date=date(Yii::app()->locale->getDateFormat('phpdatetime'),strtotime($this->issue_date));
           $this->modified=date(Yii::app()->locale->getDateFormat('phpshort'),strtotime($this->modified));
            
            return parent::afterSave();
        }
       public function  afterFind(){
           $this->due_date=date(Yii::app()->locale->getDateFormat('phpshort'),strtotime($this->due_date));
           $this->issue_date=date(Yii::app()->locale->getDateFormat('phpdatetime'),strtotime($this->issue_date));
           $this->modified=date(Yii::app()->locale->getDateFormat('phpshort'),strtotime($this->modified));

            return parent::afterFind();
         }
       
    public function save($runValidation = true, $attributes = NULL) {

        $this->docnum=$this->newNum();
        $this->owner=Yii::app()->user->id;
        //$catagories=ItemVatCat::model()->findAll();
        $a=parent::save($runValidation,$attributes);
        //$this->docType->stockAction;
        /***********************doc********************/
        if(!is_null($this->docDet)){
            $line=0;
            foreach($this->docDet as $key=>$detial){
                $submodel=  Docdetails::model()->findByPk(array('doc_id'=>$this->id,'line'=>$detial['line']));
                if(!$submodel){//new line
                   $submodel=new Docdetails; 
                }

                $submodel->attributes=$detial;
                $submodel->doc_id=$this->id;

                if((int)$detial["item_id"]!=0){
                    if($submodel->save()){
                        $saved=true;
                        $line++;
                    }else{
                        echo "fatel error cant save doc detial";
                    }
                }
            }
            if(count($this->docDetailes)!=$line){//if more items in $docdetails delete them
                    for ($curLine=$line;$curLine< count($this->docDetailes);$curLine++)
                            $this->docDetailes[$curLine]->delete();
            }
        }
        /**********************rcpt********************/
        if(!is_null($this->docCheq)){
            $line=0;
            foreach($this->docCheq as $key=>$rcpt){
                $submodel=  Doccheques::model()->findByPk(array('doc_id'=>$this->id,'line'=>$rcpt['line']));
                if(!$submodel){//new line
                   $submodel=new Doccheques; 
                }

                $submodel->attributes=$rcpt;
                $submodel->doc_id=$this->id;

                if((int)$rcpt["type"]!=0){
                    if($submodel->save()){
                        $saved=true;
                        $line++;
                    }else{
                        echo "fatel error cant save doc rcpt:".$this->id;
                        //exit;
                    }
                }
            }
                if(count($this->docCheques)!=$line){//if more items in $docCheques delete them
                        for ($curLine=$line;$curLine< count($this->docCheques);$curLine++)
                                $this->docCheques[$curLine]->delete();
                }

        }
        if($this->docStatus->action!=0){
            $this->transaction((int)$this->docStatus->action);
        }
        return $a;
    }
    private function transaction($action){
        //income account -
        //vat account +
        //costmer accout +
        $valuedate=date("Y-m-d H:m:s",CDateTimeParser::parse($this->issue_date,Yii::app()->locale->getDateFormat('yiidatetime')));
        $num=0;
        $line=1;
        $tranType=$this->docType->transactionType_id;
        if($this->docType->isdoc){
            $vat=new Transactions();
            $accout=new Transactions();

            foreach($this->docDetailes as $docdetail){             
                 $num=$docdetail->transaction($num,$this->id,$valuedate,$this->company,$action,$line,$model->docType->oppt_account_type,$tranType);
                 $line++;
                 $accout->sum+=($docdetail->invprice+ $docdetail->vat)*$action;
                 $vat->sum+= $docdetail->vat*$action;       
            }

            $accout->num=$num;
            $accout->account_id=$this->account_id;
            $accout->type=$tranType;
            $accout->refnum1=$this->id;
            $accout->valuedate=$valuedate;
            $accout->details=$this->company;
            $accout->currency_id=$this->currency_id;
            $accout->owner_id=$this->owner;
            $accout->linenum=$line;
            $line++;
            $num=$accout->save();

            $vat->num=$num;
            //$vat->account_id=Yii::app()->user->settings['company.acc.vatacc'];
            $vat->account_id=$this->docType->vat_acc_id;
            $vat->type=$tranType;
            $vat->refnum1=$this->id;
            $vat->valuedate=$valuedate;
            $vat->details=$this->company;
            $vat->currency_id=$this->currency_id;
            $vat->owner_id=$this->owner;
            $vat->linenum=$line;
            $line++;
            //print_r($vat->attributes);
            $num=$vat->save();
        }
        
        if($this->docType->isrecipet){
            foreach($this->docCheques as $docrcpt){
               $num=$docrcpt->transaction($num,$this->id,$valuedate,$this->company,$action,$line,$this->account_id,$tranType);

               $line++;
               $line++;
            }
            if((int)$this->src_tax!=0){
                $src=new Transactions();
                $src->num=$num;
                $src->account_id=$this->account_id;
                $src->type=$tranType;
                $src->refnum1=$this->id;
                $src->valuedate=$valuedate;
                $src->details=$this->company;
                $src->currency_id=$this->currency_id;
                $src->owner_id=$this->owner;
                $src->linenum=$line;
                $src->sum+=($this->src_tax)*$action;
                $line++;
                $num=$src->save();

                $src=new Transactions();
                $src->num=$num;
                $src->account_id=Yii::app()->user->settings['company.acc.custtax'];
                $src->type=$tranType;
                $src->refnum1=$this->id;
                $src->valuedate=$valuedate;
                $src->details=$this->company;
                $src->currency_id=$this->currency_id;
                $src->owner_id=$this->owner;
                $src->linenum=$line;
                $src->sum+=($this->src_tax)*$action*-1;
                $line++;
                $num=$src->save();
            
            }
        }
        
        //exit;
        
    }   
        
    public function primaryKey(){
        return 'id';
        // For composite primary key, return an array like the following
        //return array('prefix', 'num');
    }
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Docs the static model class
     */
    public static function model($className=__CLASS__)   {
            return parent::model($className);
    }


    private function newNum(){
        if($this->docnum==0){            
            $this->docType->last_docnum=$this->docType->last_docnum+1;
            $this->docType->save();
            return $this->docType->last_docnum;
        }else{
            return $this->docnum;
        }

    }
    /**
     * @return string the associated database table name
     */
    public function tableName(){
            return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules(){
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('status, printed, owner', 'numerical', 'integerOnly'=>true),
                    array('city', 'length', 'max'=>40),
                    array('doctype, docnum, oppt_account_id, account_id, zip, vatnum', 'length', 'max'=>11),
                    array('company, address', 'length', 'max'=>80),
                    array('currency_id', 'length', 'max'=>3),
                    array('refnum', 'length', 'max'=>20),
                    array('discount, sub_total, novat_total, vat, total, src_tax', 'length', 'max'=>20),
                    array('issue_date, due_date, comments', 'safe'),
                    // The following rule is used by search().
                    // Please remove those attributes that should not be searched.
                    array('oppt_account_id, discount, issue_from, issue_to, id, doctype, docnum, account_id, company, address, city, zip, vatnum, refnum, issue_date, due_date, sub_total, novat_total, vat, total, src_tax, status, currency_id, printed, comments, owner', 'safe', 'on'=>'search'),
            );
    }

    /**
     * @return array relational rules.
     */
    public function relations(){
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                    'docAccount_id'=>array(self::BELONGS_TO, 'Account', 'id'),
                    'docCheques'=>array(self::HAS_MANY, 'Doccheques', 'doc_id'),
                    'docDetailes'=>array(self::HAS_MANY, 'Docdetails', 'doc_id'),
                    'docType'=>array(self::BELONGS_TO, 'Doctype', 'doctype'),
                    'docStatus'=>array(self::BELONGS_TO, 'Docstatus', array('status','doctype')),
                    'docOwner' => array(self::BELONGS_TO, 'Users', 'owner'),
                    //'Currency' => array(self::BELONGS_TO, 'Currecies', 'currency_id'),
                    //
            );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()    {
            return array(
                    'id'=>Yii::t('labels','ID'),
                    'doctype'=>Yii::t('labels','Documenet Type'),
                    'docnum'=>Yii::t('labels','Documenet No.'),
                    'account_id'=>Yii::t('labels','Account'),
                    'company'=>Yii::t('labels','Company'),
                    'address'=>Yii::t('labels','Address'),
                    'city'=>Yii::t('labels','City'),
                    'zip'=>Yii::t('labels','Zip'),
                    'vatnum'=>Yii::t('labels','VAT No.'),
                    'refnum'=>Yii::t('labels','Refernce No.'),
                    'issue_date'=>Yii::t('labels','Issue Date'),
                    'due_date'=>Yii::t('labels','Due Date'),
                    'sub_total'=>Yii::t('labels','Sub Total'),
                    'novat_total'=>Yii::t('labels','No VAT Total'),
                    'vat'=>Yii::t('labels','VAT'),
                    'total'=>Yii::t('labels','Total'),
                    'currency_id'=>Yii::t('labels','Currency'),
                    'src_tax'=>Yii::t('labels','Src Tax'),
                    'status'=>Yii::t('labels','Status'),
                    'printed'=>Yii::t('labels','Printed'),
                    'comments'=>Yii::t('labels','Comments'),
                    'owner'=>Yii::t('labels','Owner'),
            );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
            // Warning: Please modify the following code to remove attributes that
            // should not be searched.

            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id,true);
            //$criteria->compare('prefix',$this->prefix,true);
            $criteria->compare('doctype',$this->doctype,true);
            $criteria->compare('docnum',$this->docnum,true);
            $criteria->compare('account_id',$this->account_id,true);
            $criteria->compare('company',$this->company,true);
            $criteria->compare('address',$this->address,true);
            $criteria->compare('city',$this->city,true);
            $criteria->compare('zip',$this->zip,true);
            $criteria->compare('vatnum',$this->vatnum,true);
            $criteria->compare('refnum',$this->refnum,true);
            $criteria->compare('issue_date',$this->issue_date,true);
            $criteria->compare('due_date',$this->due_date,true);
            $criteria->compare('sub_total',$this->sub_total,true);
            $criteria->compare('novat_total',$this->novat_total,true);
            $criteria->compare('vat',$this->vat,true);
            $criteria->compare('total',$this->total,true);
            $criteria->compare('src_tax',$this->src_tax,true);
            $criteria->compare('status',$this->status);
            $criteria->compare('printed',$this->printed);
            $criteria->compare('currency_id',$this->currency_id);
            $criteria->compare('comments',$this->comments,true);
            $criteria->compare('owner',$this->owner);

            if(!empty($this->issue_from) && empty($this->issue_to)) {
                $this->issue_from=date("Y-m-d",CDateTimeParser::parse($this->issue_from,Yii::app()->locale->getDateFormat('yiishort')));
                $criteria->condition = "issue_date >= '$this->issue_from'";  // date is database date column field
            }elseif(!empty($this->issue_to) && empty($this->issue_from)){
                $this->issue_to=date("Y-m-d",CDateTimeParser::parse($this->issue_to,Yii::app()->locale->getDateFormat('yiishort')));
                $criteria->condition = "issue_date <= '$this->issue_to'";
            }elseif(!empty($this->issue_to) && !empty($this->issue_from)){
                $this->issue_from=date("Y-m-d",CDateTimeParser::parse($this->issue_from,Yii::app()->locale->getDateFormat('yiishort')));
                $this->issue_to=date("Y-m-d",CDateTimeParser::parse($this->issue_to,Yii::app()->locale->getDateFormat('yiishort')));
                $criteria->condition = "issue_date  >= '$this->issue_from' and issue_date <= '$this->issue_to'";
            }
            
            
            
            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }
}