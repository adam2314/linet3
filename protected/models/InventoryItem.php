<?php

/**
 * This is the model class for table "inventoryItem".
 *
 * The followings are the available columns in table 'inventoryItem':
 * @property integer $account_id
 * @property integer $item_id
 * @property integer $ammount
 * @property string $idcode
 */
class InventoryItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InventoryItem the static model class
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
		return 'inventoryItem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id, item_id, ammount, idcode', 'required'),
			array('account_id, item_id, ammount', 'numerical', 'integerOnly'=>true),
			array('idcode', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('account_id, item_id, ammount, idcode', 'safe', 'on'=>'search'),
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
						'account_id'=>Yii::t('label','Account'),
						'item_id'=>Yii::t('label','Item'),
						'ammount'=>Yii::t('label','Ammount'),
						'idcode'=>Yii::t('label','Idcode'),
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

		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('ammount',$this->ammount);
		$criteria->compare('idcode',$this->idcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
