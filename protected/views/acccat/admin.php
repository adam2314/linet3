<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

$this->params["breadcrumbs"]=array(
	Yii::t('app','Account Categories')=>array('index'),
	Yii::t('app','Manage'),
);

$this->params["menu"]=array(
	//array('label'=>'List Id6111','url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Category'),'url'=>array('create')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Account Categories"),

)); 


?>

<?php echo app\widgets\GridView::widget(array(
	'id'=>'bank-name-grid',
	'dataProvider'=>$model->search([]),
	//'filter'=>$model,
        'filterModel' => $model,
	'columns'=>array(
		//'id',
		'name',
                [
                   'attribute' => 'type_id',
                        'filter' => \yii\helpers\ArrayHelper::map(\app\models\Acctype::find()->All(), 'id', 'name'),
                        'value' => function($data) {
                            return $data->TypeName();
                        }, 
                ],
                //'type_id',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 


 app\widgets\MiniForm::end(); 
?>
