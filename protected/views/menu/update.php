<?php

$this->menu=array(
	//array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>Yii::t("app",'Create Menu'),'url'=>array('create')),
	array('label'=>Yii::t("app",'View Menu'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t("app",'Manage Menu'),'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'header' => Yii::t("app","Update Menu")." ". $model->id,
    //'width' => '800',
)); 

?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); 

 $this->endWidget(); 
?>