<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'bankbook-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'account_id',
		'details',
                'refnum',
		'sum',
		'total',
		
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 
?>