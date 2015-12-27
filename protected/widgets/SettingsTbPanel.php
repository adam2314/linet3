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
use app\widgets\TbPanel;
use yii\base\Widget;

use app\helpers\EAVHelper;
class SettingsTbPanel extends Widget {

    public $from = 100;
    public $to = 199;
    public $models;
    public $header='';
    public function run() {
        TbPanel::begin(array('header' => $this->header));


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
        echo "<div class='col-xs-6'>$col</div><div class='col-xs-6'>$col1</div>";
        TbPanel::end();
    }

}
