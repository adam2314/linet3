<?php

return [
    'adminEmail' => 'admin@example.com',
    'updatesrv' => 'https://update3.linet.org.il/',
    'version' => '3.0',
    'timezone' => 'Asia/Tel_Aviv',
    'filePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR,
    'local' => true,
    'newInstall' => require('install.php'),
    'readOnly' => false,
    'precision' => 2,
    'viewDate' => 'php:d/m/Y',
    'viewDateTime' => 'php:d/m/Y H:i:s',
    'dbDate' => 'php:Y-m-d',
    'dbDateTime' => 'php:Y-m-d H:i:s',
    'icon-framework' => 'fa',
];
