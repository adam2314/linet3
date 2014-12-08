<?php

/**
 * This is the model class for table "extCorrelation".
 *
 * The followings are the available columns in table 'extCorrelation':
 * @property integer $id
 * @property string $in
 * @property string $out
 * @property integer $owner
 */
class IntCorrelation extends CActiveRecord {

    const table = '{{intCorrelation}}';

    public $date_from;
    public $date_to;

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
            array('owner', 'required'),
            array('account_id, owner', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, owner', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Transactions' => array(self::HAS_MANY, 'Transactions', 'intCorrelation'),
            'Account' => array(self::BELONGS_TO, 'Accounts', 'account_id'),
            'Owner' => array(self::BELONGS_TO, 'User', 'owner'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('labels', 'ID'),
            'owner' => Yii::t('labels', 'Owner'),
        );
    }

    public function delete() {
        foreach ($this->Transactions as $transaction) {
            $transaction->intCorrelation = 0;
            $transaction->intType = 0;
            $transaction->save();
        }

        return parent::delete();
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        //$criteria->compare('in',$this->in,true);
        //$criteria->compare('out',$this->out,true);
        $criteria->compare('owner', $this->owner);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return IntCorrelation the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getAccountName() {
        if (isset($this->Account))
            return $this->Account->name;
        return "ERROR:" . $this->account_id;
    }

}
