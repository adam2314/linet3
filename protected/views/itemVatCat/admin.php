<?php
$this->breadcrumbs=array(
	Yii::t('app','Item Vat Category')=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Item VAT Category'),'url'=>array('create')),
);

$this->beginWidget('MiniForm',array('header' => Yii::t("app","Manage Item Tax Categories"),)); 
?>



<?php $this->widget('EExcelView',array(
	'id'=>'item-vat-cat-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

$this->endWidget(); 
?>
