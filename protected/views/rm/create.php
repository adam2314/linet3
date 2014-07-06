<?php
$this->menu=array(
	//array('label'=>'List Account Contact History','url'=>array('index')),
	array('label'=>Yii::t('app','Manage Account Contact History'),'url'=>array('admin')),
);


 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t("app","Create Account Contact History"),
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget();

?>