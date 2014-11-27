<?php
return "<?php
return array(
    'language' => 'he_il',
    'params' => array(
        'newInstall' => false,
    ),
    'components' => array(
        'db' => array(
            <placeholder>
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableParamLogging' => true, //needs to be removed some day
            'class' => 'CDbConnection'
        ),
        'dbMain' => array(
            <placeholder>
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableParamLogging' => true, //needs to be removed some day
            'class' => 'CDbConnection'
        ),
    ),
);";