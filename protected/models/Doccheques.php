<?php

/**
 * This is the model class for table "cheques".
 *
 * The followings are the available columns in table 'cheques':
 * @property string $prefix
 * @property string $refnum
 * @property integer $type
 * @property integer $creditcompany
 * @property string $cheque_num
 * @property string $bank
 * @property string $branch
 * @property string $cheque_acct
 * @property string $cheque_date
 * @property string $sum
 * @property string $bank_refnum
 * @property string $dep_date
 * @property integer $id
 */
class Doccheques extends basicRecord {

    const table = '{{docCheques}}';

    private $dateDBformat = true;

    /*
     * for open format export 
     */

    public function getType() {
        return isset($this->Doc) ? $this->Doc->getType() : "";
    }

    public function getNum() {
        return isset($this->Doc) ? $this->Doc->docnum : "";
    }

    public function getDate() {
        return isset($this->Doc) ? $this->Doc->issue_date : "";
    }

    public function openfrmt($line) {
        $rcps = '';

        //get all fields (D110) sort by id
        $criteria = new CDbCriteria;
        $criteria->condition = "type_id = :type_id";
        $criteria->params = array(':type_id' => "D120");
        $fields = OpenFormat::model()->findAll($criteria);

        //loop strfgy
        foreach ($fields as $field) {
            $rcps.=$this->openfrmtFieldStr($field, $line);
        }
        return $rcps . "\r\n";
    }

    public function transaction($num, $refnum, $valuedate, $details, $action, $line, $account_id, $tranType) {

        $in = new Transactions();
        $in->num = $num;
        $in->account_id = $account_id;
        $in->type = $tranType;
        $in->refnum1 = $refnum;
        $in->valuedate = $valuedate;
        $in->details = $details;
        $in->currency_id = $this->currency_id;
        $in->sum = $this->sum * $action;
        $in->owner_id = Yii::app()->user->id;
        $in->linenum = $line;
        $num = $in->save();
        $line++;

        $out = new Transactions();
        $out->num = $num;
        if($this->Type->oppt_account_id!=0)
            $out->account_id = $this->Type->oppt_account_id;
        else
            $out->account_id = $this->creditcompany;
        $out->type = $tranType;
        $out->refnum1 = $refnum;
        $out->valuedate = $valuedate;
        $out->details = $details;
        $out->currency_id = $this->currency_id;
        $out->sum = $this->sum * $action * -1;
        $out->owner_id = Yii::app()->user->id;
        $out->linenum = $line;


        return $out->save();
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Cheques the static model class
     */
    public function primaryKey() {
        return array('doc_id', 'line');
    }

//*/

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
        return array(
            array('type, creditcompany, line', 'numerical', 'integerOnly' => true),
            array('doc_id', 'length', 'max' => 10),
            array('currency_id', 'length', 'max' => 3),
            array('cheque_acct, cheque_num, bank_refnum', 'length', 'max' => 20),
            array('sum', 'length', 'max' => 8),
            array('currency_id, refnum, cheque_date, dep_date', 'safe'),
            array('currency_id, refnum, doc_id, type, creditcompany, cheque_num, bank, branch, cheque_acct, cheque_date, sum, bank_refnum, dep_date, line', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Doc' => array(self::BELONGS_TO, 'Docs', 'doc_id'),
            'Type' => array(self::BELONGS_TO, 'PaymentType', 'type'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'doc_id' => Yii::t('labels', 'Refnum'),
            'type' => Yii::t('labels', 'Type'),
            'creditcompany' => Yii::t('labels', 'Credit Company/Bank'),
            'cheque_num' => Yii::t('labels', 'Cheque No.'),
            'bank' => Yii::t('labels', 'Bank'),
            'branch' => Yii::t('labels', 'Branch'),
            'cheque_acct' => Yii::t('labels', 'Cheque Account'),
            'cheque_date' => Yii::t('labels', 'Cheque Date'),
            'sum' => Yii::t('labels', 'Sum'),
            'bank_refnum' => Yii::t('labels', 'Bank Refnum'),
            'dep_date' => Yii::t('labels', 'Dep Date'),
            'line' => Yii::t('labels', 'Line'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('doc_id', $this->doc_id, true);
        //$criteria->compare('type',$this->type,true);
        $criteria->compare('creditcompany', $this->creditcompany);
        $criteria->compare('cheque_num', $this->cheque_num, true);
        $criteria->compare('bank', $this->bank, true);
        $criteria->compare('branch', $this->branch, true);
        $criteria->compare('cheque_acct', $this->cheque_acct, true);
        $criteria->compare('cheque_date', $this->cheque_date, true);
        $criteria->compare('sum', $this->sum, true);

        if ($this->bank_refnum == null)
            $criteria->addCondition('bank_refnum IS NULL');
        else
            $criteria->compare('bank_refnum', $this->bank_refnum);




        $criteria->compare('dep_date', $this->dep_date, true);
        $criteria->compare('line', $this->line);

        $criteria->compare('refnum', $this->refnum, true);
        $criteria->compare('currency_id', $this->currency_id, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
        ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->dateDBformat = false;
        }
        
        
        if (!$this->dateDBformat) {
            $this->dateDBformat = true;
            $this->cheque_date = date("Y-m-d H:m:s", CDateTimeParser::parse($this->cheque_date, Yii::app()->locale->getDateFormat('yiishort')));
            $this->dep_date = date("Y-m-d H:m:s", CDateTimeParser::parse($this->dep_date, Yii::app()->locale->getDateFormat('yiishort')));
        }
        //return true;
        return parent::beforeSave();
    }

    public function afterSave() {
        if ($this->dateDBformat) {
            $this->dateDBformat = false;
            $this->cheque_date = date(Yii::app()->locale->getDateFormat('phpshort'), strtotime($this->cheque_date));
            $this->dep_date = date(Yii::app()->locale->getDateFormat('phpshort'), strtotime($this->dep_date));
        }
        return parent::afterSave();
    }

    public function afterFind() {
        if ($this->dateDBformat) {
            $this->dateDBformat = false;
            $this->cheque_date = date(Yii::app()->locale->getDateFormat('phpshort'), strtotime($this->cheque_date));
            $this->dep_date = date(Yii::app()->locale->getDateFormat('phpshort'), strtotime($this->dep_date));
        }
        return parent::afterFind();
    }

   

}
