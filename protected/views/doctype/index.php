<?php
$this->params["breadcrumbs"]=array(
	'Doctypes',
);

$this->params["menu"]=array(
	array('label'=>'Create Doctype', 'url'=>array('create')),
	array('label'=>'Manage Doctype', 'url'=>array('admin')),
);
?>

<h1>Doctypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
