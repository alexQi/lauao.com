<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Video;

/**
 * VideoSearch represents the model behind the search form about `common\models\Video`.
 */
class VideoSearch extends Video {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['video_id', 'video_cate_id', 'play_num', 'like_num', 'video_time', 'status'], 'integer'],
            [['video_name', 'vCate', 'video_url', 'poster', 'uploader', 'created_at', 'updated_at'], 'safe'],
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
        $query = Video::find();

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
            'video_id'      => $this->video_id,
            'video_cate_id' => $this->video_cate_id,
            'play_num'      => $this->play_num,
            'like_num'      => $this->like_num,
            'video_time'    => $this->video_time,
            'status'        => $this->status,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'video_name', $this->video_name])
            ->andFilterWhere(['like', 'video_url', $this->video_url])
            ->andFilterWhere(['like', 'poster', $this->poster])
            ->andFilterWhere(['like', 'uploader', $this->uploader]);

        return $dataProvider;
    }
}
