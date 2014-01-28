<?php
return "
<?php
return array(
    'language'=>'he_il',
    'components'=>array(
        'db'=>array(
                <placeholder>
                

                'emulatePrepare' => true,
                'charset' => 'utf8',
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'DbConnection'
        ),
        'dbMain'=>array(
                <placeholder>
            
                'emulatePrepare' => true,
                'charset' => 'utf8',
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'DbConnection'
        ),
        'dbSession'=>array(
                <placeholder>
            
                'charset' => 'utf8',
                'emulatePrepare' => true,
                'tablePrefix' => '',
                'enableParamLogging'=>true,//needs to be removed some day
                'class'=> 'DbConnection'
        ),
    ),
    
    
);";