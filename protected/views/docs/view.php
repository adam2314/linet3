<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	$model->id,
//);



$actions=array();
//$actions[]=array('label'=>'List Docs', 'url'=>array('index'));
$actions[]=array('label'=>'Create Doc', 'url'=>array('create'));
$actions[]=array('label'=>'Update Doc', 'url'=>array('update', 'id'=>$model->id));
$actions[]=array('label'=>'Manage Docs', 'url'=>array('admin'));
$actions[]=array('label'=>'Duplicate Doc', 'url'=>array('duplicate','id'=>$model->id));
$actions[]=array('label'=>'Print Doc', 'url'=>array('print','id'=>$model->id));

if($model->doctype==6){//Quote
    $actions[]=array('label'=>'Convert to Invoice', 'url'=>array('duplicate','id'=>$model->id,'type'=>3));//Invoice
    $actions[]=array('label'=>'Convert to Sales Order', 'url'=>array('duplicate','id'=>$model->id,'type'=>7));//Sales Order
    $actions[]=array('label'=>'Convert to Invoice Receipt', 'url'=>array('duplicate','id'=>$model->id,'type'=>9));//Invoice Receipt
//    להזמנת עבודה/חשבונית/חשבונית מס קבלה
}
if($model->doctype==7){//Sales Order
    $actions[]=array('label'=>'Convert to Invoice', 'url'=>array('duplicate','id'=>$model->id,'type'=>3));//Invoice
    $actions[]=array('label'=>'Convert to Invoice Receipt', 'url'=>array('duplicate','id'=>$model->id,'type'=>9));//Invoice Receipt
    //הזמנת עבודה לחשבונית/חשבונית מס קבלה
}

$this->menu=$actions;



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




	if($model->docType->isdoc){
			//echo 'doc';
			$detials=new Docdetails;
			?>
	<div>
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
					echo $this->renderPartial('docdetialview', array('model'=>$docdetail,)); 
					$i++;
				}
		 ?>
            </tbody>
		</table>
		</div>	
	<?php		
			
		}
                
                
                $this->endWidget(); 
		?>
