<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WeddingCombo;
use common\models\UserExtend;

/**
 * WeddingComboSearch represents the model behind the search form about `common\models\WeddingCombo`.
 */
class WeddingComboSearch extends WeddingCombo
{
    public $real_name;
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
        $query->joinWith(['userExtend']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'defaultOrder' => [
                    'id' => SORT_ASC
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->setSort([
            'attributes' => [
                'combo_id',
                'section_id',
                'combo_name',
                'price',
                'real_name' => [
                    'asc'  => [UserExtend::tableName() . '.real_name' => SORT_ASC],
                    'desc' => [UserExtend::tableName() . '.real_name' => SORT_DESC],
                ]
            ]
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'combo_id' => $this->combo_id,
           // 'section_id' => $this->section_id,
          // 'price' => $this->price,
          // 'user_id' => $this->user_id,
           //'created_at' => $this->created_at,
           // 'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'combo_name', $this->combo_name])
            ->andFilterWhere(['like', 'desc', $this->price])
            ->andFilterWhere(['like', UserExtend::tableName() . '.real_name', $this->real_name]);;

        return $dataProvider;
    }
}
