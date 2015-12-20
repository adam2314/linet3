<?php

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Logs"),

)); 


?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tenant-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'level',
		'category',
                //'category',
		'IP_User',
            'user_id',
            'request_URL',
            'message',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

 app\widgets\MiniForm::end(); 

?>
