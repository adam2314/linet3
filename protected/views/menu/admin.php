<?php

$this->params["menu"]= array(
    array('label' => Yii::t('app', 'List Manages'), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create Manage'), 'url' => array('create')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Menus"),

)); 

$list=\yii\helpers\ArrayHelper::map(app\models\Menu::find()->All(), 'id', 'label');
$list[0]=Yii::t('app','None');
?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'label',
                'url',
		'icon',
		//'parent',
                array(
	            'attribute' => 'parent',
	            //'type' => 'raw',
                    'value' => function($data){return \yii\helpers\Html::encode(isset($data->Parent)?$data->Parent->label: "");},
                    'filter' => $list,
	        ),
                
            
		[
			'class'=>'yii\grid\ActionColumn',
		],
	),
)); 

 app\widgets\MiniForm::end(); 


?>
