<?php

use kartik\datecontrol\Module;
if(!file_exists( __DIR__ . '/uid.php')){
	file_put_contents ( __DIR__ . '/uid.php' ,"<?php return '".sha1(rand())."';" );
}
$params = require(__DIR__ . '/params.php');
$params['uid']=require(__DIR__ . '/uid.php');
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'timeZone'=>'Asia/Jerusalem',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ], 
        'markdown' => [
            'class' => 'kartik\markdown\Module',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'

        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                Module::FORMAT_DATE => 'dd/MM/yyyy',
                Module::FORMAT_TIME => 'HH:mm:ss',
                Module::FORMAT_DATETIME => 'dd/MM/yyyy HH:mm:ss',
            ],
// format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:Y-m-d', //U saves as unix timestamp
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],
// set your display timezone
            'displayTimezone' => 'Asia/Jerusalem',
// set your timezone for date saved to db
            'saveTimezone' => 'UTC',
// automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
// default settings for each widget from kartik\widgets used when autoWidget is true
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['removeButton' => false, 'type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
                Module::FORMAT_DATETIME => [], // setup if needed
                Module::FORMAT_TIME => [], // setup if needed
            ],
// custom widget settings that will be used to render the date input instead of kartik\widgets,
// this will be used when autoWidget is set to false at module or widget level.
            'widgetSettings' => [

            ]
        ]
    ],
    'components' => [
         'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => ['httponly' => true, 'lifetime' => 60*60],
            'timeout' => 60*60,
            'useCookies' => true,
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
                'update*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'app' => 'update.php',
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
            'cookieValidationKey' => 'S994ssCV_EvpN3dbwLKqKtiCqTQ5ytNB',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'app\components\Webuser',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                ],
                [
                    'class' => 'yii\log\DbTarget',
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'dbMain' => require(__DIR__ . '/db.php'),
        'authManager' => [
            //'class' => 'yii\rbac\PhpManager',
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => [
                '' => 'company/index',
                'api/<action:\w+>/<model:\w+>/<id:\d+>' => 'api/<action>',
                'api/<action:\w+>/<model:\w+>' => 'api/<action>',
                'gridview/export/download' => 'gridview/export/download',
                'datecontrol/parse/convert' => 'datecontrol/parse/convert',
                'install/<step:\d+>' => 'install/index',
                'docs/view/<doctype:\d+>/<docnum:\d+>' => 'docs/view',
                'docs/view/<id:\d+>' => 'docs/view',
                'download/<id:\d+>' => 'data/download',
                'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
                '<controller:\w+>/create/<type:\d+>' => '<controller>/create', //mainly for doc, acc,outcome creating
                '<controller:\w+>/index/<type:\d+>' => '<controller>/index',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                //crapeng out models'<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
            ],
        ],
    ],
    //*
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //'admin/*', // add or remove allowed actions to this list
        ]
    ],
    //*/
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        "class" => 'yii\gii\Module',
        'allowedIPs' => ['172.22.102.*', '::1', '192.168.0.*', '192.168.178.20'],
    ]; // adjust this to your needs
}

return $config;
