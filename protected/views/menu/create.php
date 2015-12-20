<?php
$this->params["menu"]=array(
	//array('label'=>'List Account Type','url'=>array('index')),
	array('label'=>Yii::t("app",'Manage Account Type'),'url'=>array('admin')),
);


 app\widgets\MiniForm::begin(array(
    'header' => Yii::t("app","Create Account Type"),
)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); 

 app\widgets\MiniForm::end();

?>