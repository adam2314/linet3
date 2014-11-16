<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'profloss-grid',
        'dataProvider' => $model->search(),
        //'filter'=>$model,
        'columns' => array(
            'id',
            'name',
            array(
                'cssClassExpression' => "'number'",
                'name' => '1',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '2',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '3',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '4',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '5',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '6',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '7',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '8',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '9',
            ),
            array(
                'cssClassExpression' => "'number'",
                'name' => '10',
            ),
            array(
            'cssClassExpression' => "'number'",
            'name'=>'11',
        ),
            array(
            'cssClassExpression' => "'number'",
            'name'=>'12',
        ),
            array(
            'cssClassExpression' => "'number'",
            'name'=>'sum',
        ),
            
        ),
    ));
    ?>
</div>

