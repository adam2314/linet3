<?php

/**
 * This is the model class for table "accTemplate".
 *
 * The followings are the available columns in table 'accTemplate':
 * @property integer $id
 * @property string $name
 * @property integer $AccType_id
 */
class AccTemplate extends CActiveRecord
{
        const table='{{accTemplate}}';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccTemplate the static model class
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
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, AccType_id', 'required'),
			array('AccType_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, AccType_id', 'safe', 'on'=>'search'),
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
                    'items'=>array(self::HAS_MANY, 'AccTemplateItem', 'AccTemplate_id'),
                    'type'=>array(self::BELONGS_TO, 'Acctype', 'AccType_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('labels', 'ID'),
			'name' => Yii::t('labels', 'Name'),
			'AccType_id' => Yii::t('labels', 'Account Type'),
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
		$criteria->compare('AccType_id',$this->AccType_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}