<?php

namespace restful\modules\system\controllers;

use yii;
use yii\base\Exception;
use restful\models\logicModel\Wechat;
use restful\controllers\BaseController;
/**
 * Default controller for the `module` module
 */
class AuthController extends BaseController
{
    public function actionGetSession()
    {
        $data = [];
        try{
            if (!isset($this->postData['js_code']))
            {
                $data['postData'] = $this->postData;
                throw new Exception('参数不正确');
            }
            $wechat = new Wechat();

            $data = $wechat->getAppSession($this->postData['js_code']);
            if (isset($data->errcode))
            {
                throw new Exception('获取session_key失败');
            }
            $this->state   = 1;
            $this->message = 'success';
        }
        catch (Exception $e)
        {
            $this->message = $e->getMessage();
        }
        return $data;
    }

    public function actionDescryptData()
    {
        $data = [];
        try{
            if (!isset($this->postData['js_code']))
            {
                throw new Exception('参数不正确');
            }
            if (!isset($this->postData['encryptedData']))
            {
                throw new Exception('待解密数据不存在');
            }
            if (!isset($this->postData['iv']))
            {
                throw new Exception('iv不存在');
            }
            $wechat = new Wechat();

            $sessionData = $wechat->getAppSession($this->postData['js_code']);
            if (isset($sessionData['errcode']))
            {
                throw new Exception('获取session_key失败');
            }
            $data = $wechat->decryptData($sessionData['session_key'],$this->postData['encryptedData'],$this->postData['iv']);
            if (isset($data['errcode']))
            {
                throw new Exception('解密数据失败');
            }
            $this->state   = 1;
            $this->message = 'success';
        }
        catch (Exception $e)
        {
            $this->message = $e->getMessage();
        }
        return $data;
    }
}
