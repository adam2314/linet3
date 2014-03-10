<?php

/**
 * Description of he_IL
 *
 * @author adam
 */

return CMap::mergeArray(
	require(dirname($GLOBALS['yii']).'/i18n/data/'.basename(__FILE__)),
	array(
		'dateFormats' =>  array (
                        'full' => 'EEEE, d בMMMM y',
                        'long' => 'd בMMMM y',
                        'medium' => 'd בMMM yyyy',
                        'short' => 'dd/mm/yy',
                        'yiishort'=>'dd/MM/yyyy',
                        'yiidatetime'=>'dd/MM/yyyy HH:mm',
                        'yiidatetimesec'=>'dd/MM/yyyy HH:mm:ss',
                        'yiidbdatetime'=>'yyyy-MM-d HH:mm:ss',
                        'phpshort'=>'d/m/Y',
                        'phpdatetime'=>'d/m/Y H:i:s',
                        'phpdatetimes'=>'d/m/Y H:i',
                        'phpdbdatetime'=>'Y-m-d H:i',
                        
                    ),
		//'timeFormats' => array(
			//'small'=>'HH:mm:ss',          // format used for input
			//'database'=>Yii::app()->params['database_format']['time'],
		//)
	)
);
