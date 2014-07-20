 <?php
$this->menu = array(
        //array('label'=>'List Doctype', 'url'=>array('index')),
        //array('label'=>'Create Doctype', 'url'=>array('create')),
);


$this->beginWidget('MiniForm', array(
    'haeder' => Yii::t('app', "Bankbooks"),
));
?> 

<?php 
// this is the date picker
$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					// 'model'=>$model,
				    'name' => 'ExtCorrelation[date_from]',
				    'language' => substr(Yii::app()->language,0,2),
					'value' => $model->date_from,
				    // additional javascript options for the date picker plugin
				    'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
					'changeMonth' => 'true',
					'changeYear'=>'true',
					'constrainInput' => 'false',
				    ),
				    'htmlOptions'=>array(
					//'style'=>'height:20px;width:70px;',
                                        'placeholder'=>Yii::t('app','From Date'),
				    ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
				),true)  . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					// 'model'=>$model,
				    'name' => 'ExtCorrelation[date_to]',
				    'language' => substr(Yii::app()->language,0,2),
					'value' => $model->date_to,
				    // additional javascript options for the date picker plugin
				    'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
					'changeMonth' => 'true',
					'changeYear'=>'true',
					'constrainInput' => 'false',
				    ),
				    'htmlOptions'=>array(
					//'style'=>'height:20px;width:70px',
                                        'placeholder'=>Yii::t('app','To Date'),
				    ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
				),true);

?>

 <?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'transaction-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
     
      'afterAjaxUpdate'=>"function() {
						jQuery('#ExtCorrelation_date_from').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::app()->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::app()->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
						jQuery('#ExtCorrelation_date_to').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::app()->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::app()->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                }",
     
     
	'columns'=>array(
                
            
		'id',
		//'account_id',
		//'details',
                //'refnum',
		
                //'currency_id',
                array(
                    'name'=>'account_id',
                    'filter'=>CHtml::listData(Accounts::model()->findAllByAttributes(array('type' => 7)), 'id', 'name'),
                    'value'=>'$data->Account->name'
                ),
                array(
                    //'name'=>'account_id',
                    //'value'=>'$this->randerPartial("_bank", array("array"=>$data->getBank()))',//num,date,sum
                    'value'=>array($this,'inDataColumn'), 
                    
                    'type'=>'raw',
                ),
                array(
                    //'name'=>'account_id',
                    //'value'=>'$this->randerPartial("_trans", array("array"=>$data->getTrans()))',//num,type,date,sum
                    'value'=>array($this,'outDataColumn'), 
                    'type'=>'raw',
                ),
            
                 array(
                    'name'=>'date',
                    'filter'=>$dateisOn,
                    'value'=>'$data->date'
                ),
                array(
                    'name'=>'owner',
                        'filter'=>CHtml::listData(User::model()->findAll(), 'id', 'name'),
                        'value'=>'Yii::t("app",$data->Owner->username)'
                ),
		//'total',
		
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions' => array('style'=>'width:80px'),
			'template'=>'{delete}',
			'buttons'=>array
		    (
		        
		        'delete' => array
		        (
		            'label'=>'<i class="glyphicon glyphicon-remove"></i>',
                            'deleteConfirmation'=>true,
		            'imageUrl'=>false,
                            'url'=>'Yii::app()->createUrl("match/matchdelete", array("id"=>$data->id))',
		        ),
                        
		    ),
		),
	),
)); 
?>


<?php
$this->endWidget();
?>