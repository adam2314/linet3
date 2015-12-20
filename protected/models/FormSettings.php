<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\models;
use Yii;
use yii\base\Model;
class FormSettings  extends Model{
    public $companyName;
   /**
    * Load attributes from DB
    */
   public function loadAttributes()
   {
      $settings = Settings::find()->where(['order'=>'priority'])->all();
      //$models = Settings::find()->All();
      
      $this->companyLogo='';
      $this->setAttributes(\yii\helpers\Html::listData($settings,'id','value'));
   }

   /*
    * Save to database
    */
   public function save()
   {
      foreach($this->attributes as $key => $value)
      {
         $setting = Settings::find()->where(['key'=>$key])->one();
         if($setting==null)
         {
            $setting = new Setting;
            $setting->key = $key;
         }
         $setting->value = $value;
         if(!$setting->save(false))
            return false;
      }
      return true;
   }
   
   
   public function rules() {
  return array(
      array( 'companyName', 'safe' ),
    //array( 'companyName', 'dynamicValidator' )
  );
}

public function dynamicValidator($attribute, $params ) {
    
  for($i=1; $i<=self::MAX_COLUMNS; $i++) {
    if( $this->{'type'.$i} ) {
      //...
      if(1!=1 ) {
         $this->addError( 'invalid_field', 'Field "invalid_field" is invalid...' );
      }
      //...
    }
  }
  
}

   
}