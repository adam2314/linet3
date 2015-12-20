<?php
$this->params["menu"]=array(
	//array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>Yii::t("app",'Create Log'),'url'=>array('create')),
	array('label'=>Yii::t("app",'Update Log'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t("app",'Manage Log'),'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t("app","View Log")." ". $model->id,
)); 



 app\widgets\MiniForm::end(); 
?>