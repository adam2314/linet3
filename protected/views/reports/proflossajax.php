    
<?php
app\widgets\MiniForm::begin(array('header' => Yii::t("app", "Profit & Loss report")));
?>

<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php
    echo app\widgets\GridView::widget( array(
        'id' => 'profloss-grid',
        'dataProvider' => $model->search(),
        'pager' =>false,
        ////'filter'=>$model,
        'columns' => array(
            array(
                'header' => Yii::t('app', 'ID'),
                'attribute' => 'id',
            ),
            array(
                'header' => Yii::t('app', 'Name'),
                'attribute' => 'name',
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => 'sum',
                'header' => Yii::t('app', 'Sum'),
            ),
            array(
                'header' => Yii::t('app', 'Id6111'),
                'attribute' => 'id6111',
            ),
        ),
    ));
    ?>
</div>


<?php app\widgets\MiniForm::end(); ?>
