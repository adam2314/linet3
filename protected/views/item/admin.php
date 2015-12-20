<?php
$this->params["menu"] = [
    ['label' => Yii::t('app','Create Item'),'url' => 'create' ]
    ];

//*/

echo app\widgets\GridView::widget([
    'dataProvider' => $model->search(),
    'filterModel' => $model,
    'pjax' => true,

    'persistResize' => false,
    'columns' => [
        'id', 
        'name',
        [
            'class' => 'yii\grid\ActionColumn',
            // you may configure additional properties here
        ],
        
        
        ]
]);
?>
