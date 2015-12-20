<?php

$model = new \app\models\Docs();
$model->scenario = 'search';
?>

<?php

\yii\bootstrap\Modal::begin([
    'header' => $label,
    'id' => "popover-" . $id,
]);
?>
<?=

\app\widgets\GridView::widget([
    'id' => 'docs-grid',
    'dataProvider' => $model->search(Yii::$app->request->get()),
    'layout' => '{items}{pager}',
    'panel' => false,
    //'beforeFilter'=>'filter',
    //'pjax'=>false,
    'filterModel' => $model,
    'columns' => array(
        [
            'attribute' => 'doctype',
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Doctype::find()->All(), 'id', 'name'),
            'value' => function($data) {
                return $data->TypeName();
            },
            'options' => ['style' => 'width:35%;'],
        ],
        [
            'attribute' => 'docnum',
            'value' => function($data) {
                return \yii\helpers\Html::a(\yii\helpers\Html::encode($data->docnum), "#", array("onclick" => 'refNum(' . \yii\helpers\Json::encode($data) . ')'));
                ;
            },
                    'format' => 'raw',
                    'options' => ['style' => 'width:5%;'],
                ],
                array(
                    'attribute' => 'refstatus',
                    //'filter'=>$filter,
                    'filter' => \yii\helpers\ArrayHelper::map(\app\models\Docs::getRefStatuses(), 'id', 'name'),
                    'value' => function($data) {
                return $data->getRefStatus();
                ;
            },
                    
                        ),
                        'company',
                        [
                            'attribute' => 'status',
                            'value' => function($data) {
                                return $data->docStatus->name;
                            },
                            'options' => ['style' => 'width:8%;'],
                        ],
                        array(
                            'attribute' => 'total',
                            'options' => ['style' => 'width:8%;'],
                        ),
                    ),
                ]);
                ?>


                <?php \yii\bootstrap\Modal::end(); ?>

                <?php

                $java = <<<java

/*
     $('#docs-grid').on('beforeFilter',function(){
         console.log('fire!');
   
   //return false; 
   });
*/        
        
java;
                $this->registerJs($java, \yii\web\View::POS_READY);
                ?>
