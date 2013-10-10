<?php

class Linet3 {
  public static function beginRequest(CEvent $event) {
      
      
      if(isset(Yii::app()->user->language))
        Yii::app()->language=Yii::app()->user->language;
      //echo Yii::app()->user->language;
      //exit;
    //set your language, theme, etc here
      
       Yii::app()->user->setState('Database',null );
      if(isset(Yii::app()->user->Database)){
         
        Yii::app()->db->setActive(false);
        Yii::app()->db->connectionString = 'mysql:host=localhost;dbname=linetnew';
        Yii::app()->db->tablePrefix='';
        Yii::app()->db->setActive(true);
        
        
         //adam: shuld be cached in memory
        $temp=  Settings::model()->findAll();
        $settings=array();
        foreach ($temp as $key) {
            $settings[$key->id]=$key->value;
        }

        Yii::app()->user->setState('settings',$settings);
        
        Yii::app()->user->setState('Database',null );
            
       
                        
                        
      }else{
           Yii::app()->setController('company');//->redirect(array('company/admin'));
           
          //if(Yii::app()->controller!='company'){
              //echo Yii::app()->controller->id;
            //Yii::app()->redirect('company');
           // exit;
          //}
          //Yii::app()->user->setState('Database','1');
          
                       
          
          
      }
      
  }
}