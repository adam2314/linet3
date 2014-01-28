<?php

$this->menu=array(
	array('label'=>'List Company','url'=>array('index')),
);


 $this->beginWidget('MiniForm',array(
    'haeder' => "Create Company",
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget();

?>