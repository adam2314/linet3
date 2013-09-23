<?php
$this->breadcrumbs=array(
	'Acctypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>'Manage Acctype','url'=>array('admin')),
);


 $this->beginWidget('MiniForm',array(
    'haeder' => "Create Acctype",
    //'width' => '800',
)); 
?>

<h1>Create Acctype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget();

?>