<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Response{
    
    
    
    public static function send($status = 200, $body = '', $content_type = 'application/json'){
        
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . Response::_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);


        echo CJSON::encode(array("status" => $status, "text" => Response::_getStatusCodeMessage($status), "body" => $body));


        Yii::app()->end();
        
    }
    
     private static function _getStatusCodeMessage($status) {
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}