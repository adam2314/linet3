<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class accReport extends DashPanel {

    public $logo = 'none';
    public $help = 'none';
    public $collapse = false;
    public $fullscreen = false;

   

    private function search($accHist) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;



        $sort = new CSort();
        $sort->defaultOrder = 'dt DESC';

        return new CActiveDataProvider($accHist, array(
            'criteria' => $criteria,
            'sort' => $sort,
            'pagination' => array('pageSize' => 4),
        ));
    }

    public function init() {
        $accHist = new AccHist('search');
        //$accHist->dt=today 00:00:00 > now > today 23:59:59
        $this->content = $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'acchist-grid',
            'dataProvider' => $this->search($accHist),
            'template' => '{items}{pager}',
            'columns' => array(
                array(
                    'name' => 'account_id',
                    //'type' => 'raw',
                    'value' => 'CHtml::link(CHtml::encode(isset($data->Account)?$data->Account->name:$data->account_id),Yii::app()->createAbsoluteUrl("/accounts/view/".$data->account_id))',
                    'type' => 'raw',
                //'value' => '$data->getOptAcc()',
                ),
                'dt',
                array(
                    'name' => 'details',
                    'type' => 'raw',
                    'value' => '$data->brief()',
                )
            ),
                ), true);
        //parent::init();
    }

}
