<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'bankbook-grid',
        'dataProvider' => $model->search(),
        //'filter'=>$model,
        'columns' => array(
            array(
                'type' => 'raw',
                'value' =>
                'CHtml::checkBox("FormExtmatch[Bankbooks][match][$data->id]",null,array("class"=>"ext_match",  "onchange"=>"CalcMatchSum()"))',
            ),
            array(
                'type' => 'raw',
                'value' =>
                'CHtml::hiddenField("FormExtmatch[Bankbooks][total][$data->id]","$data->sum",array("class"=>"ext_total"))',
            ),
            //'id',
            
            'details',
            'date',
            'refnum',
            'currency_id',
            'sum',
        //'total',
        //array(
        //	'class'=>'bootstrap.widgets.TbButtonColumn',
        //),
        ),
    ));
    ?>
</div>
<div style=" width: 30%; display: inline-block;">
<?php
$this->widget('EExcelView', array(
    'id' => 'transaction-grid',
    'dataProvider' => $trans->search(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'type' => 'raw',
            'value' =>
            'CHtml::checkBox("FormExtmatch[Transactions][match][$data->id]",null,array("class"=>"trans_match", "onchange"=>"CalcMatchSum()"))',
        ),
        array(
            'type' => 'raw',
            'value' =>
            'CHtml::hiddenField("FormExtmatch[Transactions][total][$data->id]",$data->sum*-1,array("class"=>"trans_total"))',
        ),
        //'id',
        'details',
        'date',
        //'refnum',
        'currency_id',
        array(
            'type' => 'raw',
            'value' =>'$data->sum*-1',
        ),
    //'total',
    //array(
    //	'class'=>'bootstrap.widgets.TbButtonColumn',
    //),
    ),
));
?>
</div>

