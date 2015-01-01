<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class outcomeReport extends DashPanel {

    public $logo = 'none';
    public $help = 'none';
    public $collapse = false;
    public $fullscreen = false;

    

    private function search($doc) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        //$criteria->compare('doctype', 13);//13,14

        $criteria->addCondition("((doctype=:typeA) OR (doctype=:typeB))");
        $criteria->addCondition("due_date<=:date_to");
        $criteria->params[':date_to'] = date("Y-m-d") . " 23:59:59";
        $criteria->params[':typeA'] = 13;
        $criteria->params[':typeB'] = 14;
        $criteria->compare('refstatus', 0);
        //$criteria->compare('issue_date', $doc->issue_date, true);
        //$criteria->compare('due_date', $doc->due_date, true);
        //$criteria->compare('status', $doc->status);



        $sort = new CSort();
        $sort->defaultOrder = 'due_date DESC';

        return new CActiveDataProvider($doc, array(
            'criteria' => $criteria,
            'sort' => $sort,
            'pagination' => array('pageSize' => 4),
        ));
    }

    public function init() {
        $trans = new Docs('search');

        //type out come
        //$accHist->dt=today 00:00:00 > now > today 23:59:59
        $this->content = $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'outcome-grid',
            'dataProvider' => $this->search($trans),
            'template' => '{items}{pager}',
            'columns' => array(
                array(
                    'name' => 'account_id',
                    //'type' => 'raw',
                    'value' => 'CHtml::link(CHtml::encode(isset($data->Account)?$data->Account->name:$data->account_id),Yii::app()->createAbsoluteUrl("/accounts/view/".$data->account_id))',
                    'type' => 'raw',
                //'value' => '$data->getOptAcc()',
                ),
                array(
                    'name' => 'docnum',
                    'value' => '$data->docnum',
                    'value' => 'CHtml::link(CHtml::encode($data->total),Yii::app()->createAbsoluteUrl("/docs/view/".$data->id))',
                    'type' => 'raw',
                ),
                //'refnum2',
                array(
                    'name' => 'due_date',
                    'value' => 'date(Yii::app()->locale->getDateFormat("phpshort"), CDateTimeParser::parse($data->due_date, Yii::app()->locale->getDateFormat("yiidatetime")))'
                ),
            ),
                ), true);
        //parent::init();
    }

}
