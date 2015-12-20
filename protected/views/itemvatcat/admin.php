<?php
$this->params["breadcrumbs"]=array(
	Yii::t('app','Item Vat Category')=>array('index'),
	'Manage',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','Create Item VAT Category'),'url'=>array('create')),
);

app\widgets\MiniForm::begin(array('header' => Yii::t("app","Manage Item Tax Categories"),)); 
?>



<?php echo app\widgets\GridView::widget(array(
	'id'=>'item-vat-cat-grid',
	'dataProvider'=>$model->dp(),
	////'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); 

app\widgets\MiniForm::end(); 
?>
