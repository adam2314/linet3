<?php


$config=require_once(dirname(__FILE__).'/protected/config/console.php');
defined( 'STDIN' ) or define( 'STDIN', fopen( 'php://stdin', 'r' ) );
defined( 'STDOUT' ) or define( 'STDOUT', fopen( 'php://stdout', 'w' ) );

$application = new yii\console\Application($config);

$exitCode = Yii::$app->run();
//$exitCode = $application->run();
$result=Yii::$app->runAction('migrate/up', ['interactive' => false]);
//\Yii::$app = $oldApp;
if($result)
	var_dump($result);