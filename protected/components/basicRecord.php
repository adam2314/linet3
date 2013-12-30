<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of basicRecord
 *
 * @author adam
 */
class basicRecord extends CActiveRecord{
    /*const table='';
    public function tableName() {
        return (Yii::app()->db->tablePrefix . self::table);
    }*/
    
    
    protected function openfrmtFieldValue($id){//,$begin=null,$end=null
            
            
        } 
         
        
        
        protected function openfrmtFieldStr($field,$line,$begin=null,$end=null){//,
            
            $template="%0".$field->size."d";  
            if($field->type=='s')
                $template="% ".$field->size."s";
            if($field->type=='n')
                $template="%0".$field->size."d";    
            //v99
            //v9999
            //date
            
            
            $value="";
            if($field->action==$field->type_id)
                $value=$field->action;
            
            if($field->action=="file.line")
                $value=$line;
            if($field->action=="company.vatnum")
                $value=Settings::model()->findByPk('company.vat.id')->value;
            if(strpos($field->action, "this.") === 0)
                    $value=$this->{str_replace("this.", "", $field->action)};
                    
            if(strpos($field->action, "func.") === 0)
                    $value=$this->{str_replace("func.", "", $field->action)}();
                    
            if(strpos($field->action, "limit.") === 0)
                    $value=$this->{str_replace("limit.", "", $field->action)}($begin,$end);
                    
            return sprintf($template,$value);
            
        } 
}

?>
