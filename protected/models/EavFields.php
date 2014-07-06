<?php

/**
 * This is the model class for table "eavFields".
 *
 * The followings are the available columns in table 'eavFields':
 * @property integer $id
 * @property string $name
 * @property string $eavType
 * @property integer $min
 * @property integer $max
 */
class EavFields extends basicRecord{
    const table='{{eavFields}}';
    
    const TYPE_STRING='string';
    const TYPE_SELECT='select(X)';//json_encode
    const TYPE_INT='integer';
    const TYPE_LIST='list(X)';
    const TYPE_BOOLEAN='boolean';
    const TYPE_FILE='file';
    const TYPE_URL='url';
    
    public function getTypes() {
        return  self::getConstants('TYPE_', __CLASS__);
        //print_r($list);
        //return "";
        return Yii::t('app', $list[$this->refstatus]['name']);
    }
    

    public function getType() {
        $list = $this->getTypes();
        //print_r($list);
        //return "";
        return Yii::t('app', $list[$this->refstatus]['name']);
    }
    
    
    
    
    
    
    
    
    
    
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EavFields the static model class
	 */
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName(){
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
			array('name, eavType, min, max', 'required'),
			array('min, max', 'numerical', 'integerOnly'=>true),
			array('name, eavType', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, eavType, min, max', 'safe', 'on'=>'search'),
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
                    'items'=>array(self::HAS_MANY, 'AccTemplateItem', 'eavFields_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('labels','ID'),
			'name' => Yii::t('labels','Name'),
			'eavType' => Yii::t('labels','Eav Type'),
			'min' => Yii::t('labels','Min'),
			'max' => Yii::t('labels','Max'),
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
		$criteria->compare('eavType',$this->eavType,true);
		$criteria->compare('min',$this->min);
		$criteria->compare('max',$this->max);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}