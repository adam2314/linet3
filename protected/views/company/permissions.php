
<div class="container">
    <div class="text-center">
        <div class="form">
            <div class="tab-content">
                <div id="chose" class="tab-pane active">

                    <?php
//$this->params["menu"]=array(
                    //array('label'=>'List Acctype','url'=>array('index')),
                    //array('label'=>Yii::t('app','Create Company'),'url'=>array('create')),
//);

                    /*
                      app\widgets\MiniForm::begin(array(
                      'header' => Yii::t('app',"Select Company"),
                      //'width' => '800',
                      )); */
                    echo Yii::t('app', "Select Company");
                    ?>

                    <?php
                    echo app\widgets\GridView::widget(array(
                        'id' => 'comp-grid',
                        'dataProvider' => $model->search([]),
                        'pjax'=>false,
                        ////'filter'=>$model,
                        //'template' => '{items}{pager}',
                        //'options'=>array('class'=>'clean'),
                        'columns' => array(
                            array(
                                'attribute' => 'id',
                                'value' => function ($data) {
                                    return $data->id;
                                },
                            ),
                            //'string',
                            array(
                                'attribute' => 'Name',
                                //'value'=>'$data->Company->getName()',
                                'value' => function ($data) {
                                    return $data->getName();
                                },
                                //'value'=>'\yii\helpers\Html::link(\yii\helpers\Html::encode($data->getName()),"#", array(  "onclick"=>\'chose("\'.$data->id.\'")\',))',
                                // echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id),'#', array(  'onclick'=>'refNum("'.$data->id.'","'.$data->docnum.'","'.$data->docType->name.'")',));
                                'format' => 'raw',
                            ),
                            array(
                                'attribute' => 'User',
                                'filter' => '',
                                'value' => function ($data) {
                                    return $data->user->username;
                                },
                            ),
                            //array('value'=>'$data->getLevel()->level_id'),
                            //array('value'=>'$data->level->level_id'),
                            //array('value'=>'$data->level[0]->level_id'),
                            //'desc',
                            //'openformat',
                            array(
                                //'text'=>'Action',
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}',
                                'buttons' => array(
 
                                    'delete' => function ($url, $model, $key) {
                                $url = yii\helpers\BaseUrl::base() . "/company/deletepermission/" . $model->id;
                                return yii\helpers\Html::a('<i class="glyphicon glyphicon-remove"></i>', $url );//,['data-method' => 'post', 'data-confirm' => 'Are you sure you want to delete this item?']
                                //'url' => 'yii\helpers\BaseUrl::base().("accounts/update", array("id"=>$data->id))',
                            },
                                ),
                            ),
                        ),
                    ));

                    //app\widgets\MiniForm::end(); 
                    ?>






                </div><!-- tab-pane -->
            </div><!-- tab-content -->
        </div><!-- form -->
    </div><!-- text-center -->
</div><!-- container -->



<script type="text/javascript">
    function edit(obj) {
        var id = obj.getAttribute("href")
        $.post("<?php echo yii\helpers\BaseUrl::base() . ('/company/index'); ?>", {Company: id}, function (data) {
            //alert( "Data Loaded: " + data );
            window.location = "<?php echo yii\helpers\BaseUrl::base() . ('/settings/admin'); ?>";

        });

    }

    function chose(id) {//shuld be dashboard
        //var id = obj.getAttribute("href")
        $.post("<?php echo yii\helpers\BaseUrl::base() . ('/company/index'); ?>", {Company: id}, function (data) {
            //alert( "Data Loaded: " + data );
            window.location = "<?php echo yii\helpers\BaseUrl::base() . ('/settings/dashboard'); ?>";

        });

    }

</script>




<?php
//$this->params["menu"]=array(
//array('label'=>Yii::t('app','List Acctype'),'url'=>array('index')),
//array('label'=>Yii::t('app','Create Acctype'),'url'=>array('create')),
//);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Add User"),
        //'width' => '800',
));
?>
<?php
echo $this->render('_addUser', array('user' => $user));


app\widgets\MiniForm::end();
?>