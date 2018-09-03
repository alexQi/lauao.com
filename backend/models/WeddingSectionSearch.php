<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WeddingSection;
use common\models\UserExtend;

/**
 * WeddingSectionSearch represents the model behind the search form about `common\models\WeddingSection`.
 */
class WeddingSectionSearch extends WeddingSection
{
    public $real_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['section_name', 'desc'], 'safe'],
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
        $query = WeddingSection::find();
        $query->joinWith(['userExtend']);

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

        $dataProvider->setSort([
            'attributes' => [
                'section_id',
                'section_name',
                'desc',
                'created_at',
                'updated_at',
                'real_name' => [
                    'asc'  => [UserExtend::tableName() . '.real_name' => SORT_ASC],
                    'desc' => [UserExtend::tableName() . '.real_name' => SORT_DESC],
                ]
            ]
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'section_id' => $this->section_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'section_name', $this->section_name])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', UserExtend::tableName() . '.real_name', $this->real_name]);;

        return $dataProvider;
    }
}
