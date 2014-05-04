
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
                    
                    
                    'value'=>'$data->Company->getName()',
                    //'value'=>'CHtml::link(CHtml::encode($data->getName()),"#", array(  "onclick"=>\'chose("\'.$data->id.\'")\',))',
                    // echo CHtml::link(CHtml::encode($data->id),'#', array(  'onclick'=>'refNum("'.$data->id.'","'.$data->docnum.'","'.$data->docType->name.'")',));
                    'type'=>'raw',
                    
                    
                    ),
            
            array(
                    'name'=>'User',
                    'filter' => '',
                    'value'=>'$data->User->username'
                ),
            
            
                //array('value'=>'$data->getLevel()->level_id'),
                //array('value'=>'$data->level->level_id'),
            
            
            
                //array('value'=>'$data->level[0]->level_id'),
		//'desc',
		//'openformat',
		array(
                        //'text'=>'Action',
			'class'=>'CButtonColumn',
			'template'=>'{remove}',
			'buttons'=>array(
                            
                            'remove' => array(
                                'label'=>'<i class="glyphicon glyphicon-remove"></i>',
                                 'deleteConfirmation'=>true,
                                'imageUrl'=>false,
                                'url'=>'Yii::app()->createUrl("company/deletePermission", array("id"=>$data->id))',
                            ),
                            
		    ),
		),
	),
)); 

 //$this->endWidget(); 


?>
                        
                        
                  
                        
                        
                        
                </div><!-- tab-pane -->
            </div><!-- tab-content -->
        </div><!-- form -->
    </div><!-- text-center -->
</div><!-- container -->



<script type="text/javascript">
    function edit(obj){
        var id = obj.getAttribute("href")
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




<?php

//$this->menu=array(
	//array('label'=>Yii::t('app','List Acctype'),'url'=>array('index')),
	//array('label'=>Yii::t('app','Create Acctype'),'url'=>array('create')),

//);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Add User"),
    //'width' => '800',
)); 

?>
<?php echo $this->renderPartial('_addUser',array('user'=>$user)); 


 $this->endWidget(); 
?>