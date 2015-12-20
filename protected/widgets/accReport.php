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

use app\widgets\DashPanel;

class accReport extends DashPanel {

    public $logo = 'none';
    public $help = 'none';
    public $collapse = false;
    public $fullscreen = false;
    public $height = 450;   
    private function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $query = \app\models\AccHist::find();


        //$sort = new CSort();
        //$sort->defaultOrder = 'dt DESC';

        return new \yii\data\ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => [ 'dt'=>SORT_DESC]],
            'pagination' => array('pageSize' => 4),
        ]);
    }

    public function init() {
        //$accHist = new AccHist('search');
        //$accHist->dt=today 00:00:00 > now > today 23:59:59
        $this->content = \app\widgets\GridView::widget( array(
            'id' => 'acchist-grid',
            'dataProvider' => $this->search(),
            'layout' => '{items}{pager}',
            'panel'=>false,
            'columns' => array(
                array(
                    'attribute' => 'account_id',
                    //'type' => 'raw',
                    'value' => function($data){return \yii\helpers\Html::a(\yii\helpers\Html::encode(isset($data->account)?$data->account->name:$data->account_id),\yii\helpers\BaseUrl::base().("/accounts/view/".$data->account_id));},
                    'format' => 'raw',
                //'value' => '$data->getOptAcc()',
                ),
                'dt',
                array(
                    'attribute' => 'details',
                    'format' => 'raw',
                    'value' => function($data){return $data->brief();},
                )
            ),
                ), true);
        //parent::init();
    }

}
