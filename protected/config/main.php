<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Linet 3.0',
	'sourceLanguage'=>'en',
	// preloading 'log' component
	'preload'=>array('log'),
	'language'=>'he_il',
        'localeDataPath'=>'protected/i18n/data/',
	'defaultController' => 'company',
	'onBeginRequest' => array('Linet3', 'beginRequest'),	
    
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		'application.extensions.debugtoolbar.*',
	),
	'modules'=>array(
		//'auth'=>array(),
		'rights'=>array(
                        'debug'=>true,
                        //'install'=>true,
                        'enableBizRuleData'=>true,
                        //'superuserName'=>'admin',
		),
		'eav'=>array(),
		'forum'=>array(),
		// uncomment the following to enable the Gii tool
		'user' => array(
			'debug'=>True,
		),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'VBy7t6r5',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
			//'ipFilters'=>array('192.168.25.134','::1'),
			//'ipFilters'=>array('172.22.102.16','::24'),
                        'ipFilters'=>array('172.22.102.12','::24'),
                        //'ipFilters'=>array('93.172.157.9','::24'),
                        //'ipFilters'=>array('62.219.135.89','::24'),
                        //'ipFilters'=>array('85.250.92.183','::24'),
				
				
			'generatorPaths'=>array(
                                'bootstrap.gii',
			),
		),
		
	),

	// application components
	'components'=>array(
                //'localtime'=>array(
                //    'class'=>'LocalTime',
                //),
		'Paypal' => array(
                        'class'=>'application.components.Paypal',
			
		),
		'session' => array (
                        'autoStart' => True,
                        'class' => 'system.web.CDbHttpSession',
                        'connectionID' => 'db',
                        'sessionTableName' => 'sessionStore',
		),
		'bootstrap'=>array(
                        'class'=>'bootstrap.components.Bootstrap',
		),
		//'cache'=>array(
                        //'class'=>'CApcCache',
		//),
		'user'=>array(
			//'class' => 'RLinUser',
			'class'=>'RWebUser',//rights
			'allowAutoLogin'=>true,
			//'loginUrl' => array('//user/user/login'),

			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
		),
            
		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('Guest'),
			'itemTable'=>'AuthItem',
			'itemChildTable'=>'AuthItemChild',
			'assignmentTable'=>'AuthAssignment',
			'rightsTable'=>'Rights',
		),
		/* 'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
        ),//*/
		/*'authManager' => array(
			'behaviors' => array(
				'auth' => array(
					'class' => 'auth.components.AuthBehavior',
					'admins'=>array('adam'), // users with full access
					),
				),
				
			),
		'user' => array(
			'class' => 'auth.components.AuthWebUser',
		),//*/
		// uncomment the following to enable URLs in path-format
		'urlManager' => array(
                        'urlFormat'=>'path',
                        'showScriptName'=>false,
                        'rules' => array(
                                '' => 'company/index',
                                'minify/<group:[^\/]+>'=>'minify/index',
                                /*'post/<id:\d+>/<title:.*?>'=>'post/view',
                                'posts/<tag:.*?>'=>'post/index',//*/
                                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                '<controller:\w+>/create/<type:\d+>'=>'<controller>/create',//mainly for doc and acc creating
                                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                        ),
		),
		//'clientScript'=>array(
                //    'class'=>'application.extensions.CClientScriptMinify',
                //    'minifyController'=>'../minify',
                //),		
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*'db'=>array(
			//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
			'connectionString' => 'sqlite:/var/www/yii/demos/new/protected/data/testdrive.db',
			'tablePrefix' => '',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=linetmain',
                        //'connectionString' => 'mysql:host=localhost;dbname=linetnew',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'VBy7t6r5',
			'charset' => 'utf8',
			'tablePrefix' => '',
                        'enableParamLogging'=>true,//needs to be removed some day
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CWebLogRoute',
                    'levels'=>'info,error,warning',//trace,
                    'filter' => array(
                        'class' => 'CLogFilter',
                        'prefixSession' => true,
                        'prefixUser' => false,
                        'logUser' => false,
                        'logVars' => array(),
                    ),
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'trace, info, error, warning',
                    //'categories'=>'system.*',
                	//'categories'=>'*',
                ),
           		array(
       				'class'=>'XWebDebugRouter',
      				'config'=>'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
       				'levels'=>'error, warning, trace, profile, info',
       				'allowedIPs'=>array('127.0.0.1'),
           		),
                /*array(
                    'class'=>'CEmailLogRoute',
                    'levels'=>'error, warning',
                    'emails'=>'adam@speedcomp.co.il',
                ),*/
                
                
            ),
        ),
	),
		
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'adam@speedcomp.co.il',
	),
);
