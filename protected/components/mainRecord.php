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
