<?php
$this->params["breadcrumbs"]=array(
	'Eav Fields'=>array('index'),
	'Manage',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','Create EavFields'),'url'=>array('create')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Eav Fields"),
)); 
?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'eav-fields-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'eavType',
		'min',
		'max',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 


 app\widgets\MiniForm::end(); 

?>
