<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

use yii\helpers\html;

$this->params["menu"] = array(
    //array('label'=>Yii::t('app','List documents'), 'url'=>array('index')),
    array('label' => Yii::t('app', 'Create document'), 'url' => array('create')),
);
/*
  Yii::$app->clientScript->registerScript('search', "
  function getAlert(response){
  $('#yw12').html($(response).filter('.alert'));
  }
  ");
 * 
 * 
 */
app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Manage Docs"),));
?>


<?php \yii\widgets\Pjax::begin(); ?>
<?php

echo $searchModel->issue_from;

$dateisOn = kartik\date\DatePicker::widget([
            'model' => $searchModel,
            'attribute' => 'issue_from',
            'attribute2' => 'issue_to',
            'removeButton' => false,
            'type' => 5,
            'separator' => '',
        ]); //.
//kartik\date\DatePicker::widget([    'model' => $searchModel,     'attribute' => 'issue_to',             'removeButton' => false,    ]);
//kartik\datecontrol\DateControl::widget(['model' => $searchModel, 'attribute' => 'issue_to', 'type' => 'date']);
$filter = '';
if ($searchModel->doctype != null) {
    $filter = \yii\helpers\ArrayHelper::map(\app\models\Docstatus::find()->where(['doc_type' => $searchModel->doctype])->All(), 'num', 'name');
} else {
    //$searchModel->status = null;
}
echo app\widgets\GridView::widget(array(
    //'id' => 'Docs',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    //'ajaxUpdate' => true,
    //'ajaxType' => 'POST',
    //'afterAjaxUpdate' => "function() {
    //  					jQuery('#Docs_issue_from').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['" . substr(Yii::$app->language, 0, 2) . "'], {'showAnim':'fold','dateFormat':'" . Yii::$app->locale->getDateFormat('short') . "','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
    //					jQuery('#Docs_issue_to').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['" . substr(Yii::$app->language, 0, 2) . "'], {'showAnim':'fold','dateFormat':'" . Yii::$app->locale->getDateFormat('short') . "','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
    //                            }",
    'columns' => array(
        //'num',
        //'prefix',
        //'doctype',

        array(
            'attribute' => 'doctype',
            'filter' => \app\models\Doctype::tlist(),
            'value' => function($data) {
                return $data->TypeName();
            },
            'width' => '150px',
        //'format' => 'html',
        //'value' => '$data->getTypeName()',
        //'options' => array('style' => 'width:20%;'),
        ),
        array(
            'attribute' => 'status',
            'filter' => $filter,
            'value' => function($data) {
                return $data->docStatus->name;
            },
            'width' => '70px',
        //'value' => '$data->getStatus()'
        ),
        array(
            'attribute' => 'refstatus',
            //'filter'=>$filter,
            'width' => '110px',
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Docs::getRefStatuses(), 'id', 'name'),
            'value' => function($data) {
                return app\widgets\Switcher::widget([
                            'model' => $data,
                            'name' => 'refstatus',
                            'url' => yii\helpers\BaseUrl::base() . '/docs/refstatus/' . $data->id,
                            'onLabel' => Yii::t('app', 'Open'),
                            'offLabel' => Yii::t('app', 'Closed'),
                ]);
            },
                    'format' => 'raw',
                ),
                array(
                    'attribute' => 'docnum',
                    'width' => '70px',
                //'options' => array('style' => 'width:8%;'),
                ),
                array(
                    'attribute' => 'account_id',
                    'width' => '70px',
                //'options' => array('style' => 'width:8%;'),
                ),
                'company',
                'refnum_ext',
                //'issue_date',
                array(
                    'attribute' => 'issue_date',
                    'filterType' => \kartik\grid\GridView::FILTER_DATE_RANGE,
                    'filterWidgetOptions' => [
                        'convertFormat' => true,
                        'useWithAddon' => true,
                        'pluginOptions' => [
                            'format' => 'Y-m-d',
                            'separator' => ' to ',
                        ],
                        'hideInput' => true, // from demo config
                        'presetDropdown' => false,
                    ],
                    //'filter' => $dateisOn,
                    //'format' => 'html',
                    'width' => '150px',
                    'value' => function($data) {
                return $data->readDateFormat($data->issue_date);
            },
                //'value' => '$data->issue_date',
                //'htmlOptions' => array('style' => 'width:150px;'),
                ),
                'total',
                /*
                  'address',
                  'city',
                  'zip',
                  'vatnum',
                  'refnum',

                  'due_date',
                  'sub_total',
                  'novat_total',
                  'vat',

                  'src_tax',
                  '',
                  'printed',
                  'comments',
                  'owner',
                 */
                array(
                    'options' => array('style' => 'width:95px;'),
                    'class' => 'yii\grid\ActionColumn',
                    //'options' => array('style' => 'width:80px'),
                    'template' => '{duplicate}{print}{view}{update}{delete}',
                    'buttons' => array
                        (
                        'update' => function ($url, $model, $key) {
                            if ($model->docStatus->looked == 1) return '';
                            //    'label' => '<i class="glyphicon glyphicon-edit"></i>',
                            return Html::a('<i class="glyphicon glyphicon-edit"></i>', $url);
                        },
                        'duplicate' => function ($url, $model, $key) {
                            return Html::a('<i class="glyphicon glyphicon-plus-sign"></i>', $url);
                            //'label' => '<i class="glyphicon glyphicon-plus-sign"></i>', //
                            //'imageUrl'=>Yii::$app->request->baseUrl.'/images/email.png',
                            //'url' => 'yii\helpers\BaseUrl::base().("docs/duplicate/". $data->id)',
                        },
                        'delete' => function ($url, $model, $key) {
                            if ($model->docStatus->looked == 1) return '';
                            return Html::a('<i class="glyphicon glyphicon-remove"></i>', $url);
                            //'label' => '<i class="glyphicon glyphicon-remove"></i>',
                        },
                        'print' => function ($url, $model, $key) {
                            //'label' => '<i class="glyphicon glyphicon-print"></i>',
                            return Html::a('<i class="glyphicon glyphicon-print"></i>', $url);
                        },
                        'view' => function ($url, $model, $key) {
                            return Html::a('<i class="glyphicon glyphicon-search"></i>', $url);
                            //   'label' => '<i class="glyphicon glyphicon-search"></i>',
                        },
                    ),
                ),
            ),
        ));
        ?>
        <?php \yii\widgets\Pjax::end(); ?>



        <?php app\widgets\MiniForm::end(); ?>
