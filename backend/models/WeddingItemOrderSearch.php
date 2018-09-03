<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WeddingItemOrder;

/**
 * WeddingItemOrderSearch represents the model behind the search form about `common\models\WeddingItemOrder`.
 */
class WeddingItemOrderSearch extends WeddingItemOrder
{
    public $combos;
    public $section_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_order_id', 'order_id', 'section_id', 'combo_id', 'status', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['custom', 'principal','combos','section_name'], 'safe'],
            [['deal_price'], 'number'],
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
        $query = WeddingItemOrder::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'item_order_id' => $this->item_order_id,
            'order_id' => $this->order_id,
            'section_id' => $this->section_id,
            'combo_id' => $this->combo_id,
            'deal_price' => $this->deal_price,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'custom', $this->custom])
            ->andFilterWhere(['like', 'principal', $this->principal]);

        return $dataProvider;
    }
}
