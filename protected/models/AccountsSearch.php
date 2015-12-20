<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accounts;

/**
 * AccountsSearch represents the model behind the search form about `app\models\Accounts`.
 */
class AccountsSearch extends Accounts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'id6111', 'cat_id', 'pay_terms', 'parent_account_id', 'system_acc', 'owner'], 'integer'],
            [['src_tax'], 'number'],
            [['src_date', 'name', 'contact', 'department', 'vatnum', 'email', 'phone', 'dir_phone', 'cellular', 'fax', 'web', 'address', 'city', 'zip', 'currency_id', 'comments', 'modified', 'created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Accounts::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'id6111' => $this->id6111,
            'cat_id' => $this->cat_id,
            'pay_terms' => $this->pay_terms,
            'src_tax' => $this->src_tax,
            'src_date' => $this->src_date,
            'parent_account_id' => $this->parent_account_id,
            'system_acc' => $this->system_acc,
            'owner' => $this->owner,
            'modified' => $this->modified,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'vatnum', $this->vatnum])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'dir_phone', $this->dir_phone])
            ->andFilterWhere(['like', 'cellular', $this->cellular])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'web', $this->web])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'currency_id', $this->currency_id])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
