<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>Yii::t("app","List Users"),'url'=>array('index')),
	array('label'=>Yii::t("app","Create User"),'url'=>array('create')),
	array('label'=>Yii::t("app","Update User"),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t("app","Delete User"),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t("app","Manage Users"),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","View User ") ." " .$model->username,));
?>
<div class="col-md-4">

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'fname',
                'lname',
		//'password',
		'lastlogin',
		//'cookie',
		//'hash',
		//'certpasswd',
		//'salt',
		'email',
	),
)); 


			?>
</div>
<div class="col-md-4">
        <table class="table">
            <thead>
                <tr>

                    <td><?php echo Yii::t("app","Tax Catagory") ?></td>
                    <td><?php echo Yii::t("app","Account Name") ?></td>


                </tr>
            </thead>
            <tfoot>
                    <tr>
                        <td colspan="2">     	</td>
                    </tr>
             </tfoot>
            <tbody>
                <?php $i=0;
                                foreach ($model->userIncomeMaps as $userIncome){
                                        echo $this->renderPartial('userIncomeMapview', array('model'=>$userIncome,'i'=>$i,)); 
                                        $i++;
                                }
                 ?>
            </tbody>
        </table>
</div>
	<?php		
			
	
$this->endWidget(); 
?>
