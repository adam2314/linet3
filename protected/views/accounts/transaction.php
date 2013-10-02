<?php 
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>

<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => "Transactions for Account $model->id",
    'width' => '800',
)); 
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'transactions-grid',
	'dataProvider'=>$model->search(),
        //'enablePagination'=> false,
	//'filter'=>$model,
	'columns'=>array(
		'num',
		//'prefix',
		//'company',
		array(
	            'name' => 'Oppt Acc',
	            //'type' => 'raw',
	            'value' => '$data->getOptAcc("string")',
	        ),
		'type',
		'refnum1',
                'refnum2',
		'date',
		'sum',
		
	),
)); 
 $this->endWidget(); 
 ?>