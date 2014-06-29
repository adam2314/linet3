<?php

class SiteController extends Controller {
    //public $layout='//layouts/noMenu';
    /**
     * Declares class-based actions.
     */
    /*
      public function actions()
      {
      return array(
      // captcha action renders the CAPTCHA image displayed on the contact page
      'captcha'=>array(
      'class'=>'CCaptchaAction',
      'backColor'=>0xFFFFFF,
      ),
      // page action renders "static" pages stored under 'protected/views/site/pages'
      // They can be accessed via: index.php?r=site/page&view=FileName
      'page'=>array(
      'class'=>'CViewAction',
      ),
      );
      } */

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    /*
      public function actionIndex()
      {
      // renders the view file 'protected/views/site/index.php'
      // using the default layout 'protected/views/layouts/main.php'
      //Yii::app()->user->setState('company', 'main');
      //$this->render('index');
      } */

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = '//layouts/clean';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    
      public function actionSupport()  {
         $this->redirect("http://www.linet.org.il/support/paid-support");
         exit;
      $model=new ContactForm;
      if(isset($_POST['ContactForm']))
      {
      $model->attributes=$_POST['ContactForm'];
      if($model->validate())
      {
      $headers="From: {$model->email}\r\nReply-To: {$model->email}";
      mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
      Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
      $this->refresh();
      }
      }
      $this->render('contact',array('model'=>$model));
      }// */

    /**
     * Displays the login page
     */
    public function actionLogin() {

        $model = new FormLogin;
        $this->layout = '//layouts/clean';
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['FormLogin'])) {
            $model->attributes = $_POST['FormLogin'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionBug() {
        //$this->layout = '//layouts/clean';

        $model = new Bug();
        $dataProvider=new CActiveDataProvider('Bug');
        if (isset($_POST['Bug'])) {
            $model->attributes = $_POST['Bug'];
            
            $url=$model->send();
            //$this->redirect();
        }

        $this->render('bug', array(
            'model' => $model,
            'dataProvider'=>$dataProvider,
        ));
    }
    
    public function actionAbout() {
        //$this->layout = '//layouts/clean';

        $this->render('pages/about', array(
            
        ));
    }
    
    

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
