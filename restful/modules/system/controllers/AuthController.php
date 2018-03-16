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
                throw new Exception('参数不正确');
            }
            $wechat = new Wechat();

            $this->state   = 1;
            $this->message = 'success';
            $data = $wechat->getAppSession($this->postData['js_code']);
        }
        catch (Exception $e)
        {
            $this->message = $e->getMessage();
        }
        return $data;
    }
}
