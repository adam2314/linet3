<?php
/*$this->breadcrumbs=array(
	'Accounts',
);*/

$this->menu=array(
	array('label'=>'Create Account', 'url'=>array('create')),
//	array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => "Accounts",
    'width' => '800',
)); 
$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => array(
	        //'StaticTab 1' => 'Content for tab 1',
	        //'StaticTab 2' => array('content' => 'Content for tab 2', 'id' => 'tab2'),
	        // panel 3 contains the content rendered by a partial view
	        'Costumers' => array('ajax' => $this->createUrl('accounts/ajax&type=0')),
			'Suppliers' => array('ajax' => $this->createUrl('accounts/ajax&type=1')),
			'Outcomes' => array('ajax' => $this->createUrl('accounts/ajax&type=2')),
			'Incomes' => array('ajax' => $this->createUrl('accounts/ajax&type=3')),
			'Assets' => array('ajax' => $this->createUrl('accounts/ajax&type=4')),
			'Liabilities' => array('ajax' => $this->createUrl('accounts/ajax&type=5')),
			'Authorities' => array('ajax' => $this->createUrl('accounts/ajax&type=6')),
			'Banks' => array('ajax' => $this->createUrl('accounts/ajax&type=7')),
			'Warehouses' => array('ajax' => $this->createUrl('accounts/ajax&type=8')),
			'Leads' => array('ajax' => $this->createUrl('accounts/ajax&type=9')),
			'Contacts' => array('ajax' => $this->createUrl('accounts/ajax&type=10')),
	    ),
	    // additional javascript options for the tabs plugin
	    'options' => array(
	        'collapsible' => true,
	    ),
	));


 $this->endWidget(); 
  ?>
