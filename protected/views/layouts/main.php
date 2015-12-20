<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Menu;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
	<link href="/assets/img/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
	<link href="/assets/img/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
	<link href="/assets/img/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
	<link href="/assets/img/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
	<link href="/assets/img/icon-hires.png" rel="icon" sizes="192x192" />
	<link href="/assets/img/icon-normal.png" rel="icon" sizes="128x128" />
        <link href="/assets/img/icon-normal.png" rel="shortcut icon" >
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            kartik\icons\Icon::map($this);
            ?>
            <a id="changeSidebarPos" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Show / Hide Sidebar" data-placement="bottom">
                <?= kartik\icons\Icon::show('expand'); ?>
            </a>

            <?php
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => Menu::buildUserMenu(),
            ]);
            ?>
            <img width="100px" alt="logo" src="<?php echo yii\helpers\BaseUrl::base() . ("/assets/img/logo.png"); ?>">
            <?php NavBar::end(); ?>
            <div class="row">
                <div id='sidebar' class="col-md-2">
                    <a class='block' href="<?php echo yii\helpers\BaseUrl::base() . ('/settings/dashboard'); ?>">
                        <?php
            if(\app\helpers\Linet3Helper::hasLogo()){
                echo Html::img(\app\helpers\Linet3Helper::getLogo(),['width'=>'100px']);
            }else{
                echo Html::tag('h7',\app\helpers\Linet3Helper::getSetting('company.name'));
            }
            ?>
                        
                        <!--<span class="label user-label">16</span>-->
                    </a>



                    <div class="media-body hidden-tablet">
                        <!--<h5 class="media-heading"><?php //echo Yii::$app->user->fname . " " . Yii::app()->user->lname;   ?></h5>-->
                        <ul class="unstyled user-info">
                            <li>
                                <a href="<?php echo yii\helpers\BaseUrl::base() . ('/users/update/' . Yii::$app->user->id); ?>"><?= Yii::$app->user->getParam("username"); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo yii\helpers\BaseUrl::base() . ('/site/logout'); ?>"><?php echo Yii::t('app', 'Logout'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo yii\helpers\BaseUrl::base() . ('/company/index'); ?>"><?php echo Yii::t('app', 'Change Company'); ?></a>
                            </li>

                        </ul>
                    </div>

                    <?=
                    Nav::widget([
                        'items' => isset($this->params['menu']) ? $this->params['menu'] : [],
                        'options' => ['class' => 'list'],
                    ])
                    ?>
                    <?=
                    Breadcrumbs::widget([
                        'links' => []//isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>

                </div>
                <div id='mainPage' class="col-md-10">
                    <?= yii\bootstrap\Alert::widget() ?>
                    <?php
                    foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                        echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
                    }
                    ?>

                    <?= $content ?>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">מונע על ידי מחשוב מהיר <?= date('Y') ?></p>
                <p class="pull-right">נכתב על ידי אדם בן חור</p>
                <a href="http://www.speedcomp.co.il/">www.speedcomp.co.il</a>
            </div>
        </footer>

        <?php
        $java = <<<JS
   $('#sidebar').bind('hide',function(){
       
        $('#sidebar').hide(1000);
        $( "#mainPage" ).removeClass("col-md-10");
        $( "#mainPage" ).toggleClass("col-md-12");
        
   
   });
        
   $('#sidebar').bind('show',function(){
       $( "#mainPage" ).removeClass("col-md-12");
       $( "#mainPage" ).toggleClass("col-md-10");
       $('#sidebar').show(1000);
   
   });     
        
   $('#changeSidebarPos').click(function(){
       

        if($( "#mainPage" ).hasClass("col-md-10")){
            $('#sidebar').trigger('hide');
        }else{
            $('#sidebar').trigger('show');
        }
   });
        
JS;
        $this->registerJs($java
                , \yii\web\View::POS_END);
        ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

