<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    public $cate_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'cate_id', 'create_time'], 'integer'],
            [['name', 'content','cate_name'], 'safe'],
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
        $query = Product::find();
        $query->joinWith(['cate']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                /* 其它字段不要动 */
                /*  下面这段是加入的 */
                /*=============*/
                'product_id' => [
                    'asc' => ['product_id' => SORT_ASC],
                    'desc' => ['product_id' => SORT_DESC],
                ],
                'name' => [
                    'asc' => ['name' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC],
                ],
                'price' => [
                    'asc' => ['price' => SORT_ASC],
                    'desc' => ['price' => SORT_DESC],
                ],
                'content' => [
                    'asc' => ['content' => SORT_ASC],
                    'desc' => ['content' => SORT_DESC],
                ],
                'create_time' => [
                    'asc' => ['create_time' => SORT_ASC],
                    'desc' => ['create_time' => SORT_DESC],
                ],
                'cate_name' => [
                    'asc' => ['category.cate_name' => SORT_ASC],
                    'desc' => ['category.cate_name' => SORT_DESC],
                ],
                /*=============*/
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
            'product_id' => $this->product_id,
            'cate_id' => $this->cate_id,
            'price' => $this->price,
            'create_time' => $this->create_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'category.cate_name', $this->cate_name]);

        return $dataProvider;
    }
}
