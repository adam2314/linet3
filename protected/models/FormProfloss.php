<?php
/**
 * Description of FormProfloss
 *
 * @author adam
 */
class FormProfloss extends CFormModel
{
    public $year;
    public $from_date;
    public $to_date;
    
    
    public function init(){
        $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdatetime=Yii::app()->locale->getDateFormat('phpdatetimes');
        
        $this->from_date=date($phpdatetime,CDateTimeParser::parse('01/01/'.date('Y').' 00:00:00',$yiidatetimesec));
        $this->to_date=date($phpdatetime);
        return parent::init();
    }

    public function attributeLabels() {
        return array(
            'year' => Yii::t('labels', 'Year'),
            'from_date' => Yii::t('labels', 'From Date'),
            'to_date' => Yii::t('labels', 'To Date'),
            
        );
    }
    

    public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('to_date, from_date, year', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('to_date, from_date, year', 'safe', 'on'=>'search'),
		);
	}
    
    private function calc($account_type){
        $criteria=new CDbCriteria;
        $criteria->condition="type = :type";
        $criteria->params=array(
            ':type' => $account_type,
          );

        $accounts= Accounts::model()->findAll($criteria);
        $sum=0;
        $data=array();
        foreach($accounts as $account){
                
                $line=$account->getTotal($this->from_date.":00",$this->to_date.":59"); 
                if($line!=0){
                    $data[]=array('id'=>$account->id,'name'=>$account->name,'sum'=>$line,'id6111'=>$account->id6111);
                    $sum+=$line;
                }
        }
        $data[]=array('id'=>'','name'=>Yii::t('app','Total'),'sum'=>$sum,'id6111'=>'');
        return $data;
    }
    
    public function search(){
        
        
        $data=$this->calc(3);//incomes
        $data[] =$inTotal = array_pop($data);
        $data=array_merge($data,$this->calc(2));//outcomes
        $data[] =$outTotal = array_pop($data);
        
        
        $data[]=array('id'=>'','name'=>Yii::t("app", "Profit & Loss"),'sum'=>$inTotal["sum"]+$outTotal["sum"],'id6111'=>'');
        return new CArrayDataProvider($data,
                 array(
                                'pagination'=>array(
                                    'pageSize'=>100,
                            ),
                )             
          );
    }
    //put your code here
}
