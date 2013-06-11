<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class RightsController extends RController{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	 public $menu=array();
	 /**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	 public $breadcrumbs=array();
	
	 public $layout='//layouts/column2';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'rights', // perform access control for CRUD operations
		);
	}
	public function init()	{
		$uri = 'path to your controller-specific css';
		/*
	
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
		<![endif]-->
	
	
		*/
			
		//Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/yourscript.js');
		return parent::init();
	}
	
	
	/**
	 * Denies the access of the user.
	 * @param string $message the message to display to the user.
	 * This method may be invoked when access check fails.
	 * @throws CHttpException when called unless login is required.
	 */
	public function accessDenied($message=null)
	{
		if( $message===null )
			$message = Rights::t('core', 'You are not authorized to perform this action.?');
	
		$user = Yii::app()->getUser();
		if( $user->isGuest===true )
			$user->loginRequired();
		else
			throw new CHttpException(403, $message);
	}
	
	
	
	
	
}