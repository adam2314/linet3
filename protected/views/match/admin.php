<?php

$this->params["menu"] = array(
        //array('label'=>'List Doctype', 'url'=>array('index')),
        //array('label'=>'Create Doctype', 'url'=>array('create')),
);


app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Bankbooks"),
));
?> 

<?php

$dateisOn = kartik\datecontrol\DateControl::widget(['model' => $model, 'attribute' => 'date_from', 'type' => 'date']) .
        kartik\datecontrol\DateControl::widget(['model' => $model, 'attribute' => 'date_to', 'type' => 'date']);
?>

<?php

echo app\widgets\GridView::widget(array(
    'id' => 'transaction-grid',
    'dataProvider' => $model->dp(),
    //'filter'=>$model,
    //'afterAjaxUpdate'=>"function() {
    //					jQuery('#ExtCorrelation_date_from').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::$app->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::$app->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
    //					jQuery('#ExtCorrelation_date_to').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::$app->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::$app->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
    //                       }",
    'columns' => array(
        'id',
        //'account_id',
        //'details',
        //'refnum',
        //'currency_id',
        array(
            'attribute' => 'account_id',
            'filter' => \yii\helpers\ArrayHelper::map(app\models\Accounts::find()->where(['type' => 7])->all(), 'id', 'name'),
            'value' => function($data){return $data->getAccountName();},
        ),
        array(
            //'name'=>'account_id',
            //'value'=>'$this->randerPartial("_bank", array("array"=>$data->getBank()))',//num,date,sum
            //'value' => array($this, 'inDataColumn'),
            'value' => function($data){return $this->render('_trans', array('cdata' => $data,'intType'=>1));},
            'format' => 'raw',
        ),
        array(
            //'name'=>'account_id',
            //'value'=>'$this->randerPartial("_trans", array("array"=>$data->getTrans()))',//num,type,date,sum
            'value' => function($data){return $this->render('_trans', array('cdata' => $data,'intType'=>0));},
            //'value' => array($this, 'outDataColumn'),
            'format' => 'raw',
        ),
        array(
            'attribute' => 'date',
            'filter' => $dateisOn,
            //'value' => '$data->date'
        ),
        array(
            'attribute' => 'owner',
            'filter' => \yii\helpers\ArrayHelper::map(app\models\User::find()->All(), 'id', 'username'),
           // 'value' => function($data){return Yii::t("app",$data->owner->username);}
        ),
        //'total',
                    
        array(
            'class' => 'yii\grid\ActionColumn',
            //'options' => array('style' => 'width:80px'),
            'template' => '{delete}',
            'buttons' => [
                 'delete' => function ($url, $model, $key) {
                            //if ($model->docStatus->looked == 1) return '';
                            $url=yii\helpers\BaseUrl::base() . '/match/matchdelete/' . $model->id;
                            return \yii\helpers\Html::a('<i class="glyphicon glyphicon-remove"></i>', $url);
                            //'label' => '<i class="glyphicon glyphicon-remove"></i>',
                        },
                 
            ],
        ),
    ),
));
?>


<?php

app\widgets\MiniForm::end();
?>