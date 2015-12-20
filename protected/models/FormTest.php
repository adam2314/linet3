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
class FormTest extends Model {

    public $docs=true;
    public $transactions=true;
    public $errors=[];

    public function init() {
        parent::init();
        //$this->docs = true;
    }
    
    public function attributeLabels() {
        return array(
            'docs' => Yii::t('app', 'Check Documentes'),
            'transactions' => Yii::t('app', 'Check Transactions'),
           
        );
    }
    
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array(['docs', 'transactions'], 'safe'),
        );
    }
    

    
    public function transTest(){
        $trans=  Transactions::find()->orderBy(['num'=>SORT_ASC,'linenum'=>SORT_ASC])->All();
        $num=0;
        $linenum=0;
        $sum=0;
        
        //$singleLine=true;
        foreach($trans as $tran){
            if($tran->num!=$num){
                if($tran->num!=$num+1){ 
                    $this->errors[]='Invalid Transaction number: '.$tran->num." id: ".$tran->id;
                }
                
                $num=$tran->num;
                if ( abs($sum)>0.001 && $linenum==1){
                    //spacial case single line
                    $this->errors[]='Invalid Transaction sum: '.$sum." num: ".($tran->num-1);
                
                }
  
                $sum=$tran->leadsum;
                $linenum=1;
                
            }else{
                if($tran->linenum==$linenum+1){
                    $linenum=$tran->linenum;
                    $sum+=$tran->leadsum;
                    //$singleLine=false;
                }else{
                    $this->errors[]='Invalid Transaction line in number: '.$tran->num." id: ".$tran->id;
                }
            }
        }
        
        
        
    }
    
    public function docsTest(){
        $types= Doctype::find()->All();
        foreach($types as $type){
            $docs= Docs::find()->where(["doctype"=>$type->id])->orderBy('docnum')->All();
            $num=0;
            foreach($docs as $doc){
                if($num!=0){
                    if($num==$doc->docnum){
                        $this->errors[]='Duplicate documenet number:' .$doc->docnum .' id: '.$doc->id." type: ".$type->name;
                    }
                    if($num+1!=$doc->docnum){
                        $this->errors[]='Invalid documenet number:' .$doc->docnum .' id: '.$doc->id." type: ".$type->name;
                    }
                }
                $num=$doc->docnum;
            }
        }
    }
    
    
    //the best is yet to come
    public function accsTest(){
        
    }
    
    public function itemsTest(){
        
    }
    
    public function usersTest(){
        
    }

}
