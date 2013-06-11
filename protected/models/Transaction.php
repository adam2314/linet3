<?php

/**
 * This is the model class for table "transactions".
 *
 * The followings are the available columns in table 'transactions':
 * @property integer $id
 * @property string $num
 * @property string $type
 * @property string $account_id
 * @property string $refnum1
 * @property string $refnum2
 * @property string $date
 * @property string $details
 * @property string $sum
 * @property string $cor_num
 * @property integer $line
 * @property integer $owner
 */
class Transaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transaction the static model class
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
			array('line, owner', 'required'),
			array('line, owner', 'numerical', 'integerOnly'=>true),
			array('num, type, account_id', 'length', 'max'=>10),
			array('refnum1, refnum2', 'length', 'max'=>20),
			array('details', 'length', 'max'=>256),
			array('sum', 'length', 'max'=>8),
			array('cor_num', 'length', 'max'=>100),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, num, type, account_id, refnum1, refnum2, date, details, sum, cor_num, line, owner', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'account_id' => 'Account',
			'refnum1' => 'Refnum1',
			'refnum2' => 'Refnum2',
			'date' => 'Date',
			'details' => 'Details',
			'sum' => 'Sum',
			'cor_num' => 'Cor Num',
			'line' => 'Line',
			'owner' => 'Owner',
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
		$criteria->compare('num',$this->num,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('account_id',$this->account_id,true);
		$criteria->compare('refnum1',$this->refnum1,true);
		$criteria->compare('refnum2',$this->refnum2,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('sum',$this->sum,true);
		$criteria->compare('cor_num',$this->cor_num,true);
		$criteria->compare('line',$this->line);
		$criteria->compare('owner',$this->owner);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}