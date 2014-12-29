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
        'id' => $type1->id,
        'ajax' => $this->createUrl('accounts/index?ajax=accounts-grid&type=' . $type1->id),

    );
}

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $list,
    // additional javascript options for the tabs plugin
    'headerTemplate' => '<li><a id="{id}" href="{url}" title="{title}">{title}</a></li>',
    'options' => array(
        'active' => $type,
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
                $('#accType').val(this.id.replace("#", ''));
            }
    );
   
</script>