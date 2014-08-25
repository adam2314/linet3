<?php
$this->menu=array(
	//array('label'=>'List Account Type','url'=>array('index')),
	array('label'=>Yii::t("app",'Manage Account Type'),'url'=>array('admin')),
);


 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t("app","Create Account Type"),
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget();

?>