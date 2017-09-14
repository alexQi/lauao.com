<?php

namespace backend\models;

use common\models\ActivityBase;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ActivityAdvert;

/**
 * ActivityAdvertSearch represents the model behind the search form about `common\models\ActivityAdvert`.
 */
class ActivityAdvertSearch extends ActivityAdvert
{
    public $title;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'activity_id', 'target','position', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['advert_title', 'file_url', 'link_url','title'], 'safe'],
        ];
    }

    public function attributeLabels(){
        $attr = [
            'title' => '关联活动',
        ];
        return array_merge(parent::attributeLabels(),$attr);
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
        $query = ActivityAdvertSearch::find();
        $query->select('aa.*,ab.title');
        $query->from(['aa'=>ActivityAdvert::tableName()]);
        $query->leftJoin(['ab'=>ActivityBase::tableName()],'aa.activity_id=ab.id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'advert_title',
                'type',
                'link_url',
                'status',
                'position',
                'updated_at',
                'title' => [
                    'asc'   => ['ab.title' => SORT_ASC],
                    'desc'  => ['ab.title' => SORT_DESC],
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'aa.id' => $this->id,
            'aa.type' => $this->type,
            'ab.title' => $this->title,
            'aa.status' => $this->status,
            'aa.position' => $this->position,
            'aa.updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'advert_title', $this->advert_title])
            ->andFilterWhere(['like', 'ab.title', $this->title])
            ->andFilterWhere(['like', 'link_url', $this->link_url]);

        return $dataProvider;
    }

    public static function getOne($id)
    {
        $query = ActivityAdvertSearch::find();
        $query->select('aa.*,ab.title');
        $query->from(['aa' => ActivityAdvert::tableName()]);
        $query->leftJoin(['ab' => ActivityBase::tableName()], 'aa.activity_id=ab.id');
        return $query->one();
    }
}
