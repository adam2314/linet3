<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class sideNavBar extends CWidget {

    public $name = '';
    public $id = 'menu';
    public $items = array(
        array(
            'label' => '',
            'url' => '',
            'icon' => '',
            'items' => array(
                array('label' => '', 'url' => '', 'icon' => ''),
                array('label' => '', 'url' => '', 'icon' => ''),
                array('label' => '', 'url' => '', 'icon' => ''),
            )
        )
    );

    public function init() {
        parent::init();
    }

    function toStr($array) {
        $str = $array[0];
        unset($array[0]);
        $first = 1;
        foreach ($array as $type => $value) {
            if ($first) {
                $str.="?";
                $first = 0;
            } else
                $str.="&";
            $str.=$type . "=" . $value;
        }
        return $str;
    }

    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run() {//style="width:'.($this->width-$this->titlewidth-28).'px;"
        $baseUrl = Yii::app()->request->baseUrl;
        $newform = '<ul id="' . $this->id . '" class="unstyled accordion collapse in">';
        foreach ($this->items as $item) {
            $tid = rand();
            $i = 0;
            if (!isset($item["icon"]))
                $item["icon"] = 'th';
            if (!isset($item["items"]))
                $subitemtext = '';
            else {
                $subitemtext = '<ul class="collapse " id="' . $tid . '-nav">';
                foreach ($item["items"] as $subitem) {
                    $subitemtext.='<li><a href="' . $baseUrl . "/" . $this->toStr($subitem['url']) . '"><i class="icon-angle-right"></i> ' . $subitem["label"] . '</a></li>';
                    $i++;
                    //<li><a href="progress.html"><i class="icon-angle-right"></i> Progress</a></li>
                }
                $subitemtext.='</ul>';
            }
            $newform.='<li class="accordion-group ">
                        <a data-parent="' . $this->id . '" data-toggle="collapse" class="accordion-toggle" data-target="#' . $tid . '-nav">
                            <i class="icon-' . $item["icon"] . ' icon-large"></i> ' . $item["label"] . ' <span class="label label-inverse pull-right">' . $i . '</span>
                        </a>';
            $newform.=$subitemtext;
            $newform.='</li>';
        }
        $newform.='</ul>';
        echo $newform;
    }

}
