<?php
$this->params["breadcrumbs"]=array(
	Yii::t("app","Document Type")=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t("app",'Update'),
);

$this->params["menu"]=array(
	//array('label'=>Yii::t("app",'List Documenet Type'), 'url'=>array('index')),
	array('label'=>Yii::t("app",'Create Document Type'), 'url'=>array('create')),
	//array('label'=>Yii::t("app",'View Documenet Type'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t("app","Manage Document Type"), 'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array('header' => Yii::t("app","Manage Document Type")." ".$model->id,)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); 

 app\widgets\MiniForm::end(); 
?>