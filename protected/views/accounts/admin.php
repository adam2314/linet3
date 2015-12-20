<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

$this->params["menu"]=array(
	//array('label'=>'List Accounts', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account'), 'url'=>''),
);





 app\widgets\MiniForm::begin(array('header' => Yii::t('app',"Accounts"),)); 
 //$a=new kartik\grid\GridView;
 //$a->registerAssets();
 yii\grid\GridViewAsset::register($this);
 yii\widgets\PjaxAsset::register($this);
 kartik\grid\GridViewAsset::register($this);
 kartik\grid\GridExportAsset::register($this);
 kartik\grid\GridResizeColumnsAsset::register($this);
 
 //\yii\widgets\Pjax::begin();
 echo kartik\tabs\TabsX::widget([
    'items'=>$list,
    //'position'=>kartik\tabs\TTabsX::POS_ABOVE,
    'encodeLabels'=>false
]);
 //\yii\widgets\Pjax::end();
 /*
$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => $list,
            'headerTemplate' => '<li><a href="{url}" title="{title}">{title}</a></li>',
	    // additional javascript options for the tabs plugin
	    'options' => array(
                'selected'=>$type,
                'class'=>'nav nav-tabs',
	        //'collapsible' => true,
	    ),
	));
*/
app\widgets\MiniForm::end(); 

?>
<?php echo yii\helpers\Html::hiddenInput("accType", $type); ?>

<?php
$java = <<<JS

        
        $(document).on("click", '#sidebar > ul > li  > a',
            function (e) {
                 e.preventDefault();
                console.log($(".nav-tabs > li.active > a").data('id'));
                window.location = baseAddress +"/accounts/create/" + $(".nav-tabs > li.active > a").data('id');
                //return false;

            }
    );

        
JS;
$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
                  "//showTab($type);" .
        $java
        , \yii\web\View::POS_READY);
?>


