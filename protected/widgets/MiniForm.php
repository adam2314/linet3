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

//use yii\helpers\Html;

class MiniForm extends Widget {

    public $logo = 'fa fa-th-large';
    public $help = 'none';
    public $collapse = true;
    public $fullscreen = true;
    public $header = '';
    public $titlewidth = 0;
    public $class = '';
    public $content = '';
    public $height = false;

    public function init() {
        ob_start();
        parent::init();
    }

    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run() {//style="width:'.($this->width-$this->titlewidth-28).'px;"
        if ($this->content == '')
            $this->content = ob_get_clean();

        $helper= new \app\models\Help;
        $this->help=  $helper->getHelp(str_replace(\yii\helpers\BaseUrl::base() , "", \Yii::$app->request->url));
        
        if ($this->help) {//' . \Yii::t("app", 'Help') . '
            $this->help = '<a class="btn btn-default" href="' . $this->help . '" target="_blank"><i class="glyphicon glyphicon-question-sign"></i></a>';
        } else {
            $this->help = '';
        }





        if ($this->collapse) {
            $this->collapse = '<a href="javascript:;" class="btn btn-default btn-xs collapse-box"  data-toggle="collapse">
                          <i class="fa fa-minus"></i>
                        </a> ';
            $this->collapse = '';
        } else {
            $this->collapse = '';
        }


        if ($this->height) {
            $this->height = 'style="height:' . $this->height . 'px"';
        } else {
            $this->height = '';
        }
        if ($this->fullscreen) {
            $this->fullscreen = '<a href="javascript:;" class="btn btn-default btn-xs full-box">
                          <i class="fa fa-expand"></i>
                        </a> ';
            $this->fullscreen = '';
        } else {
            $this->fullscreen = '';
        }

        //echo $this->getViewPath();
        //    exit;
        //CWidget::render();
        return $this->render("MiniForm", [
                    "class" => $this->class,
                    "logo" => $this->logo,
                    "header" => $this->header,
                    "help" => $this->help,
                    "collapse" => $this->collapse,
                    "fullscreen" => $this->fullscreen,
                    "height" => $this->height,
                    "content" => $this->content,
        ]);
        //$newform = '';
        //echo $newform;
    }

}
