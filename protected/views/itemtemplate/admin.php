<?php
$this->params["menu"]=array(
	array('label'=>Yii::t('app','Create Account Template'),'url'=>array('create')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Account Templates"),
)); 
?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'itm-template-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		//'AccType_id',
            array(
                'attribute' => 'Itemcategory_id',
                //'value' => '$data->Category->name',
               ),
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

 app\widgets\MiniForm::end(); 
?>
