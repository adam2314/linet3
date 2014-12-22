<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

$this->breadcrumbs=array(
	Yii::t('app','Account Categories')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	//array('label'=>'List Id6111','url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Category'),'url'=>array('create')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Manage Account Categories"),

)); 


?>

<?php $this->widget('EExcelView',array(
	'id'=>'bank-name-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
                'type_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 


 $this->endWidget(); 
?>
