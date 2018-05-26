<?php

namespace backend\models;

use common\models\UserExtend;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AdminLogSearch represents the model behind the search form about `backend\models\AdminLog`.
 */
class AdminLogSearch extends AdminLog {
    public $real_name;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'primary_key', 'user_id', 'created_at'], 'integer'],
            [['module', 'controller', 'action', 'table_name', 'operation_type', 'real_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = AdminLog::find();
        $query->joinWith(['userExtend']);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'defaultOrder' => [
                    'id' => SORT_DESC
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
                'id',
                'primary_key',
                'module',
                'controller',
                'action',
                'table_name',
                'operation_type',
                'created_at',
                'real_name' => [
                    'asc'  => [UserExtend::tableName() . '.real_name' => SORT_ASC],
                    'desc' => [UserExtend::tableName() . '.real_name' => SORT_DESC],
                ]
            ]
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id'          => $this->id,
            'primary_key' => $this->primary_key,
            'created_at'  => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'controller', $this->controller])
            ->andFilterWhere(['like', 'action', $this->action])
            ->andFilterWhere(['like', 'table_name', $this->table_name])
            ->andFilterWhere(['like', 'operation_type', $this->operation_type])
            ->andFilterWhere(['like', UserExtend::tableName() . '.real_name', $this->real_name]);

        return $dataProvider;
    }
}