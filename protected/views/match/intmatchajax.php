<div style=" width: 35%; display: inline-block; margin-right: 150px; ">
    <?php echo app\widgets\GridView::widget( array(
	'id'=>'in-grid',
	'dataProvider'=>$in->searchIn(),
        'panel'=>false,
	////'filter'=>$model,
	'columns'=>array(
                array(
                    'format'=>'raw',
                    'value'=>function($data){return
                       \yii\helpers\Html::checkBox("FormIntmatch[In][match][$data->id]",null,array("class"=>"In_match", "onchange"=>"CalcMatchSum()")).
                     \yii\helpers\Html::hiddenInput("FormIntmatch[In][total][$data->id]","$data->sum",array("class"=>"In_total"));
                    },
                    ),
                array(
                    'attribute'=>'type',
                    'value'=>function($data){return Yii::t("app",$data->ttype->name);},
                    ),
		'details',
                //'refnum',
		
                'currency_id',
                'sum',
		//'total',
		
		
		//array(
		//	'class'=>'yii\grid\ActionColumn',
		//),
	),
)); 
?>
</div>
<div style=" width: 35%; display: inline-block;">
    <?php echo app\widgets\GridView::widget( array(
	'id'=>'out-grid',
	'dataProvider'=>$out->searchOut(),
        'panel'=>false,
	////'filter'=>$model,
	'columns'=>array(
                array(
                    'format'=>'raw',
                    'value'=>function($data){return
                        \yii\helpers\Html::checkBox("FormIntmatch[Out][match][$data->id]",null,array("class"=>"Out_match", "onchange"=>"CalcMatchSum()")).
                     \yii\helpers\Html::hiddenInput("FormIntmatch[Out][total][$data->id]","$data->sum",array("class"=>"Out_total"));
                    }
                    ),
                array(
                    'attribute'=>'type',
                    'value'=>function($data){return Yii::t("app",$data->ttype->name);},
                    ),
		'details',
                //'refnum',
		
                'currency_id',
                'sum',
		//'total',
		
		
		//array(
		//	'class'=>'yii\grid\ActionColumn',
		//),
	),
)); 
?>
</div>

