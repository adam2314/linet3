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
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Categories'),'url'=>array('index')),
	array('label'=>Yii::t('app','Manage Account Categories'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create Account Category"),

)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 


 $this->endWidget(); 
?>