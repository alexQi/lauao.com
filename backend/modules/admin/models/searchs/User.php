<?php

namespace backend\modules\admin\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\admin\models\User as UserModel;
use common\models\UserExtend;

/**
 * User represents the model behind the search form about `backend\modules\admin\models\User`.
 */
class User extends UserModel {
    public $real_name;
    public $section;
    public $last_login_ip;
    public $last_login_time;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'real_name', 'section', 'last_login_ip', 'last_login_time', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'safe'],
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
     * @return \yii\db\ActiveQuery
     */
    public function getUserExtend() {
        return $this->hasOne(UserExtend::className(), ['user_id' => 'id']);
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = self::find();
        $query->joinWith(['userExtend']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            $query->where('1=0');
            return $dataProvider;
        }

        $dataProvider->setSort([
            'attributes' => [
                'username',
                'email',
                'status',
                'real_name'       => [
                    'asc'   => [UserExtend::tableName() . '.real_name' => SORT_ASC],
                    'desc'  => [UserExtend::tableName() . '.real_name' => SORT_DESC],
                    'label' => '姓名'
                ],
                'section'         => [
                    'asc'   => [UserExtend::tableName() . '.section' => SORT_ASC],
                    'desc'  => [UserExtend::tableName() . '.section' => SORT_DESC],
                    'label' => '部门'
                ],
                'last_login_ip'   => [
                    'asc'   => [UserExtend::tableName() . '.last_login_ip' => SORT_ASC],
                    'desc'  => [UserExtend::tableName() . '.last_login_ip' => SORT_DESC],
                    'label' => '登陆IP'
                ],
                'last_login_time' => [
                    'asc'   => [UserExtend::tableName() . '.last_login_time' => SORT_ASC],
                    'desc'  => [UserExtend::tableName() . '.last_login_time' => SORT_DESC],
                    'label' => '上次登陆时间'
                ]
            ]
        ]);


        $query->andFilterWhere([
            'id'         => $this->id,
            'status'     => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', UserExtend::tableName() . '.real_name', $this->real_name])
            ->andFilterWhere(['like', UserExtend::tableName() . '.section', $this->section])
            ->andFilterWhere(['like', UserExtend::tableName() . '.last_login_ip', $this->last_login_ip])
            ->andFilterWhere(['like', UserExtend::tableName() . '.last_login_time', $this->last_login_time]);

        return $dataProvider;
    }
}
