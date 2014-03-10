<?php
$this->menu=array(
	array('label'=>Yii::t('app','Create Account'), 'url'=>array('create')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Accounts"),
)); 
 
 
 Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('accounts-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
 
 
 $types=  Acctype::model()->findAll();
 $list=array();
 foreach ($types as $type1)
     $list[Yii::t('app',$type1->desc)]=array('ajax' => $this->createUrl('accounts/index?ajax=accounts-grid&type='.$type1->id));
 
 
$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => $list,
    
	    // additional javascript options for the tabs plugin
	    'options' => array(
                'selected'=>$type,
                //'class'=>'nav nav-tabs',
	        //'collapsible' => true,
	    ),
	));
$this->endWidget(); 
  ?>

<script type="text/javascript">
$('.sort-link').live( "click",
        function(e){
            //console.log($(this).parent().parent().parent().parent().parent().attr("id"));
            var str = $(this).parent().parent().parent().parent().parent().attr("id");
		$.post( $(this).attr("href"), function( data ) {
                        //console.log(str);
  		
        $("#"+str).parent().html( data );
		});
                
            return false;
        }
            );

</script>