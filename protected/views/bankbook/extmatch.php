<?php

$this->menu=array(
	//array('label'=>'List Doctype', 'url'=>array('index')),
	//array('label'=>'Create Doctype', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('doctype-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Bankbooks"),
)); 
?>

 <?php 
 
 $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'extmatch-form',
	'enableAjaxValidation'=>true,
        'clientOptions'=>array(
               'validateOnSubmit'=>true,
               //'submitHandler'=>'js: go()',
            ),
        )
    );
 
    $temp=CHtml::listData(Accounts::model()->AutoComplete('',7), 'value', 'label');
    $temp[0]=Yii::t('app','Chose Bank');
    $model->account_id=0;
        echo $form->error($extmatch,'account_id'); 
        echo $form->dropDownList($extmatch, "account_id", $temp,array('class'=>''));
        echo $form->error($extmatch,'account_id'); 
        ?>
<div id ="result">
</div>
<div>
<?php
        echo $form->labelEx($extmatch,'ext_total'); 
        echo $form->textField($extmatch,'ext_total',array('size'=>60,'maxlength'=>100));
        echo $form->error($extmatch,'ext_total'); 

        echo $form->labelEx($extmatch,'int_total'); 
        echo $form->textField($extmatch,'int_total',array('size'=>60,'maxlength'=>100));
        echo $form->error($extmatch,'int_total'); 

echo CHtml::submitButton('Go'); ?>
</div>
<?php
 $this->endWidget();
 $this->endWidget();
?>


<script type="text/javascript">
    jQuery(document).ready(function(){
        $("#extmatch-form").submit(function(e){
                go(e);
	   });
        
        
        
        $( "#FormExtmatch_account_id" ).change(function() {
            var value=$("#FormExtmatch_account_id").val();
            $.post( "<?php echo $this->createUrl('/bankbook/extmatchajax');?>", { FormExtmatch: {account_id: value}} ).done(
                function( data ){
                    $( "#result" ).html( data );
                }
            );
            
          });



    });
    function ajaxSubmit(e){
        e.preventDefault();
        var postData = $("#transaction-form").serializeArray();
        console.log(postData);
        //location.reload();
    }


    function go(e){

	if(parseFloat($('#FormExtmatch_ext_total').val())!=parseFloat($('#FormExtmatch_int_total').val())){
                e.preventDefault();
		var sum=(-1)*(parseFloat($('#FormExtmatch_ext_total').val())-parseFloat($('#FormExtmatch_int_total').val()));
                $('#modal-header').html("<h3><?php echo Yii::t("app","Create Manual Transaction"); ?></h3>");
                $('#modal-body').load("<?php echo $this->createUrl('/transaction/create');?> #transaction-form", {minmal:true} );
                $('#modal-footer').html("");
                $('#modal').width("1000px");
                
                $("#transaction-form").submit( ajaxSubmit(event));
                
                
                $('#modal').modal('show');
                

	}

    }
    
    
    
    
    function CalcSum() {
	var extsum=CalcExtSum();
        var intsum=CalcIntSum();	
	

        console.log("sum: " + (extsum-intsum));
    }
    
    function CalcExtSum() {
	var vals = $("[id^=FormExtmatch_Bankbook_match]");
	var sum = $("[id^=FormExtmatch_Bankbook_total]");
	
	total = parseFloat("0.0");
	
		 for (x in vals){
			if(vals[x].checked) {
				total += parseFloat(sum[x].value);
			}
		}

	total = Math.round(total * 100)/100;
	$("#FormExtmatch_ext_total").val(total);
        return total;
    }

    function CalcIntSum() {
        var vals = $("[id^=FormExtmatch_Trans_match]");
	var sum = $("[id^=FormExtmatch_Trans_total]");
	
	total = parseFloat("0.0");
		 for (x in vals){
			if(vals[x].checked) {
				total += parseFloat(sum[x].value);
			}
		}
	total = Math.round(total * 100)/100;
	$("#FormExtmatch_int_total").val(total);
        return total;
    }	


    
    
</script>