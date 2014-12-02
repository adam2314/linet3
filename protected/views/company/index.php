
<div class="container">
    <div class="text-center">
        <div class="form">
            <div class="tab-content">
                    <div id="chose" class="tab-pane active">

<?php

//$this->menu=array(
	//array('label'=>'List Acctype','url'=>array('index')),
	//array('label'=>Yii::t('app','Create Company'),'url'=>array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('acctype-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
/*
 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Select Company"),
    //'width' => '800',
)); */
echo Yii::t('app',"Select Company");

?>

<?php $this->widget('EExcelView',array(
	'id'=>'comp-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
        'template' => '{items}{pager}',
        'htmlOptions'=>array('class'=>'clean'),
	'columns'=>array(
		array('value'=>'$data->id'),
                array(

                    'value'=>'CHtml::link(CHtml::encode($data->getName()),"#", array(  "onclick"=>\'chose("\'.$data->id.\'")\',))',
                    'type'=>'raw',
                    
                    ),

	),
)); 

 //$this->endWidget(); 


?>
                        
                    
                        <div class="form-actions">
                            <?php $this->widget('bootstrap.widgets.TbButton', array(
                                    //'buttonType'=>'submit',
                                    'url'=>array('/company/admin'),
                                    'type'=>'primary',
                                    'label'=>Yii::t('app','Admin'),
                                'htmlOptions'=>array(
                                    'class'=>"btn btn-lg btn-primary btn-block"
                                    ),
                            )); ?>
                    </div>      
                        
                        
                </div><!-- tab-pane -->
            </div><!-- tab-content -->
        </div><!-- form -->
    </div><!-- text-center -->
</div><!-- container -->



<script type="text/javascript">
    function edit(obj){
        var id = obj.getAttribute("href");
        $.post( "<?php echo Yii::app()->createAbsoluteUrl('/company/index');?>",{ Company: id }, function( data ) {
            //alert( "Data Loaded: " + data );
            window.location = "<?php echo Yii::app()->createAbsoluteUrl('/settings/admin');?>";
            
          });
        
    }
    
    function chose(id){//shuld be dashboard
        //var id = obj.getAttribute("href")
        $.post( "<?php echo Yii::app()->createAbsoluteUrl('/company/index');?>",{ Company: id }, function( data ) {
            //alert( "Data Loaded: " + data );
            //console.log(data);
            
            window.location = "<?php echo Yii::app()->createAbsoluteUrl('/settings/dashboard');?>";
            
          });
        
    }
    
    </script>