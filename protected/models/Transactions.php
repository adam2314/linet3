<?php

/**
 * This is the model class for table "transactions".
 *
 * The followings are the available columns in table 'transactions':
 * @property integer $id
 * @property integer $num
 * @property integer $account_id
 * @property string $refnum1
 * @property string $refnum2
 * @property string $valuedate
 * @property string $date
 * @property string $details
 * @property integer $currency_id
 * @property string $sum
 * @property string $leadsum
 * @property integer $owner_id
 * @property integer $linenum
 */
class Transactions extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Transactions the static model class
     */
    public static function model($className=__CLASS__)    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()	{
        return 'transactions';
    }

    private function newNum(){
        if($this->num==0){
            $model=Yii::app()->user->settings['company.transaction'];
            $model->value=(int)$model->value+1;
            $model->save();
            return (int)$model->value-1;
        }else{
            return (int)$this->num;
        }

    }
   
    public function beforeSave(){
        $this->num=$this->newNum();
        $this->date=date("Y-m-d H:m:s");
        
        
        $acccur=  Accounts::model()->findByPk($this->account_id)->currency_id;
        
        //leadsum
        $cur=Yii::app()->user->settings['company.cur'];
        if($cur==$this->currency_id)
            $this->leadsum=$this->sum;
        else{
            $rate=  Currates::model()->GetRate($this->currency_id);
            $this->leadsum=$this->sum*$rate;
        }
        
        
        //set sum accourding to acc
        if($this->currency_id!=$acccur){
            $this->currency_id=$acccur;
            $rate=  Currates::model()->GetRate($acccur);
            $this->sum=$this->leadsum/$rate;
        }
            
        //secsum
        $seccur=Yii::app()->user->settings['company.seccur'];
        if($seccur!=''){
            if($seccur==$this->currency_id) 
                $this->secsum=$this->sum;
            else{   
                $rate=  Currates::model()->GetRate($this->currency_id);
                $this->secsum=$this->leadsum/$rate;
            }
        }  
        
        return true;
        
     }
     
    public function save($runValidation = false, $attributes = NULL) {
        
        parent::save($runValidation,$attributes);
        return $this->num;
    }    
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num, account_id, valuedate, currency_id, sum, owner_id, linenum', 'required'),
			array('num, account_id, owner_id, linenum', 'numerical', 'integerOnly'=>true),
                    
			array('refnum1, refnum2, details', 'length', 'max'=>255),
			array('sum, leadsum', 'length', 'max'=>20),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, num, account_id, type, refnum1, refnum2, valuedate, date, details, currency_id, sum, leadsum, owner_id, linenum', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('labels', 'ID'),
			'num' => Yii::t('labels', 'Num'),
			'account_id' => Yii::t('labels', 'Account'),
			'refnum1' => Yii::t('labels', 'Refnum 1'),
			'refnum2' => Yii::t('labels', 'Refnum 2'),
			'valuedate' => Yii::t('labels', 'Value Date'),
			'date' => Yii::t('labels', 'Date'),
			'details' => Yii::t('labels', 'Details'),
			'currency_id' => Yii::t('labels', 'Currency'),
			'sum' => Yii::t('labels', 'Sum'),
			'leadsum' => Yii::t('labels', 'Lead Sum'),
			'owner_id' => Yii::t('labels', 'Owner'),
			'linenum' => Yii::t('labels', 'Line No.'),
                        'type' => Yii::t('labels', 'Type'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('num',$this->num);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('refnum1',$this->refnum1,true);
		$criteria->compare('refnum2',$this->refnum2,true);
		$criteria->compare('valuedate',$this->valuedate,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('sum',$this->sum,true);
		$criteria->compare('leadsum',$this->leadsum,true);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('linenum',$this->linenum);
                
             
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>50),
		));
	}
}