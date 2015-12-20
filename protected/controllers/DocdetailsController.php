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
use app\models\Docdetails;
use app\models\Doccheques;
use app\helpers\Response;

class DocdetailsController extends RightsController {

    public function actionCalc() {
        $model = new Docdetails;

        if (isset($_POST['Docdetails']['line'])) {
            $i = $_POST['Docdetails']['line'];
            $model->attributes = $_POST['Docdetails'][$i];
            
            if (isset($_POST['CalcPriceWithVat']))
                return Response::send(200, $model->CalcPriceWithVat());

            if (isset($_POST['CalcPriceWithOutVat']))
                return Response::send(200, $model->CalcPriceWithOutVat());


            return Response::send(200, $model->CalcPrice());
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Docdetails::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
