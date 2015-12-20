<?php

//$this->params["breadcrumbs"]=array(
//	'Doctypes'=>array('index'),
//	'Manage',
//);

$this->params["menu"]= array(
    array('label' => Yii::t('app', "Create Document Type"), 'url' => array('create')),
);

app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "Manage Document types"),
));
?>

<?php

echo app\widgets\GridView::widget( array(
    'id' => 'doctype-grid',
    'dataProvider' => $model->dp(),
    //'filter' => $model,
    'columns' => array(
        array(
            'attribute' => 'name',
            //'value' => 'Yii::t("app",$data->name)'
        ),

        array(
            'attribute' => 'docStatus_id',
            //'value' => '$data->docStatus->name'
        ),
        'last_docnum',
        array(
            'class' => 'yii\grid\ActionColumn',
        ),
    ),
));
app\widgets\MiniForm::end();
?>
