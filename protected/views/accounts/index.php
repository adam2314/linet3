<?php
$this->menu=array(
	array('label'=>'Create Account', 'url'=>array('create')),
//	array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => "Accounts",
)); 
$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => array(
                'Costumers' => array('ajax' => $this->createUrl('accounts/ajax?type=0')),
                'Suppliers' => array('ajax' => $this->createUrl('accounts/ajax?type=1')),
                'Outcomes' => array('ajax' => $this->createUrl('accounts/ajax?type=2')),
                'Incomes' => array('ajax' => $this->createUrl('accounts/ajax?type=3')),
                'Assets' => array('ajax' => $this->createUrl('accounts/ajax?type=4')),
                'Liabilities' => array('ajax' => $this->createUrl('accounts/ajax?type=5')),
                'Authorities' => array('ajax' => $this->createUrl('accounts/ajax?type=6')),
                'Banks' => array('ajax' => $this->createUrl('accounts/ajax?type=7')),
                'Warehouses' => array('ajax' => $this->createUrl('accounts/ajax?type=8')),
                'Leads' => array('ajax' => $this->createUrl('accounts/ajax?type=9')),
                'Contacts' => array('ajax' => $this->createUrl('accounts/ajax?type=10')),
	    ),
	    // additional javascript options for the tabs plugin
	    'options' => array(
                'selected'=>$type,
                'class'=>'nav nav-tabs',
	        //'collapsible' => true,
	    ),
	));
$this->endWidget(); 
  ?>