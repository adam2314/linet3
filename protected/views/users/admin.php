<?php
$this->params["breadcrumbs"]=array(
	//'Users'=>array('index'),
	//'Manage',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List User'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create User'),'url'=>array('create')),
);

app\widgets\MiniForm::begin(array('header' => Yii::t('app',"Manage Users"),)); 

?>


<?php echo app\widgets\GridView::widget(array(
	'id'=>'user-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'username',
		'fname',
                'lname',
		//'password',
		'lastlogin',
                'email',
		//'cookie',
		
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

app\widgets\MiniForm::end(); 
?>
