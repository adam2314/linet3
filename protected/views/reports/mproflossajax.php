<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'profloss-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
               'id' ,
                'name' ,
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12',
                'sum',
	),
)); 
?>
</div>

