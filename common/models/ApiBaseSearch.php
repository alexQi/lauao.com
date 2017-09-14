<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ApiBase;

/**
 * ApiBaseSearch represents the model behind the search form about `common\models\ApiBase`.
 */
class ApiBaseSearch extends ApiBase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at', 'is_default'], 'integer'],
            [['api_name', 'url', 'url_path', 'request_method', 'query_string', 'invoke_string'], 'safe'],
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
        $query = ApiBase::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_default' => $this->is_default,
        ]);

        $query->andFilterWhere(['like', 'api_name', $this->api_name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'url_path', $this->url_path])
            ->andFilterWhere(['like', 'request_method', $this->request_method])
            ->andFilterWhere(['like', 'query_string', $this->query_string])
            ->andFilterWhere(['like', 'invoke_string', $this->invoke_string]);

        return $dataProvider;
    }
}
