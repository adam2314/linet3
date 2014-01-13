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
            $value="";
            if(($value=='')&& ($field->action!='NA'))
                $value=$field->action;
             if($field->action=="file.line")
                $value=$line;
            if($field->action=="company.vatnum")
                $value=Settings::model()->findByPk('company.vat.id')->value;
            if(strpos($field->action, "this.") === 0)
                    if(isset($this->{str_replace("this.", "", $field->action)}))
                        $value=$this->{str_replace("this.", "", $field->action)};
                        
            if(strpos($field->action, "system.") === 0)
                $value=Settings::model()->findByPk($field->action)->value;        
                    
            if(strpos($field->action, "func.") === 0)
                    $value=$this->{str_replace("func.", "", $field->action)}();
                    
            if(strpos($field->action, "limit.") === 0)
                    $value=$this->{str_replace("limit.", "", $field->action)}($begin,$end);

            
            
                    
            /*******************************************************************************************************/        
            $template="%0".$field->size."d";  
            if($field->type=='s')
                $template="% ".$field->size."s";
            if($field->type=='n')
                $template="%0".$field->size."d";
            if($field->type=='date'){//date
                $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');
                return date('Ymd',CDateTimeParser::parse($value,$phpdbdatetime));   
            }
            if($field->type=='hour'){//hour
                $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');
                return date('Hs',CDateTimeParser::parse($value,$phpdbdatetime));   
            }   
            if($field->type=='99'){//v99
                $template="%0".($field->size)."d";
                $value=  round($value*100);
                if($value<0){
                     $value=$value*-1;
                }
                return sprintf($template,$value);   
            }   
            if($field->type=='v99'){//v99
                $template="%0".($field->size-1)."d";
                $value=  round($value*100);
                if($value>=0){
                    $sign="+";
                }else{
                    $sign="-";
                    $value=$value*-1;
                }
                return $sign.sprintf($template,$value);   
            }   
            if($field->type=='v9999'){//v9999
                $template="%0".($field->size-1)."d";
                $value=  round($value*10000);
                if($value>=0){
                    $sign="+";
                }else{
                    $sign="-";
                    $value=$value*-1;
                }
                
                return $sign.sprintf($template,$value);   
            }   
           
            
            
            
            //ini_set('mbstring.substitute_character', "none"); 
            //$value= mb_convert_encoding($value, 'UTF-8', 'UTF-8'); 
            $value = substr($value,0,$field->size);
            $value=htmlentities($value);
            $value=str_replace("&amp;","&",$value);
            $value = iconv("UTF-8", "CP1255", $value);
            //$value=mb_convert_encoding($value, "windows-1255",'utf-8');
            
            return sprintf($template,$value);
            
        } 
}

?>
