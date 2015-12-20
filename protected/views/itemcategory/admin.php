<?php
use app\widgets\app\widgets\MiniForm;
use app\widgets\GridView;

$this->params["breadcrumbs"]=array(
	['label'=>Yii::t('app','Item Categories'),array('index')],
	['label'=>Yii::t('app','Manage')],
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List Item Category'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Item Category'), 'url'=>array('create')),
);


app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Item Categories"),
)); 


?>


<?php echo app\widgets\GridView::widget( array(
	'id'=>'itemcategory-grid',
	'dataProvider'=>$model->dp(),
	////'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'profit',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

 app\widgets\MiniForm::end(); 

?>
