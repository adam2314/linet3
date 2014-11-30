<?php

$this->menu=array(
	array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>'Create Acctype','url'=>array('create')),

);

 $this->beginWidget('MiniForm',array(
    'header' => "Update Company",
    //'width' => '800',
)); 

?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); 


 $this->endWidget(); 
?>