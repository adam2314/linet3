<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class mainRecord extends basicRecord{
    private static $dbMain = null;
 
    protected static function getMainDbConnection()
    {
        if (self::$dbMain !== null)
            return self::$dbMain;
        else
        {
            self::$dbMain = Yii::app()->dbMain;
            if (self::$dbMain instanceof CDbConnection)
            {
                self::$dbMain->setActive(true);
                return self::$dbMain;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
        }
    }
    
    
    public function getDbConnection(){
            return self::getMainDbConnection();
        }
    
}
