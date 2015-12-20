<?php

$this->params["menu"]=array(
	//array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>Yii::t("app",'Create Account type'),'url'=>array('create')),
	array('label'=>Yii::t("app",'View Account type'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t("app",'Manage Account types'),'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t("app","Update Account Type")." ". $model->id,
    //'width' => '800',
)); 

?>
<?php echo $this->render('_form',array('model'=>$model)); 

 app\widgets\MiniForm::end(); 
?>