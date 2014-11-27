<?php

$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'stockAction[from_date]',
            'language' => substr(Yii::app()->language, 0, 2),
            'value' => $model->from_date,
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                'placeholder' => Yii::t('app', 'From Date'),
            ),
                ), true) . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'stockAction[to_date]',
            'language' => substr(Yii::app()->language, 0, 2),
            'value' => $model->to_date,
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                'placeholder' => Yii::t('app', 'To Date'),
            ),
                ), true);
?>

<?php

$this->beginWidget('MiniForm', array(    'haeder' => Yii::t('app', "Stock Transactions"),));



$yiidbdatetime = Yii::app()->locale->getDateFormat('yiidbdatetime');
$phpdatetime = Yii::app()->locale->getDateFormat('phpdatetime');

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'stockAction-grid',
    'dataProvider' => $model->search(),
    //'enablePagination'=> false,
    'ajaxUpdate' => true,
    'ajaxType' => 'POST',
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'account_id',
            //'filter'=>CHtml::dropDownList('Transactions[type]', $model->type,CHtml::listData(TransactionType::model()->findAll(), 'id', 'name')),
            'filter' => CHtml::listData(Accounts::model()->findAll(), 'id', 'name'),
            'value' => '$data->getAccountName()'
        ),
        array(
            'name' => 'oppt_account_id',
            //'type' => 'raw',
            'filter' => CHtml::listData(Accounts::model()->findAll(), 'id', 'name'),
            'value' => '$data->OpptAccount->name'
        //'value'=>'CHtml::link(CHtml::encode($data->account_id),Yii::app()->createAbsoluteUrl("/accounts/transaction/id/".$data->account_id))',
        ),
        array(
            'name' => 'doc_id',
            'filter' => '',
            //'value'=>'0',
            //'value' => 'CHtml::link(CHtml::encode(Yii::t("app",$data->Doc->docType->name)." #".$data->Doc->docnum),Yii::app()->createAbsoluteUrl("/docs/view/$data->doc_id"))',
            'type' => 'raw',
        ),
        array(
            'name' => 'item_id',
            'filter' => CHtml::listData(Item::model()->findAll(), 'id', 'name'),
            //'value' => '$data->Item->name'
        ),
        'qty',
        'serial',

        array(
            'name' => 'createDate',
            'filter' => $dateisOn,
            'value' => 'date("' . $phpdatetime . '",CDateTimeParser::parse($data->createDate,"' . $yiidbdatetime . '"))'
        ),
        array(
            'name' => 'user_id',
            'filter' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
            'value' => '$data->User->username'
        ),
    //'sum',
    ),
));


$this->endWidget(); //miniform
?>