<?php
$this->breadcrumbs=array(
	'Item Vat Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>'Manage Item Tax Catagories','url'=>array('admin')),
);

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Create Item Tax Catagory"),)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 



$this->endWidget(); 
?>