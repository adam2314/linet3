<?php

/**
 * This is the model class for table "tbl_migration".
 *
 * The followings are the available columns in table 'tbl_migration':
 * @property integer $version
 * @property string $apply_time
 *
 */
class Migration extends mainRecord {

    const table = 'tbl_migration';

    public function tableName() {
        return self::table;
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'version' => Yii::t('labels', 'Version'),
            'apply_time' => Yii::t('labels', 'Apply Time'),
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('version', $this->version);
        $criteria->compare('apply_time', $this->apply_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AccHist the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('version, apply_time', 'required'),
        );
    }

}
