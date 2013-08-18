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
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transactions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num, account_id, refnum1, refnum2, valuedate, details, currency_id, sum, leadsum, owner_id, linenum', 'required'),
			array('num, account_id, currency_id, owner_id, linenum', 'numerical', 'integerOnly'=>true),
			array('refnum1, refnum2, details', 'length', 'max'=>255),
			array('sum, leadsum', 'length', 'max'=>8),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, num, account_id, refnum1, refnum2, valuedate, date, details, currency_id, sum, leadsum, owner_id, linenum', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'num' => 'Num',
			'account_id' => 'Account',
			'refnum1' => 'Refnum1',
			'refnum2' => 'Refnum2',
			'valuedate' => 'Valuedate',
			'date' => 'Date',
			'details' => 'Details',
			'currency_id' => 'Currency',
			'sum' => 'Sum',
			'leadsum' => 'Leadsum',
			'owner_id' => 'Owner',
			'linenum' => 'Linenum',
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
		));
	}
}