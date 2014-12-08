<?php

return array(
    'language' => 'he_il',
    'params' => array(
        'newInstall' => true,
        'local'=>false,
    ),
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=linet',
            'username' => 'root',
            'password' => 'linet',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableParamLogging' => true, //needs to be removed some day
            'class' => 'CDbConnection'
        ),
        'dbMain' => array(
            'connectionString' => 'mysql:host=localhost;dbname=linet',
            'username' => 'root',
            'password' => 'linet',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableParamLogging' => true, //needs to be removed some day
            'class' => 'CDbConnection'
        ),
    ),
);
