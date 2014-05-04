<?php
//$this->breadcrumbs=array(
//	'Companies'=>array('index'),
//	$model->id,
//);

$this->menu=array(
	//array('label'=>'List Companies', 'url'=>array('index')),
	//array('label'=>'Create Companies', 'url'=>array('create')),
	array('label'=>'Update Companies', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Companies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Companies', 'url'=>array('admin')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => "View Company",
    'width' => '800',
)); 

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'companyname',
		'hasStock',
		'user_id',
		'regnum',
		'address',
		'city',
		'zip',
		'phone',
		'cellular',
		'web',
		'tax',
		'taxrep',
		'vat',
		'vatrep',
		//'template',
		'logo',
		//'header',
		//'footer',
		//'doc_template',
		//'receipt_template',
		//'invoice_receipt_template',
		'currency_id',
		'bidi',
		'credit',
		'credituser',
		'creditpwd',
		'creditallow',
	),
)); 
 $this->endWidget(); 
?>
