<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php $this->widget('EExcelView', array(
	'id'=>'balance-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
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
            'name'=>'neg',
                'header' => Yii::t('labels', 'Debit'),
        ),
            array(
            'cssClassExpression' => "'number'",
            'name'=>'pos',
                'header' => Yii::t('labels', 'Credit'),
        ),
            array(
            'cssClassExpression' => "'number'",
            'name'=>'sum',
                'header' => Yii::t('labels', 'Sum'),
        ),
            
             array(
                'header' => Yii::t('labels', 'Id6111'),
                'name' => 'id6111',
            ),
                            

	),
)); 
?>
</div>

