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
use app\components\RightsController;
use app\models\Transactions;
use app\models\FormTransaction;
class TransactionController extends RightsController {

    public function actionView($id = 200) {
        $transactions = new Transactions();
        //$transactions->unsetAttributes();
        $transactions->num = $id;
        return $this->render('index', array('model' => $transactions));
    }

    public function actionCreate() {
        $model = new FormTransaction();
        
        // Uncomment the following line if AJAX validation is needed
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(Yii::$app->request->post())){
            if ($model->save()){
                \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Transaction saved'));
            }else{
                 return $model->errors;
            }
        }


        return $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionOpenbalance() {
        $model = new Transactions();

        if (isset($_POST['account'])) {

            $year = $_POST['year'];
            $date = "$year-01-01 00:00:01";
            $accountArr = $_POST['account'];
            $balanceArr = $_POST['bal'];
            foreach ($accountArr as $index => $account) {
                $sum = $balanceArr[$index];
                if ($account) {
                    $submodel = new Transactions();
                    $submodel->refnum1 = '';
                    $submodel->valuedate = $date;
                    $submodel->details = Yii::t('app', "Opening Balance");
                    $submodel->type = \app\helpers\Linet3Helper::getSetting('transactionType.openBalance');
                    $submodel->currency_id = \app\helpers\Linet3Helper::getSetting('company.cur');


                    $submodel->owner_id = Yii::$app->user->id;
                    $submodel->linenum = 0;
                    $submodel->addDoubleLine($account, \app\helpers\Linet3Helper::getSetting('company.acc.openbalance'),$sum);
                    //$submodel->num;


                    
                }
            }


            \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Open Balance saved'));
            //$this->redirect(array('OpenBalance'));
        }

        return $this->render('opbalance', array(
            'model' => $model,
        ));
    }
    
}
