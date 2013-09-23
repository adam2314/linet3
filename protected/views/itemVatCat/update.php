<?php
$this->breadcrumbs=array(
	'Item Vat Cats'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>'Create Item Tax Catagory','url'=>array('create')),
	array('label'=>'View Item Tax Catagory','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Item Tax Catagories','url'=>array('admin')),
);

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Update Item Tax Catagory #").$model->id,)); 
?>


<?php echo $this->renderPartial('_form',array('model'=>$model)); 

$this->endWidget(); 
?>