<?php
$this->pageTitle=Yii::app()->name . ' - Login';

?><br /><br />
<div class="text-center">      
    <a href="http://www.linet.org.il" >
        <img src="<?php echo Yii::app()->createAbsoluteUrl('/assets/img/logo.png');?>" alt="">
    </a>
</div>
<div class="container">
    <div class="text-center">
        <div class="form">
            <div class="tab-content">
                <div id="login" class="tab-pane active">
            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableClientValidation'=>true,
                    'htmlOptions'=>array(
                        'class'=>"form-signin",
                        ),
                    'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                    ),
            )); ?>



                            <?php echo $form->labelEx($model,'username',array('class'=>"text-muted text-center")); ?>
                            <?php echo $form->error($model,'username'); ?>
                            <?php echo $form->textField($model,'username',array('class'=>"form-control","placeholder"=>Yii::t('app','Username'))); ?>
                            

                            <?php //echo $form->labelEx($model,'password',array('class'=>"text-muted text-center")); ?>
                            <?php echo $form->passwordField($model,'password',array('class'=>"form-control","placeholder"=>Yii::t('app','Password'))); ?>
                            <?php echo $form->error($model,'password'); ?>


                            <?php //echo $form->checkBox($model,'rememberMe',array('class'=>"text-muted text-center")); ?>
                            <?php //echo $form->label($model,'rememberMe'); ?>
                            <?php //echo $form->error($model,'rememberMe'); ?>

                    <div class="form-actions">
                            <?php $this->widget('bootstrap.widgets.TbButton', array(
                                    'buttonType'=>'submit',
                                    'type'=>'primary',
                                    'label'=>Yii::t('app','Login'),
                                'htmlOptions'=>array(
                                    'class'=>"btn btn-lg btn-primary btn-block"
                                    ),
                            )); ?>
                    </div>


            <?php $this->endWidget(); ?>
                </div><!-- tab-pane -->
            </div><!-- tab-content -->
        </div><!-- form -->
    </div><!-- text-center -->
</div><!-- container -->