<?php
class ReportVat extends CFormModel
{
    public $from_month;
    public $year;
    public $from_date;
    
    public $to_month;
    //public $to_year;
    public $to_date;
    
    public $step=0;
    public $selvat_total;
    public $selvat_acc;
    
    public $buyvat_total;
    public $buyvat_acc;
    
    public $assetvat_total;
    public $assetvat_acc;
    
    
    public $income_sum_novat=0;
    public $income_sum=0;
    public $payvat_total=0; 
    public $payvat_acc;
    public static function model($className=__CLASS__)    {
        return parent::model($className);
    }
    
    
    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('payvat_total, income_sum, income_sum_novat, buyvat_total, buyvat_acc, assetvat_total, assetvat_acc, selvat_total, selvat_acc, step, to_month, to_date, from_month, from_date, year,', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('payvat_total, income_sum, income_sum_novat, buyvat_total, buyvat_acc, assetvat_total, assetvat_acc, selvat_total, selvat_acc, step, to_month, to_date, from_month, from_date, year,', 'safe', 'on'=>'search'),
		);
	}
    
        public function calcPay(){
             $criteria=new CDbCriteria;
                $criteria->condition="type = :type";
                $criteria->params=array(
                    ':type' => 3,
                  );

                $incomes= Accounts::model()->findAll($criteria);
                    foreach($incomes as $account){
                        //echo $transaction->date.','.$transaction->sum.'<br>';
                        if($account->src_tax==0)
                            $this->income_sum_novat+=$account->getTotal($this->from_date,$this->to_date); 
                        else
                            $this->income_sum+=$account->getTotal($this->from_date,$this->to_date); 
                    }

                
                
                $this->selvat_acc=Yii::app()->user->settings['company.acc.sellvat'];
                $selvat=  Accounts::model()->findByPk($this->selvat_acc);
                $this->selvat_total=$selvat->getTotal($this->from_date,$this->to_date);
                
                $this->buyvat_acc=Yii::app()->user->settings['company.acc.buyvat'];
                $buyvat=  Accounts::model()->findByPk($this->buyvat_acc);
                $this->buyvat_total=$buyvat->getTotal($this->from_date,$this->to_date);
                
                $this->assetvat_acc=Yii::app()->user->settings['company.acc.assetvat'];
                $assetvat=  Accounts::model()->findByPk($this->assetvat_acc);
                $this->assetvat_total=$assetvat->getTotal($this->from_date,$this->to_date);

            $this->payvat_total=$this->selvat_total-($this->buyvat_total+$this->assetvat_total);
            return $this->payvat_total;
        }
    
        
        public function pay(){
            $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
            $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');
            
            $this->payvat_acc=Yii::app()->user->settings['company.acc.payvat'];
            
            $date=date($phpdbdatetime,CDateTimeParser::parse($this->to_date,$yiidatetimesec));
            $cur=Yii::app()->user->settings['company.cur'];
            $owner=Yii::app()->user->id;
            $line=1;
            
            
            
            $accout=new Transactions();
            $accout->account_id=$this->selvat_acc;
            $accout->type=6;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','vat');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->selvat_total * -1.0;
            $line++;
            $num=$accout->save();
             
            $accout=new Transactions();
            $accout->account_id=$this->payvat_acc;
            $accout->type=6;
            $accout->num=$num;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','vat');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->selvat_total;
            $line++;
            $accout->save();
            
            $accout=new Transactions();
            $accout->account_id=$this->buyvat_acc;
            $accout->type=6;
            $accout->num=$num;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','vat');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->buyvat_total;
            $line++;
            $accout->save();
            
            $accout=new Transactions();
            $accout->account_id=$this->payvat_acc;
            $accout->type=6;
            $accout->num=$num;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','vat');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->buyvat_total*-1.0;
            $line++;
            $accout->save();
            
            $accout=new Transactions();
            $accout->account_id=$this->assetvat_acc;
            $accout->type=6;
            $accout->num=$num;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','vat');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->assetvat_total;
            $line++;
            $accout->save();
            
            $accout=new Transactions();
            $accout->account_id=$this->payvat_acc;
            $accout->type=6;
            $accout->num=$num;
            $accout->refnum1=$this->from_date;
            $accout->refnum2=$this->to_date;
            $accout->valuedate=$date;
            $accout->details=Yii::t('app','vat');
            $accout->currency_id=$cur;
            $accout->owner_id=$owner;
            $accout->linenum=$line;
            $accout->sum=$this->assetvat_total*-1.0;
            $line++;
            $accout->save();
             
                            //$s = $this->selvat_total * -1.0;
                            //$tnum = Transaction(0, VAT, SELLVAT, $ref1, $ref2, $date, _('VAT'), $s);
                            //$tnum = Transaction($tnum, VAT, PAYVAT, $ref1, $ref2, $date, _('VAT'), $sellvat);
                            //$b = $this->buyvat_total * -1.0;
                            //$tnum = Transaction(0, VAT, BUYVAT, $ref1, $ref2, $date, _('VAT'), $buyvat);
                            //$tnum = Transaction($tnum, VAT, PAYVAT, $ref1, $ref2, $date, _('VAT'), $b);
                            //$a = $this->assetvat_total * -1.0;
                            //$tnum = Transaction(0, VAT, ASSETVAT, $ref1, $ref2, $date, _('VAT'), $assetvat);
                            //$tnum = Transaction($tnum, VAT, PAYVAT, $ref1, $ref2, $date, _('VAT'), $a);
        }
}