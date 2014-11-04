
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
    'haeder' => Yii::t('app',"Select Company"),
    //'width' => '800',
)); */
echo Yii::t('app',"Select Company");

?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'comp-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
        'template' => '{items}{pager}',
        'htmlOptions'=>array('class'=>'clean'),
	'columns'=>array(
		array('value'=>'$data->id'),
		//'string',
                array(
                    
                    
                    //'value'=>'$data->getName()',
                    'value'=>'CHtml::link(CHtml::encode($data->getName()),"#", array(  "onclick"=>\'chose("\'.$data->id.\'")\',))',
                    // echo CHtml::link(CHtml::encode($data->id),'#', array(  'onclick'=>'refNum("'.$data->id.'","'.$data->docnum.'","'.$data->docType->name.'")',));
                    'type'=>'raw',
                    
                    
                    ),
            
            
            
            
                //array('value'=>'$data->getLevel()->level_id'),
                array('value'=>'$data->level->level_id'),
            
            
            
                //array('value'=>'$data->level[0]->level_id'),
		//'desc',
		//'openformat',
		array(
                        //'text'=>'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{edit}{permissions}{delete}',
			'buttons'=>array(
                            'edit' => array(
                                'label'=>'',
                                //'url'=>'function(){chose("$data->id"); return false;}',
                                'url'=>'$data->id',
                                 //'click'=>'function(){chose("open"); return false;}',
                                 'options' => array(
                                    'class'=>'glyphicon glyphicon-edit' ,
                                    'onclick'=>'edit(this);return false;',
                                  ),//*/
                                
                                
                                'imageUrl' => false,

                            ),
                            'permissions' => array(
                                'label'=>'<i class="glyphicon glyphicon-user"></i>',
                                //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
                                'url'=>'Yii::app()->createUrl("company/permissions", array("id"=>$data->id))',
                                //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
                            ),
                            
                            'delete' => array(
                                'label'=>'<i class="glyphicon glyphicon-trash"></i>',
                                'deleteConfirmation'=>true,
                                'imageUrl'=>false,
                                'url'=>'Yii::app()->createUrl("company/delete", array("id"=>$data->id))',
                            ),
                           
                            
		    ),
		),
	),
)); 

 //$this->endWidget(); 


?>
                        
                        
                   <div class="form-actions">
                            <?php $this->widget('bootstrap.widgets.TbButton', array(
                                    //'buttonType'=>'submit',
                                    'url'=>array('create'),
                                    'type'=>'primary',
                                    'label'=>Yii::t('app','Create Company'),
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
            window.location = "<?php echo Yii::app()->createAbsoluteUrl('/settings/dashboard');?>";
            
          });
        
    }
    
    </script>