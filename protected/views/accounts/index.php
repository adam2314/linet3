<?php
$this->menu = array(
    array('label' => Yii::t('app', 'Create Account'), 'url' => array('create')),
);
?>


<?php
$this->beginWidget('MiniForm', array(
    'haeder' => Yii::t('app', "Accounts"),
));





$types = Acctype::model()->findAll();
$list = array();
foreach ($types as $type1)
    $list[Yii::t('app', $type1->desc)] = array('ajax' => $this->createUrl('accounts/index?ajax=accounts-grid&type=' . $type1->id));


$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $list,
    // additional javascript options for the tabs plugin
    'options' => array(
        'selected' => $type,
    //'class'=>'nav nav-tabs',
    //'collapsible' => true,
    ),
));
$this->endWidget();
?>
<script type="text/javascript" src="/linet3/assets/4401c650/gridview/jquery.yiigridview.js"></script>

<script type="text/javascript">

    $('.sort-link').live("click",
            function(e) {
                //console.log($(this).parent().parent().parent().parent().parent().attr("id"));
                var str = $(this).parent().parent().parent().parent().parent().attr("id");
                
                $.post($(this).attr("href"), function(data) {
                    //console.log(str);

                    $("#" + str).parent().html(data);
                });

                return false;
            }
    );

    $('.filter-container > input').live("blur",
            function(e) {
                var value = $(this).val();
                var fName = $(this).attr("name");
                var id = $(this).parent().parent().parent().parent().parent().parent().attr("id");
                var aType = id.replace("accounts-grid", "");
                var obj = {};
                var href = "<?php echo $this->createUrl('/accounts/index'); ?>?ajax=accounts-grid&type=" + aType;
                
                obj[fName] = value;
  
                $.post(href, obj, function(data) {
                    $("#" + id).html(data);
                });
                return false;
            });

    $('a.delete').live("click",
            function() {
                if (!confirm('Are you sure you want to delete this item?'))
                    return false;
                var th = this, afterDelete = function() {
                };
                /*
                 $.post( $(this).attr("href"), {
                 function(data) {
                 jQuery('#accounts-grid0').yiiGridView('update');
                 //afterDelete(th, true, data);
                 }/*
                 error: function(XHR) {
                 //return afterDelete(th, false, XHR);
                 }*/
                //});
                /*
                 jQuery('#accounts-grid0').yiiGridView('update', {
                 type: 'POST',
                 url: jQuery(this).attr('href'),
                 success: function(data) {
                 jQuery('#accounts-grid0').yiiGridView('update');
                 afterDelete(th, true, data);
                 },
                 error: function(XHR) {
                 return afterDelete(th, false, XHR);
                 }
                 });*/
                return false;
            }
    );
</script>