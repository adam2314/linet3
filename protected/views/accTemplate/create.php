<?php
$this->breadcrumbs=array(
	'Acc Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List AccTemplate','url'=>array('index')),
	array('label'=>Yii::t('app','Manage Account Template'),'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Create Account Template"),
)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget(); 
?>