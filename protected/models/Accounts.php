<?php

/**
 * This is the model class for table "accounts".
 *
 * The followings are the available columns in table 'accounts':
 * @property string $id
 * @property integer $type
 * @property string $id6111
 * @property integer $pay_terms
 * @property string $src_tax
 * @property string $src_date
 * @property integer $parent_account_id
 * @property string $name
 * @property string $contact
 * @property string $department
 * @property string $vatnum
 * @property string $email
 * @property string $phone
 * @property string $dir_phone
 * @property string $cellular
 * @property string $fax
 * @property string $web
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property string $comments
 * @property integer $currency_id
 * @property integer $system_acc
 * @property integer $owner
 */
class Accounts extends CActiveRecord
{
	const table='accounts';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Accounts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function primaryKey()
	{
	    return 'id';
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Accounts::table;
	}

        
        
    public function save($runValidation = true, $attributes = NULL) {
         if($this->system_acc !=1)parent::save($runValidation,$attributes);
         //else no save
    }

    public function delete() {
         if($this->system_acc !=1)parent::delete();
           //else no delete
    }
        
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, pay_terms, parent_account_id, system_acc, owner', 'numerical', 'integerOnly'=>true),
			array('id6111, zip', 'length', 'max'=>10),
			array('src_tax', 'length', 'max'=>5),
                        array('currency_id', 'length', 'max'=>3),
			array('name, contact, address', 'length', 'max'=>80),
			array('department, web', 'length', 'max'=>60),
			array('vatnum, phone, dir_phone, cellular, fax', 'length', 'max'=>20),
			array('email', 'length', 'max'=>50),
			array('city', 'length', 'max'=>40),
			array('src_date, comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, id6111, pay_terms, src_tax, src_date, parent_account_id, company, contact, department, vatnum, email, phone, dir_phone, cellular, fax, web, address, currency_id, city, zip, comments, owner', 'safe', 'on'=>'search'),
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
				'accType' => array(self::BELONGS_TO, 'Acctype', 'type'),
				'accId6111' => array(self::BELONGS_TO, 'Id6111', 'id6111'),
				'accOwner' => array(self::BELONGS_TO, 'Users', 'owner'),
                                'Currency' => array(self::BELONGS_TO, 'Currecies', 'currency_id'),
				
		        //'author' => array(self::BELONGS_TO, 'User', 'author_id'),
				//'comments' => array(self::HAS_MANY, 'Comment', 'post_id','condition'=>'comments.status='.Comment::STATUS_APPROVED,'order'=>'comments.create_time DESC'),
		        //'commentCount' => array(self::STAT, 'Comment', 'post_id','condition'=>'status='.Comment::STATUS_APPROVED),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'id6111' => 'Id6111',
			'pay_terms' => 'Pay Terms',
			'src_tax' => 'Src Tax',
			'src_date' => 'Src Date',
			'parent_account_id' => 'Parent Account Id',
			'name' => 'Name',
			'contact' => 'Contact',
			'department' => 'Department',
			'vatnum' => 'Vatnum',
			'email' => 'Email',
			'phone' => 'Phone',
			'dir_phone' => 'Dir Phone',
			'cellular' => 'Cellular',
			'fax' => 'Fax',
			'web' => 'Web',
			'address' => 'Address',
                        'currency_id' => 'Currency',
			'city' => 'City',
			'zip' => 'Zip',
			'comments' => 'Comments',
			'system_acc' => 'System Acc',
			'owner' => 'Owner',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search(){
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('id6111',$this->id6111,true);
		$criteria->compare('pay_terms',$this->pay_terms);
		$criteria->compare('src_tax',$this->src_tax,true);
		$criteria->compare('src_date',$this->src_date,true);
		$criteria->compare('parent_account_id',$this->parent_account_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('vatnum',$this->vatnum,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('dir_phone',$this->dir_phone,true);
		$criteria->compare('cellular',$this->cellular,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('comments',$this->comments,true);
                $criteria->compare('comments',$this->currency_id,true);
		//$criteria->compare('system_acc',$this->system_acc,true);
		$criteria->compare('owner',$this->owner);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>false,
		));
	}
	public static function AutoComplete($name='',$type=1) {
		$sql= 'SELECT id as value, name AS label FROM '.Accounts::table.' WHERE name LIKE :name AND type=:type';
		$name = $name.'%';
		$type = $type;
		return Yii::app()->db->createCommand($sql)->queryAll(true,array(':name'=>$name,':type'=>$type));
	}
}
