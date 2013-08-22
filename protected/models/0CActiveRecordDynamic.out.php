<?php

/**
 * This is the model class for dynamic tables.
 *
 */
class CActiveRecordDynamic extends CActiveRecord
{
	/*public function findByPK($id){
		//findByPk
	}*/
	/**
	 * @return array validation rules for model attributes.
	 */
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, tablename, data, desc, sort', 'required'),
			array('sort, minlen, maxlen', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('tablename', 'length', 'max'=>40),
			array('data', 'length', 'max'=>60),
			array('desc', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, tablename, data, desc, sort, minlen, maxlen', 'safe', 'on'=>'search'),
		);
	}
*/
	/**
	 * @return array relational rules.
	 */
	/*
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		//return array(
		//);
	}
*/
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	/*public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'tablename' => 'Tablename',
			'data' => 'Data',
			'desc' => 'Desc',
			'sort' => 'Sort',
			'minlen' => 'Minlen',
			'maxlen' => 'Maxlen',
		);
	}*/

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	/*public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tablename',$this->tablename,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('minlen',$this->minlen);
		$criteria->compare('maxlen',$this->maxlen);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}*/
}