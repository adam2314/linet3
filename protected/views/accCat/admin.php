<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Catagories')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	//array('label'=>'List Id6111','url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Catagory'),'url'=>array('create')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Manage Account Catagories"),

)); 


?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-name-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
                'type_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 


 $this->endWidget(); 
?>
