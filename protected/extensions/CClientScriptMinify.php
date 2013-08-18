<?php
/**
 * CClientScriptMinify class file, minify JavaScript and CSS stylesheets for views
 *
 * @author Frank Liu <frank@orite.com>
 * @link http://www.yiiframework.com/extensions
 * @license http://www.yiiframework.com/license/
 */

class CClientScriptMinify extends CClientScript
{
	
	/**
	 * @var string path to the minify controller.
	 */
	public $minifyController="/minify";

	private $_minifyGroups;
	private $_minifyGroupsUpdated = false;

	public function __construct()
	{
		$mgv = Yii::app()->getRuntimePath()."/minifyGroups.var";
		if(!is_file($mgv)){
			file_put_contents($mgv, serialize(array()));
		}
		$this->_minifyGroups = unserialize(file_get_contents($mgv));
	}

	public function render(&$output)
	{
		parent::render($output);

		if($this->_minifyGroupsUpdated){
			file_put_contents(Yii::app()->getRuntimePath()."/minifyGroups.var", serialize($this->_minifyGroups));
		}
	}

	private function md5Group($urls, $type='js'){
		$miniurl = md5(implode(",", $urls)).".".$type;
		$this->_minifyGroupsUpdated = $this->_minifyGroupsUpdated || empty($this->_minifyGroups[$miniurl]);
		$this->_minifyGroups[$miniurl] = $urls;
		return $miniurl;
	}

	public function renderHead(&$output)
	{
		$cssFiles = array();
		if(!empty($this->cssFiles)){
			foreach($this->cssFiles as $url=>$media){
				$cssFiles[$media][] = $url;
			}
			$this->cssFiles = array();
			foreach($cssFiles as $media=>$urls){
				$this->cssFiles[$this->minifyController."/".$this->md5Group($urls, "css")] = $media;
			}
		}

		if($this->enableJavaScript){
			if(isset($this->scriptFiles[self::POS_HEAD])){
				$this->scriptFiles[self::POS_HEAD] = array($this->minifyController."/".$this->md5Group($this->scriptFiles[self::POS_HEAD], "js"));
			}
		}
		parent::renderHead($output);
	}

	public function renderBodyBegin(&$output)
	{
		if(isset($this->scriptFiles[self::POS_BEGIN])){
			$this->scriptFiles[self::POS_BEGIN] = array($this->minifyController."/".$this->md5Group($this->scriptFiles[self::POS_BEGIN], "js"));
		}
		parent::renderBodyBegin($output);
	}

	public function renderBodyEnd(&$output)
	{
		if(isset($this->scriptFiles[self::POS_END])){
			$this->scriptFiles[self::POS_END] = array($this->minifyController."/".$this->md5Group($this->scriptFiles[self::POS_END], "js"));
		}

		parent::renderBodyEnd($output);
	}
	
	public function absolutizeURL($url){
		return dirname(Yii::app()->request->getScriptFile()).str_replace(Yii::app()->request->getBaseUrl(), '', $url);
	}

	public function getCoreScriptUrl()
	{
		return $this->absolutizeURL(parent::getCoreScriptUrl());
	}

	public function registerCssFile($url,$media='')
	{
		parent::registerCssFile($this->absolutizeURL($url),$media);
	}

	public function registerScriptFile($url,$position=self::POS_HEAD)
	{
		parent::registerScriptFile($this->absolutizeURL($url),$position);
	}

}
