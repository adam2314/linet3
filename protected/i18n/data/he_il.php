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
                        'yiishort'=>'dd/mm/yyyy',
                        'yiidatetime'=>'dd/mm/yyyy HH:mm:ss',
                        'phpshort'=>'d/m/Y',
                        'phpdatetime'=>'d/m/Y H:m:s',
                    ),
		//'timeFormats' => array(
			//'small'=>'HH:mm:ss',          // format used for input
			//'database'=>Yii::app()->params['database_format']['time'],
		//)
	)
);
