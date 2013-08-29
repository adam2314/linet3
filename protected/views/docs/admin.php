<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	array('label'=>'List Docs', 'url'=>array('index')),
	array('label'=>'Create Docs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('docs-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('MiniForm',array(
    'haeder' => "Manage Docs",  )); 
?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(//'zii.widgets.grid.CGridView'
	'id'=>'docs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'num',
		//'prefix',
		//'doctype',
                array(
                    'name'=>'doctype',
                        'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                        'value'=>'$data->docType->name'
                ),
		'docnum',
		'account_id',
		'company',
                'issue_date',
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
		'status',
		'printed',
		'comments',
		'owner',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{edit}{remove}{display}',
			'buttons'=>array
		    (
		        'edit' => array
		        (
                            'label'=>'<i class="icon-edit"></i>',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		            'url'=>'Yii::app()->createUrl("docs/update", array("id"=>$data->id))',
		        	
		        ),
		        'remove' => array
		        (
		            'label'=>'<i class="icon-remove"></i>',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
                            'url'=>'Yii::app()->createUrl("docs/delete", array("id"=>$data->id))',
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


 $this->endWidget();
?>
