<?php

$this->params["menu"]= array(
    array('label' => Yii::t('app', 'Create Account Template'), 'url' => array('create')),
);

app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "Manage Account Templates"),
));
?>

<?php

echo app\widgets\GridView::widget( array(
    'id' => 'acc-template-grid',
    'dataProvider' => $model->dp(),
    //'filter' => $model,
    //'template' => '{items}{pager}',
    'columns' => array(
        //'id',
        'name',
        //'AccType_id',
        array(
            'attribute' => 'AccType_id',
            'value' => 'Yii::t("app",$data->type->desc)',
        ),
        array(
            'class' => 'yii\grid\ActionColumn',
        ),
    ),
));

app\widgets\MiniForm::end();
?>
