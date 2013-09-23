<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => "Create Items",
    //'width' => '800',
)); 

?>

<h1>Create Item</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'units'=>$units,'cat'=>$cat)); 





 $this->endWidget();
?>