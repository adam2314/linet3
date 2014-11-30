<?php

$this->menu=array(
	//array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Item'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Item'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Item'), 'url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Update Item"). " ".$model->id,
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'units'=>$units,'cat'=>$cat)); 

 $this->endWidget();

?>