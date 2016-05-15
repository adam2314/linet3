<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
/**
 * This is the model class for table "items".
 *
 * The followings are the available columns in table 'items':
 * @property string $id
 * @property string $itemVatCat_id
 * @property string $name
 * @property string $sku
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

namespace app\models;

use Yii;
use app\components\fileRecord;
//use adam2314\EavBehavior;
use app\models\UserIncomeMap;
use app\models\Accounts;
use yii\data\ActiveDataProvider;
class Item extends fileRecord {

    //public $i;
    const STOCK_NO = 0;
    const STOCK_QTY = 1;
    const STOCK_INSTANCE = 2;
    const table = '{{%items}}';

    public $vat; //loads vat from user by cat

    //public $profit=0;
    //public $purchaseprice=0;
    //public $saleprice=0;

    public static function primaryKey() {
        return ["id"];
    }

//*/

    public static function getStocks() {
        return self::getConstants('STOCK', __CLASS__);
    }

    public function openfrmt($line) {
        $itms = '';

        $fields = OpenFormat::find()->where(['type_id' => 'M100'])->All();

        //loop strfgy
        foreach ($fields as $field) {
            $itms.=$this->openfrmtFieldStr($field, $line);
        }
        return $itms . "\r\n";
    }

    public static function findByPk($id, $date = null) {
        $model = self::findOne($id);

        if ($model !== null) {
            if(isset(Yii::$app->user)){
                $uid=Yii::$app->user->id;
                
            }else{
                $uid=Yii::$app->params['uid'];
            }
            
            $model->vat = ItemVatCat::TaxRate($model->itemVatCat_id, $date);
        }
        return $model;
    }

    public function beforeSave($insert) {
        $this->profit = ((int)$this->profit===0) ? 0 : $this->profit;
        $this->purchaseprice = ((int)$this->purchaseprice===0) ? 0 : $this->purchaseprice;
        $this->saleprice = ((int)$this->saleprice===0) ? 0 : $this->saleprice;
        
        if ($this->isNewRecord)
            $this->created = new \yii\db\Expression('NOW()');
        else
            $this->modified = new \yii\db\Expression('NOW()');
        return parent::beforeSave($insert);
    }

    function behaviors() {

        return array(
                ///*
                  'properties' => array(
                  //'class' => 'ext.eav.EEavBehavior',
                  'class' => \adam2314\EavBehavior::className(),
                  // Table that stores attributes (required)
                  'tableName' => '{{%itemEav}}',
                  'entityField' => 'entity',
                  'attributeField' => 'attribute',
                  'valueField' => 'value',

                  'modelPrimaryKey' => 'id',
                  //'safeAttributes' => array(),
                  //'attributesPrefix' => '',
                  )// */
        );
    }

    //function behaviors() {
    //    return array(
    /*
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
      )// */
    //    );
    //}
    //*/
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Item the static model class
     */
    /*
      public static function model($className = __CLASS__) {
      return parent::model($className);
      } */

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            [['sku', 'name', 'currency_id', 'category_id', 'parent_item_id', 'isProduct', 'stockType', 'itemVatCat_id', 'unit_id'], 'required','on'=>'default'],
            [['category_id', 'parent_item_id', 'isProduct', 'profit', 'unit_id', 'owner', 'stockType'], 'number'],
            array(['itemVatCat_id'], 'number'),
            array('name', 'string', 'max' => 100),
            //array('string', 'max' => 20),
            array('currency_id', 'string', 'max' => 3),
            array('sku', 'unique', 'message' => 'Sku already exists!'),
            array(['purchaseprice', 'saleprice', 'description'], 'safe'),
            //array('pic', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'itemVatCat_id', 'name','description', 'category_id', 'parent_item_id', 'isProduct', 'profit', 'unit_id', 'purchaseprice', 'saleprice', 'currency_id', 'pic', 'owner', 'stockType'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
            'Unit' => array(self::BELONGS_TO, 'Itemunit', 'unit_id'),
            'Category' => array(self::BELONGS_TO, 'Itemcategory', 'category_id'),
            'Account' => array(self::BELONGS_TO, 'Accounts', 'account_id'),
            'Owner' => array(self::BELONGS_TO, 'Users', 'owner'),
            'ItemVatCat' => array(self::BELONGS_TO, 'ItemVatCat', 'itemVatCat_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'itemVatCat_id' => Yii::t('app', 'Item VAT Catagory'),
            'name' => Yii::t('app', 'Name'),
            'unit_id' => Yii::t('app', 'Unit'),
            'extcatnum' => Yii::t('app', 'Extrnal No.'),
            'sku' => Yii::t('app', 'SKU'),
            'manufacturer' => Yii::t('app', 'Manufacturer'),
            'saleprice' => Yii::t('app', 'Sale Price'),
            'currency_id' => Yii::t('app', 'Currency'),
            'ammount' => Yii::t('app', 'Ammount'),
            'owner' => Yii::t('app', 'Owner'),
            'category_id' => Yii::t('app', 'Category'),
            'parent_item_id' => Yii::t('app', 'Parent Item'),
            'isProduct' => Yii::t('app', 'Is Product'),
            'profit' => Yii::t('app', 'Profit'),
            'purchaseprice' => Yii::t('app', 'Purchase Price'),
            'pic' => Yii::t('app', 'Picture'),
            'description' => Yii::t('app', 'Sescription'),
            'stockType' => Yii::t('app', 'Stock Type'),
        );
    }

    
    public function search($params=null)
    {
        $query = Item::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            "sort"=> ['defaultOrder' => [
                'id'=>SORT_DESC
                
                ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            //->andFilterWhere(['like', 'address', $this->address])
            //->andFilterWhere(['like', 'city', $this->city])
            //->andFilterWhere(['like', 'zip', $this->zip])
            //->andFilterWhere(['like', 'vatnum', $this->vatnum])
            //->andFilterWhere(['like', 'refnum', $this->refnum])
            //->andFilterWhere(['like', 'refnum_ext', $this->refnum_ext])
            //->andFilterWhere(['like', 'currency_id', $this->currency_id])
            //->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'description', $this->description]);
        
        /*
        if(!is_null($this->issue_date)){
            $tmp=  explode(" to ", $this->issue_date);
            //var_dump($tmp);
            if(isset($tmp[0])&&isset($tmp[1]))        
                $query->andFilterWhere(['between', 'issue_date', $tmp[0], $tmp[1]]);
            //
            //$query->andFilterWhere(['>=', 'issue_from', $tmp[1]]);
        }
        */
        
        
        return $dataProvider;
    }
    
    


    public function maxId() {
        $id = Item::find()->select('max(id)')->scalar();


        return $id;
    }

}
