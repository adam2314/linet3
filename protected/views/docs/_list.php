
<?php 
// this is the date picker
$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					// 'model'=>$model,
				    'name' => 'Docs[issue_from]',
				    'language' => substr(Yii::app()->language,0,2),
					'value' => $model->issue_from,
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
				    'name' => 'Docs[issue_to]',
				    'language' => substr(Yii::app()->language,0,2),
					'value' => $model->issue_to,
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



<?php 


$filter='';
if($model->doctype!=null){
    $filter=CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type'=>$model->doctype)), 'num', 'name');
    
}else{
    $model->status=null;
}
//print_r(Yii::app()->locale);
$this->widget('bootstrap.widgets.TbGridView', array(//'zii.widgets.grid.CGridView'
	'id'=>'Docs',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'ajaxUpdate'=>true,
    'ajaxType'=>'POST',
    

    'afterAjaxUpdate'=>"function() {
						jQuery('#Docs_issue_from').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::app()->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::app()->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
						jQuery('#Docs_issue_to').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::app()->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::app()->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                }",
	'columns'=>array(
		//'num',
		//'prefix',
		//'doctype',
                array(
                    'name'=>'doctype',
                        'filter'=>Doctype::model()->getList(),
                        'value'=>'Yii::t("app",$data->docType->name)'
                ),
                 array(
                    'name'=>'status',
                     'filter'=>$filter,
                        //'filter'=>CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type'=>$data->doctype)), 'num', 'name'),
                        'value'=>'$data->docStatus->name'
                ),
            array(
                    'name'=>'refstatus',
                     //'filter'=>$filter,
                        'filter'=>CHtml::listData(Docs::model()->getRefStatuses(), 'id', 'name'),
                        'value'=>'$data->getRefStatus()'
                ),
            
            
		'docnum',
		'account_id',
		'company',
                //'issue_date',
                array(
                    'name'=>'issue_date',
                    'filter'=>$dateisOn,
                    'value'=>'$data->issue_date'
                ),
            'total',
		/*
		'address',
		'city',
		'zip',
		'vatnum',
		'refnum',
		
		'due_date',
		'sub_total',
		'novat_total',
		'vat',
		
		'src_tax',
		'',
		'printed',
		'comments',
		'owner',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions' => array('style'=>'width:80px'),
			'template'=>'{print}{edit}{delete}{display}',
			'buttons'=>array
		    (
		        'edit' => array
		        (
                            'label'=>'<i class="glyphicon glyphicon-edit"></i>',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		            'url'=>'Yii::app()->createUrl("docs/update", array("id"=>$data->id,"preview"=>0))',
		        	
		        ),
		        'delete' => array
		        (
		            'label'=>'<i class="glyphicon glyphicon-remove"></i>',
                            'deleteConfirmation'=>true,
		            'imageUrl'=>false,
                            'url'=>'Yii::app()->createUrl("docs/delete", array("id"=>$data->id))',
                            //'class'=>'',
		            //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
		        ),
                        'print' => array
		        (
		            'label'=>'<i class="glyphicon glyphicon-print"></i>',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
                            'url'=>'Yii::app()->createUrl("docs/print", array("id"=>$data->id))',
                            'options'=>array("target"=>"_blank"),
		            //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
		        ),    
		        'display' => array
		        (
		            'label'=>'<i class="glyphicon glyphicon-search"></i>',
		            'url'=>'Yii::app()->createUrl("docs/view", array("id"=>$data->id))',
		            //'visible'=>'$data->score > 0',
		            //'click'=>'function(){alert("Going down!");}',
		        ),
		    ),
		),
	),
)); 



?>
