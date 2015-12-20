




<?=
\yii\helpers\Html::buttonInput($label, ['class' => 'btn btn-success', 'id' => $id.'-button']);
?>
<?=
\yii\bootstrap\Modal::widget([
//\kartik\popover\PopoverX::widget([
    'header' => $label,
    //'placement' => \kartik\popover\PopoverX::ALIGN_BOTTOM,
    //'content' => '', //$this->render('//accounts/create'),
    //'pluginOptions' => ['container' => '#mainPage'],//'modal'=>true,
    //'size' => 'md',
    
    'id'=>"popover-".$id,
    //'footer' => \yii\helpers\Html::button('Submit', ['class'=>'btn btn-sm btn-primary']),
    //'toggleButton' => ['label' => \Yii::t('app', 'New'), 'class' => 'btn btn-default', 'id' => 'new'.$id],
]);

$java=<<<java

$('#$id-button').bind('click',function() {
    $('#popover-$id').modal('show');
    $('#popover-$id').show();        
    $.get(baseAddress+"$ajax",
    function (data) {
       $('#popover-$id > div.modal-dialog > div.modal-content > div.modal-body').html($(data).find('$selctor'));
       $('$selctor > div > button:submit').replaceWith( "<a id='$id-submitButton' href='' class='btn btn-success'>Create</a>" );
    }, "html");
});

        
java;
$this->registerJs($java, \yii\web\View::POS_READY);

$java=<<<java
$(document).on("click","#$id-submitButton",function () {
    var form = $('$selctor').serialize()+"&ajax=true";
    var url = $('$selctor').attr('action');
    $.post(url, form,
            function (data) {
                if(data.status==200){
                    //hide.self
                    

                    $('#popover-$id').modal("hide");
                    //callback(data.body)
                    callback$id(data.body);
                }
                console.log(data);
            }, "json")
            .error(function (data) {
                console.log(data);
            });
    return false;
});
   
        
java;
$this->registerJs($java, \yii\web\View::POS_END);



//$this->registerJsFile(yii\helpers\BaseUrl::base() . '/assets/docs.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>