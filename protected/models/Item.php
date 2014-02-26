<?php

/**
 * This is the model class for table "items".
 *
 * The followings are the available columns in table 'items':
 * @property string $id
 * @property string $itemVatCat_id
 * @property string $name
 * @property integer $category_id
 * @property integer $parent_item_id
 * @property integer $isProduct
 * @property integer $profit
 * @property integer $unit_id
 * @property string $purchaseprice
 * @property string $saleprice
 * @property integer $currency_id
 * @property string $pic
 * @property integer $owner
 * @property integer $stockType
 * @property integer $vat
 */
class Item extends basicRecord{
	const table='{{items}}';
        public $vat; //loads vat from user by cat
        
        public function openfrmt($line){
            $itms='';
            
            //get all fields (m100) sort by id
            $criteria=new CDbCriteria;
            $criteria->condition="type_id = :type_id";
            $criteria->params=array(':type_id' => "M100");
            $fields= OpenFormat::model()->findAll($criteria);
            
            //loop strfgy
            foreach ($fields as $field) {
                $itms.=$this->openfrmtFieldStr($field,$line);
            }
            return $itms."\r\n";
        }
        
        public function findByPk($id, $condition = '', $params = Array()){
            $model = parent::findByPk($id, $condition = '', $params = Array());
            $incomeMap=UserIncomeMap::model()->findByPk(array('user_id'=>Yii::app()->user->id, 'itemVatCat_id'=>$model->itemVatCat_id));
            $model->vat=  Accounts::model()->findByPk($incomeMap->account_id)->src_tax;
            return $model;
        }
        public function beforeSave(){
            if ($this->isNewRecord)
                $this->created = new CDbExpression('NOW()');
            else
                $this->modified = new CDbExpression('NOW()');
            return parent::beforeSave();
        }
	function behaviors() {
		return array(
				///*
				  
				'eavAttr' => array(
						//'class' => 'ext.eav.EEavBehavior',
						'class' => 'application.modules.eav.extensions.EEavBehavior',
						// Table that stores attributes (required)
						'tableName' => '{{itemEav}}',
						// model id column
						// Default is 'entity'
						'entityField' => 'entity',
						// attribute name column
						// Default is 'attribute'
						'attributeField' => 'attribute',
						// attribute value column
						// Default is 'value'
						'valueField' => 'value',
						// Model FK name
						// By default taken from primaryKey
						'modelTableFk' => 'primaryKey',
						// Array of allowed attributes
						// All attributes are allowed if not specified
						// Empty by default
						'safeAttributes' => array(),
						// Attribute prefix. Useful when storing attributes for multiple models in a single table
						// Empty by default
						'attributesPrefix' => '',
				)//*/
		);
	}
	//*/
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Item the static model class
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
		return self::table;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, category_id, parent_item_id, isProduct, stockType', 'required'),
			array('category_id, parent_item_id, isProduct, profit, unit_id, owner, stockType', 'numerical', 'integerOnly'=>true),
			array('itemVatCat_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>100),
			array('purchaseprice, saleprice', 'length', 'max'=>20),
			array('currency_id', 'length', 'max'=>3),
			array('description', 'safe'),
			//array('src_tax', 'length', 'max'=>5),
			array('pic', 'file', 'types' => 'jpg, gif, png','allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, itemVatCat_id, name,description, category_id, parent_item_id, isProduct, profit, unit_id, purchaseprice, saleprice, currency_id, pic, owner, stockType', 'safe', 'on'=>'search'),
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
			//'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
                        'Unit'=>array(self::BELONGS_TO, 'Itemunit','unit_id'),
			'Category'=>array(self::BELONGS_TO, 'Itemcategory','category_id'),
                        'Account'=>array(self::BELONGS_TO, 'Accounts','account_id'),
                        'Owner'=>array(self::BELONGS_TO, 'Users','owner'),
                        'ItemVatCat'=>array(self::BELONGS_TO, 'ItemVatCat','itemVatCat_id'),
                        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'=>Yii::t('labels','ID'),
                        'itemVatCat_id'=>Yii::t('labels','Item VAT Catagory'),
                        'name'=>Yii::t('labels','Name'),
                        'unit_id'=>Yii::t('labels','Unit'),
                        'extcatnum'=>Yii::t('labels','Extrnal No.'),
                        'manufacturer'=>Yii::t('labels','Manufacturer'),
                        'saleprice'=>Yii::t('labels','Sale Price'),
                        'currency_id'=>Yii::t('labels','Currency'),
                        'ammount'=>Yii::t('labels','Ammount'),
                        'owner'=>Yii::t('labels','Owner'),
                        'category_id'=>Yii::t('labels','Category'),
                        'parent_item_id'=>Yii::t('labels','Parent Item'),
                        'isProduct'=>Yii::t('labels','Is Product'),
                        'profit'=>Yii::t('labels','Profit'),
                        'purchaseprice'=>Yii::t('labels','Purchase Price'),
                        'pic'=>Yii::t('labels','Picture'),
                        'description'=>Yii::t('labels','Sescription'),
                        'stockType'=>Yii::t('labels','Stock Type'),
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
		$criteria->compare('itemVatCat_id',$this->itemVatCat_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('parent_item_id',$this->parent_item_id);
		$criteria->compare('isProduct',$this->isProduct);
		$criteria->compare('profit',$this->profit);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('purchaseprice',$this->purchaseprice,true);
		$criteria->compare('saleprice',$this->saleprice,true);
		$criteria->compare('currency_id',$this->currency_id);
		//$criteria->compare('src_tax',$this->src_tax);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('owner',$this->owner);
                $criteria->compare('stockType',$this->stockType);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function AutoComplete($name='') {
		$sql= 'SELECT id as value, name AS label FROM '.Item::table.' WHERE name LIKE :name';
		$name = $name.'%';
		return Yii::app()->db->createCommand($sql)->queryAll(true,array(':name'=>$name));
	}
}