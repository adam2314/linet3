<?php
$this->menu=array(
	//array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>Yii::t("app",'Create Log'),'url'=>array('create')),
	array('label'=>Yii::t("app",'Update Log'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t("app",'Manage Log'),'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'header' => Yii::t("app","View Log")." ". $model->id,
)); 



 $this->endWidget(); 
?>