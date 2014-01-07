<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'profloss-grid',
	'dataProvider'=>$model->bkmvTable(),
	//'filter'=>$model,
	'columns'=>array(
               'id' ,
                'name' ,
                'count',
                
	),
)); 
?>
</div>
<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php
    
    $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'profloss-grid',
	'dataProvider'=>$model->docsTable(),
	//'filter'=>$model,
	'columns'=>array(
               'id' ,
                'name' ,
                'count',
                'sum',
   
	),
)); //*/
?>
</div>
