<?php
$this->beginWidget('MiniForm', array('header' => Yii::t("app", "Update Configuration")));

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'settings-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>  
<div class='row'>
    <div class='col-md-6'>
        <?php $this->Widget('SettingsTbPanel', array('header' => Yii::t('app', "General Business Details"), 'models' => $models, 'from' => 100, 'to' => 199)); ?>
    
        <?php $this->Widget('SettingsTbPanel', array('header' => Yii::t('app', "Contact Details"), 'models' => $models, 'from' => 400, 'to' => 499)); ?>
        
        <?php $this->Widget('SettingsTbPanel', array('header' => Yii::t('app', "Address Details"), 'models' => $models, 'from' => 300, 'to' => 399)); ?>
        
    </div>
    <div class='col-md-6'>
        
    
        <?php $this->Widget('SettingsTbPanel', array('header' => Yii::t('app', "Tax and Accounting Data"), 'models' => $models, 'from' => 200, 'to' => 249)); ?>
  
        <?php $this->Widget('SettingsTbPanel', array('header' => Yii::t('app', "Currency"), 'models' => $models, 'from' => 250, 'to' => 299)); ?>
    
        <?php $this->Widget('SettingsTbPanel', array('header' => Yii::t('app', "Outgoing Email Settings"), 'models' => $models, 'from' => 500, 'to' => 599)); ?>
    </div>
    <div class="row form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => Yii::t('app', "Save"),
        ));
        ?>
    </div>

</div>
<?php
$this->endWidget();
$this->endWidget();
?>

<script type="text/javascript">
    var val = true;
    function del() {
        $("input[id='Settings_company.logo_value']").attr('value', '');
    }


    $('input').change(function() {
        submits();

    });



    $("#settings-form").submit(function(event) {
        if (!val)
            event.preventDefault();



    });



    function submits() {
        var from = "ajax=settings-form&" + $("#settings-form").serialize();
        $.post("<?php echo $this->createUrl('/'); ?>/settings/admin", from,
                function(data) {
                    $('.help-block').html('');
                    val = true;
                    $.each(data, function(key, value) {
                        val = false;
                        markMe(key, value[0]);

                    });

                    //if(val)
                    //    $("#settings-form").submit();
                }, "json")
                .error(function() {
                });
    }



    function markMe(fieldName, error) {
        field = document.getElementById("Settings_" + fieldName + "_em");
        $(field).html(error);
        $(field).show();

    }

</script>