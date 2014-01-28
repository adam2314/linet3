<?php
class FormReportTaxrep extends CFormModel{
    public $from_month;
    public $year;
    public $from_date;
    
    public $to_month;
    public $to_date;
    
    public $step=0;
    
    
    //public $selvat_total;
    //public $selvat_acc;
    
    //public $buyvat_total;
    //public $buyvat_acc;
    
    //public $assetvat_total;
    //public $assetvat_acc;
    
    private $custtax_acc;
    public $custtax_sum; 
    public $custtax_total; 
    public $income_sum_novat=0;
    public $income_sum=0;
    public $tax_rate=0; 
    public $tax_sum=0; 
    public $tax_total=0; 
    public $tax_acc;
    
    
    
    
    public static function model($className=__CLASS__)    {
        return parent::model($className);
    }
    
    
    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('tax_rate, income_sum, income_sum_novat, custtax_sum, custtax_total, tax_total, tax_sum, step, to_month, to_date, from_month, from_date, year,', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tax_rate, income_sum, income_sum_novat, custtax_sum, custtax_total, tax_total, tax_sum, step, to_month, to_date, from_month, from_date, year,', 'safe', 'on'=>'search'),
		);
	}
    
        public function calcPay(){
             

                
                $this->income_sum = Acctype::model()->findByPk(3)->getTotal($this->from_date,$this->to_date);
                
                $this->tax_rate=Yii::app()->user->settings['company.tax.rate'];
                
                //$tax
                $this->tax_sum=$this->income_sum*($this->tax_rate/100);
                
                
                $this->custtax_acc=Yii::app()->user->settings['company.acc.custtax'];        
                $this->custtax_sum=  Accounts::model()->findByPk($this->custtax_acc)->getTotal($this->from_date,$this->to_date);    //*-1    
                $this->custtax_total=  Accounts::model()->findByPk($this->custtax_acc)->getTotal(0,$this->to_date);
                    
               
                
                if($this->custtax_total > $this->tax_sum)
                    $this->custtax_total = $this->tax_sum;
    
                $this->tax_total = $this->tax_sum - $this->custtax_total;
                
                
            return $this->tax_total;
        }
    
        
        public function pay(){
            $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
            $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');
            
            $date=date($phpdbdatetime,CDateTimeParser::parse($this->to_date,$yiidatetimesec));
            
            
            
            
            /*
            $tnum = Transaction(0, TRAN_PRETAX, IRS, $ref1, $ref2, $date, $details, $this->tax_sum); 
            $tnum = Transaction($tnum, TRAN_PRETAX, PRETAX, $ref1, $ref2, $date, $details, $this->tax_sum * -1.0);
            $tnum = Transaction($tnum, TRAN_PRETAX, IRS, $ref1, $ref2, $date, $details, $this->custtax_total);
            $tnum = Transaction($tnum, TRAN_PRETAX, CUSTTAX, $ref1, $ref2, $date, $details, $this->custtax_total * -1.0);
            
            */
            
            
            
            $irs=Yii::app()->user->settings['company.acc.irs'];
            $pretax=Yii::app()->user->settings['company.acc.pretax'];
            $custtax=Yii::app()->user->settings['company.acc.custtax'];
            $cur=Yii::app()->user->settings['company.cur'];
            $owner=Yii::app()->user->id;
            $line=1;
            
            
            $accout=new Transactions();
            $accout->account_id=$irs;//IRS
            $accout->type=14;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','tax');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->tax_sum;
            $line++;
            $num=$accout->save();
             
            $accout=new Transactions();
            $accout->account_id=$pretax;//PRETAX
            $accout->type=14;
            $accout->num=$num;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','tax');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->tax_sum*-1;
            $line++;
            $accout->save();
            
            $accout=new Transactions();
            $accout->account_id=$irs;//IRS
            $accout->type=14;
            $accout->num=$num;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','tax');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->custtax_total;
            $line++;
            $accout->save();
            
            $accout=new Transactions();
            $accout->account_id=$custtax;//CUSTTAX
            $accout->type=14;
            $accout->num=$num;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','tax');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->custtax_total*-1.0;
            $line++;
            $accout->save();
            
            
        }
}