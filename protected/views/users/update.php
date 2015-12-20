<?php
$this->params["breadcrumbs"]=array(
	Yii::t("app",'Users')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->params["menu"]=array(
	//array('label'=>Yii::t("app",'List User'),'url'=>array('index')),
	array('label'=>Yii::t("app",'Create User'),'url'=>array('create')),
	array('label'=>Yii::t("app",'View User'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t("app",'Manage Users'),'url'=>array('admin')),
);
app\widgets\MiniForm::begin(array('header' => Yii::t("app","Update User")." ". $model->username,)); 
?>


<?php echo $this->render('_form',array('model'=>$model)); 



app\widgets\MiniForm::end(); 
?>