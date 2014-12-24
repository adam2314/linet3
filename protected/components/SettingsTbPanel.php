<?php
/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class SettingsTbPanel extends CWidget {

    public $from = 100;
    public $to = 199;
    public $models;
    public $header='';
    public function run() {
        $this->beginWidget('TbPanel', array('header' => $this->header));


        $col1 = $col = '';
        $print = true;
        foreach ($this->models as $sModel) {
            if (($sModel->priority >= $this->from) && ($sModel->priority <= $this->to)) {
                $tmp = EAVHelper::addRow($sModel->id, $sModel->value, $sModel);
                if ($print) {
                    $col.= $tmp;
                    $print = false;
                } else {
                    $col1.= $tmp;
                    $print = true;
                }
            }
        }
        echo "<div class='col-xs-6'>$col1</div><div class='col-xs-6'>$col</div>";
        $this->endWidget();
    }

}
