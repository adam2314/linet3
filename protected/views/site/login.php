<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>


<?php
//$this->pageTitle=Yii::$app->name . ' - Login';
?>

<div class="container">

                <div id="login" class="centered">
                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'enableClientValidation' => true,
                                'options' => ['class' => 'form-horizontal'],
                                'fieldConfig' => [
                                    //'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                    //'labelOptions' => ['class' => 'col-lg-1 control-label'],
                                ],
                    ]);
                    ?>



                    <?= $form->field($model, 'username') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?=
                    $form->field($model, 'rememberMe', [
                        //'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ])->checkbox()
                    ?>


                    <?php //echo $form->labelEx($model,'username',array('class'=>"text-muted text-center")); ?>
                    <?php //echo $form->error($model,'username');   ?>
                    <?php //echo $form->textField($model,'username',array('class'=>"form-control","placeholder"=>Yii::t('app','Username')));   ?>


                    <?php //echo $form->passwordField($model,'password',array('class'=>"form-control","placeholder"=>Yii::t('app','Password')));   ?>
                    <?php //echo $form->error($model,'password');   ?>


                    <?php //echo $form->checkBox($model,'rememberMe',array('class'=>"text-muted text-center")); ?>
                    <?php //echo $form->label($model,'rememberMe');   ?>
                    <?php //echo $form->error($model,'rememberMe');   ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                        </div>
                    </div>


                    <?php ActiveForm::end(); ?>
                </div><!-- tab-pane -->

</div><!-- container -->