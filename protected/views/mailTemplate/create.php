<?php
$this->menu=array(
	//array('label'=>Yii::t("app",'List Mail Template'),'url'=>array('index')),
	array('label'=>Yii::t("app",'Manage Mail Template'),'url'=>array('admin')),
);


 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t("app","Create Mail Template"),
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget();

?>