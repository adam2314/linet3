<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Docs;

/**
 * DocsSearch represents the model behind the search form about `app\models\Docs`.
 */
class DocsSearch extends Docs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doctype', 'docnum', 'account_id', 'disType', 'status', 'printed', 'oppt_account_id', 'action', 'refstatus', 'owner'], 'integer'],
            [['issue_to','issue_from','company', 'address', 'city', 'zip', 'vatnum', 'refnum', 'refnum_ext', 'issue_date', 'due_date', 'reg_date', 'ref_date', 'currency_id', 'comments', 'description'], 'safe'],
            [['discount', 'sub_total', 'novat_total', 'vat', 'total', 'src_tax'], 'number'],
            
            [
                [
                    'id', 'doctype', 'docnum', 'account_id', 'disType', 'status', 'printed', 'oppt_account_id', 'action', 'refstatus', 'owner',
                    'issue_to','issue_from','company', 'address', 'city', 'zip', 'vatnum', 'refnum', 'refnum_ext', 'issue_date', 'due_date', 'reg_date',
                    'ref_date', 'currency_id', 'comments', 'description'
                ], 
                'safe', 'on' => 'search'
                ],
            //array(['id', 'item_id', 'name', 'description', 'qty', 'unit_id', 'currency_id', 'ihTotal', 'ihItem', 'iItem', 'iTotal', 'iVatRate', 'line', 'issue_from', 'issue_to'], 'safe', 'on' => 'search'),
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
        $query = Docs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            "sort"=> ['defaultOrder' => [
                'reg_date'=>SORT_DESC,
                'docnum'=>SORT_DESC
                
                ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'doctype' => $this->doctype,
            'docnum' => $this->docnum,
            
            'account_id' => $this->account_id,
            //'issue_date' => $this->issue_date,
            //'due_date' => $this->due_date,
            //'reg_date' => $this->reg_date,
            //'ref_date' => $this->ref_date,
            //'discount' => $this->discount,
            //'disType' => $this->disType,
            //'sub_total' => $this->sub_total,
            //'novat_total' => $this->novat_total,
            //'vat' => $this->vat,
            'total' => $this->total,
            //'src_tax' => $this->src_tax,
            'status' => $this->status,
            'printed' => $this->printed,
            //'oppt_account_id' => $this->oppt_account_id,
            //'action' => $this->action,
            'refstatus' => $this->refstatus,
            //'owner' => $this->owner,
        ]);

        $query->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'vatnum', $this->vatnum])
            ->andFilterWhere(['like', 'refnum', $this->refnum])
            ->andFilterWhere(['like', 'refnum_ext', $this->refnum_ext])
            ->andFilterWhere(['like', 'currency_id', $this->currency_id])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'description', $this->description]);
        
        if(!is_null($this->issue_date)){
            $tmp=  explode(" to ", $this->issue_date);
            //var_dump($tmp);
            if(isset($tmp[0])&&isset($tmp[1]))        
                $query->andFilterWhere(['between', 'issue_date', $tmp[0], $tmp[1]]);
            //
            //$query->andFilterWhere(['>=', 'issue_from', $tmp[1]]);
        }
        
        
        
        return $dataProvider;
    }
}
