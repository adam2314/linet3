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
                'name' => 'sum',
            ),
            'id6111',
        ),
    ));
    ?>
</div>

