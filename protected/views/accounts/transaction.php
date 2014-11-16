<?php

//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); 
$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            // 'model'=>$model,
            'name' => 'Transactions[from_date]',
            'language' => substr(Yii::app()->language, 0, 2),
            'value' => $model->from_date,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                //'style' => 'height:20px;width:70px;',
                'placeholder' => Yii::t('app', 'From Date'),
            ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                ), true) . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            // 'model'=>$model,
            'name' => 'Transactions[to_date]',
            'language' => substr(Yii::app()->language, 0, 2),
            'value' => $model->to_date,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                //'style' => 'height:20px;width:70px',
                'placeholder' => Yii::t('app', 'To Date'),
            ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                ), true);
?>

<?php

$this->beginWidget('MiniForm', array(
    'haeder' => Yii::t('app', "Transactions for Account") . ": " . $account->name,
));

$yiidbdatetime = Yii::app()->locale->getDateFormat('yiidbdatetime');
$phpdatetime = Yii::app()->locale->getDateFormat('phpdatetime');
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'transactions-grid',
    'dataProvider' => $model->search(),
    //'enablePagination'=> false,
    'filter' => $model,
    'columns' => array(
        'num',
        //'prefix',
        //'company',
        array(
            //'name' => 'OpptAcc',
            //'type' => 'raw',

            'value' => 'CHtml::link(CHtml::encode($data->getOptAccName()),Yii::app()->createAbsoluteUrl("/accounts/transaction/id/".$data->getOptAccId()))',
            'type' => 'raw',
        //'value' => '$data->getOptAcc()',
        ),
        array(
            'name' => 'type',
            //'filter'=>CHtml::dropDownList('Transactions[type]', $model->type,CHtml::listData(TransactionType::model()->findAll(), 'id', 'name')),
            'value' => 'Yii::t("app",$data->Type->name)'
        ),
        array(
            'name' => 'refnum1',
            'value' => '$data->refnumDocsLink()',
            'type' => 'raw',
        ),
        array(
            'name' => 'refnum2',
            'value' => 'CHtml::encode($data->refnum2)',
            'type' => 'raw',
        ),
        'details',
        array(
            'name' => 'date',
            'filter' => $dateisOn,
            'value' => 'date("' . $phpdatetime . '",CDateTimeParser::parse($data->valuedate,"' . $yiidbdatetime . '"))'
        ),
        array(
            'header' => Yii::t('app', 'Debit'),
            'name' => 'sum',
            'filter' => '',
            'cssClassExpression' => "'number'",
            'value' => '($data->sum<0)?$data->sum:""'
        ),
        array(
            'header' => Yii::t('app', 'Credit'),
            'name' => 'sum',
            'filter' => '',
            'cssClassExpression' => "'number'",
            'value' => '($data->sum>0)?$data->sum:""'
        ),
        array(
            'header' => Yii::t('app', 'Balance'),
            'name' => 'sum',
            'filter' => '',
            'cssClassExpression' => "'number'",
            'value' => '$data->getBalance()'
        ),
    ),
));
$this->endWidget();
?>