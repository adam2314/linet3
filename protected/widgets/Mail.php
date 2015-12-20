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

class Mail extends Widget {

    public $model;
    public $urlFile = '';
    public $urlAddress = '';
    public $urlMailForm = '';
    public $urlTemplate = '';
    public $urlAction = '';
    public $obj, $id, $type;

    //put your code here


    public function init() {
        parent::init();
    }

    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run() {
        return $this->render("Mail", [
                    "urlTemplate" => $this->urlTemplate,
                    "urlAction" => $this->urlAction,
                    "urlFile" => $this->urlFile,
                    "urlMailForm" => $this->urlMailForm,
                    "urlAddress" => $this->urlAddress,
                    "id" => $this->id,
                    "obj" => $this->obj,
                    "type" => $this->type,
                    
        ]);

    }


}
?>
