<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\components\RightsController;
use app\models\Transactions;
use app\models\Acctype;
use app\models\Accounts;
use app\models\AccountsSearch;

class AccountsController extends RightsController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        var_dump($this->company);
        return $this->render('view', array(
                    'model' => $this->findModel($id),
        ));
    }

    public function actionTransaction($id = 200) {
        $model = new Transactions();
        //$model->unsetAttributes();
        $model->scenario = 'search';
        $model->load(Yii::$app->request->get());
        $model->account_id = $id;
        return $this->render('transaction', array('model' => $model, 'account' => $this->findModel($id)));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
        public function actionCreate($type = 0,$parent_account_id=0) {
        $model = new Accounts(['type' => (int)$type,'parent_account_id'=>(int)$parent_account_id]);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(Yii::$app->request->post('ajax')!==null)
                return \app\helpers\Response::send (200,$model);
            //$model->deleteEavAttributes();
            //if (isset($_POST['AccounteavE']) && isset($_POST['AccounteavE'])) {
            //    $model->setEavAttributes(array_combine($_POST['AccounteavE'], $_POST['AccounteavV']));
            //}
            if(!$this->hasCallback())
                return $this->redirect(array('accounts/admin/' . $model->type));
        }
        if(Yii::$app->request->post('ajax')!==null)
            return \app\helpers\Response::send (501,$model->errors);

        //$model->accType = Acctype::findOne((int) $type);
        //$model->type = $type;
        return $this->render('create', array(
                    'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {//$prefix
//print 'in action';
//\Yii::$app->getSession()->setFlash('error', 'unable to change sys account');
//\Yii::$app->getSession()->setFlash('success', '<strong>Well done!</strong> You successfully read this important alert message.');
//\Yii::$app->getSession()->setFlash('info', '<strong>Heads up!</strong> This alert needs your attention, but it\'s not super important.');
//\Yii::$app->getSession()->setFlash('warning', '<strong>Warning!</strong> Best check yo self, you\'re not looking too good.');
//\Yii::$app->getSession()->setFlash('error', '<strong>Oh snap!</strong> Change a few things up and try submitting again.');
        $model = $this->findModel($id);
        if ($model->system_acc == 1) {
            \Yii::$app->getSession()->setFlash('error', Yii::t('app', 'unable to edit, it is a system account'));
        }



        // && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            //$model->attributes = $_POST['Accounts'];
            if ($model->system_acc == 1) {
                \Yii::$app->getSession()->setFlash('error', Yii::t('app', 'unable to edit, it is a system account'));
            } else {
                if (isset($_POST['propertiesE']) && isset($_POST['propertiesV'])) {
                    $model->properties = array_combine($_POST['propertiesE'], $_POST['propertiesV']); ////saveEavAttributes
                    $model->save();
                }
                if ($model->save()) {
                    if(!$this->hasCallback())
                        \Yii::$app->getSession()->setFlash('success', Yii::t('app', "account saved"));
                } else {
                    \Yii::$app->getSession()->setFlash('error', Yii::t('app', "unable to save"));
                }
            }
        }

        return $this->render('update', array(
                    'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {


        $model = $this->findModel($id);

        if ($model->system_acc == 1) {
            //$level = 'error';
            //$text = Yii::t('app', "unable to delete, it is a system account");
            \Yii::$app->getSession()->setFlash('error', Yii::t('app', "unable to delete, it is a system account"));
        } else {


            if ($model->delete()) {
                //$level = 'success';
                //$text = Yii::t('app', "unable to delete, the account has transactions");
                \Yii::$app->getSession()->setFlash('success', Yii::t('app', "unable to delete, the account has transactions"));
            } else {
                //$level = 'error';
                //$text = Yii::t('app', "unable to delete, the account has transactions");
                \Yii::$app->getSession()->setFlash('error', Yii::t('app', "unable to delete, the account has transactions"));
            }
        }

        //echo "<div class='alert in alert-block fade alert-$level'><a data-dismiss='alert' class='close'>×</a>$text</div>"; //flash 
        //Yii::$app->end();

        return $this->actionAdmin();
    }

    public function actionSearch($q = null, $id = null,$type=0) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $out = ['results' => ['id' => '', 'text' => '']];
            if (!is_null($q)) {
                $query = new \yii\db\Query;
                $query->select('id, name AS text')
                    ->from('{{%accounts}}')
                    ->where('name LIKE "%' . $q .'%"')
                    ->andWhere(['type'=>$type])
                    ->limit(20);
                $command = $query->createCommand();
                $data = $command->queryAll();
                $out['results'] = array_values($data);
            }
            elseif ($id > 0) {
                $out['results'] = ['id' => $id, 'text' => Accounts::find($id)->name];
            }
            return $out;
        }

    public function actionJson($id = 0) {
        $model = Accounts::findOne($id);
        return \yii\helpers\Json::encode($model);
        //Yii::$app->end(); //*/
    }

    /**
     * Lists all models.
     */
    public function actionAjax($type = 0) {
//$type=isset($_GET['type'])?(int)$_GET['type']:0;
        //$type=(int)$id;
        $searchModel = new \app\models\AccountsSearch();
        $searchModel->type = $type;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $html = $this->renderPartial('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        return \yii\helpers\Json::encode($html);
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($id = 0) {
        $types = Acctype::find()->All();
        $list = array();
        $searchModel = new \app\models\AccountsSearch();
        $searchModel->type = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        
        if(Yii::$app->request->get('AccountsSearch')){
            $searchModel->search(Yii::$app->request->get());
            return $this->renderPartial('index', ['searchModel' => $searchModel,'dataProvider' => $dataProvider]);
        }
        
        foreach ($types as $type1) {
            $searchModel = new \app\models\AccountsSearch();
            $searchModel->type = $type1->id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $array = [
                'linkOptions' => ['data-id' => $type1->id],
                'content'=>$this->renderPartial('index', ['searchModel' => $searchModel,'dataProvider' => $dataProvider]),
                'label' => Yii::t('app', $type1->desc)
            ];
            if ($id == $type1->id)
                $array['active'] = true;

            $list[] = $array;
        }
        return $this->render('admin', [
                    'list' => $list,
                    'type' => $id,
        ]);
        /*
          return $this->render('admin', array(
          'model' => $model,
          'type' => $type
          )); */
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    protected function findModel($id) {
        if (($model = Accounts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');
        }
    }

}
