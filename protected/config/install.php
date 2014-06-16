
<?php
return array(
    'language'=>'he_il',
    'params'=>array(
                    'newInstall'=>false,
            ),
    'components'=>array(
        'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=linet3.0',
                        'username' => 'root',
                        'password' => 'VBy7t6r5',
                

                'emulatePrepare' => true,
                'charset' => 'utf8',
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'CDbConnection'
        ),
        'dbMain'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=linet3.0',
                        'username' => 'root',
                        'password' => 'VBy7t6r5',
            
                'emulatePrepare' => true,
                'charset' => 'utf8',
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'CDbConnection'
        ),
        'dbSession'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=linet3.0',
                        'username' => 'root',
                        'password' => 'VBy7t6r5',
            
                'charset' => 'utf8',
                'emulatePrepare' => true,
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'CDbConnection'
        ),
    ),
    
    
);