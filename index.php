<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
//echo ";".Yii::app()->theme.";";

//php:curl,zip,apc
//wkhtmltopdf
//apache: mod_rewrite
//mysql

//open format import linet 2 db error fld 1322
//must fix.