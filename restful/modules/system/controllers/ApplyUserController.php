<?php

namespace restful\modules\system\controllers;


use yii;
use yii\base\Exception;
use restful\models\ApplyUserService;
use restful\controllers\BaseController;
/**
 * Default controller for the `module` module
 */
class ApplyUserController extends BaseController
{
    /**
     * @return array
     */
    public function actionUserList()
    {
        $ApplyUserService = new ApplyUserService();
        $list = $ApplyUserService->getUserApplyList();

        $dataList['cnt']       = $list['allPage'];
        $dataList['currPage']  = $list['currPage'];
        $dataList['list'] = [];
        foreach ($list['list'] as $item)
        {
            $value['id']     = $item['id'];
            $value['name']   = $item['apply_name'];
            $value['desc']   = $item['self_desc'];
            $value['height'] = '275';
            $value['icon']   = $item['self_picture'];
            $value['width']  = '200';
            $value['music']  = $item['self_media'];
            $dataList['list'][] = $value;
        }
//        $error = Yii::$app->errorHandler->exception;
//        var_dump($error);die();
        $this->state   = 1;
        $this->message = 'success';
        return $dataList;
    }

    /**
     * @return array
     */
    public function actionSearchApplyUser()
    {
        $data = [];
        try {
            if (!isset($this->getData['apply_id']) )
            {
                throw new Exception('参数不正确');
            }
            $redis = yii::$app->redis;
            $ApplyUserService = new ApplyUserService();
            $ApplyUserInfo = $ApplyUserService->getApplyUserInfo($this->getData['apply_id']);
            if (!empty($ApplyUserInfo))
            {
                $votes = $redis->get('vote_apply_'.$ApplyUserInfo['id'])?$redis->get('vote_apply_'.$ApplyUserInfo['id']):0;
                $ApplyUserInfo['votes'] = $ApplyUserInfo['votes']>$votes ? $ApplyUserInfo['votes'] : $votes;
            }

            $this->state   = 1;
            $this->message = '搜索成功';
            $data = $ApplyUserInfo;
        }catch (Exception $e){
            $this->message = $e->getMessage();
        }

        return $data;
    }
}
