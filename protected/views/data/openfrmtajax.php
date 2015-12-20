<?php
$this->params["menu"] = array(
        array('label'=>Yii::t('app','Print'),'url'=>'','linkOptions'=>['id'=>'printThis']),
        //array('label'=>'Manage AccTemplate','url'=>array('admin')),
);
?>
<?php
app\widgets\MiniForm::begin(array('header' => Yii::t("app", "Open Format")));
?>
<div class="page">
    <h3><?= Yii::t('app','Open Format Files extraction for');?>:</h3>
    <p><?= Yii::t('app','Busness ID No.');?>: <?= \app\helpers\Linet3Helper::getSetting('company.vat.id'); ?></p>
    <p><?= Yii::t('app','Busness Name');?>: <?= \app\helpers\Linet3Helper::getSetting('company.name'); ?></p>
    <center><p><?= Yii::t('app','Open Format extraction succeded');?></p></center>
    <p><?= Yii::t('app','Files are in Following links');?>:

    <a href="<?= yii\helpers\BaseUrl::base().('/download/'.$model->iniId);?>">ini.txt</a>,
    <a href="<?= yii\helpers\BaseUrl::base().('/download/'.$model->bkmvId);?>">bkmvdata.txt</a>
    </p>
    <p>
        <?= Yii::t('app','From Date');?>: <?= $model->from_date; ?> 
        <?= Yii::t('app','To Date');?>: <?= $model->to_date; ?> 
    </p>
    <p><?= Yii::t('app','Details of Total records in bkmvdata.txt file');?>:</p>
    <div>
        <?= app\widgets\GridView::widget( array(
            'id'=>'profloss-grid',
            'dataProvider'=>$model->bkmvTable(),
            //'template' => '{items}{pager}',
            ////'filter'=>$model,
            'columns'=>array(
                    array(
                        'header'=>Yii::t('app','ID'),
                        'attribute'=>'id',
                    ),
                    array(
                        'header'=>Yii::t('app','Name'),
                        'attribute'=>'name',
                    ),
                    array(
                        'header'=>Yii::t('app','Count'),
                        'attribute'=>'count',
                    ),

            ),
    )); 
    ?>
    </div>

    <p><?= Yii::t('app','Data extracted through');?>: Linet <?= \app\helpers\Linet3Helper::getVersion(); ?></p>
    <p><?= Yii::t('app','Registration Certificate No.');?>: <?= \app\helpers\Linet3Helper::getSetting('system.auth'); ?></p>
    <p><?= Yii::t('app','Extraction date and time');?>: <?= Yii::$app->formatter->asDate(time(),(app\models\Docs::DATETIME_FORMAT));?></p>
    <br />


</div>



<div>
    <h3><?= Yii::t('app','Open Format Files extraction for');?>:</h3>
    <p><?= Yii::t('app','Busness ID No.');?>: <?= \app\helpers\Linet3Helper::getSetting('company.vat.id'); ?></p>
    <p><?= Yii::t('app','Busness Name');?>: <?= \app\helpers\Linet3Helper::getSetting('company.name'); ?></p>
    <p>
        <?= Yii::t('app','From Date');?>: <?= $model->from_date; ?> 
        <?= Yii::t('app','To Date');?>: <?= $model->to_date; ?> 
    </p>
    <div style=" width: 40%;">
        <?php

        echo app\widgets\GridView::widget( array(
            'id'=>'profloss-grid',
            'dataProvider'=>$model->docsTable(),
            //'template' => '{items}{pager}',
            ////'filter'=>$model,
            'columns'=>array(
                     array(
                        'header'=>Yii::t('app','ID'),
                        'attribute'=>'id',
                    ),
                
                   array(
                        'header'=>Yii::t('app','Name'),
                        'attribute'=>'name',
                    ),
                array(
                        'header'=>Yii::t('app','Count'),
                        'attribute'=>'count',
                    ),
                array(
                        'header'=>Yii::t('app','Sum'),
                        'attribute'=>'sum',
                    ),

            ),
    )); //*/
    ?>
    </div>

    <p><?= Yii::t('app','Data extracted through');?>: Linet <?= \app\helpers\Linet3Helper::getVersion(); ?></p>
    <p><?= Yii::t('app','Registration Certificate No.');?>: <?= \app\helpers\Linet3Helper::getSetting('system.auth'); ?></p>
    <p><?= Yii::t('app','Extraction date and time');?>: <?php  echo Yii::$app->formatter->asDate(time(),(app\models\Docs::DATETIME_FORMAT)); ?></p>
    <br />
</div>
<?php
app\widgets\MiniForm::end();

$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
        '$("#printThis").click(function (e) {e.preventDefault();window.print();});'
        , \yii\web\View::POS_READY);
?>
