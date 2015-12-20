<?php

$this->params["menu"]= array(
    //array('label' => Yii::t('app', 'List Account types'), 'url' => array('index')),
    //array('label' => Yii::t('app', 'Create File'), 'url' => array('create')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Files"),

)); 


?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'files-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'path',
		'public',
            'hash',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

 app\widgets\MiniForm::end(); 


?>
