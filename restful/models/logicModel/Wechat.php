<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-6-25
 * Time: 下午12:25
 */

namespace restful\models\logicModel;

use Yii;
use yii\base\Model;
use common\components\Common;

class Wechat extends Model{

    private $appid;
    public static $OK = 0;
    public static $IllegalAesKey = -41001;
    public static $IllegalIv = -41002;
    public static $IllegalBuffer = -41003;
    public static $DecodeBase64Error = -41004;

    /**
     * 检验数据的真实性，并且获取解密后的明文.
     * @param $encryptedData string 加密的用户数据
     * @param $iv string 与用户数据一同返回的初始向量
     * @param $data string 解密后的原文
     *
     * @return int 成功0，失败返回对应的错误码
     */
    public function decryptData($sessionKey, $encryptedData, $iv )
    {
        $appid = yii::$app->params['wechatConfig']['appid'];
        if (strlen($sessionKey) != 24) {
            return self::$IllegalAesKey;
        }
        $aesKey=base64_decode($sessionKey);


        if (strlen($iv) != 24) {
            return self::$IllegalIv;
        }
        $aesIV=base64_decode($iv);

        $aesCipher=base64_decode($encryptedData);

        $result=openssl_decrypt( $aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);

        $dataObj=json_decode( $result );
        if( $dataObj  == NULL )
        {
            return self::$IllegalBuffer;
        }
        if( $dataObj->watermark->appid != $appid )
        {
            return self::$IllegalBuffer;
        }
        return $result;
    }

    public function getAppSession($code){
        $param['grant_type'] = 'authorization_code';
        $param['appid']      = yii::$app->params['wechatConfig']['appid'];
        $param['secret']     = yii::$app->params['wechatConfig']['appsecret'];
        $param['js_code']    = $code;
        $res = Common::httpRequest(yii::$app->params['wechatConfig']['sessionApi'],$param,'post');
        return json_decode($res);
    }
}