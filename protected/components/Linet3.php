<?php

class Linet3 {
  public static function beginRequest(CEvent $event) {
    //print_r(Yii::app()->getRequest()->requestUri);
    //echo Yii::app()->user->Company;  
    //Yii::app()->user->setState('Company',0);
    //exit;
    if(isset(Yii::app()->user->language))
        Yii::app()->language=Yii::app()->user->language;
    if(!isset(Yii::app()->user->OrgDatabase)){
        $org=array('string'=>Yii::app()->db->connectionString,'prefix'=>Yii::app()->db->tablePrefix);
        Yii::app()->user->setState('OrgDatabase',$org);
    }
    if(!isset(Yii::app()->user->Company))
        Yii::app()->user->setState('Company',0);
    // Yii::app()->user->setState('Database',null );
    //echo Yii::app()->user->Database;
    //echo Yii::app()->user->OrgDatabase['string'];
    //exit;
    
    //if(isset(Yii::app()->user->Company))
     if(Yii::app()->user->Company==0){
            Yii::app()->db->setActive(false);
            Yii::app()->db->connectionString = Yii::app()->user->OrgDatabase['string'];
            Yii::app()->db->tablePrefix=Yii::app()->user->OrgDatabase['prefix'];
            Yii::app()->db->setActive(true);
        }else   
    if(isset(Yii::app()->user->Database)){
            Yii::app()->db->setActive(false);
            Yii::app()->db->connectionString = Yii::app()->user->Database->string;
            Yii::app()->db->tablePrefix=Yii::app()->user->Database->prefix;
            Yii::app()->db->setActive(true);

             //adam: shuld be cached in memory
            $temp=  Settings::model()->findAll();
            $settings=array();
            foreach ($temp as $key) {
                $settings[$key->id]=$key->value;
            }

            Yii::app()->user->setState('settings',$settings);
            //Yii::app()->user->setState('Database',null );
    }else{
         //Yii::app()->setController('company');//->redirect(array('company/admin'));

    
          //if(Yii::app()->controller!='company'){
              //echo Yii::app()->controller->id;
            //Yii::app()->redirect('company');
           // exit;
          //}
          //Yii::app()->user->setState('Database','1');
          
                       
          
          
      }
      
  }
}