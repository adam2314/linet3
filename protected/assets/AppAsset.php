<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css;
    public $js = [
        'assets/java.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'kartik\datecontrol\DateControlAsset',
        'kartik\date\DatePickerAsset',
    ];

    public function init() {
        parent::init();
        if (\Yii::$app->language== 'he_il') {
            $this->css = [
                
                'css/site.css',
                'css/site-rtl.css',
               
            ];
        } else {
            $this->css = [
                'css/site.css',
            ];
        }
    }

}
