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

                        'yiishort'=>'mm/dd/yyyy',
                        'yiidatetime'=>'mm/dd/yyyy HH:mm:ss',
                        'phpshort'=>'m/d/Y',
                        'phpdatetime'=>'m/d/Y H:m:s',
                    ),

	)
);
