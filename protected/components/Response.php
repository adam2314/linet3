<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class Response{
    
    
    
    public static function send($status = 200, $body = '',$error=0, $content_type = 'application/json'){
        
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . Response::_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);

        if(($error!=0)&&($body==''))
            $body=Response::_getErrorCodeMessage($error);
        echo CJSON::encode(array("status" => $status, "text" => Response::_getStatusCodeMessage($status), "body" => $body, "errorCode" => $error));


        Yii::app()->end();
        
    }
    
     private static function _getStatusCodeMessage($status) {
        $codes = Array(
            200 => 'OK',
            201 => 'Created',
            204 => 'No Content',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
    
    
    
    private static function _getErrorCodeMessage($status) {
        $codes = Array(
            0 => 'OK',
            1000 => 'No items where found for model',
            1001 => 'Errors Valdating model',
            
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}