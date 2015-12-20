<?php
$params = require(__DIR__ . '/params.php');
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'timeZone'=>'Asia/Jerusalem',
    'defaultRoute' => 'install',
    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
                
            ],
        ],
        'formatter' => [
            'dateFormat' => 'dd/MM/yyyy',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'ILS',
            'defaultTimeZone' =>'Asia/Jerusalem',
        ],
        'request' => [
            'cookieValidationKey' => 'S994ssCV_EvpN3dbikgqKtiCqTQ5ytNB',
        ],
        
        
        'errorHandler' => [
            'errorAction' => 'install/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        
        
        'urlManager' => [
            'enablePrettyUrl' => false,
            'rules' => [
		//'' => 'install/index',
                //'<controller:\w+>/index/<type:\d+>' => '<controller>/index',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<step:\w+>' => '<controller>/<action>',
                //'<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
            ],
        ],
    ],
    
    'params' => $params,
];
/*
if (YII_ENV_DEV) {

    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        "class" => 'yii\gii\Module',
        'allowedIPs' => ['172.22.102.*', '::1', '192.168.0.*', '192.168.178.20'],
    ]; // adjust this to your needs
}
*/
return $config;
