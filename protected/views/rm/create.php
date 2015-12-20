<?php
$this->params["menu"]=array(
	//array('label'=>'List Account Contact History','url'=>array('index')),
	array('label'=>Yii::t('app','Manage Account Contact History'),'url'=>array('admin')),
);


 app\widgets\MiniForm::begin(array(
    'header' => Yii::t("app","Create Account Contact History"),
)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); 

 app\widgets\MiniForm::end();

?>