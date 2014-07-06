<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	//array('label'=>Yii::t('app','List documents'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create document'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('docs-grid', {
		data: $(this).serialize()
	});
	return false;
});




/*
//adam: need work!
jQuery('#docs-grid a.delete').live('click',function() {
        if(!confirm('Are you sure you want to delete this item?')) return false;
        var th=this;
        var afterDelete=function(){};
        $.fn.yiiGridView.update('docs-grid', {
                type:'POST',
                url:$(this).attr('href'),
                success:function(data) {
                        getAlert(data);
                        $.fn.yiiGridView.update('docs-grid');
                        afterDelete(th,true,data);
                        
                },
                error:function(XHR) {
                        return afterDelete(th,false,XHR);
                }
        });
        return false;
});
*/

function getAlert(response){
    $('#yw12').html($(response).filter('.alert'));
}


");
$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Manage Docs"),  )); 
?>

<?php
// $this->endWidget(); 

echo $this->renderPartial('_list', array('model' => $model));

 $this->endWidget();
?>
