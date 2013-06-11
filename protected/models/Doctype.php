<?php

/**
 * This is the model class for table "docType".
 *
 * The followings are the available columns in table 'docType':
 * @property integer $id
 * @property string $name
 * @property integer $openformat
 * @property integer $isdoc
 * @property integer $isrecipet
 * @property integer $iscontract
 * @property integer $stockAction
 * @property integer $account_type
 * @property integer $docStatus_id
 * @property integer $last_docnum
 */
class Doctype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Doctype the static model class
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
		return 'docType';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, openformat, isdoc, isrecipet, iscontract, stockAction, account_type, docStatus_id, last_docnum', 'required'),
			array('openformat, isdoc, isrecipet, iscontract, stockAction, account_type, docStatus_id, last_docnum', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, openformat, isdoc, isrecipet, iscontract, stockAction, account_type, docStatus_id, last_docnum', 'safe', 'on'=>'search'),
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
	public function getType($name){
		$model=Doctype::model()->find('name=:name',array(':name'=>ucfirst($name)));
		//$post=Post::model()->find('postID=:postID', array(':postID'=>10));
		return $model->id;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'openformat' => 'Openformat',
			'isdoc' => 'Isdoc',
			'isrecipet' => 'Isrecipet',
			'iscontract' => 'Iscontract',
			'stockAction' => 'Stock Action',
			'account_type' => 'Account Type',
			'docStatus_id' => 'Doc Status',
			'last_docnum' => 'Last Docnum',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('openformat',$this->openformat);
		$criteria->compare('isdoc',$this->isdoc);
		$criteria->compare('isrecipet',$this->isrecipet);
		$criteria->compare('iscontract',$this->iscontract);
		$criteria->compare('stockAction',$this->stockAction);
		$criteria->compare('account_type',$this->account_type);
		$criteria->compare('docStatus_id',$this->docStatus_id);
		$criteria->compare('last_docnum',$this->last_docnum);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}