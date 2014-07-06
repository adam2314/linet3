<?php
$this->breadcrumbs=array(
	Yii::t("app",'Users')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>Yii::t("app",'List User'),'url'=>array('index')),
	array('label'=>Yii::t("app",'Create User'),'url'=>array('create')),
	array('label'=>Yii::t("app",'View User'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t("app",'Manage Users'),'url'=>array('admin')),
);
$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Update User")." ". $model->username,)); 
?>


<?php echo $this->renderPartial('_form',array('model'=>$model)); 



$this->endWidget(); 
?>