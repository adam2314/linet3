<?php

$this->params["menu"]= array(
    array('label' => Yii::t('app', 'List Account types'), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create Account types'), 'url' => array('create')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Account types"),

)); 


?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'acctype-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'desc',
		'openformat',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

 app\widgets\MiniForm::end(); 


?>
