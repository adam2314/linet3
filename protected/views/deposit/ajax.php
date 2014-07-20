<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'depsoit-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                array(
                    'type'=>'raw',
                    'value'=>
                        'CHtml::checkBox("FormDeposit[Deposit][$data->doc_id,$data->line]",null,array( "onchange"=>"CalcSum()"))',
                    ),
                array(
                    'type'=>'raw',
                     'value'=>
                        'CHtml::hiddenField("FormDeposit[Total][$data->doc_id,$data->line]","$data->sum").CHtml::hiddenField("FormDeposit[Type][$data->doc_id,$data->line]","$data->type")',
                    ),
                //'type',
		'bank',
                'branch',
                'cheque_acct',
                'cheque_num',
                'cheque_date',
                'dep_date',
		//'account_id',
		'currency_id',
                'refnum',
		'sum',
		//'total',
		
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 
?>