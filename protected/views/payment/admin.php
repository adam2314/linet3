<?php

$this->breadcrumbs = array(
    Yii::t('models', 'Payments Types') => array('index'),
    Yii::t('actions', 'Manage'),
);

$this->menu = array(
        //array('label'=>Yii::t('actions','List')." ". Yii::t('models','Payments Types'), 'url'=>array('index')),
        //array('label'=>Yii::t('actions','Create') ." ". Yii::t('actions','Payments Types'), 'url'=>array('create')),
);


$this->beginWidget('MiniForm', array(
    'header' => Yii::t('actions', 'Manage') . " " . Yii::t('models', 'Payments Types'),
));
?>


<?php

$this->widget('EExcelView', array(
    'id' => 'paymentType-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        //'name',
        array(
            'name' => 'name',
            'value' => 'Yii::t("app",$data->name)',
        ),
        //'profit',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}',
        ),
    ),
));

$this->endWidget();
?>
