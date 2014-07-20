<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'bankbook-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
                array(
                    'type'=>'raw',
                    'value'=>
                        'CHtml::checkBox("FormExtmatch[Bankbook][match][$data->id]",null,array( "onchange"=>"CalcMatchSum()"))',
                    ),
                array(
                    'type'=>'raw',
                     'value'=>
                        'CHtml::hiddenField("FormExtmatch[Bankbook][total][$data->id]","$data->sum")',
                    ),
		//'id',
		'account_id',
		'details',
                'refnum',
                'currency_id',
		'sum',
                
		//'total',
		
		
		//array(
		//	'class'=>'bootstrap.widgets.TbButtonColumn',
		//),
	),
)); 
?>
</div>
<div style=" width: 30%; display: inline-block;">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'transaction-grid',
	'dataProvider'=>$trans->search(),
	//'filter'=>$model,
	'columns'=>array(
                array(
                    'type'=>'raw',
                    'value'=>
                        'CHtml::checkBox("FormExtmatch[Trans][match][$data->id]",null,array( "onchange"=>"CalcMatchSum()"))',
                    ),
                array(
                    'type'=>'raw',
                     'value'=>
                        'CHtml::hiddenField("FormExtmatch[Trans][total][$data->id]","$data->sum")',
                    ),
            
		//'id',
		'account_id',
		'details',
                //'refnum',
		
                'currency_id',
                'sum',
		//'total',
		
		
		//array(
		//	'class'=>'bootstrap.widgets.TbButtonColumn',
		//),
	),
)); 
?>
</div>

