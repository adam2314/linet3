<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class Linet3Helper {
    
    
    public static function numDiff($first,$second,$error=null){
        if($error===null)
            $error=Yii::app()->user->getSetting("company.sumDiff");
        $diff=$first-$second;
        
        if(($diff<$error)&&($diff>=$error*-1))
            return true;
        else
            return false;
        
        
    }
    
    
    public static function vatnumVal($num) {
        $counter = 0;
        for ($i = 0; $i < strlen($num); $i++) {
            $digi = substr($$num, $i, 1);
            $incNum = $digi * (($i % 2) + 1); //multiply digit by 1 or 2
            $counter += ($incNum > 9) ? $incNum - 9 : $incNum; //sum the digits up and add to counter
        }
        if (!($counter % 10 == 0)) {
            return false;
        }
        
        return true;
    }
}