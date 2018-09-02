<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WeddingCombo;

/**
 * WeddingComboSearch represents the model behind the search form about `common\models\WeddingCombo`.
 */
class WeddingComboSearch extends WeddingCombo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['combo_id', 'section_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['combo_name'], 'safe'],
            [['price'], 'number'],
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
        $query = WeddingCombo::find();

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
            'combo_id' => $this->combo_id,
            'section_id' => $this->section_id,
            'price' => $this->price,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'combo_name', $this->combo_name]);

        return $dataProvider;
    }
}
