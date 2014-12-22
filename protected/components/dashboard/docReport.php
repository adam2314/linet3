<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class docReport extends MiniForm{
    public $logo = 'none';
    public $help = 'none';
    public $collapse=false;
    public $fullscreen=false;
    
    private function search($doc) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        //$criteria->compare('doctype', 7);//7 salesorder
        
        //$criteria->compare('due_date', $doc->due_date, true);
       
        
        $criteria->addCondition("due_date<=:date_to");
        $criteria->params[':date_to'] = date("Y-m-d")." 23:59:59";
        $criteria->compare('refstatus', 0);
        //$criteria->compare('status', $doc->status);
        
       

        $sort = new CSort();
        $sort->defaultOrder = 'due_date DESC';

        return new CActiveDataProvider($doc, array(
            'criteria' => $criteria,
            'sort' => $sort,
            'pagination' => array('pageSize' => 4),
        ));
    }
    
    
     public function init()  {
        $docs=new Docs('search');
        //$docs->=status=?? open??
        $this->content=$this->widget('bootstrap.widgets.TbGridView', array(
                'id'=>'docs-grid',
                'dataProvider'=>$this->search($docs),
                'template' => '{items}{pager}',
                'columns'=>array(

                        array(
                                'name'=>'doctype',
                                //'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                                //'value'=>'',
                                'value' => 'CHtml::link(CHtml::encode((isset($data->docType)?Yii::t("app",$data->docType->name):"")." #".$data->docnum),Yii::app()->createAbsoluteUrl("/docs/view/".$data->id))',
                                'type' => 'raw',
                        ),//*/

                        array(
                                'name'=>'account_id',
                            
                                'value' => 'CHtml::link(CHtml::encode($data->company),Yii::app()->createAbsoluteUrl("/accounts/transaction/id/".$data->account_id))',
                                'type' => 'raw',

                        ),//*/
                    
                    
                      

                        'total',
                      array(
                                'name'=>'status',
                                'value' => 'isset($data->docStatus)?$data->docStatus->name:""'

                        ),//*/

                ),
        ),true); 
        //parent::init();
    }

}




