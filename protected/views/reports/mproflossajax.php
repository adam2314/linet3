<div style=" width: 40%; display: inline-block; ">
    <?php
    $this->widget('EExcelView', array(
        'id' => 'profloss-grid',
        'dataProvider' => $model->search(),
        //'filter'=>$model,
        'columns' => array(
            array(
                'header' => Yii::t('labels', 'ID'),
                'name' => 'id',
            ),
            array(
                'header' => Yii::t('labels', 'Name'),
                'name' => 'name',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '1',
                'header' => Yii::t('labels', 'January'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '2',
                'header' => Yii::t('labels', 'February'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '3',
                'header' => Yii::t('labels', 'March'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '4',
                'header' => Yii::t('labels', 'April'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '5',
                'header' => Yii::t('labels', 'May'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '6',
                'header' => Yii::t('labels', 'June'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '7',
                'header' => Yii::t('labels', 'July'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '8',
                'header' => Yii::t('labels', 'August'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '9',
                'header' => Yii::t('labels', 'September'),
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '10',
                'header' => Yii::t('labels', 'October'),
            ),
            array(
            'cssClassExpression' => "'number'",
            'name'=>'11',
                'header' => Yii::t('labels', 'November'),
        ),
            array(
            'cssClassExpression' => "'number'",
            'name'=>'12',
                'header' => Yii::t('labels', 'December'),
        ),
            array(
            'cssClassExpression' => "'number'",
            'name'=>'sum',
                'header' => Yii::t('labels', 'Sum'),
        ),
            
        ),
    ));
    ?>
</div>

