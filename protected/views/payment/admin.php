<?php

$this->params["breadcrumbs"] = array(
    Yii::t('app', 'Payments Types') => array('index'),
    Yii::t('app', 'Manage'),
);

$this->params["menu"]= array(
        //array('label'=>Yii::t('app','List')." ". Yii::t('app','Payments Types'), 'url'=>array('index')),
        //array('label'=>Yii::t('app','Create') ." ". Yii::t('app','Payments Types'), 'url'=>array('create')),
);


app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', 'Manage') . " " . Yii::t('app', 'Payments Types'),
));
?>


<?php

echo app\widgets\GridView::widget( array(
    'id' => 'paymentType-grid',
    'dataProvider' => $model->dp(),
    //'filter' => $model,
    'columns' => array(
        'id',
        //'name',
        array(
            'attribute' => 'name',
            //'value' => 'Yii::t("app",$data->name)',
        ),
        //'profit',
        array(
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
        ),
    ),
));

app\widgets\MiniForm::end();
?>
