<?php

$this->params["menu"]=array(
	//array('label'=>Yii::t('app','List Account Contact History'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Contact History'),'url'=>array('create')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Account Contact History"),

)); 


?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'acchist-grid',
	'dataProvider'=>$model->search([]),
        'filterModel' => $model,
	'columns'=>array(
                'subject',
                [
                    'attribute'=>'type',
                    'filter' => \yii\helpers\ArrayHelper::map(\app\models\AccHist::getTypes(), 'id', 'name'),
                    "value"=>function($data) {
                            return $data->getTypeName();
                            
                    },
                ],
		array(
                    'attribute'=>'account_id',
                    'value' => function($data) {
                            return app\models\Accounts::findName($data->account_id);
                        }, 
                ),
		
                array(
                    'attribute'=>'dt',
                    'value'=>function($data) {
                            return $data->readDateFormat($data->dt);
                            
                    }
                    //'type'=>'raw',
                         
                ),                
                                
		//array(
                    //'attribute'=>'details',
                    //'value'=>'$data->details',
                    //'type'=>'raw',
                         
                //),
		
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

 app\widgets\MiniForm::end(); 


?>
