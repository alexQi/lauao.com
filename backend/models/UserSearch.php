<?php

namespace app\models;

use common\models\User;
use common\models\UserExtend;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class UserSearch extends User
{

    /**
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getUserInfo($id){
        return self::find()
            ->alias('u')
            ->leftJoin(UserExtend::tableName().' ue','ue.user_id=u.id')
            ->where(['u.id'=>$id])
            ->select(['u.*','ue.*'])
            ->asArray()
            ->one();
    }

    /**
     * @param $id
     *
     * @return UserExtend|null
     */
    public static function getUserExtendInfo($id){
        return UserExtend::findOne(['user_id'=>$id]);
    }

    /**
     * @param array $param
     *
     * @return array
     */
    public static function getUserMail($param=[])
    {
        $query = self::find();
        if (!empty($param))
        {
            //.....
        }
        $userList = $query->asArray()->all();

        $mailList = [];
        foreach ($userList as $val)
        {
            $mailList['available'][] = $val['email'];
        }
        $mailList['assigned'] = [];

        return $mailList;
    }
}
