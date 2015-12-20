<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\PrintAsset;
/* 
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

use app\assets\PrintAsset;
use app\models\Menu;
*/
/* @var $this \yii\web\View */
/* @var $content string */

//

if(!\app\helpers\Linet3Helper::isConsole()){
    //$base=yii\helpers\BaseUrl::base();
    PrintAsset::register($this);
    AppAsset::register($this);
    //$logopath = $base."/site/download/" . Linet3Helper::getSetting('company.logo');
}else {   //console

    $this->registerCssFile(Yii::$app->params['url']."/css/print.css");//Yii::$app->basePath.
    $this->registerCssFile(Yii::$app->params['url']."/css/site.css");
    if (\Yii::$app->language== 'he_il') {
        $this->registerCssFile(Yii::$app->params['url']."/css/print-rtl.css");
        $this->registerCssFile(Yii::$app->params['url']."/css/site-rtl.css");
    }

}



?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="<?= Yii::$app->charset ?>"/>
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

<?php 
//$baseUrl=Yii::$app->request->baseUrl;

        //Yii::$app->clientScript->registerCSSFile(yii\helpers\BaseUrl::base().('/assets/css/print.css'));
        //Yii::$app->clientScript->registerCSSFile(yii\helpers\BaseUrl::base().('/assets/lib/Font-Awesome/css/font-awesome.min.css'));
        //Yii::$app->clientScript->registerScriptFile($baseUrl.'/assets/2f2fedc0/jquery.js');
        //Yii::$app->clientScript->registerCSSFile(yii\helpers\BaseUrl::base().('/assets/css/linet.css'));

?>
 	<title><?= Html::encode($this->title) ?> - Print</title>
      
<?php $this->head() ?>
    </head>
    <body>

            <?php $this->beginBody() ?>
        <?php echo $content; ?>
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
