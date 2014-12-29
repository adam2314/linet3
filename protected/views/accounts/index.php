<?php
/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
$this->menu = array(
    array('label' => Yii::t('app', 'Create Account'), 'url' => array('create')),
);
?>


<?php
$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Accounts"),
));
?>

<?php
$types = Acctype::model()->findAll();
$list = array();
foreach ($types as $type1) {
    $list[Yii::t('app', $type1->desc)] = array(
        //'label' => '',
        //'id' => $type1->id,
        'ajax' => $this->createUrl('accounts/index?ajax=accounts-grid&type=' . $type1->id),
            //'data' =>'$type1->id',
            //'ui-tooltip'
    );
}

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $list,
    // additional javascript options for the tabs plugin
    //'headerTemplate' => '<li><a id="{id}" href="{url}" title="{title}">{title}</a></li>',
    //'id' => 'account-tab',
    'options' => array(
        'selected' => 3,
        
        //'collapsible' => true,
    //'data'
    //'class'=>'nav nav-tabs',
    //'collapsible' => true,
    ),
)); //*/



$this->endWidget();
?>
<?php echo CHTML::hiddenField("accType", $type); ?>

<script type="text/javascript" src="<?php echo Yii::app()->createAbsoluteUrl('/assets/8b529727/jquery.ba-bbq.js'); ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->createAbsoluteUrl('/assets/460bb703/gridview/jquery.yiigridview.js'); ?>"></script>

<script type="text/javascript">

    $(document).on("click", '.sort-link',
            function(e) {
                var id = ($(this).parent().parent().parent().parent().parent().attr("id"));
                $.fn.yiiGridView.update(id);
                $('#' + id).yiiGridView('update', {url: $(this).attr('href')});
                return false;
            }
    );

    $(document).on("click", '#menu > li  > a',
            function(e) {
                window.location = "<?php echo Yii::app()->createAbsoluteUrl('/accounts/create'); ?>/" + $('#accType').val();
                return false;

            }
    );


    $(document).on("click", '.ui-tabs-anchor',
            function(e) {
                console.log(this.id.replace("#ui-id-", ''));
                $('#accType').val(this.id.replace("#ui-id-", ''));
            }
    );
    
    jQuery(document).ready(function() {
        $(".ui-tabs").tabs("option", "active", 3);
     //   $(".ui-tabs").tabs();
     //   $( ".ui-tabs" ).tabs({ selected: 3 });
    //$("#account-tab").tabs('load', <?php echo $type;?>);
    //$("#account-tab").tabs("option", "active", <?php echo $type;?>);
    //$('#account-tab').tabs('select', <?php echo $type;?>);
    //$( "#account-tab" ).tabs( "refresh" );
    
    });
</script>