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
	'columns'=>array(
		//'num',
		//'prefix',
		//'doctype',
                array(
                    'name'=>'doctype',
                        'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                        'value'=>'$data->docType->name'
                ),
                 array(
                    'name'=>'status',
                     'filter'=>$filter,
                        //'filter'=>CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type'=>$data->doctype)), 'num', 'name'),
                        'value'=>'$data->docStatus->name'
                ),
		'docnum',
		'account_id',
		'company',
                //'issue_date',
                array(
                    'name'=>'issue_date',
                     'filter' => '',/*$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model'=>$model, 
                                'attribute'=>'issue_date', 
                                //'language' => 'he',
                                //'i18nScriptFile' => 'jquery.ui.datepicker-he.js', // (#2)
                                //'htmlOptions' => array(
                                 //   'id' => 'datepicker_for_issue_date',
                                  //  'size' => '10',
                                //),
                                'defaultOptions' => array(  // (#3)
                                    //'showOn' => 'focus', 
                                    'dateFormat' =>  Yii::app()->locale->getDateFormat('short'),
                                    //'showOtherMonths' => true,
                                    //'selectOtherMonths' => true,
                                    //'changeMonth' => true,
                                    //'changeYear' => true,
                                    //'showButtonPanel' => true,
                                )
                            ), 
                            true), // (#4)*/
                        //),
                        //'filter'=>CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type'=>$data->doctype)), 'num', 'name'),
                       //'value'=>'date("M j, Y", $data->issue_date)'
                    
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
			'class'=>'CButtonColumn',
                        'htmlOptions' => array('style'=>'width:80px'),
			'template'=>'{print}{edit}{remove}{display}',
			'buttons'=>array
		    (
		        'edit' => array
		        (
                            'label'=>'<i class="icon-edit"></i>',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		            'url'=>'Yii::app()->createUrl("docs/update", array("id"=>$data->id,"preview"=>0))',
		        	
		        ),
		        'remove' => array
		        (
		            'label'=>'<i class="icon-remove"></i>',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
                            'url'=>'Yii::app()->createUrl("docs/delete", array("id"=>$data->id))',
		            //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
		        ),
                        'print' => array
		        (
		            'label'=>'<i class="icon-print"></i>',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
                            'url'=>'Yii::app()->createUrl("docs/print", array("id"=>$data->id))',
                            'options'=>array("target"=>"_blank"),
		            //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
		        ),    
		        'display' => array
		        (
		            'label'=>'<i class="icon-search"></i>',
		            'url'=>'Yii::app()->createUrl("docs/view", array("id"=>$data->id))',
		            //'visible'=>'$data->score > 0',
		            //'click'=>'function(){alert("Going down!");}',
		        ),
		    ),
		),
	),
)); 



?>
