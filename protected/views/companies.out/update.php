<?php
//$this->breadcrumbs=array(
//	'Companies'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);

$this->menu=array(
	//array('label'=>'List Companies', 'url'=>array('index')),
	//array('label'=>'Create Companies', 'url'=>array('create')),
	array('label'=>'View Companies', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Companies', 'url'=>array('admin')),
);

?>


	<?php

 $this->beginWidget('MiniForm',array(
    'header' => "Update Companies $model->id",
    'width' => '800',
)); 
?>
<?php echo $this->renderPartial('_form', array('model'=>$model));  ?>

	<?php
 $this->endWidget(); 
?>