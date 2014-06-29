<?php

/**
 * This is the model class for table "bankName".
 *
 * The followings are the available columns in table 'bankName':
 * @property integer $id
 * @property string $name
 * @property string $subject
 * @property string $body
 * @property string $cc
 * @property string $bcc
 * @property string $entity_type
 * @property string $entity_id
 */
class MailTemplate extends CActiveRecord {

    const table = '{{mailTemplate}}';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BankName the static model class
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

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('name, bcc, cc, subject, body, entity_type, entity_id', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name', 'safe', 'on' => 'search'),
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
            'subject' => Yii::t('labels', 'Subject'),
            'entity_type' => Yii::t('labels', 'Entity Type'),
            'entity_id' => Yii::t('labels', 'Entity Id'),
            'bcc' => Yii::t('labels', 'Bcc'),
            'cc' => Yii::t('labels', 'cc'),
            'body' => Yii::t('labels', 'Body'),
            //'id' => Yii::t('labels', 'ID'),
            //'name' => Yii::t('labels', 'Name'),
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

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function AutoComplete($name = '') {
        $sql = 'SELECT id as value, name AS label FROM ' . BankName::table . ' WHERE name LIKE :name';
        $name = $name . '%';
        return Yii::app()->db->createCommand($sql)->queryAll(true, array(':name' => $name));
    }

}
