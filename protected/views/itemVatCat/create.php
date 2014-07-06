<?php
$this->breadcrumbs=array(
	Yii::t("app",'Item Vat Catagories')=>array('index'),
	Yii::t("app",'Create'),
);

$this->menu=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>Yii::t("app",'Manage Item Tax Catagories'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","app","Create Item Tax Catagory"),)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 



$this->endWidget(); 
?>