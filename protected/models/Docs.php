<?php

/**
 * This is the model class for table "docs".
 *
 * The followings are the available columns in table 'docs':
 * @property string $id
 * @property string $doctype
 * @property string $docnum
 * @property string $account
 * @property string $company
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property string $vatnum
 * @property string $refnum
 * @property string $issue_date
 * @property string $due_date
 * @property string $sub_total
 * @property string $novat_total
 * @property string $vat
 * @property string $total
 * @property string $src_tax
 * @property integer $status
 * @property integer $currency_id
 * @property integer $printed
 * @property string $comments
 * @property integer $owner
 */
class Docs extends CActiveRecord
{
    //public $lang;
	public function primaryKey()
	{
	    return 'id';
	    // For composite primary key, return an array like the following
	    //return array('prefix', 'num');
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Docs the static model class
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
		return 'docs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, printed, owner', 'numerical', 'integerOnly'=>true),
			array('city', 'length', 'max'=>40),
			array('doctype, docnum, account_id, zip, vatnum', 'length', 'max'=>10),
			array('company, address', 'length', 'max'=>80),
                        array('currency_id', 'length', 'max'=>3),
			array('refnum', 'length', 'max'=>20),
			array('sub_total, novat_total, vat, total, src_tax', 'length', 'max'=>8),
			array('issue_date, due_date, comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, doctype, docnum, account_id, company, address, city, zip, vatnum, refnum, issue_date, due_date, sub_total, novat_total, vat, total, src_tax, status, currency_id, printed, comments, owner', 'safe', 'on'=>'search'),
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
			'docAccount_id'=>array(self::BELONGS_TO, 'Account', 'id'),
			'docCheques'=>array(self::HAS_MANY, 'Cheques', 'doc_id'),
			'docDetailes'=>array(self::HAS_MANY, 'Docdetails', 'doc_id'),
			'docType'=>array(self::BELONGS_TO, 'Doctype', 'doctype'),
			'docStatus'=>array(self::BELONGS_TO, 'Docstatus', 'status'),
			'docOwner' => array(self::BELONGS_TO, 'Users', 'owner'),
                        'Currency' => array(self::BELONGS_TO, 'Currecies', 'currency_id'),
                        //
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'=>Yii::t('label','ID'),
                        'doctype'=>Yii::t('label','Documenet Type'),
                        'docnum'=>Yii::t('label','Documenet No.'),
                        'account_id'=>Yii::t('label','Account'),
                        'company'=>Yii::t('label','Company'),
                        'address'=>Yii::t('label','Address'),
                        'city'=>Yii::t('label','City'),
                        'zip'=>Yii::t('label','Zip'),
                        'vatnum'=>Yii::t('label','VAT No.'),
                        'refnum'=>Yii::t('label','Refernce No.'),
                        'issue_date'=>Yii::t('label','Issue Date'),
                        'due_date'=>Yii::t('label','Due Date'),
                        'sub_total'=>Yii::t('label','Sub Total'),
                        'novat_total'=>Yii::t('label','No VAT Total'),
                        'vat'=>Yii::t('label','VAT'),
                        'total'=>Yii::t('label','Total'),
                        'currency_id'=>Yii::t('label','Currency'),
                        'src_tax'=>Yii::t('label','Src Tax'),
                        'status'=>Yii::t('label','Status'),
                        'printed'=>Yii::t('label','Printed'),
                        'comments'=>Yii::t('label','Comments'),
                        'owner'=>Yii::t('label','Owner'),
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
		//$criteria->compare('prefix',$this->prefix,true);
		$criteria->compare('doctype',$this->doctype,true);
		$criteria->compare('docnum',$this->docnum,true);
		$criteria->compare('account_id',$this->account_id,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('vatnum',$this->vatnum,true);
		$criteria->compare('refnum',$this->refnum,true);
		$criteria->compare('issue_date',$this->issue_date,true);
		$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('sub_total',$this->sub_total,true);
		$criteria->compare('novat_total',$this->novat_total,true);
		$criteria->compare('vat',$this->vat,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('src_tax',$this->src_tax,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('printed',$this->printed);
                $criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('owner',$this->owner);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}