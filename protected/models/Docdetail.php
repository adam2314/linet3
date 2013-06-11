<?php

/**
 * This is the model class for table "docdetails".
 *
 * The followings are the available columns in table 'docdetails':
 * @property string $prefix
 * @property string $num
 * @property string $cat_num
 * @property string $description
 * @property string $qty
 * @property string $unit_price
 * @property string $currency
 * @property string $price
 * @property string $nisprice
 * @property integer $id
 */
class Docdetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Docdetails the static model class
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
		return 'docDetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, line', 'numerical', 'integerOnly'=>true),
			array('prefix', 'length', 'max'=>40),
			array('doc_id, item_id, currency', 'length', 'max'=>10),
			array('description', 'length', 'max'=>128),
			array('qty', 'length', 'max'=>5),
			array('unit_price, price, nisprice', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, doc_id, cat_num, description, qty, unit_price, currency, price, nisprice, line', 'safe', 'on'=>'search'),
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
			'prefix'=>array(self::BELONGS_TO, 'Docs', 'prefix'),
			'num'=>array(self::BELONGS_TO, 'Docs', 'num'),
			'cat_num'=>array(self::BELONGS_TO, 'Items', 'num'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'prefix' => 'Prefix',
			'num' => 'Num',
			'cat_num' => 'Cat Num',
			'description' => 'Description',
			'qty' => 'Qty',
			'unit_price' => 'Unit Price',
			'currency' => 'Currency',
			'price' => 'Price',
			'nisprice' => 'Nisprice',
			'id' => 'ID',
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

		$criteria->compare('prefix',$this->prefix,true);
		$criteria->compare('num',$this->num,true);
		$criteria->compare('cat_num',$this->cat_num,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('qty',$this->qty,true);
		$criteria->compare('unit_price',$this->unit_price,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('nisprice',$this->nisprice,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}