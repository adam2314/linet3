<?php
$this->breadcrumbs=array(
	'Currates'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Currency Rate'), 'url'=>array('create')),
);
?>


<?php  $this->beginWidget('MiniForm',array('header' => Yii::t('app',"Manage Currencies Rates"),)); ?>

<?php 
// this is the date picker
$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					// 'model'=>$model,
				    'name' => 'Currates[from]',
				    'language' => substr(Yii::app()->language,0,2),
					'value' => $model->from,
				    // additional javascript options for the date picker plugin
				    'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
					'changeMonth' => 'true',
					'changeYear'=>'true',
					'constrainInput' => 'false',
				    ),
				    'htmlOptions'=>array(
                                        'placeholder'=>Yii::t('app','From Date'),
					//'style'=>'width:70px;',
				    ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
				),true) . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					// 'model'=>$model,
				    'name' => 'Currates[to]',
				    'language' => substr(Yii::app()->language,0,2),
					'value' => $model->to,
				    // additional javascript options for the date picker plugin
				    'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
					'changeMonth' => 'true',
					'changeYear'=>'true',
					'constrainInput' => 'false',
				    ),
				    'htmlOptions'=>array(
                                        'placeholder'=>Yii::t('app','To Date'),
					//'style'=>'width:70px',
				    ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
				),true);

?>



<?php 
$this->widget('EExcelView', array(
	'id'=>'currates-grid',
	'dataProvider'=>$model->search(),
        'template' => '{items}{pager}',
	'filter'=>$model,
        'ajaxUpdate'=>true,
        'ajaxType'=>'POST',
     'afterAjaxUpdate'=>"function() {
						jQuery('#Currates_from').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::app()->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::app()->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
						jQuery('#Currates_to').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::app()->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::app()->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                }",
    
    
	'columns'=>array(
		//'id',
		
                array(
                    'name' => 'currency_id',
                    'filter'=>CHtml::listData(Currecies::model()->findAll(), 'id', 'name'),
                     'value' => 'isset($data->Currency)?$data->Currency->name:0',   //where name is Client model attribute 
                   ),
		 array(
                    'name'=>'date',
                     'filter' => $dateisOn,
                    'value'=>'$data->date'
                ),
		'value',
		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{display}',
                        'edit' => array(
                                
                            'display' => array(
                                'label'=>'<i class="glyphicon glyphicon-transfer"></i>',
                                'url'=>'Yii::app()->createUrl("accounts/transaction", array("id"=>$data->id))',
                                //'visible'=>'$data->score > 0',
                                'click'=>'function(){alert("Going down!");}',
                            ),
		),*/
	),
)); 


 $this->endWidget(); 

?>
