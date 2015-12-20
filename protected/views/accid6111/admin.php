<?php
$this->params["breadcrumbs"]=array(
	Yii::t('app','Account Id6111')=>array('index'),
	Yii::t('app','Manage'),
);

$this->params["menu"]=array(
	//array('label'=>'List Id6111','url'=>array('index')),
	array('label'=>Yii::t('app','Create Id6111'),'url'=>array('create')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Account Id6111"),

)); 


?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'bank-name-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 


 app\widgets\MiniForm::end(); 
?>
