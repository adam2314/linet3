<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php echo app\widgets\GridView::widget( array(
	'id'=>'profloss-grid',
	'dataProvider'=>$model->dp(),
	////'filter'=>$model,
	'columns'=>array(
               'id' ,
                'name',
                'sum',
                'id6111',
	),
)); 
?>
</div>