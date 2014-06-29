<?php
$this->menu=array(
	array('label'=>Yii::t('app','List Account Template'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Template'),'url'=>array('create')),
	array('label'=>Yii::t('app','View Account Template'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Template'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update Account Template")." ".$model->name,
)); 

?>



<?php echo $this->renderPartial('_form',array('model'=>$model,'items'=>$items)); 
 $this->endWidget(); 

?>