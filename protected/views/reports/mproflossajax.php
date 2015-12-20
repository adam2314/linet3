    <?php
    echo app\widgets\GridView::widget(array(
        'id' => 'profloss-grid',
        'dataProvider' => $model->search(),
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
                'attribute' => '1',
                'header' => Yii::t('app', 'January'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '2',
                'header' => Yii::t('app', 'February'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '3',
                'header' => Yii::t('app', 'March'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '4',
                'header' => Yii::t('app', 'April'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '5',
                'header' => Yii::t('app', 'May'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '6',
                'header' => Yii::t('app', 'June'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '7',
                'header' => Yii::t('app', 'July'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '8',
                'header' => Yii::t('app', 'August'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '9',
                'header' => Yii::t('app', 'September'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '10',
                'header' => Yii::t('app', 'October'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '11',
                'header' => Yii::t('app', 'November'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => '12',
                'header' => Yii::t('app', 'December'),
            ),
            array(
                //'cssClassExpression' => "'number'",
                'attribute' => 'sum',
                'header' => Yii::t('app', 'Sum'),
            ),
        ),
    ));
    ?>
