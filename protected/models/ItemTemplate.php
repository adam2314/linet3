<?php

/**
 * This is the model class for table "accTemplate".
 *
 * The followings are the available columns in table 'accTemplate':
 * @property integer $id
 * @property string $name
 * @property integer $ItemCat_id
 */
class ItemTemplate extends CActiveRecord
{
        const table='{{itemTemplate}}';
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
			array('name, Itemcategory_id', 'required'),
			array('Itemcategory_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, Itemcategory_id', 'safe', 'on'=>'search'),
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
                    'Items'=>array(self::HAS_MANY, 'ItemTemplateItem', 'ItemTemplate_id'),
                    'Category'=>array(self::BELONGS_TO, 'Itemcategory', 'Itemcategory_id'),
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
			'Itemcategory_id' => Yii::t('labels', 'Item Category'),
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
		$criteria->compare('Itemcategory_id',$this->Itemcategory_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}