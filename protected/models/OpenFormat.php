<?php

class OpenFormat extends CActiveRecord{
         const table='{{openformat}}';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fields the static model class
	 */
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
            return self::table;
        }
        public function primaryKey(){
	    return 'id';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, desc, type', 'required'),
			array('id', 'length', 'max'=>30),
			array('type', 'length', 'max'=>4),
			array('description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, type, size, record, action, type_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations(){
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'description' => 'Descrieption',
			'type' => 'Type',
                        'size' => 'Size',
                        'record' => 'Record',//out
                        'action' => 'Action',
                        'type_id' => 'Type Id',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search(){
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type,true);
                
                $criteria->compare('size',$this->size,true);
                $criteria->compare('record',$this->record,true);//out
                $criteria->compare('action',$this->action,true);
                $criteria->compare('type_id',$this->type_id);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}