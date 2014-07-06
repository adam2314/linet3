<?php

$this->menu=array(
	//array('label'=>Yii::t('app','List Account Contact History'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Contact History'),'url'=>array('create')),
	//array('label'=>Yii::t('app','View Account Contact History'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Contact History'),'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update Account Contact History") ." ". $model->id,
    //'width' => '800',
)); 

?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); 

 $this->endWidget(); 
?>