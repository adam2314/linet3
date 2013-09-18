<?php

/**
 * This is the model class for table "curRates".
 *
 * The followings are the available columns in table 'curRates':
 * @property string $id
 * @property string $currency_id
 * @property string $date
 * @property string $value
 */
class Currates extends CActiveRecord
{
    public $name;
    public $code;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Currates the static model class
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
		return 'curRates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currency_id', 'required'),
			array('id', 'length', 'max'=>10),
			array('currency_id', 'length', 'max'=>3),
			array('value', 'length', 'max'=>7),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, currency_id, date, value', 'safe', 'on'=>'search'),
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
                    'Currency' => array(self::BELONGS_TO, 'Currecies', 'currency_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'=>Yii::t('labels','ID'),
                        'currency_id'=>Yii::t('labels','Currency'),
                        'date'=>Yii::t('labels','Date'),
                        'value'=>Yii::t('labels','Value'),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('currency_id',$this->currency_id,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function GetRateList(){
            $list=Currates::model()->findAll();
            $rates=array();
            foreach($list as $rate){
                //print ".1.".$rate->currency_id;
                //print $rate->value;
                //print $rate->Currency->name;
                $rate->name=$rate->Currency->name;
                $rate->code=$rate->Currency->code;//.":".$rate->value;
                //$rates[$rate->currency_id.":".$rate->value]=$rate->Currency->name;
                
            }
            return $list;
        }
        public function GetRate($id){
            $criteria=new CDbCriteria;
            $criteria->select='max(date)';
            $criteria->addColumnCondition(array('currency_id' => $id));
            $model = Currates::model();        
            $date = $model->commandBuilder->createFindCommand($model->tableName(), $criteria)->queryScalar();
            
            $criteria=new CDbCriteria;
            $criteria->select='value';
            $criteria->addColumnCondition(array('currency_id' => $id));
            $criteria->addColumnCondition(array('date' => $date));
            $model = Currates::model();        
            $value = $model->commandBuilder->createFindCommand($model->tableName(), $criteria)->queryScalar();
            
            return $value;

        }
        
        public function GetRateForDate($id,$date){
            $criteria=new CDbCriteria;
            $criteria->select='value';
            $criteria->addColumnCondition(array('currency_id' => $id));
            $criteria->addColumnCondition(array('date' => $date));
            $model = Currates::model();        
            $value = $model->commandBuilder->createFindCommand($model->tableName(), $criteria)->queryScalar();
            
            return $value;
        }
}