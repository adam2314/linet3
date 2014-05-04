

<div class="page">
    <h3><?php echo Yii::t('app','Open Format Files extraction for');?>:</h3>
    <p><?php echo Yii::t('app','Busness ID No.');?>: <?php echo Yii::app()->user->settings['company.vat.id']; ?></p>
    <p><?php echo Yii::t('app','Busness Name');?>: <?php echo Yii::app()->user->settings['company.name']; ?></p>
    <center><p><?php echo Yii::t('app','Open Format extraction succeded');?></p></center>
    <p><?php echo Yii::t('app','Files are in Following links');?>:

    <a href="<?php echo Yii::app()->createAbsoluteUrl('/download/'.$model->iniId);?>">ini.txt</a>,
    <a href="<?php echo Yii::app()->createAbsoluteUrl('/download/'.$model->bkmvId);?>">bkmvdata.txt</a>
    </p>
    <p>
        <?php echo Yii::t('app','From Date');?>: <?php echo $model->from_date; ?> 
        <?php echo Yii::t('app','To Date');?>: <?php echo $model->to_date; ?> 
    </p>
    <p><?php echo Yii::t('app','Details of Total records in bkmvdata.txt file');?>:</p>
    <div>
        <?php $this->widget('bootstrap.widgets.TbGridView', array(
            'id'=>'profloss-grid',
            'dataProvider'=>$model->bkmvTable(),
            'template' => '{items}{pager}',
            //'filter'=>$model,
            'columns'=>array(
                    array(
                        'header'=>Yii::t('app','ID'),
                        'value'=>'$data["id"]',
                    ),
                    array(
                        'header'=>Yii::t('app','Name'),
                        'value'=>'$data["name"]',
                    ),
                    array(
                        'header'=>Yii::t('app','Count'),
                        'value'=>'$data["count"]',
                    ),

            ),
    )); 
    ?>
    </div>

    <p><?php echo Yii::t('app','Data extracted through');?>: <?php echo Yii::app()->user->settings['system.name']; ?></p>
    <p><?php echo Yii::t('app','Registration Certificate No.');?>: <?php echo Yii::app()->user->settings['system.auth']; ?></p>
    <p><?php echo Yii::t('app','Extraction date and time');?>: <?php echo date(Yii::app()->locale->getDateFormat('phpdatetime')) ?></p>
    <br />


</div>



<div>
    <h3><?php echo Yii::t('app','Open Format Files extraction for');?>:</h3>
    <p><?php echo Yii::t('app','Busness ID No.');?>: <?php echo Yii::app()->user->settings['company.vat.id']; ?></p>
    <p><?php echo Yii::t('app','Busness Name');?>: <?php echo Yii::app()->user->settings['company.name']; ?></p>
    <p>
        <?php echo Yii::t('app','From Date');?>: <?php echo $model->from_date; ?> 
        <?php echo Yii::t('app','To Date');?>: <?php echo $model->to_date; ?> 
    </p>
    <div style=" width: 40%;">
        <?php

        $this->widget('bootstrap.widgets.TbGridView', array(
            'id'=>'profloss-grid',
            'dataProvider'=>$model->docsTable(),
            'template' => '{items}{pager}',
            //'filter'=>$model,
            'columns'=>array(
                     array(
                        'header'=>Yii::t('app','ID'),
                        'value'=>'$data["id"]',
                    ),
                
                   array(
                        'header'=>Yii::t('app','Name'),
                        'value'=>'$data["name"]',
                    ),
                array(
                        'header'=>Yii::t('app','Count'),
                        'value'=>'$data["count"]',
                    ),
                array(
                        'header'=>Yii::t('app','Sum'),
                        'value'=>'$data["sum"]',
                    ),

            ),
    )); //*/
    ?>
    </div>

    <p><?php echo Yii::t('app','Data extracted through');?>: <?php echo Yii::app()->user->settings['system.name']; ?></p>
    <p><?php echo Yii::t('app','Registration Certificate No.');?>: <?php echo Yii::app()->user->settings['system.auth']; ?></p>
    <p><?php echo Yii::t('app','Extraction date and time');?>: <?php echo date(Yii::app()->locale->getDateFormat('phpdatetime')) ?></p>
    <br />
</div>
