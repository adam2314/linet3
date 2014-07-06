<?php
$this->breadcrumbs=array(
	Yii::t("app",'Item Vat Catagories')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t("app",'Update'),
);

$this->menu=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>Yii::t("app",'Create Item Tax Catagory'),'url'=>array('create')),
	//array('label'=>Yii::t("app",'View Item Tax Catagory'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t("app",'Manage Item Tax Catagories'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Update Item Tax Catagory #"). "".$model->id,)); 
?>


<?php echo $this->renderPartial('_form',array('model'=>$model)); 

$this->endWidget(); 
?>