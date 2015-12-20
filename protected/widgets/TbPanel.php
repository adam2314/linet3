<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class TbPanel extends Widget {

    public $class = "default";
    public $header = "";
    public $logo = "";
    public $content = '';

    public function init() {
        ob_start();
        parent::init();
    }

    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run() {
        if ($this->content == '')
            $this->content = ob_get_clean();



        $newform = '
        <div class="panel panel-' . $this->class . '">
            <div class="panel-heading">
                             
                        <div class="icons">
                            <i class="' . $this->logo . '"></i>
                        </div>
                        <h5>' . $this->header . '</h5>
                    
            </div>
            <div class="panel-body">

                    ' . $this->content . '
            </div>
        </div>
';


        echo $newform;
    }

}
