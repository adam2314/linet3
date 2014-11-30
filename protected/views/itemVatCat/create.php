<?php
$this->breadcrumbs=array(
	Yii::t("app",'Item Vat Categories')=>array('index'),
	Yii::t("app",'Create'),
);

$this->menu=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>Yii::t("app",'Manage Item Tax Categories'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array('header' => Yii::t("app","Create Item Tax Category"),)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 



$this->endWidget(); 
?>