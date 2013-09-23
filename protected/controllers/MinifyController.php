<?php
/**
 * Front controller for Yii Minify
**/

class MinifyController extends CController
{
	private $_debug = false;
	private $_errorLogger = false;
	private $_cacheFileLocking = true;
	private $_bubbleCssImports = false;
	private $_encodeOutput = true;
	private $_encodeMethod = 'gzip';
	private $_maxAge = 1800;
	private $_symlinks = array();

	public function actionIndex()
	{
		$incPath = get_include_path();
		$docRoot = $_SERVER['DOCUMENT_ROOT'];
		$_SERVER['DOCUMENT_ROOT'] = dirname(Yii::app()->request->getScriptFile());
		set_include_path(Yii::app()->getExtensionPath()."/minify" . PATH_SEPARATOR . $incPath);
		require 'Minify.php';
		$option['debug'] = $this->_debug;
		$option['maxAge'] = $this->_maxAge;
		$option['bubbleCssImports'] = $this->_bubbleCssImports;
		$option['encodeOutput'] = $this->_encodeOutput;
		$option['encodeMethod'] = $this->_encodeMethod;
		foreach ($this->_symlinks as $link => $target) {
			$link = str_replace('//', realpath($_SERVER['DOCUMENT_ROOT'])."/", $link);
			$link = strtr($link, '/', DIRECTORY_SEPARATOR);
			$option['minifierOptions']['text/css']['symlinks'][$link] = realpath($target);
		}
		Minify::setCache(Yii::app()->getRuntimePath(), $this->_cacheFileLocking);
		if ($this->_errorLogger) {
			require_once 'Minify/Logger.php';
			require_once 'FirePHP.php';
			Minify_Logger::setLogger(FirePHP::getInstance(true));
		}
		$mgv = Yii::app()->getRuntimePath()."/minifyGroups.var";
		$minifyGroups = unserialize(file_get_contents($mgv));
		$option['files'] = $minifyGroups[$_GET['group']];
		Minify::serve('Files', $option);
		set_include_path($incPath);
		$_SERVER['DOCUMENT_ROOT'] = $docRoot;
	}

}
