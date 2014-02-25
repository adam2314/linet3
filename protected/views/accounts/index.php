<?php
$this->menu=array(
	array('label'=>Yii::t('app','Create Account'), 'url'=>array('create')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => "Accounts",
)); 
 
 $types=  Acctype::model()->findAll();
 $list=array();
 foreach ($types as $type1)
     $list[Yii::t('app',$type1->name)]=array('ajax' => $this->createUrl('accounts/ajax?type='.$type1->id));
 
 
$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => $list,
    
	    // additional javascript options for the tabs plugin
	    'options' => array(
                'selected'=>$type,
                'class'=>'nav nav-tabs',
	        //'collapsible' => true,
	    ),
	));
$this->endWidget(); 
  ?>