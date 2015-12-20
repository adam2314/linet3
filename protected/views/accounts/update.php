<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$this->params["menu"]=array(
	//array('label'=>'List Accounts', 'url'=>array('index')),
	//array('label'=>'Create Accounts', 'url'=>array('create')),
	array('label'=>Yii::t('app','View Account'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Accounts'), 'url'=>['accounts/admin/'.$model->type]),
);
?>


<?php 
 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Update Account"). " ". $model->name,
    
)); 
echo $this->render('_form', array('model'=>$model)); 
 app\widgets\MiniForm::end(); 
?>
