<?php

/**
 * This is the model class for table "databases".
 *
 * The followings are the available columns in table 'databases':
 * @property integer $id
 * @property string $string
 * @property string $prefix
 */
class Company extends CActiveRecord{
        
	/**
	 * @return string the associated database table name
	 */
         public function getLevel(){
             $level=  DatabasesPerm::model()->findByPk(array($this->id,Yii::app()->user->id));
             return $level;
         }
    
	public function tableName()
	{
		return 'databases';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('string, prefix', 'required'),
			array('string, prefix', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, string, prefix', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
                //$this->user_id=Yii::app()->user->id;
                
                
                //print($this->user_id.$this->id);
                //exit;
		return array(
                    
                     'level'=>array(self::HAS_ONE,'DatabasesPerm',array('database_id'=>'id')),
		);
                
                //
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'string' => Yii::t('app','String'),
			'prefix' => Yii::t('app','Prefix'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                //$this->user_id=Yii::app()->user->id;
		$criteria=new CDbCriteria;
                $criteria->together = true;
                $criteria->with = array('level');
                $criteria->compare('level.database_id_id', $this->id, true);
                $criteria->compare('level.user_id', Yii::app()->user->id, true);
                //$criteria->compare('level.level_id', 0);
                
		$criteria->compare('id',$this->id);
		$criteria->compare('string',$this->string,true);
		$criteria->compare('prefix',$this->prefix,true);
                //Yii::app()->user->id
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getName(){
            $oldName=Yii::app()->db->connectionString;
            $oldPrefix=Yii::app()->db->tablePrefix;
            Yii::app()->db->setActive(false);
            Yii::app()->db->connectionString = $this->string;
            Yii::app()->db->tablePrefix=$this->prefix;
            Yii::app()->db->setActive(true);
            
            
            
            $name=Settings::model()->findByPk('company.name')->value;
            
            Yii::app()->db->setActive(false);
            Yii::app()->db->connectionString = $oldName;
            Yii::app()->db->tablePrefix=$oldPrefix;
            Yii::app()->db->setActive(true);
            
            
            return $name;
            
        }
}
