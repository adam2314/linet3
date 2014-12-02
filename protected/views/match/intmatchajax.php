<div style=" width: 35%; display: inline-block; margin-right: 150px; ">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'in-grid',
	'dataProvider'=>$in->searchIn(),
	//'filter'=>$model,
	'columns'=>array(
                array(
                    'type'=>'raw',
                    'value'=>
                        'CHtml::checkBox("FormIntmatch[In][match][$data->id]",null,array( "onchange"=>"CalcMatchSum()"));'.
                    'CHtml::hiddenField("FormIntmatch[In][total][$data->id]","$data->sum")',
                    ),
                array(
                    'name'=>'type',
                    'value'=>'Yii::t("app",$data->Type->name)'
                    ),
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
<div style=" width: 35%; display: inline-block;">
    <?php $this->widget('EExcelView', array(
	'id'=>'out-grid',
	'dataProvider'=>$out->searchOut(),
	//'filter'=>$model,
	'columns'=>array(
                array(
                    'type'=>'raw',
                    'value'=>
                        'CHtml::checkBox("FormIntmatch[Out][match][$data->id]",null,array( "onchange"=>"CalcMatchSum()"));'.
                    'CHtml::hiddenField("FormIntmatch[Out][total][$data->id]","$data->sum")'
                    ),
                array(
                    'name'=>'type',
                    'value'=>'Yii::t("app",$data->Type->name)'
                    ),
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

