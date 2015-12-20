<?php
use yii\helpers\Html;
$this->params["menu"] = array(
    array('label' => Yii::t('app', 'Create Backup'), 'url' => array('backup', 'Backup' => 'True')),
        //array('label' => Yii::t('app', 'Create Account types'), 'url' => array('create')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Manage Backups"),
));
?>

<?php

echo app\widgets\GridView::widget(array(
    'id' => 'backup-grid',
    'dataProvider' => $model->search([]),
    'pjax'=>false,
    //'filter'=>$model,
    'columns' => array(
        'id',
        'name',
        //'path',
        //'openformat',
        array(
            'class' => 'yii\grid\ActionColumn',
            'template' => '{restore}{delete}{download}',
            //'format'=>'raw',
            'buttons' => array(
                'restore' => function ($url, $model, $key) {
                    //'label'=>'<i class="glyphicon glyphicon-restore"></i>'.Yii::t('labels',"Restore"),
                    //'url'=>'yii\helpers\BaseUrl::base().("data/restore/". $data->id)',
                    return Html::a('<i class="glyphicon glyphicon-cloud-upload"></i>', $url);
                },
                'download' => function ($url, $model, $key) {
                    //'label'=>'<i class="glyphicon glyphicon-download"></i>',
                    //'url'=>'yii\helpers\BaseUrl::base().("download/".$data->id)',
                    return Html::a('<i class="glyphicon glyphicon-download"></i>', $url, ['target'=>'_blank']);
                },
                'delete' => function ($url, $model, $key) {
                    //'label'=>'<i class="glyphicon glyphicon-trash"></i>',
                    //'url'=>'yii\helpers\BaseUrl::base().("files/delete", array("id"=>$data->id))',
                    return Html::a('<i class="glyphicon glyphicon-trash"></i>', yii\helpers\BaseUrl::base().("/files/delete/".$model->id),['data-pjax'=>'w0',]);
                },
            ),
        ),
    ),
));

app\widgets\MiniForm::end();
?>
