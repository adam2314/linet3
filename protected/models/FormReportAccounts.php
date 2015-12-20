<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\models;

use Yii;
use yii\base\Model;

class FormReportAccounts extends Model {

    public $type;
    public $acc = "";
    public $from_date;
    public $to_date;

    

    public function attributeLabels() {
        return array(
            'from_date' => Yii::t('app', 'From Date'),
            'to_date' => Yii::t('app', 'To Date'),
            'acc' => Yii::t('app', 'Account IDs'),
            'type' => Yii::t('app', 'Account Type'),
        );
    }

    public function init() {
        parent::init();
        $this->from_date = date('Y') . "-01-01";
        $this->to_date = date('Y-m-d');
    }

    public function accounts() {
        $accountQ=Accounts::find();
        if (substr_count($this->acc, ",") != 0) {
            $accs = explode(",", $this->acc);
            foreach ($accs as $acc) {
                $accountQ = $this->between($acc,$accountQ);
            }
        }else{
            $accountQ=$this->between($this->acc,$accountQ);
        }
        return $this->chkType($accountQ)->asArray()->all();
    }

    private function between($str,$accountQ) {
        if (substr_count($str, "-") == 1) {
            $accs = explode("-", $str);
            return $accountQ->andWhere(['between', 'id', $accs[0] , $accs[1]]);
        } else {
            return $accountQ->andWhere(["id"=>$str]);
        }
    }

    private function chkType($accountsQ) {
        if ($this->type == '')
            return $accountsQ;
        else 
            return $accountsQ->andWhere(['type'=>$this->type]);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['acc'], 'required'),
            array(['to_date', 'from_date', 'type', 'acc'], 'safe'),
            array(['to_date', 'from_date', 'acc', 'type'], 'safe', 'on' => 'search'),
        );
    }

    public function search($id) {
        //echo $id . uniqid();

        $query = Transactions::find();
        $query->andFilterWhere([
            'account_id' => $id,
            ]);
        $query->andFilterWhere(['between', 'valuedate', $this->from_date, $this->to_date]);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            "sort"=> ['defaultOrder' => [
                'num'=>SORT_DESC,
                ]],
            'pagination'=>false
        ]);
        return $dataProvider;
    }

    //put your code here
}
