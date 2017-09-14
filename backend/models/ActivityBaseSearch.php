<?php

namespace backend\models;

use backend\modules\admin\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ActivityBase;

/**
 * activityBaseSearch represents the model behind the search form about `common\models\ActivityBase`.
 */
class ActivityBaseSearch extends ActivityBase
{
    public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'start_time', 'end_time', 'status', 'is_delete', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'activity_desc', 'activity_rules','username'], 'safe'],
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
        $query = ActivityBaseSearch::find();
        $query->select('ab.*,u.username');
        $query->from(['ab' => ActivityBase::tableName()]);
        $query->leftJoin(['u' => User::tableName()],'u.id=ab.user_id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'title',
                'start_time',
                'end_time',
                'status',
                'created_at',
                'username' => [
                    'asc'   => ['u.username' => SORT_ASC],
                    'desc'  => ['u.username' => SORT_DESC],
                ],
            ]
        ]);
//        if (!empty($params))
//        {
//            $params['activityBaseSearch']['start_time'] = strtotime($params['activityBaseSearch']['start_time']);
//            $params['activityBaseSearch']['end_time']   = strtotime($params['activityBaseSearch']['end_time']);
//
//        }
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ab.id' => $this->id,
            'ab.start_time' => $this->start_time,
            'ab.end_time' => $this->end_time,
            'ab.status' => $this->status,
            'u.username' => $this->username,
            'ab.created_at' => $this->created_at,
            'ab.updated_at' => $this->updated_at,
        ])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
