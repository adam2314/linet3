<?php
$this->breadcrumbs=array(
	'Doccheques'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Doccheques', 'url'=>array('index')),
	array('label'=>'Create Doccheques', 'url'=>array('create')),
	array('label'=>'Update Doccheques', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Doccheques', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Doccheques', 'url'=>array('admin')),
);
?>

<h1>View Doccheques #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'doc_id',
		'type',
		'creditcompany',
		'cheque_num',
		'bank',
		'branch',
		'cheque_acct',
		'cheque_date',
		'sum',
		'bank_refnum',
		'dep_date',
		'line',
	),
)); ?>
