<?php

$this->menu=array(
	array('label'=>Yii::t('app',"List Mail Template"),'url'=>array('index')),
	array('label'=>Yii::t('app',"Create Mail Template"),'url'=>array('create')),
	array('label'=>Yii::t('app',"View Mail Template"),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app',"Manage Mail Template"),'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update Mail Template") ." ". $model->name,
    //'width' => '800',
)); 

?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); 

 $this->endWidget(); 
?>