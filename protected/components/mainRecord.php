<?php

/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\components;
use app\components\basicRecord;

class mainRecord extends basicRecord{
    private static $dbMain = null;
 
    protected static function getMainDbConnection()
    {
        if (self::$dbMain !== null)
            return self::$dbMain;
        else
        {
            self::$dbMain = Yii::app()->dbMain;
            if (self::$dbMain instanceof yii\db\Connection)
            {
                self::$dbMain->close();
                return self::$dbMain;
            }
            else
                throw new \yii\db\Exception(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
        }
    }
    
    
    public function getDbConnection(){
            return self::getMainDbConnection();
        }
    
}
