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
	//array('label'=>'List Accounts', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account'), 'url'=>array('create')),
);





 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Accounts"),
)); 
 
  $types=  Acctype::model()->findAll();
 $list=array();
 foreach ($types as $type1)
     $list[Yii::t('app',$type1->name)]=array('ajax' => $this->createUrl('accounts/ajax?type='.$type1->id));
 
$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => $list,
            'headerTemplate' => '<li><a href="{url}" title="{title}">{title}</a></li>',
	    // additional javascript options for the tabs plugin
	    'options' => array(
                'selected'=>$type,
                'class'=>'nav nav-tabs',
	        //'collapsible' => true,
	    ),
	));

$this->endWidget(); 

?>
