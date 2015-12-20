<?php echo app\widgets\GridView::widget( array(
	'id'=>'depsoit-grid',
	'dataProvider'=>$model->dp(),
	'columns'=>array(
                array(
                    'format'=>'raw',
                    'value'=>function($data){
                        return \yii\helpers\Html::checkBox("FormDeposit[Deposit][$data->doc_id,$data->line]",null,array( "onchange"=>"CalcSum()"));
                    },
                    ),
                array(
                    'format'=>'raw',
                     'value'=>function($data){
                        return \yii\helpers\Html::hiddenInput("FormDeposit[Total][$data->doc_id,$data->line]","$data->sum").\yii\helpers\Html::hiddenInput("FormDeposit[Type][$data->doc_id,$data->line]","$data->type");}
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
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 
?>