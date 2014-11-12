<?php

/**
 * This is the model class for table "currencies".
 *
 * The followings are the available columns in table 'currencies':
 * @property string $id
 * @property string $company_id
 * @property string $file_id

 */
class Download extends mainRecord{
        const table='download';
        public function primaryKey()     {
                return 'id';
                // For composite primary key, return an array like the following
                //return array('prefix', 'num');
            }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Currecies the static model class
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
			array('id', 'length', 'max'=>255),
			array('company_id, file_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, file_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		//return array();
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
                        'company_id'=>Yii::t('labels','Company'),
                        'file_id'=>Yii::t('labels','File'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search(){
		
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('file_id',$this->file_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

}