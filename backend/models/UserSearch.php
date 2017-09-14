<?php

namespace app\models;

use common\models\User;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class UserSearch extends User
{
    public static function getUserMail($param=[])
    {
        $query = self::find();
        if (!empty($param))
        {

        }
        $userList = $query->asArray()->all();

        $mailList = [];
        foreach ($userList as $val)
        {
            $mailList['avaliable'][] = $val['email'];
        }
        $mailList['assigned'] = [];

        return $mailList;
    }
}
