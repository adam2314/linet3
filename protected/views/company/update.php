<?php

$this->params["menu"]=array(
	array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>'Create Acctype','url'=>array('create')),

);

 app\widgets\MiniForm::begin(array(
    'header' => "Update Company",
    //'width' => '800',
)); 

?>
<?php echo $this->render('_form',array('model'=>$model)); 


 app\widgets\MiniForm::end(); 
?>