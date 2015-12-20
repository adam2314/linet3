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

class salesReport extends DashPanel {

    public $logo = 'none';
    public $help = 'none';
    public $collapse = false;
    public $fullscreen = false;
    public $height = 450;
    private function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $query = \app\models\Docs::find();

        $query->where("(`doctype`=:typeA)", [':typeA' => 7]);
        $query->andFilterWhere(['<=', 'due_date', date("Y-m-d") . " 23:59:59"]);
        $query->andFilterWhere(['=', 'refstatus', 0]);

        // $sort = new CSort();
        //$sort->defaultOrder = 'due_date DESC';

        return new \yii\data\ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => [ 'due_date'=>SORT_ASC]],
            'pagination' => array('pageSize' => 4),
        ]);
    }

    public function init() {
        //$docs = new Docs('search');

        $this->content = \app\widgets\GridView::widget( array(
            'id' => 'sales-grid',
            'dataProvider' => $this->search(),
            'layout' => '{items}{pager}',
            'panel'=>false,
            'columns' => array(
                array(
                    'attribute' => 'account_id',
                    'value' => function($data) {
                        return \yii\helpers\html::a(\yii\helpers\html::encode($data->company), \yii\helpers\BaseUrl::base() . ("/accounts/view/" . $data->account_id));
                    },
                    'format' => 'raw',
                ),
                array(
                    'attribute' => 'docnum',
                    //'value' => '$data->docnum',
                    'value' => function($data) {
                        return \yii\helpers\html::a(\yii\helpers\html::encode($data->total), \yii\helpers\BaseUrl::base() . ("/docs/view/" . $data->id));
                    },
                    'format' => 'raw',
                ),
                array(
                    'attribute' => 'due_date',
                    'value' => function($data) {
                        return $data->due_date;
                    }
                ),
            ),
                ), true);
        //parent::init();
    }

}
