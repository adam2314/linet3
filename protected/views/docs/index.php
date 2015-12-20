<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

yii\widgets\Pjax::begin(['id' => 'docs-grid-pjax']);
$model = new \app\models\Docs();
$model->scenario='search';
//$model->unsetAttributes();
//$var=\yii\helpers\Html::link(\yii\helpers\Html::encode($data->docnum),"#", array("onclick"=>'refNum('.\yii\helpers\Json::encode($data).')'));
echo \app\widgets\GridView::widget( [
    'id' => 'docs-grid',
    'dataProvider' => $model->search(Yii::$app->request->get()),
    'layout' => '{items}{pager}',
    'panel'=>false,
    //'pjax'=>true,
    'filterModel' => $model,
    /*
    'afterAjaxUpdate' => 'function(){var elements = $(".filter-container > [name^=Docs]");
for (var i=0; i<elements.length; i++) {
    elements[i].name=elements[i].name.replace("Docs","Docsfilter");
    //console.log(elements[i].name);

}}',
    'beforeAjaxUpdate' => 'function(){var elements = $(".filter-container > [name^=Docs]");
for (var i=0; i<elements.length; i++) {
    elements[i].name=elements[i].name.replace("Docs","Docsfilter");
    //console.log(elements[i].name);

}}',*/
    
    'columns' => array(
        [
            'attribute' => 'doctype',
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Doctype::find()->All(), 'id', 'name'),
            'value' => function($data){return $data->TypeName();},
            'options' => ['style' => 'width:35%;'],
        ],
        [
            'attribute' => 'docnum',
            'value' => function($data){return \yii\helpers\Html::a(\yii\helpers\Html::encode($data->docnum),"#", array("onclick"=>'refNum('.\yii\helpers\Json::encode($data).')'));;},
            'format' => 'raw',
            'options' => ['style' => 'width:5%;'],
        ],
        'company',
        //array(  'onclick'=>""refNum(\"".$data->id.",".$data->docnum.",".$data->docType->name.")",
        /* array(
          //'name'=>'account_id',
          'header'=>'Account',
          'class'=>'CLinkColumn',
          //'filter'=>\yii\helpers\ArrayHelper::map(Doctype::find()->All(), 'id', 'name'),
          'labelExpression'=>'"".$data->company',
          //'url'=>'accouts/view&id=$data->account_id',
          'urlExpression'=>'"users/view&id=".$data->account_id',
          ), */
       [
            'attribute' => 'status',
            'value' => function($data){return $data->docStatus->name;},
            'options' => ['style' => 'width:8%;'],
        ],
        array(
            'attribute' => 'total',
            'options' => ['style' => 'width:8%;'],
        ),
    ),
]);
            ?>
<script type="text/javascript">
    
    jQuery("#docs-grid-pjax").on('pjax:timeout', function(e){
        e.preventDefault();
    }).on('pjax:send', function(){
        jQuery("#docs-grid-container").addClass('kv-grid-loading');
    }).on('pjax:complete', function(){
            //setTimeout(kvGridInit_34655f25(), 2500);
            jQuery("#docs-grid-container").removeClass('kv-grid-loading');
        });

    jQuery('#docs-grid').yiiGridView({
        "filterUrl":"/linet3.1-dev/docs/index",
        "filterSelector":"#docs-grid-filters input, #docs-grid-filters select"
    });
    
    
    jQuery(document).pjax("#docs-grid-pjax a", "#docs-grid-pjax", {"push":true,"replace":false,"timeout":1000,"scrollTo":false});
    jQuery(document).on('submit', "#docs-grid-pjax form[data-pjax]", function (event) {
        jQuery.pjax.submit(event, '#docs-grid-pjax', {"push":true,"replace":false,"timeout":1000,"scrollTo":false});
    });
    
    
</script>


<?php
            
yii\widgets\Pjax::end();
?>

