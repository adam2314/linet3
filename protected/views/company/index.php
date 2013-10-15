<?php

$this->menu=array(
	//array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>Yii::t('app','Create Company'),'url'=>array('create')),
);

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

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Select Company"),
    //'width' => '800',
)); 


?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'acctype-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
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
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 


?>
<script type="text/javascript">
    function chose(id){
        $.post( "<?php echo Yii::app()->createAbsoluteUrl('/company/index');?>",{ Company: id }, function( data ) {
            alert( "Data Loaded: " + data );
          });
        
    }
    </script>