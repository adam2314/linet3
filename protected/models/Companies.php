<?php

/**
 * This is the model class for table "companies".
 *
 * The followings are the available columns in table 'companies':
 * @property integer $id
 * @property string $companyname
 * @property integer $hasStock
 * @property integer $user_id
 * @property string $regnum
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property string $phone
 * @property string $cellular
 * @property string $web
 * @property string $tax
 * @property integer $taxrep
 * @property string $vat
 * @property integer $vatrep
 * @property string $template
 * @property string $logo
 * @property string $header
 * @property string $footer
 * @property string $doc_template
 * @property string $receipt_template
 * @property string $invoice_receipt_template
 * @property string $currency_id
 * @property integer $bidi
 * @property integer $credit
 * @property string $credituser
 * @property string $creditpwd
 * @property string $creditallow
 */
class Companies extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Companies the static model class
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
		return 'companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, hasStock, currency_id, bidi, credit, credituser, creditpwd, creditallow', 'required'),
			array('id, hasStock, user_id, taxrep, vatrep, bidi, credit', 'numerical', 'integerOnly'=>true),
			array('companyname', 'length', 'max'=>80),
			array('regnum, credituser, creditpwd', 'length', 'max'=>10),
			array('address, web, template, doc_template, receipt_template, invoice_receipt_template', 'length', 'max'=>128),
			array('city, phone, cellular', 'length', 'max'=>50),
			array('zip', 'length', 'max'=>6),
			array('tax, vat', 'length', 'max'=>4),
			array('header, footer', 'length', 'max'=>255),
			array('currency_id', 'length', 'max'=>3),
			array('creditallow', 'length', 'max'=>200),
			array('logo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, companyname, hasStock, user_id, regnum, address, city, zip, phone, cellular, web, tax, taxrep, vat, vatrep, template, logo, header, footer, doc_template, receipt_template, invoice_receipt_template, currency_id, bidi, credit, credituser, creditpwd, creditallow', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'companyname' => 'Companyname',
			'hasStock' => 'Has Stock',
			'user_id' => 'User',
			'regnum' => 'Regnum',
			'address' => 'Address',
			'city' => 'City',
			'zip' => 'Zip',
			'phone' => 'Phone',
			'cellular' => 'Cellular',
			'web' => 'Web',
			'tax' => 'Tax',
			'taxrep' => 'Taxrep',
			'vat' => 'Vat',
			'vatrep' => 'Vatrep',
			'template' => 'Template',
			'logo' => 'Logo',
			'header' => 'Header',
			'footer' => 'Footer',
			'doc_template' => 'Doc Template',
			'receipt_template' => 'Receipt Template',
			'invoice_receipt_template' => 'Invoice Receipt Template',
			'currency_id' => 'Currency',
			'bidi' => 'Bidi',
			'credit' => 'Credit',
			'credituser' => 'Credituser',
			'creditpwd' => 'Creditpwd',
			'creditallow' => 'Creditallow',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('companyname',$this->companyname,true);
		$criteria->compare('hasStock',$this->hasStock);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('regnum',$this->regnum,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('cellular',$this->cellular,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('taxrep',$this->taxrep);
		$criteria->compare('vat',$this->vat,true);
		$criteria->compare('vatrep',$this->vatrep);
		$criteria->compare('template',$this->template,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('footer',$this->footer,true);
		$criteria->compare('doc_template',$this->doc_template,true);
		$criteria->compare('receipt_template',$this->receipt_template,true);
		$criteria->compare('invoice_receipt_template',$this->invoice_receipt_template,true);
		$criteria->compare('currency_id',$this->currency_id,true);
		$criteria->compare('bidi',$this->bidi);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('credituser',$this->credituser,true);
		$criteria->compare('creditpwd',$this->creditpwd,true);
		$criteria->compare('creditallow',$this->creditallow,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}