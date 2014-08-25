<?php

$config=dirname(__FILE__).'/protected/config/main.php';

require_once(dirname(__FILE__).'/protected/config/yii.php');
require_once($yii);


$load=dirname(__FILE__)."/../linet3admin/protected/addon/load.php";
if(file_exists($load))
        $config=require_once($load);


Yii::createWebApplication($config)->run();
//echo ";".Yii::app()->theme.";";

//php:curl,zip,apc
//wkhtmltopdf
//apache: mod_rewrite
//mysql

//open format import linet 2 db error fld 1322
//must fix.