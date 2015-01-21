<?php

$this->menu=array(
	//array('label'=>Yii::t('app','List Mail Templates'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Mail'),'url'=>array('create')),
);



 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Manage Mail Templates"),

)); 


?>

<?php $this->widget('EExcelView',array(
	'id'=>'acctype-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'to',
		'body',
            'files',
		'create',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 


?>
