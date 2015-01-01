<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class salesReport extends DashPanel {

    public $logo = 'none';
    public $help = 'none';
    public $collapse = false;
    public $fullscreen = false;

    private function search($doc) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('doctype', 7); //salesorder
        //$criteria->compare('issue_date', $doc->issue_date, true);
        //$criteria->compare('due_date', $doc->due_date, true);
        $criteria->addCondition("due_date<=:date_to");
        $criteria->params[':date_to'] = date("Y-m-d") . " 23:59:59";
        $criteria->compare('refstatus', 0);
        //$criteria->compare('status', $doc->status);



        $sort = new CSort();
        $sort->defaultOrder = 'due_date DESC';

        //$criteria->addCondition("due_date<=:date_to");
        //$criteria->params[':date_to'] = date("Y-m-d");

        return new CActiveDataProvider($doc, array(
            'criteria' => $criteria,
            'sort' => $sort,
            'pagination' => array('pageSize' => 4),
        ));
    }

    public function init() {
        $docs = new Docs('search');

        $this->content = $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'sales-grid',
            'dataProvider' => $this->search($docs),
            'template' => '{items}{pager}',
            'columns' => array(
                array(
                    'name' => 'account_id',
                    'value' => 'CHtml::link(CHtml::encode(isset($data->Account)?$data->Account->name:$data->account_id),Yii::app()->createAbsoluteUrl("/accounts/view/".$data->account_id))',
                    'type' => 'raw',
                ),
                array(
                    'name' => 'docnum',
                    'value' => '$data->docnum',
                    'value' => 'CHtml::link(CHtml::encode($data->total),Yii::app()->createAbsoluteUrl("/docs/view/".$data->id))',
                    'type' => 'raw',
                ),
                array(
                    'name' => 'due_date',
                    'value' => 'date(Yii::app()->locale->getDateFormat("phpshort"), CDateTimeParser::parse($data->due_date, Yii::app()->locale->getDateFormat("yiidatetime")))'
                ),
            ),
                ), true);
        //parent::init();
    }

}
