<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$this->menu=array(
	array('label'=>Yii::t('app','Manage Documents'), 'url'=>array('admin')),
	//array('label'=>'Manage Docs', 'url'=>array('admin')),
);
?>



<?php 
$this->beginWidget('MiniForm',array('header' => Yii::t("app","Create") ." " .Yii::t('app',$model->docType->name),)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
$this->endWidget(); 
?>