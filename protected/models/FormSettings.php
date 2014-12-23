<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class FormSettings  extends CFormModel{
    public $companyName;
   /**
    * Load attributes from DB
    */
   public function loadAttributes()
   {
      $settings = Settings::model()->findAll(array('order'=>'priority'));
      //$models = Settings::model()->findAll();
      
      $this->companyLogo='';
      $this->setAttributes(CHtml::listData($settings,'id','value'));
   }

   /*
    * Save to database
    */
   public function save()
   {
      foreach($this->attributes as $key => $value)
      {
         $setting = Settings::model()->find(array('condition'=>'key = :key',
                                                 'params'=>array(':key'=>$key)));
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