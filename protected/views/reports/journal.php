<?php 
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>

<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Transactions"),
    'width' => '800',
)); 
 
 
 
 $form=$this->beginWidget('CActiveForm', array(
	'method'=>'post',
    'id'=>'page-form',
    'enableAjaxValidation'=>true,
)); 




echo Yii::t('app','From Date');

Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
$this->widget('CJuiDateTimePicker',array(
    'model'=>$model, //Model object
    'attribute'=>'from_date', //attribute name
    'mode'=>'datetime', 
    'language' => substr(Yii::app()->language,0,2),
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
    ) // jquery plugin options
));


?>

<br />
<?php

echo Yii::t('app','To Date');

$this->widget('CJuiDateTimePicker',array(
    'model'=>$model, //Model object
    'attribute'=>'to_date', //attribute name
    'mode'=>'datetime', //use "time","date" or "datetime" (default)
    'language' => substr(Yii::app()->language,0,2),
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
        
        
        
    ) // jquery plugin options
));
 echo CHtml::submitButton(Yii::t('app','Search')); 
 
 
$yiidbdatetime=Yii::app()->locale->getDateFormat('yiidbdatetime');
$phpdatetime=Yii::app()->locale->getDateFormat('phpdatetime');
 
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'transactions-grid',
	'dataProvider'=>$model->search(),
        //'enablePagination'=> false,
        'ajaxUpdate'=>true,
        'ajaxType'=>'POST',
	'filter'=>$model,
	'columns'=>array(
		'num',

		
                array(
                       'name'=>'type',
                       //'filter'=>CHtml::dropDownList('Transactions[type]', $model->type,CHtml::listData(TransactionType::model()->findAll(), 'id', 'name')),
                     'filter'=>CHtml::listData(TransactionType::model()->findAll(), 'id', 'name'),
                       'value'=>'$data->Type->name'
                   ),
                'account_id',
		'refnum1',
                'refnum2',
		'details',
                 array(
                    'name'=>'date',
                    'filter' => '',
                    'value'=>'date("'.$phpdatetime.'",CDateTimeParser::parse($data->date,"'.$yiidbdatetime.'"))'
                ),
            
		'sum',

	),
)); 
 $this->endWidget(); //form
 
  $this->endWidget(); //miniform
 ?>