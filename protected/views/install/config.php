<?php

$this->beginWidget('MiniForm',array(
    'haeder' => "Install Wizard",
)); 



$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'install-form',
    
    'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
            ),
)); 


   $option = array( 'mysql'=>'Mysql');//'sqlite'=>'Sqlite',
    echo $form->radioButtonList($model,'dbtype',$option,array('separator'=>' '));

    
    echo $form->textFieldRow($model,'dbhost',array('class'=>'span5','maxlength'=>255));
    echo $form->textFieldRow($model,'dbname',array('class'=>'span5','maxlength'=>255));
    echo $form->textFieldRow($model,'dbuser',array('class'=>'span5','maxlength'=>255));
    echo $form->textFieldRow($model,'dbpassword',array('class'=>'span5','maxlength'=>255));
    echo $form->textFieldRow($model,'dbstring',array('class'=>'span5','maxlength'=>255));
    
    
//echo CHtml::submitButton('Previews',array('onclick'=>'send();')); 
echo CHtml::submitButton('Next',array('onclick'=>'send();')); 

 $this->endWidget(); 
 
 
 
 
 
 
$this->endWidget(); 
?>


<script type="text/javascript">
 
function send() {
 
   var data=$("#install-form").serialize();
 
 
  $.ajax({
        type: 'POST',
         url: '<?php echo Yii::app()->createAbsoluteUrl("install/3"); ?>',
        data:data,
     success:function(data){
                     $('.col-lg-12').html(data);
                   },
        error: function(data) { // if error occured
              alert(data);
         },

    dataType:'html'
  });
 
}
function strChange () {
    var value=$('input[name="InstallConfig[dbtype]"]:checked').val();
    var str;
    //if(value=='sqlite'){
    //    str='sqlite:protected/data/'+$("#InstallConfig_dbname").val();
    //}else{
        str='mysql:host='+$("#InstallConfig_dbhost").val()+';dbname='+$("#InstallConfig_dbname").val();
    //}    
    $("#InstallConfig_dbstring").val(str);
 
}
    
 
 function change () {
            var value=$('input[name="InstallConfig[dbtype]"]:checked').val();
            if(value=='sqlite'){
                $('label[for="InstallConfig_dbhost"]').hide();
                $('label[for="InstallConfig_dbuser"]').hide();
                $('label[for="InstallConfig_dbpassword"]').hide();
                $("#InstallConfig_dbhost").hide();
                $("#InstallConfig_dbuser").hide();
                $("#InstallConfig_dbpassword").hide();
            }else{
                $('label[for="InstallConfig_dbhost"]').show();
                $('label[for="InstallConfig_dbuser"]').show();
                $('label[for="InstallConfig_dbpassword"]').show();
                $("#InstallConfig_dbhost").show();
                $("#InstallConfig_dbuser").show();
                $("#InstallConfig_dbpassword").show();
            }
            strChange ();
          }
          
          
    $('#InstallConfig_dbname').keyup(function(){
       strChange();
    });
    $('#InstallConfig_dbhost').keyup(function(){
       strChange();
    });
 
 
 
  $('input[type="radio"]').change(function(){
       change();
    });
 
 
 change();
 
 </script>