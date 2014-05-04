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
                    'filter' => '',
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
