<?php

$this->menu=array(
	array('label'=>Yii::t('app','List Account Contact History'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Contact History'),'url'=>array('create')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Manage Account Contact History"),

)); 


?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'acchist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'account_id',
                    'value'=>'$data->Account->name',
                ),
		'dt',
		array(
                    'name'=>'details',
                    'value'=>'$data->details',
                     'type'=>'raw',
                         
                ),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 


?>
