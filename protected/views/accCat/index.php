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
	Yii::t('app','Account Categories'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Account Category'),'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Account Categories'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Account Categories"),

)); 
?>


<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

 $this->endWidget(); 
?>
