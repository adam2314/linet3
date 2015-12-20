<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//use app\models\Menu;

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
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
	<link href="../assets/img/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
	<link href="../assets/img/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
	<link href="../assets/img/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
	<link href="../assets/img/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
	<link href="../assets/img/icon-hires.png" rel="icon" sizes="192x192" />
	<link href="../assets/img/icon-normal.png" rel="icon" sizes="128x128" />
        <link href="../assets/img/icon-normal.png" rel="shortcut icon" >

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">
            
            
       
            <img width="100px" alt="logo" src="<?php echo yii\helpers\BaseUrl::base() . ("/../assets/img/logo.png"); ?>">

            <div class="row">
                <div id='mainPage' class="col-lg-12">
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


        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

