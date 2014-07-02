<?php

/**
 * This is the model class for table "bankName".
 *
 * The followings are the available columns in table 'bankName':
 * @property integer $id
 * @property string $name
 */
class Bankbook extends CActiveRecord{
        const table='{{bankbook}}';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BankName the static model class
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
		return self::table;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		return array(
			array('account_id, date, sum', 'required'),
			array('id, account_id', 'numerical', 'integerOnly'=>true),
			array('details, refnum', 'length', 'max'=>255),
                        array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, account_id, date, sum, total, cor_num, details, refnum', 'safe', 'on'=>'search'),
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
                        'id'=>Yii::t('labels','ID'),
                        'details'=>Yii::t('labels','Details'),//, , , , , cor_num 
                        'account_id'=>Yii::t('labels','Account id'),
                        'date'=>Yii::t('labels','Date'),
                        'sum'=>Yii::t('labels','Sum'),
                        'total'=>Yii::t('labels','Total'),
                        'refnum'=>Yii::t('labels','Ref. No.'),
                    
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search(){
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('account_id',$this->account_id);
                $criteria->compare('date',$this->date,true);
		$criteria->compare('sum',$this->sum,true);
                $criteria->compare('total',$this->total,true);
		$criteria->compare('cor_num',$this->cor_num);
                $criteria->compare('details',$this->details,true);
		$criteria->compare('refnum',$this->refnum,true);
                $criteria->order='id';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>100),
		));
	}
        
}
