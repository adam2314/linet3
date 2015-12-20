<?php
/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

/*
  $this->params["menu"]= array(
  array('label' => Yii::t('app', 'Create Account'), 'url' => array('create')),
  ); */
?>


<?php

//use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use app\models\Accounts;

/*
  app\widgets\MiniForm::begin( array(
  'header' => Yii::t('app', "Accounts"),
  )); */
?>

<?php
/*
  $types = Acctype::find()->All();
  $list = array();
  foreach ($types as $type1) {
  $list[Yii::t('app', $type1->desc)] = array(
  'id' => $type1->id,
  'ajax' => yii\helpers\BaseUrl::base().('accounts/index?ajax=accounts-grid&type=' . $type1->id),

  );
  }

  $this->widget('zii.widgets.jui.CJuiTabs', array(
  'tabs' => $list,
  // additional javascript options for the tabs plugin
  'headerTemplate' => '<li><a id="{id}" href="{url}" title="{title}">{title}</a></li>',
  'options' => array(
  'active' => $type,
  ),
  )); // */

//app\widgets\MiniForm::end();
// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
/**/
use kartik\widgets\ActiveForm;
use app\models\AccCat;
//\yii\widgets\Pjax::begin();
echo app\widgets\GridView::widget([
//echo yii\grid\GridView::widget([
    'id'=>$searchModel->type,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        array(
	            'attribute' => 'id6111',
	            'format' => 'raw',
                    'value' => function($data) {
                       return \yii\helpers\Html::encode(isset($data->accId6111)?$data->accId6111->name: "");
                   },
	            //'value' => '',
                    'filter' => \yii\helpers\ArrayHelper::map(\app\models\AccId6111::find()->all(), 'id', 'name'),
	        ),
         array(
	            'attribute' => 'cat_id',
	            'format' => 'raw',
                    'value' => function($data) {
                       return \yii\helpers\Html::encode(isset($data->category)?$data->category->name: "");
                   },
	            //'value' => '',
                    'filter' => \yii\helpers\ArrayHelper::map(AccCat::find()->where(["type_id"=>$searchModel->type])->all(), 'id', 'name'),
	        ),
        
        'src_tax',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{display}{create}{update}{delete}',
            'buttons' => array(
                'create' => function ($url, $model, $key) {
                    return Html::a('<i class="glyphicon glyphicon-file"></i>', ["docs/create/?id=".$model->id]);
                    //'url' => 'yii\helpers\BaseUrl::base().("docs/create", array("id"=>$data->id))',
                },
                'update' => function ($url, $model, $key) {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url);
                    //'url' => 'yii\helpers\BaseUrl::base().("accounts/update", array("id"=>$data->id))',
                },
                'delete' => function ($url, $model, $key) {
                    return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,['data-method'=>'post','data-confirm'=>'Are you sure you want to delete this item?']);
                    //'url' => 'yii\helpers\BaseUrl::base().("accounts/delete", array("id"=>$data->id))',
                },
                'display' => function ($url, $model, $key) {
                    return Html::a('<i class="glyphicon glyphicon-transfer"></i>', ["accounts/transaction/".$model->id]);
                    //'url' => 'yii\helpers\BaseUrl::base().("accounts/transaction", array("id"=>$data->id))',
                },
                
                
            ),
        ],
    ]
]);
//\yii\widgets\Pjax::end();
?>
