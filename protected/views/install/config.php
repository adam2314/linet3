<?php

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Install Wizard"),
)); 



$form=kartik\form\ActiveForm::begin( array(
    'id'=>'install-form',
    
    'enableAjaxValidation'=>false,
        'options'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
            ),
)); 


   $option = array( 'mysql'=>'Mysql');//'sqlite'=>'Sqlite',
    echo $form->radioButtonList($model,'dbtype',$option,array('separator'=>' '));

    
    echo $form->field($model,'dbhost',array('class'=>'span5','maxlength'=>255));
    echo $form->field($model,'dbname',array('class'=>'span5','maxlength'=>255));
    echo $form->field($model,'dbuser',array('class'=>'span5','maxlength'=>255));
    echo $form->field($model,'dbpassword',array('class'=>'span5','maxlength'=>255));
    echo $form->field($model,'dbstring',array('class'=>'span5','maxlength'=>255));
    
    
//echo \yii\helpers\Html::submitButton('Previews',array('onclick'=>'send();')); 
echo \yii\helpers\Html::submitButton(Yii::t("app",'Next'),array('onclick'=>'send();')); 

 app\widgets\MiniForm::end(); 
 
 
 
 
 
 
app\widgets\MiniForm::end(); 
?>


<script type="text/javascript">
 
function send() {
 
   var data=$("#install-form").serialize();
 
 
  $.ajax({
        type: 'POST',
         url: '<?php echo yii\helpers\BaseUrl::base().("install/3"); ?>',
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