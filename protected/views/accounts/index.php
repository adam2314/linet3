


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
)); 
$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => array(
	        //'StaticTab 1' => 'Content for tab 1',
	        //'StaticTab 2' => array('content' => 'Content for tab 2', 'id' => 'tab2'),
	        // panel 3 contains the content rendered by a partial view
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
                'class'=>'nav nav-tabs',
	        //'collapsible' => true,
	    ),
	));

/*
$this->widget('bootstrap.widgets.TbTabs', array(
        'id' => 'mytabs',
        'type' => 'tabs',
        'tabs' => array(
                array('id' =>  10, 'label' => 'Tab 1', 'content' => 'dd', 'active' => true),
                array('id' =>  9, 'label' => 'Tab 2', 'content' => 'loading ....'),
                array('id' =>  8, 'label' => 'Tab 3', 'content' => 'loading ....'),
        ),
        //'events'=>array('shown'=>'js:loadContent')
    )
);
*/

 $this->endWidget(); 
  ?>
 <script type="javascript">
    
 //$(function() {
    $("#yw1").tab();
    $("#yw1").bind("show", function(e) {    
        var contentID  = $(e.target).attr("data-target");
        var contentURL = $(e.target).attr("href");
        console.log("a:"+contentURL);
        if (typeof(contentURL) != 'undefined')
            $(contentID).load(contentURL, function(){ $("#yw1").tab(); });
        else
            $(contentID).tab('show');
        });
    $('#yw1 div[data-target="#tabone"]').tab("show");
    
    
    
    //
    
    $('#yw1').bind('change', function (e) {
        var now_tab = e.target // activated tab
        console.log("b:"+now_tab);
        // get the div's id
        var divid = $(now_tab).attr('href').substr(1);

        $.getJSON('xxx.php').success(function(data){
            $("#"+divid).text(data.msg);
        });
    });
    
//});
        </script>