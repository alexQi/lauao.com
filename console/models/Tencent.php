<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2018/4/24
 * Time: 23:17
 */

namespace console\models;

use yii;
use common\components\Common;
class Tencent {

    /**
     * @return bool|mixed
     * @throws yii\base\Exception
     */
    public function getAccessToken()
    {
        $apiUrl = "https://auth.om.qq.com/omoauth2/accesstoken?grant_type=clientcredentials";
        $apiUrl = $apiUrl."&&client_id=".yii::$app->params['tencent']['client_id']."&client_secret=".yii::$app->params['tencent']['client_secret'];

        $res = Common::httpRequest($apiUrl,[],'post');
        return $res;
    }
}