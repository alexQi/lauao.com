<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-8-17
 * Time: 上午9:17
 * 好友列表
 */
namespace backend\modules\admin\components;

use app\models\MessageSearch;
use backend\modules\admin\models\User as UserModel;

class FriendHelper
{
    public static function getAssignedFriendList($user_id)
    {
        $result = UserModel::find()
            ->select('user.id,user.username,count(message.id) as message_num')
            ->from(['user'=>UserModel::tableName()])
            ->leftJoin(['message'=>MessageSearch::tableName()],'message.from_user_id=user.id')
            ->where(['!=','user.id',$user_id])
            ->andwhere(['message.to_user_id'=>$user_id])
            ->groupBy(['user.id'])
            ->asArray()
            ->all();
        return $result;
    }
}
