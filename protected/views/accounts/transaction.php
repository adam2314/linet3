<?php 
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>

<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Transactions for Account"). " ". $model->id,

)); 
 
 $yiidbdatetime=Yii::app()->locale->getDateFormat('yiidbdatetime');
$phpdatetime=Yii::app()->locale->getDateFormat('phpdatetime');
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'transactions-grid',
	'dataProvider'=>$model->search(),
        //'enablePagination'=> false,
	//'filter'=>$model,
	'columns'=>array(
		'num',
		//'prefix',
		//'company',
		array(
	            'name' => 'Oppt Acc',
	            //'type' => 'raw',

                    'value'=>'CHtml::link(CHtml::encode($data->getOptAccName()),Yii::app()->createAbsoluteUrl("/accounts/transaction/id/".$data->getOptAccId()))',
                    'type'=>'raw',
  
	            //'value' => '$data->getOptAcc()',
	        ),
		array(
                       'name'=>'type',
                       //'filter'=>CHtml::dropDownList('Transactions[type]', $model->type,CHtml::listData(TransactionType::model()->findAll(), 'id', 'name')),
                       'value'=>'Yii::t("app",$data->Type->name)'
                   ),
                array(
                       'name'=>'refnum1',
                       'value'=>'CHtml::link(CHtml::encode($data->refnum1),Yii::app()->createAbsoluteUrl("/docs/view/$data->refnum1"))',
                       'type'=>'raw',
                   ),
		array(
                       'name'=>'refnum2',
                       'value'=>'CHtml::link(CHtml::encode($data->refnum2),Yii::app()->createAbsoluteUrl("/docs/view/$data->refnum2"))',
                       'type'=>'raw',
                   ),
                
                'details',
		array(
                    'name'=>'date',
                    //'filter' => '',
                    'value'=>'date("'.$phpdatetime.'",CDateTimeParser::parse($data->date,"'.$yiidbdatetime.'"))'
                ),
		'sum',
		
	),
)); 
 $this->endWidget(); 
 ?>