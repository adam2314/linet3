<?php



$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","invoices to be collected"),'class'=>'col-lg-3','fullscreen'=>false)); 
$docs=new Docs('search');
//
//$docs->dt=today 00:00:00 > now > today 23:59:59
//$docs->status=??
//$docs->doctype=invoice||proforma
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'docs-grid',
	'dataProvider'=>$docs->search(),
	//'filter'=>$model,
   
	'columns'=>array(
/*
                array(
                        'name'=>'doctype',
                        //'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                        'value'=>'$data->docType->name'
                ),
                array(
                    'name'=>'docnum', 
                    'value'=>'CHtml::link(CHtml::encode($data->docnum),"#", array(  "onclick"=>\'refNum("\'.$data->id.\'","\'.$data->docnum.\'","\'.$data->docType->name.\'")\',))',
                    'type'=>'raw',
                    
                    
                    
                ),*/
                'company',
                //array(  'onclick'=>""refNum(\"".$data->id.",".$data->docnum.",".$data->docType->name.")",
                /*array(
                        //'name'=>'account_id',
                        'header'=>'Account',
                        'class'=>'CLinkColumn',
                        //'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                        'labelExpression'=>'"".$data->company',
                         //'url'=>'accouts/view&id=$data->account_id',
                          'urlExpression'=>'"users/view&id=".$data->account_id',
                ),*/
            /*
                array(
                        'name'=>'status',
                        'value' => 'isset($data->docStatus)?$data->docStatus->name:""'
                        
                ),*/

                'total',
                'due_date',

	),
));
$this->endWidget(); 

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Cheques and Cash to be deposited"),'class'=>'col-lg-3','fullscreen'=>false)); 
$cheques=new Doccheques('search');
//$cheques->dep_date<=today
//$cheques->status=??
//$cheques->type=cash check
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'depsoit-grid',
	'dataProvider'=>$cheques->search(),
	'columns'=>array(
            /*
                array(
                    'type'=>'raw',
                    'value'=>
                        'CHtml::checkBox("FormDeposit[Deposit][$data->doc_id,$data->line]",null,array( "onchange"=>"CalcSum()"))',
                    ),
                array(
                    'type'=>'raw',
                     'value'=>
                        'CHtml::hiddenField("FormDeposit[Total][$data->doc_id,$data->line]","$data->sum")',
                    ),*/
                'type',
                //'bank_refnum',
		//'bank',
                //'branch',
                'cheque_acct',
                'cheque_num',
                //'cheque_date',
                'dep_date',
		//'account_id',
		//'currency_id',
                'refnum',
		'sum',
		//'total',
		/*
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),*/
	),
)); 
$this->endWidget(); 

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Accounts Related events"),'class'=>'col-lg-3','fullscreen'=>false)); 
$accHist=new AccHist('search');
//$accHist->dt=today 00:00:00 > now > today 23:59:59
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'acchist-grid',
	'dataProvider'=>$accHist->search(),
	'columns'=>array(
		'account_id',
		'dt',
		'details',
	),
)); 
$this->endWidget(); 

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Treat Needed Documents"),'class'=>'col-lg-3','fullscreen'=>false)); 
$docs=new Docs('search');
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'docs-grid',
	'dataProvider'=>$docs->search(),
   
	'columns'=>array(

                array(
                        'name'=>'doctype',
                        //'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                        'value'=>'$data->docType->name'
                ),
                array(
                    'name'=>'docnum', 
                    'value'=>'CHtml::link(CHtml::encode($data->docnum),"#", array(  "onclick"=>\'refNum("\'.$data->id.\'","\'.$data->docnum.\'","\'.$data->docType->name.\'")\',))',
                    'type'=>'raw',
                    
                    
                    
                ),
                'company',
                //array(  'onclick'=>""refNum(\"".$data->id.",".$data->docnum.",".$data->docType->name.")",
                /*array(
                        //'name'=>'account_id',
                        'header'=>'Account',
                        'class'=>'CLinkColumn',
                        //'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                        'labelExpression'=>'"".$data->company',
                         //'url'=>'accouts/view&id=$data->account_id',
                          'urlExpression'=>'"users/view&id=".$data->account_id',
                ),*/
                array(
                        'name'=>'status',
                        'value' => 'isset($data->docStatus)?$data->docStatus->name:""'
                        
                ),

                'total',

	),
));
$this->endWidget(); 

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Sales"),'class'=>'col-lg-12','fullscreen'=>false)); 
$this->endWidget(); 

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Expenses"),'class'=>'col-lg-12','fullscreen'=>false)); 
$this->endWidget(); 

?>