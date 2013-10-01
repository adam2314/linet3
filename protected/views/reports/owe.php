<?php 

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Customers owing money"),
)); 


$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'accounts-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
	            'name' => 'name',
	            'type' => 'raw',
	            'value' => 'CHtml::link(CHtml::encode($data->name), "index.php?r=accounts/update&id=".CHtml::encode($data->id))',
	        ),
		//'type',
		
 array(
                    'name'=>'sum',
                    'filter' => '',
                     
                     
                    'value'=>'$data->getBalance()'
                ),
		
	),
)); 

 $this->endWidget(); 


?>
