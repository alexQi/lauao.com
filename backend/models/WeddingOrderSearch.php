<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WeddingOrder;
use app\models\UserSearch;

/**
 * WeddingOrderSearch represents the model behind the search form about `common\models\WeddingOrder`.
 */
class WeddingOrderSearch extends WeddingOrder {
    public static $process = [
        1 => '已付定金',
        2 => '已付合同款',
        3 => '已付尾款'
    ];

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['order_sn','order_source', 'customer_name', 'customer_mobile', 'wedding_date', 'wedding_address', 'project_process', 'user_id', 'created_at', 'updated_at'], 'required','on'=>['create','update']],
            [['customer_mobile', 'project_process', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['order_sn'], 'string', 'max' => 50],
            [['order_source', 'wedding_address'], 'string', 'max' => 200],
            [['customer_name'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 255],
            [['order_source', 'remark'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        $scenarios = parent::scenarios();

        //各个场景的活动属性
        $scenarios['create'] = ['order_sn','order_source', 'customer_name', 'customer_mobile', 'wedding_date', 'wedding_address', 'project_process', 'user_id', 'created_at', 'updated_at'];
        $scenarios['update'] = ['order_sn','order_source', 'customer_name', 'customer_mobile', 'wedding_date', 'wedding_address', 'project_process'];

        return $scenarios;

    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = WeddingOrder::find();
        $user_extend_info = UserSearch::getUserExtendInfo(yii::$app->user->identity->getId());
        if (in_array($user_extend_info->section,range(1,9)))
        {
            $query->where(['user_id'=>yii::$app->user->identity->getId()]);
        }

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
            'order_id'        => $this->order_id,
            'customer_mobile' => $this->customer_mobile,
            'wedding_date'    => $this->wedding_date,
            'project_process' => $this->project_process,
            'user_id'         => $this->user_id,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'order_sn', $this->order_sn])
            ->andFilterWhere(['like', 'order_source', $this->order_source])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'wedding_address', $this->wedding_address])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        $query->orderBy(['project_process'=>SORT_ASC]);
        return $dataProvider;
    }
}
