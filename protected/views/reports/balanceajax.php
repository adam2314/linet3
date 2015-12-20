
    <?php echo app\widgets\GridView::widget( array(
	'id'=>'balance-grid',
	'dataProvider'=>$model->search(),
        
	////'filter'=>$model,
	'columns'=>array(
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
            'attribute'=>'neg',
                'header' => Yii::t('app', 'Debit'),
        ),
            array(
            //'cssClassExpression' => "'number'",
            'attribute'=>'pos',
                'header' => Yii::t('app', 'Credit'),
        ),
            array(
            //'cssClassExpression' => "'number'",
            'attribute'=>'sum',
                'header' => Yii::t('app', 'Sum'),
        ),
            
             array(
                'header' => Yii::t('app', 'Id6111'),
                'attribute' => 'id6111',
            ),
                            

	),
)); 
?>

