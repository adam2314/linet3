<?php

$this->menu = array(
    array('label' => Yii::t('app', 'List Manages'), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create Manage'), 'url' => array('create')),
);

 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Manage Menus"),

)); 

$list=CHtml::listData(Menu::model()->findAll(), 'id', 'label');
$list[0]=Yii::t('app','None');
?>

<?php $this->widget('EExcelView',array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'label',
                'url',
		'icon',
		//'parent',
                array(
	            'name' => 'parent',
	            //'type' => 'raw',
	            'value' => 'CHtml::encode(isset($data->Parent)?$data->Parent->label: "")',
                    'filter' => $list,
	        ),
                
            
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 


?>
