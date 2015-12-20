
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

                    use yii\helpers\Html;
                    use app\models\Company;
                    ?>

                    <?php
                    echo app\widgets\GridView::widget(array(
                        'id' => 'comp-grid',
                        'dataProvider' => $model->dp(),
                        ////'filter'=>$model,
                        //'template' => '{items}{pager}',
                        //'options'=>array('class'=>'clean'),
                        'columns' => array(
                            [
                                'value' => function ($data) {
                                    return \yii\helpers\Html::a(
                                                    \yii\helpers\Html::encode($data->id), "#", ['onclick' => 'onClick:bla']);
                                },
                                        //'value'=>',
                                        'format' => 'html',
                                    ],
                                    //'string',
                                    [
                                        'value' => function ($data) {
                                            return \yii\helpers\Html::a(
                                                            \yii\helpers\Html::encode($data->getName()), "#", ['onclick' => 'onClick:bla']);
                                        },
                                                //'value'=>',
                                                'format' => 'html',
                                            ],
                                            //array('value'=>'$data->level->level_id'),
                                            array(
                                                //'text'=>'Action',
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{edit}{permissions}{delete}',
                                                'buttons' => array(
                                                    'edit' => function ($url, $model, $key) {
                                                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', "javascript:edit($model->id);");
                                                    },
                                                    'permissions' => function ($url, $model, $key) {
                                                        return Html::a("<span class='glyphicon glyphicon-lock'></span>", yii\helpers\BaseUrl::base() . "/company/permissions/" . $model->id);
                                                    },
                                                    'delete' => function ($url, $model, $key) {
                                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', yii\helpers\BaseUrl::base() . "/company/delete/" . $model->id);
                                                    },
                                                ),
                                            ),
                                        ),
                                    ));

                                    //app\widgets\MiniForm::end(); 
                                    ?>


                                    <div class="form-actions">


                                        <?= Html::a(Yii::t('app', 'Create Company'), ['company/create'], ['class' => 'btn btn-lg btn-success btn-block', 'name' => 'create']) ?>

                                    </div>      



                                </div><!-- tab-pane -->
                            </div><!-- tab-content -->
                        </div><!-- form -->
                    </div><!-- text-center -->
                </div><!-- container -->

<?php
    $this->registerJs("$('.chose').click(function (e) {
                e.preventDefault();
                chose($(this).attr('href'));
                return false;
            });", \yii\web\View::POS_READY);



?>

                <script type="text/javascript">
                    function edit(obj) {
                        var id = obj;//.getAttribute("href");
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