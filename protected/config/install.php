<?php
return array(
    'language' => 'he_il',
    'params' => array(
        'newInstall' => true,
    ),
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=linetnow',
                        'username' => 'root',
                        'password' => 'VBy7t6r5',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableParamLogging' => true, //needs to be removed some day
            'class' => 'CDbConnection'
        ),
        'dbMain' => array(
            'connectionString' => 'mysql:host=localhost;dbname=linetnow',
                        'username' => 'root',
                        'password' => 'VBy7t6r5',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableParamLogging' => true, //needs to be removed some day
            'class' => 'CDbConnection'
        ),
    ),
);