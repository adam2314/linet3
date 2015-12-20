<?php

$this->params["menu"]=array(
	//array('label'=>Yii::t('app','List Mail Templates'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Mail Templates'),'url'=>array('create')),
);



 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Mail Templates"),

)); 


?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'acctype-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		//'desc',
		//'openformat',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

 app\widgets\MiniForm::end(); 


?>
