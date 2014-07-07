<?php

/**
 * This is the model class for table "docStatus".
 *
 * The followings are the available columns in table 'docStatus':
 * @property integer $id
 * @property integer $num
 * @property integer $doc_type
 * @property string $name
 * @property integer $looked
 * @property string $action
 */
class stockAction extends CActiveRecord {

    const table = '{{stockAction}}';

    public $from_date;
    public $to_date;

    public static function newTransaction($doc_id, $account_id, $oppt_account_id, $item_id, $qty = 1, $serial = '') {
        $model = new stockAction();
        $model->doc_id = $doc_id;
        $model->account_id = $account_id;
        $model->oppt_account_id = $oppt_account_id;
        $model->item_id = $item_id;
        $model->qty = $qty;
        $model->serial = $serial;
        $model->user_id = Yii::app()->user->id;
        if ($model->save()) {
            return $model->id;
        } else {
            return false;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Docstatus the static model class
     */
    public function primaryKey() {
        return array('id');
    }

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
            array('doc_id, account_id, oppt_account_id, item_id, qty, user_id', 'required'),
            array('doc_id, account_id, oppt_account_id, item_id, qty, user_id', 'numerical', 'integerOnly' => true),
            array('serial', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, doc_id, account_id, oppt_account_id, item_id, serial, qty, user_id, date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Account' => array(self::BELONGS_TO, 'Accounts', 'account_id'),
            'OpptAccount' => array(self::BELONGS_TO, 'Accounts', 'oppt_account_id'),
            'Doc' => array(self::BELONGS_TO, 'Docs', 'doc_id'),
            'Item' => array(self::BELONGS_TO, 'Item', 'item_id'),
            'User' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('labels', 'ID'),
            'doc_id' => Yii::t('labels', 'Documenet'),
            'account_id' => Yii::t('labels', 'Account'),
            'oppt_account_id' => Yii::t('labels', 'Counter Account'),
            'item_id' => Yii::t('labels', 'Item'),
            'serial' => Yii::t('labels', 'Serial No.'),
            'qty' => Yii::t('labels', 'Qty'),
            'doc_id' => Yii::t('labels', 'Document'),
            'user_id' => Yii::t('labels', 'User'),
            'date' => Yii::t('labels', 'Date'),
        );
    }

    public function getSearchCriteria() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('item_id', $this->item_id,true);
        $criteria->compare('account_id', $this->account_id);
        $criteria->compare('oppt_account_id', $this->oppt_account_id);
        $criteria->compare('qty', $this->qty);
        $criteria->compare('user_id', $this->user_id);
         
         
        return $criteria;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = $this->getSearchCriteria();

        


        $sort = new CSort();
        $sort->defaultOrder = 'id DESC';



        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
            'sort' => $sort,
        ));
    }

    public function getItemSum() {
        $criteria = new CDbCriteria;
        $criteria->compare('item_id', $this->item_id);
        $criteria->select = 'SUM(qty)';
        return $this->commandBuilder->createFindCommand($this->getTableSchema(), $criteria)->queryScalar();
    }

    public function sum() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = $this->getSearchCriteria();

        
        $criteria->group = "item_id";
       //  $criteria->select='SUM(qty)';


        $sort = new CSort();
        $sort->defaultOrder = 'id DESC';



        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
            //'qtySum' => Yii::app()->db->createCommand('SELECT SUM(`qty`) FROM `' . stockAction::table . '`')->queryScalar(),
            'sort' => $sort,
        ));
    }

}
