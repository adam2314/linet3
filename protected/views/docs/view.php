<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	$model->id,
//);

$this->menu=array(
	array('label'=>'List Docs', 'url'=>array('index')),
	array('label'=>'Create Docs', 'url'=>array('create')),
	array('label'=>'Update Docs', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Docs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Docs', 'url'=>array('admin')),
);
$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","View Document ") ." " .$model->id,));
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'prefix',
		'doctype',
		'docnum',
		'account_id',
		'company',
		'address',
		'city',
		'zip',
		'vatnum',
		'refnum',
		'issue_date',
		'due_date',
		'sub_total',
		'novat_total',
		'vat',
		'total',
		'src_tax',
		'status',
		'printed',
		'comments',
		'owner',
	),
)); 




	if($type->isdoc){
			//echo 'doc';
			$detials=new Docdetails;
			?>
	<div class="row">
		<table class="templateFrame grid" cellspacing="0">
        	<thead class="templateHead">
            	<tr>
                	<?php //echo $model->getAttributeLabel('doc_id'); ?>
					<td><?php echo $model->getAttributeLabel('item_id'); ?></td>
					<td><?php echo $model->getAttributeLabel('name'); ?></td>
					<td><?php echo $model->getAttributeLabel('description'); ?></td>
					<td><?php echo $model->getAttributeLabel('qty'); ?></td>
					<td><?php echo $model->getAttributeLabel('unit_price'); ?></td>
					<td><?php echo $model->getAttributeLabel('currency'); ?></td>
					<td><?php echo $model->getAttributeLabel('price'); ?></td>
					<td><?php echo $model->getAttributeLabel('nisprice'); ?></td>
					
                </tr>
			</thead>
			<tfoot>
            	<tr>
                	<td colspan="9">     	</td>
	            	</tr>
	         </tfoot>
            <tbody class="templateTarget">
                <?php $i=0;
				//if(count($model->docdetailes)==0)
					//$docdetails=array(new Docdetails);
				
				foreach ($model->docDetailes as $docdetail){
                                        //print_r($docdetail);
					echo $this->renderPartial('docdetialview', array('model'=>$docdetail,'type'=>$type,)); 
					$i++;
				}
		 ?>
            </tbody>
		</table>
			
	<?php		
			
		}
                
                
                $this->endWidget(); 
		?>
