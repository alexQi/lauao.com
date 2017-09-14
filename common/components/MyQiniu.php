<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017/9/8
 * Time: 下午11:16
 */
namespace common\components;

use yii;
use crazyfd\qiniu\Qiniu;
use yii\web\HttpException;

class MyQiniu extends Qiniu
{
    /**
     * MyQiniu constructor.
     * @param $domain
     * @param string $bucket
     */
    public function __construct($bucket = '')
    {
        $domain    = 'http://'.$bucket.'.'.yii::$app->params['qiniu']['uploadUrl'];
        $accessKey = yii::$app->params['qiniu']['AccessKey'];
        $secretKey = yii::$app->params['qiniu']['SecretKey'];
        parent::__construct($accessKey, $secretKey, $domain, $bucket);
    }

    /**
     * 通过本地文件上传
     * @param $filePath
     * @param null $key
     * @param string $bucket
     */

    public function uploadFileGetReturn($filePath, $key = null, $bucket = '')
    {
        if(!file_exists($filePath)){
            throw new HttpException(400, "上传的文件不存在");
        }
        $bucket = $bucket ? $bucket : $this->bucket;

        $uploadToken = $this->uploadTokenUseParam(
            $bucket,
            $key,
            3600,
            ['returnBody'=>'{"key":"$(key)","mimeType":"$(mimeType)"}']
        );

        $data = [];
        if (class_exists('\CURLFile')) {
            $data['file'] = new \CURLFile($filePath);
        } else {
            $data['file'] = '@' .$filePath;
        }
        $data['token'] = $uploadToken;
        if ($key) {
            $data['key'] = $key;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::UP_HOST);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $result = $this->response($result);
        if ($status == 200) {
            return $result;
        } else {
            return false;
        }
    }

    public function uploadTokenUseParam(
        $bucket,
        $key = null,
        $expires = 3600,
        $policy = '',
        $strictPolicy = true
    )
    {
        $deadline = time() + $expires;
        $scope = $bucket;
        if ($key !== null) {
            $scope .= ':' . $key;
        }

        $args = self::copyPolicy($args, $policy, $strictPolicy);
        $args['scope'] = $scope;
        $args['deadline'] = $deadline;

        $encodedFlags = self::urlBase64Encode(json_encode($args));
        $sign = hash_hmac('sha1', $encodedFlags, $this->secretKey, true);
        $encodedSign = self::urlBase64Encode($sign);
        $token = $this->accessKey . ':' . $encodedSign . ':' . $encodedFlags;
        return $token;
    }


    private static function copyPolicy(&$policy, $originPolicy, $strictPolicy)
    {
        if ($originPolicy === null) {
            return array();
        }
        foreach ($originPolicy as $key => $value) {
            if (!$strictPolicy || in_array((string)$key, ['returnBody'], true)) {
                $policy[$key] = $value;
            }
        }
        return $policy;
    }
}