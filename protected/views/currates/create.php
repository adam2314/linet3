<?php
/*$this->breadcrumbs=array(
	'Currates'=>array('index'),
	'Create',
);*/

$this->menu=array(
	//array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>Yii::t('app','Manage currency rates'), 'url'=>array('admin')),
);



$this->beginWidget('MiniForm',array(
    'haeder' => "Create Currency rate",
    //'width' => '800',
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 


 $this->endWidget(); 

?>