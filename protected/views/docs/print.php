<?php


//$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","View Document ") ." " .$model->id,));
?>

		
<table>
        <tr>
                <td colspan="3" width="650">
                <h3><?php echo Config::model()->findByPk('company.name')->value; ?></h3><br />
                <?php echo Config::model()->findByPk('company.address')->value; ?><br />
                
                
                <?php echo Config::model()->findByPk('company.vatid')->value; ?><?php echo Yii::t('app','VAT No.'); ?><br />
                </td>

                <td>
                <?php echo Config::model()->findByPk('company.logo')->value; ?>
                
                </td>
        </tr>
</table>
<hr />
<table>	
        <tr>
                <td width="50" style="text-align:top;"><?php echo Yii::t('app','To'); ?>:</td>
                <td width="400" ><?php echo $model->company; ?></td>
                <td width="150" ><?php echo Yii::t('app','Doc. Issued date'); ?>:</td>
                <td><?php echo $model->issue_date; ?></td>
        </tr>

        <tr>
                <td></td>
                <td><?php echo $model->address; ?></td>
                <td><?php echo Yii::t('app','Due date'); ?></td>
                <td><?php echo $model->due_date; ?></td>
        </tr>
        <tr>
                <td></td>
                <td><?php echo $model->city; ?> <?php echo $model->zip; ?></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
                <td></td>
                <td><?php echo Yii::t('app','Vat No.'); ?>:<?php echo $model->vatnum; ?></td>
                <td></td>
                <td></td>
        </tr>

        <tr>
                <td colspan="4">
                        <div align="center"><h1><?php echo $model->docType->name; ?> <span style="font-size:25px;"> <?php echo Yii::t('app','No.'); ?> <?php echo $model->docnum; ?> </span>~copy~</h1></div>
                </td>
        </tr>
</table>
<div class="table">
        <div class="hrow row">
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Line'); ?></div>
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Item id'); ?></div>
                <div class="rhdata" style="width:370px;"><?php echo Yii::t('app','Name'); ?></div>
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Description'); ?></div>
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Unt. Price'); ?></div>
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Unit'); ?></div>
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Qty.'); ?></div>
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Price'); ?></div>
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Currency'); ?></div>
                
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','Total'); ?></div>
                <div class="rhdata" style="width:60px;"><?php echo Yii::t('app','VAT'); ?></div>

                
                
                
        </div>
        <?php $i=0;
  

            foreach ($model->docDetailes as $docdetail){
                //print_r($docdetail);
                //echo $this->renderPartial('docdetialview', array('model'=>$docdetail,)); 
                echo "
                <div class='row'>
                    <div class='rdata clear'>$docdetail->line</div>
                    <div class='rdata clear'>$docdetail->item_id</div>
                    <div class='rdata clear'>$docdetail->name</div>
                    <div class='rdata clear'>$docdetail->description</div>
                        
                    
                    <div class='rdata clear'>$docdetail->unit_price</div>
                    <div class='rdata clear'>".$docdetail->ItemUnit->name."</div>
                    <div class='rdata clear'>$docdetail->qty</div>    
                    <div class='rdata'>$docdetail->price</div>
                    <div class='rdata'>$docdetail->currency_id</div>
                    <div class='rdata'>$docdetail->invprice</div>
                    <div class='rdata'>$docdetail->vat</div>
                 </div>

                ";
                $i++;
            }
        ?>
        
        <div class="frow row">
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"><?php echo Yii::t('app','Subtotal tax excluded'); ?></div>
                <div class="rdata"><?php echo $model->sub_total; ?></div>
                <div class="rdata"><?php echo $model->vat; ?></div>
        </div>
        <div class="frow row">
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"><?php echo Yii::t('app','Subtotal tax exempt'); ?></div>
                <div class="rdata"><?php echo $model->novat_total; ?></div>
        </div>
        
        <div class="frow row">
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"></div>
                <div class="rdata clear"><?php echo Yii::t('app','Subtotal to pay'); ?></div>
                <div class="rdata"><?php echo $model->total; ?></div>
        </div>		
</div>


                <br />
        <?php echo Yii::t('app','Comments'); ?>: <?php echo $model->comments; ?>
        <br />
        <br />






<?php		
//$this->endWidget(); 
?>
