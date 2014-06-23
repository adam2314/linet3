<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return CMap::mergeArray(
                include(dirname(__FILE__) . '/install.php'), array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            'name' => 'Linet 3.0',
            //'theme'=>'fancy',
            'sourceLanguage' => 'en',
            // preloading 'log' component
            'preload' => array('log'),
            'localeDataPath' => 'protected/i18n/data/',
            'defaultController' => 'company',
            'onBeginRequest' => array('Linet3', 'beginRequest'),
            // autoloading model and component classes
            'import' => array(
                'application.models.*',
                'application.components.*',
                'application.components.dashboard.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*',
            //'application.extensions.debugtoolbar.*',
            ),
            'modules' => array(
                //'auth'=>array(),
                'rights' => array(
                    'debug' => true,
                    //'install'=>true,
                    'enableBizRuleData' => true,
                //'superuserName'=>'admin',
                ),
                'eav' => array(),
                'forum' => array(),
                'user' => array(
                    'debug' => True,
                ),
            ),
            // application components
            'components' => array(
                //'localtime'=>array(
                //    'class'=>'LocalTime',
                //),
                'Paypal' => array(
                    'class' => 'application.components.Paypal',
                ),
                'session' => array(
                    'autoStart' => True,
                ),
                'bootstrap' => array(
                    'class' => 'bootstrap.components.Bootstrap',
                ),
                //'cache'=>array(
                //        'class'=>'CApcCache',
                //),
                'user' => array(
                    'class' => 'RWebUser', //rights
                ),
                'authManager' => array(
                    'class' => 'RDbAuthManager',
                    'connectionID' => 'db',
                    'defaultRoles' => array('Guest'),
                    'itemTable' => '{{AuthItem}}',
                    'itemChildTable' => '{{AuthItemChild}}',
                    'assignmentTable' => '{{AuthAssignment}}',
                    'rightsTable' => '{{Rights}}',
                ),
                'ePdf' => array(
                    'class' => 'ext.yii-pdf.EYiiPdf',
                    'params' => array(
                        'mpdf' => array(
                            'librarySourcePath' => 'ext.yii-pdf.mpdf57.*',
                            'constants' => array(
                                '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                            ),
                            'class' => 'mpdf',
                        )
                    )
                ), //ePdf
                // uncomment the following to enable URLs in path-format
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'rules' => array(
                        '' => 'company/index',
                        'api/login' => 'api/login',
                        'api/logout' => 'api/logout',
                        'api/select/<id:\d+>' => 'api/select',
                        'api/search/<model:\w+>' => 'api/search',
                        
                        array('api/list', 'pattern' => 'api/<model:\w+>', 'verb' => 'GET'),
                        array('api/view', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'GET'),
                        array('api/update', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'POST'),
                        array('api/delete', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'DELETE'),
                        array('api/create', 'pattern' => 'api/<model:\w+>', 'verb' => 'POST'),
                        //'minify/<group:[^\/]+>'=>'minify/index',
                        //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                        '<controller:\w+>/create/<type:\d+>' => '<controller>/create', //mainly for doc, acc,outcome creating
                        //'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                        //'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                        '<controller:\w+>/index/<type:\d+>' => '<controller>/index',
                        'install/<step:\d+>' => 'install/index',
                        'docs/view/<doctype:\d+>/<docnum:\d+>' => 'docs/view',
                        'docs/view/<id:\d+>' => 'docs/view',
                        'download/<id:\d+>' => 'data/download',
                        'download/<company:\w+>/<hash:\d+>' => 'data/downloadpublic',
                    ),
                ),
                //'clientScript'=>array(
                //    'class'=>'application.extensions.CClientScriptMinify',
                //    'minifyController'=>'../minify',
                //),		
                'errorHandler' => array(
                    'errorAction' => 'site/error',
                ),
                'log' => array(
                    'class' => 'CLogRouter',
                    'routes' => array(
                        array(
                            'class' => 'CWebLogRoute',
                            'levels' => 'info,error,warning',
                            //'levels'=>'trace, info, error, warning, application',
                            'categories' => 'system.db.*, application',
                            'filter' => array(
                                'class' => 'CLogFilter',
                                'prefixSession' => true,
                                'prefixUser' => false,
                                'logUser' => false,
                                'logVars' => array(),
                            ),
                        ),
                        array(
                            'class' => 'CFileLogRoute',
                            'levels' => 'trace, info, error, warning',
                        //'categories'=>'app',
                        //'categories'=>'*',
                        ),
                    /* array(
                      'class'=>'CEmailLogRoute',
                      'levels'=>'error, warning',
                      'emails'=>'adam@speedcomp.co.il',
                      ), */
                    ),
                ), //end log
            ),
            // application-level parameters that can be accessed
            // using Yii::app()->params['paramName']
            'params' => array(
                // this is used in contact page
                'adminEmail' => 'adam@speedcomp.co.il',
            //'tablePrefix' => ''
            ),
                )//end main
); //end merge
