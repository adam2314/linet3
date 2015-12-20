

    <div class="text-center">
        <div class="form">
            <div class="tab-content">
                <div id="chose" class="tab-pane active">

                    <?php
                    echo Yii::t('app', "Select Company");
                    ?>

                    <?php

                    use yii\data\ActiveDataProvider;
                    use yii\helpers\Html;
                    use app\models\Company;

$dataProvider = new ActiveDataProvider([
                        'query' => Company::find(),
                        'pagination' => [
                            'pageSize' => 20,
                        ],
                    ]);
                    echo app\widgets\GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'id',
                            [
                                'value' => function ($data) {
                                    return \yii\helpers\Html::a(
                                                    \yii\helpers\Html::encode($data->getName()), $data->id, ['class' => 'chose']);
                                },
                                        //'value'=>',
                                        'format' => 'html',
                                    ],
                                ],
                            ]);



                            /*
                              echo app\widgets\GridView::widget(array(
                              'id'=>'comp-grid',
                              'dataProvider'=>$model->dp(),
                              ////'filter'=>$model,
                              'template' => '{items}{pager}',
                              'options'=>array('class'=>'clean'),
                              'columns'=>array(
                              array('value'=>'$data->id'),
                              array(

                              'value'=>'\yii\helpers\Html::link(\yii\helpers\Html::encode($data->getName()),"#", array(  "onclick"=>\'chose("\'.$data->id.\'")\',))',
                              'type'=>'raw',

                              ),

                              ),
                              ));
                             */
                            //app\widgets\MiniForm::end(); 
                            ?>


                            <div class="form-actions">

                            <?= Html::a(Yii::t('app', 'Admin'), ['company/admin'], ['class' => 'btn btn-lg btn-success btn-block', 'name' => 'admin']) ?>
        <?php //'url'=>array('/company/admin'),  ?>
                            </div>      


                        </div><!-- tab-pane -->
                    </div><!-- tab-content -->
                </div><!-- form -->
            </div><!-- text-center -->


<?php

$home=Yii::$app->user->getParam("home");
if($home==''){
    $home='/settings/dashboard';
    
}


    $auto=isset($_GET['auto'])?1:0;
    $company=Yii::$app->user->getParam("company");


    $this->registerJs("$('.chose').click(function (e) {
                e.preventDefault();
                chose($(this).attr('href'));
                return false;
                

            });
            if(auto)
                chose($auto);

            ", \yii\web\View::POS_READY);


?>

        <script type="text/javascript">
            
            var auto=<?=$auto ?>;
            var company=<?=(int)$company ?>;
            function edit(obj) {
                var id = obj.getAttribute("href");
                $.post("<?php echo yii\helpers\BaseUrl::base() . ('/company/index'); ?>", {Company: id}, function (data) {
                    //alert( "Data Loaded: " + data );
                    window.location = "<?php echo yii\helpers\BaseUrl::base() . ('/settings/admin'); ?>";

                });

            }
            
            function chose(id) {//shuld be dashboard
                //var id = obj.getAttribute("href")
                $.post("<?php echo \yii\helpers\BaseUrl::base() . ('/company/index'); ?>", {Company: id}, function (data) {
                    //alert( "Data Loaded: " + data );
                    //console.log(data);

                    window.location = "<?php echo yii\helpers\BaseUrl::base() . $home; ?>";

        });

    }



</script>