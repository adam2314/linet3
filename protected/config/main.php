<?php

//needs to move!
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
Yii::setPathOfAlias('tinymce', dirname(__FILE__) . '/../extensions/tinymce');

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
                'application.components.payments.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*',
            ),
            'modules' => array(
                'rights' => array(
                    'debug' => true,
                    'enableBizRuleData' => true,
                ),
                'eav' => array(),
                'forum' => array(),
                'user' => array(
                    'debug' => True,
                ),
            ),
            // application components
            'components' => array(
                'Smtpmail' => array(
                    'class' => 'application.extensions.smtpmail.PHPMailer',
                    'Host' => "127.0.0.1",
                    //'Username' => '',
                    //'Password' => '',
                    'Mailer' => 'smtp',
                    'Port' => 25,
                    'SMTPAuth' => false,
                    'SMTPSecure' => '',
                ),
                'curl' => array(
                    'class' => 'ext.curl.Curl',
                    'options' => array(/* additional curl options */),
                ),
                'Paypal' => array(
                    'class' => 'application.components.Paypal',
                ),
                'session' => array(
                    'autoStart' => True,
                ),
                'bootstrap' => array(
                    'class' => 'bootstrap.components.Bootstrap',
                ),
                'tinymce' => array(
                    'class' => 'tinymce.TinyMce',
                ),
                'user' => array(
                    'class' => 'RWebUser',
                ),
                'authManager' => array(
                    'class' => 'RDbAuthManager',
                    'connectionID' => 'db',
                    'itemTable' => '{{AuthItem}}',
                    'itemChildTable' => '{{AuthItemChild}}',
                    'assignmentTable' => '{{AuthAssignment}}',
                    'rightsTable' => '{{Rights}}',
                    'defaultRoles' => array('Guest'),
                    //'defaultRoles' => array('Authenticated'),
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
                        'api/<action:\w+>/<model:\w+>/<id:\d+>' => 'api/<action>',
                        'api/<action:\w+>/<model:\w+>' => 'api/<action>',
                        'rights/<controller:\w+>/<action:\w+>' => 'rights/<controller>/<action>',
                        //'minify/<group:[^\/]+>'=>'minify/index',
                        'install/<step:\d+>' => 'install/index',
                        'docs/view/<doctype:\d+>/<docnum:\d+>' => 'docs/view',
                        'docs/view/<id:\d+>' => 'docs/view',
                        'download/<id:\d+>' => 'data/download',
                        //'download/<company:\w+>/<hash:\d+>' => 'data/downloadpublic',
                        '<controller:\w+>/create/<type:\d+>' => '<controller>/create', //mainly for doc, acc,outcome creating
                        //'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                        //'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                        '<controller:\w+>/index/<type:\d+>' => '<controller>/index',
                        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                        '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                        '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                        '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
                    ),
                ),
                'errorHandler' => array(
                    'errorAction' => 'site/error',
                ),
                'log' => array(
                    'class' => 'CLogRouter',
                    'routes' => array(
                    ),
                ), //end log
            ),
            // application-level parameters that can be accessed
            // using Yii::app()->params['paramName']
            'params' => array(
                // this is used in contact page
                'adminEmail' => 'adam@speedcomp.co.il',
                'updatesrv' => 'https://update.linet.org.il/linet3/',
                'version' => '3.0',
                'timezone' => 'Asia/Tel_Aviv',
                'filePath' => dirname(__FILE__) . '/../files/',
            ),
                )//end main
); //end merge
