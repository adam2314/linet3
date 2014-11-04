<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return CMap::mergeArray(
                include(dirname(__FILE__) . '/install.php'), array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
        'import' => array(
                'application.models.*',
                'application.components.*',
                'application.components.dashboard.*',
                'application.components.payments.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*',
            //'application.extensions.debugtoolbar.*',
            ),
	// application components
	'components'=>array(
		
	),
));