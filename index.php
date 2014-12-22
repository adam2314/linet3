<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/


require_once(dirname(__FILE__).'/protected/config/yii.php');
require_once($yii);


$load=dirname(__FILE__)."/../linet3admin/protected/addon/load.php";
if(file_exists($load)){
    $config=require_once($load);
}else{
    $config=dirname(__FILE__).'/protected/config/main.php';
}

Yii::createWebApplication($config)->run();
//echo ";".Yii::app()->theme.";";

//php:curl,zip,apc
//wkhtmltopdf
//apache: mod_rewrite
//mysql

//open format import linet 2 db error fld 1322
//must fix.