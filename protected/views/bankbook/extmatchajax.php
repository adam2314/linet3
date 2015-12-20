<div class="row">
<div class="col-md-6">
    <?php
    echo app\widgets\GridView::widget( array(
        'id' => 'bankbook-grid',
        'dataProvider' => $model->search([]),
        'panel'=>false,
        ////'filter'=>$model,
        'columns' => array(
            
            array(
                'format' => 'raw',
                'value' =>function($data){
                            return \yii\helpers\Html::checkBox("FormExtmatch[Bankbooks][match][$data->id]",null,array("class"=>"ext_match",  "onchange"=>"CalcMatchSum()")).
                                    \yii\helpers\Html::hiddenInput("FormExtmatch[Bankbooks][total][$data->id]","$data->sum",array("class"=>"ext_total"));
                            
                },
            ),
            //'id',
            
            'details',
            'date',
            'refnum',
            'currency_id',
            'sum',
        //'total',
        //array(
        //	'class'=>'yii\grid\ActionColumn',
        //),
        ),
    ));
    ?>
</div>
<div class="col-md-6">
<?php
echo app\widgets\GridView::widget( array(
    'id' => 'transaction-grid',
    'dataProvider' => $trans->search([]),
    'panel'=>false,
    ////'filter'=>$model,
    'columns' => array(
        array(
            'format' => 'raw',
            'value' =>function($data){
            return \yii\helpers\Html::checkBox("FormExtmatch[Transactions][match][$data->id]",null,array("class"=>"trans_match", "onchange"=>"CalcMatchSum()")).
                    \yii\helpers\Html::hiddenInput("FormExtmatch[Transactions][total][$data->id]",$data->sum*-1,array("class"=>"trans_total"));
            }
        ),

        //'id',
        'details',
        'valuedate',
        //'refnum',
        'currency_id',
        array(
            'format' => 'raw',
            'value' =>function($data){return $data->sum*-1;},
        ),
    //'total',
    //array(
    //	'class'=>'yii\grid\ActionColumn',
    //),
    ),
));
?>
</div>

</div>