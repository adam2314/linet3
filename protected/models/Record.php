<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider; 
class Record extends ActiveRecord {
    const DATETIME_FORMAT = 'php:d/m/Y H:i:s';
    const DATE_FORMAT = 'php:d/m/Y';
    const DATE_DB = 'php:Y-m-d';
    const DATETIME_DB = 'php:Y-m-d H:i:s';
    const DATE_OPENFRMT = 'php:Ymd';
    const TIME_OPENFRMT = 'php:Hs';
    
    //from db to openformt hour muinte
    public static function readOFTime($data){
         return Yii::$app->formatter->asDate($data, self::TIME_OPENFRMT);
        
    }
    
    //from db to openformt date
    public static function readOFDate($data){
         return Yii::$app->formatter->asDate($data, self::DATE_OPENFRMT);
        
    }
    
    //from db to datepicker
    public static function readDate($data){
         return Yii::$app->formatter->asDate($data, self::DATE_DB);
        
    }
    
    //from db to lists etc...
    public static function readDateFormat($data){
         return Yii::$app->formatter->asDate($data, self::DATE_FORMAT);
        
    }
    
    public static function readDateTimeFormat($data){
         return Yii::$app->formatter->asDate($data, self::DATETIME_FORMAT);
        
    }
    public static function readYmd($data){
         return Yii::$app->formatter->asDate($data, "php:Ymd");
        
    }
    
    public static function writeDate($data){
        return Yii::$app->formatter->asDate($data, self::DATE_DB);
    }
    
    public static function writeDateTime($data){
        return Yii::$app->formatter->asDate($data, self::DATETIME_DB);
    }
    
    public function dp() {
        return new ActiveDataProvider([
            'query' => $this->find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }
}