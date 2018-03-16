<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-6-25
 * Time: 下午12:25
 */

namespace restful\models\logicModel\models;

use Yii;
use yii\base\Model;
use common\models\Api;
use common\components\Common;

class Wechat extends Model{

    public $data = array();
    public $api;
    public $msgType;
    public $msg = "不知道是什么鬼地方出错啦～～";
    public $msgTpl;

    public function valid()

    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            return $echoStr;
        }else{
            return false;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce     = $_GET["nonce"];

        $token = yii::$app->params['wechat']['Token'];
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
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