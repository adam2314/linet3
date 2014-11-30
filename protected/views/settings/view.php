<?php
$this->beginWidget('MiniForm', array('header' => Yii::t("app", "Update Configuration")));

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'settings-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));

$col1 = $col = '';
$print = false;
foreach ($models as $sModel) {
    if ($sModel->hidden == 0) {
        $tmp = EAVHelper::addRow($sModel->id, $sModel->value, $sModel);
        if ($print) {
            $col.= $tmp;
            $print = false;
        } else {
            $col1.= $tmp;
            $print = true;
        }
    }
}
echo "<div class='row'><div class='col-md-6'>$col1</div><div class='col-md-6'>$col</div></div>"
?>  

<?php echo CHtml::submitButton(Yii::t('app', "Save")); ?>    
<?php 
$this->endWidget(); 
$this->endWidget();
?>

<script type="text/javascript">

    function del() {
        $("input[id='Settings_company.logo_value']").attr('value', '');
    }


    $('input').change(function() {
        var from = "ajax=settings-form&" + $("#settings-form").serialize();
        $.post("<?php echo $this->createUrl('/'); ?>/settings/admin", from,
                function(data) {
                    $('.help-block').html('');
                    $.each(data, function(key, value) {

                        markMe(key, value[0]);
                    });
                }, "json")
                .error(function() {
                });




    });

    function markMe(fieldName, error) {
        field = document.getElementById("Settings_" +fieldName+ "_em"); 
        $(field).html(error);
        $(field).show();

    }

</script>