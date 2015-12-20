

<label><?= Yii::t('app', 'Attached Files'); ?></label>
            <?= \yii\helpers\Html::fileInput("Files" . '[' . $attribute .']',null,['accept'=>'image/*;capture=camera']);//$model->className() ?>
<?php

if (!$model->isNewRecord) {
    echo "<h2>" . Yii::t('app', 'Attached files') . "</h2>";
    //echo get_class($model) . $model->id;

    //$files = new app\models\Files();
    $files = new app\models\Files(['scenario' => 'search']);
    //$files->unsetAttributes();
    $files->parent_type = get_class($model);
    $files->parent_id = $model->id;
    $files->hidden = 0;
    echo app\widgets\GridView::widget(array(
        'id' => 'acc-template-grid',
        'dataProvider' => $files->search([]),
        ////'filter'=>$model,
        'panel' => false,
        'pjax'=>false,
        //'ajaxUpdate' => true,
        'columns' => array(
            array(
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($data) {
                    return \yii\helpers\Html::a(\yii\helpers\Html::encode($data->name), yii\helpers\BaseUrl::base() . ("/data/download/" . $data->id));
                },
            ),
            array(
                'attribute' => 'date',
                'value' => function($data) {
                    return $data->readDateFormat($data->date);
                },
            ),
            array(
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => array(
                    'delete' => function ($url, $model, $key) {
                        //   'label' => '<i class="glyphicon glyphicon-trash"></i>',
                        //'deleteConfirmation' => true,
                        //'imageUrl' => false,
                        return \yii\helpers\Html::a('Delete', Yii\helpers\BaseUrl::base() . "/files/delete/" . $model->id);
                    },
                ),
            ),
        ),
    ));
}
?>