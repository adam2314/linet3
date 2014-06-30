<?php
$this->breadcrumbs=array(
	Yii::t("app","Documenet Type")=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t("app",'Update'),
);

$this->menu=array(
	array('label'=>Yii::t("app",'List Doctype'), 'url'=>array('index')),
	array('label'=>Yii::t("app",'Create Doctype'), 'url'=>array('create')),
	array('label'=>Yii::t("app",'View Doctype'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("app","Manage Documenet Type"), 'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Manage Documenet Type")." ".$model->id,)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget(); 
?>