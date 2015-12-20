<?php
$this->params["breadcrumbs"]=array(
	//'Itemunits'=>array('index'),
	//'Manage',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List')." " .Yii::t('app',"Item Units"), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create')." " .Yii::t('app',"Item Units"), 'url'=>array('create')),
);


 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app','Admin')." " .Yii::t('app',"Item Units"),
    //'width' => '800',
)); 

?>


<?php echo app\widgets\GridView::widget( array(
	'id'=>'itemunit-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		'precision',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

 app\widgets\MiniForm::end(); 


?>
