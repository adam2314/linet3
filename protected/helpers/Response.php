<?php

/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\helpers;
class Response{
    
    
    
    public static function send($status = 200, $body = '',$error=0, $content_type = 'application/json; charset=utf-8'){
        
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . Response::_getStatusCodeMessage($status);
        //header($status_header);
        // and the content type
        //$content_type="application/json; charset=utf-8";
        \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = \Yii::$app->response->headers;
        $headers->add('Content-Type', $content_type);
        //header('Content-type: ' . $content_type);

        if(($error!=0)&&($body==''))
            $body=Response::_getErrorCodeMessage($error);
        $response=\yii\helpers\Json::encode(array("status" => $status, "text" => Response::_getStatusCodeMessage($status), "body" => $body, "errorCode" => $error));
        \Yii::info("Response " . $response . ' sent');
        echo $response;


        \Yii::$app->end();
        
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