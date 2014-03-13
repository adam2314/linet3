<?php
return array(
    'language'=>'he_il',
    'components'=>array(
        'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=linetmain',
                        'username' => 'root',
                        'password' => 'VBy7t6r5',
                

                'emulatePrepare' => true,
                'charset' => 'utf8',
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'DbConnection'
        ),
        'dbMain'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=linetmain',
                        'username' => 'root',
                        'password' => 'VBy7t6r5',
            
                'emulatePrepare' => true,
                'charset' => 'utf8',
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'DbConnection'
        ),
        'dbSession'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=linetmain',
                        'username' => 'root',
                        'password' => 'VBy7t6r5',
            
                'charset' => 'utf8',
                'emulatePrepare' => true,
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'DbConnection'
        ),
    ),
    
    
);