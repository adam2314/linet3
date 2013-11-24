<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'depsoit-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
                array(
'class'=>'CCheckBoxColumn',
),
                'type',
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