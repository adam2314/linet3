<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C)  Adam Ben Hur.
 * 
 * @author adam
 * 
 * All Rights Reserved.
 * ********************************************************************************** */

/**
 * Description of widgetRefnum
 *
 */
namespace app\widgets;

use yii\base\Widget;
class RefnumModal extends Widget {

    public $model;
    public $attribute;

    //put your code here


    public function init() {
        parent::init();
    }

    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run() {//style="width:'.($this->width-$this->titlewidth-28).'px;"
        $arr=explode('\\',get_class($this->model));
        $name =  array_pop($arr);

        $id = $name . "_" . $this->attribute;
        $ids = $this->attribute . "_ids";
        

        return $this->render("RefnumModal", [
                    "name" => $name,
                    "id" => $id,
                    "ids" => $ids,
                    "value" => $this->model->{$ids},
                    "label" => $this->model->getAttributeLabel($this->attribute),
        ]);
    }
}
