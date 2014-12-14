<?php

/**
 * This is the model class for table "paymentType".
 *
 * The followings are the available columns in table 'paymentType':
 * @property integer $id
 * @property string $name
 * @property string $value
 */
class PaymentType extends CActiveRecord {

    const table = '{{paymentType}}';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PaymentType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return self::table;
    }

    public static function getList() {
        //if($const===null){
        $arr = self::model()->findAll();

        //
        //}

        foreach ($arr as &$item) {
            $item->name = Yii::t('app', $item->name);
        }


        return CHtml::listData($arr, 'id', 'name');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, value', 'required'),
            array('name, value', 'length', 'max' => 80),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, value', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('labels', 'ID'),
            'name' => Yii::t('labels', 'Name'),
            'value' => Yii::t('labels', 'Value'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('value', $this->value, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getSettings() {
        $arr = array();
        foreach ($this->loadPayment()->settings() as $setting) {
            $arr[] = Settings::model()->findByPk($setting);
        }
        return $arr;
    }

    public function loadPayment() {
        if (class_exists($this->value))
            return new $this->value;
        else
            throw new CHttpException(501, Yii::t('errors', 'The requested payment type is Invalid.') . $this->id);
    }

}
