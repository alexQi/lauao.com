<?php

namespace frontend\modules\ajax\controllers;


use common\models\ActivityBase;
use yii;
use frontend\models\ApplyUserService;
use yii\base\Exception;
use common\components\MyQiniu;
use common\models\ApplyRecord;
use common\components\Common;

/**
 * Default controller for the `module` module
 */
class DefaultController extends BaseController
{
    /**
     * @return array
     */
    public function actionUserList()
    {
        $ApplyUserService = new ApplyUserService();
        $list = $ApplyUserService->getUserApplyList();

        $dataList['cnt']  = $list['allPage'];
        $dataList['list'] = [];
        $redis = yii::$app->redis;
        foreach ($list['list'] as $item)
        {
            $value['id']     = $item['id'];
            $value['name']   = $item['apply_name'];
            $value['desc']   = $item['self_desc'];
            $value['height'] = '275';
            $value['icon']   = $item['self_picture'];
            $value['width']  = '200';
            $value['music']  = $item['self_media'];
            $votes  = $redis->get('vote_apply_'.$item['id'])?$redis->get('vote_apply_'.$item['id']):0;
            $value['votes'] = $item['votes']>$votes ? $item['votes'] : $votes;
            $dataList['list'][] = $value;
        }

        $this->ajaxReturn = $dataList;
        return $this->ajaxReturn;
    }

    /**
     * ajax 上传
     */
    public function actionAjaxUpload(){
        try{


            if (!isset($_FILES['file'])){
                throw new Exception('未检测到上传文件');
            }
            $uploadFile = $_FILES['file'];

            $bucket = 'apply-user';
            $qiniu = new MyQiniu($bucket);
            $key = 'QB'.time().rand(1000,9999);
            $result  = $qiniu->uploadFileGetReturn($uploadFile['tmp_name'],$key);
            if (!$result){
                throw new Exception('上传文件失败');
            }

            $result['file_url'] = $qiniu->getLink($result['key']);

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = '上传成功';
            $this->ajaxReturn['data']  = $result;
        }catch(Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }
        return $this->ajaxReturn;
    }

    /**
     * @return array
     */
    public function actionSearchApplyUser()
    {
        try {
            if (!$this->getData['apply_id'])
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

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = '搜索成功';
            $this->ajaxReturn['data']    = $ApplyUserInfo;
        }catch (Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }

        return $this->ajaxReturn;
    }

    public function actionSaveUser()
    {
        try{
            if (!yii::$app->request->post('apply_name'))
            {
                throw new Exception('申请人姓名不能为空');
            }
            if (!yii::$app->request->post('gender'))
            {
                throw new Exception('性别未选择');
            }
            if (!yii::$app->request->post('phone'))
            {
                throw new Exception('电话号码不能为空');
            }
            if (!yii::$app->request->post('self_desc'))
            {
                throw new Exception('自我介绍不能为空');
            }
            if (!yii::$app->request->post('self_picture'))
            {
                throw new Exception('照片不能为空');
            }
            $recordInfo = ApplyRecord::find()->where(['phone'=>yii::$app->request->post('phone')])->one();
            if ($recordInfo)
            {
                throw new Exception('当前手机号码已申请过该活动');
            }

            $model = new ApplyRecord();

            $model->apply_name = yii::$app->request->post('apply_name');
            $model->gender = yii::$app->request->post('gender');
            $model->phone = yii::$app->request->post('phone');
            $model->self_desc = yii::$app->request->post('self_desc');
            $model->self_picture = yii::$app->request->post('self_picture');
            $model->self_media = yii::$app->request->post('self_media');
            $model->recommend = yii::$app->request->post('recommend');
            $model->weichat_uid = time().rand(1000,9999).'uid';
            $model->activity_id = 8;
            $model->status      = 1;
            $model->created_at  = time();
            $model->updated_at  = time();

            if (!$model->save())
            {
                throw new Exception('很遗憾报名失败');
            }

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = '恭喜你,报名成功<br/>请耐心等待工作人员审核';
        }catch(Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }
        return $this->ajaxReturn;
    }

    public function actionDoVote()
    {
        try{
            $activityInfo = ActivityBase::find()->where(['status'=>2])->one();

            if (time()>$activityInfo->end_time)
            {
                throw new Exception('活动已结束');
            }
         
            if (!$this->getData['id'] || !$this->getData['vote_user'])
            {
                throw new Exception('参数错误');
            }
            $redis = yii::$app->redis;
            $VoteNum = $redis->get('vote_user_'.date('Ymd',time()).'_'.$this->getData['vote_user']);

            if ($VoteNum)
            {
                if ($VoteNum<3)
                {
                    $redis->incr('vote_user_'.date('Ymd',time()).'_'.$this->getData['vote_user']);
                }else{
                    throw new Exception('每人每天只能投3票<br/>感谢你的参与');
                }
            }else{
                $redis->setex('vote_user_'.date('Ymd',time()).'_'.$this->getData['vote_user'],86400,1);
            }

            $voteApply = $redis->get('vote_apply_'.$this->getData['id']);
            if (!$voteApply)
            {
                $redis->set('vote_apply_'.$this->getData['id'],1);
            }else{
                $redis->incr('vote_apply_'.$this->getData['id']);
            }

            $this->ajaxReturn['state'] = 1;
            $this->ajaxReturn['message'] = "投票成功,感谢你的参与<br>今天还可以投".(2-$VoteNum).'票';
            $this->ajaxReturn['vote_num']= $redis->get('vote_apply_'.$this->getData['id']);

        }catch (Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }

        return $this->ajaxReturn;
    }

    public function actionGetWechatToken(){
        try{
            if (!$this->getData['wechatCode'])
            {
                throw new Exception('wechat code 不存在');
            }
            $getWechatTokenUrl = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.yii::$app->params['wechat_appid'].'&secret='.yii::$app->params['wechat_secret'].'&code='.$this->getData['wechatCode'].'&grant_type=authorization_code';
            $wechatToken = Common::httpRequest($getWechatTokenUrl);
            $wechatToken = json_decode($wechatToken,true);

            if (isset($wechatToken['errcode']))
            {
                throw new Exception($wechatToken['errmsg'].'wechatUrl:'.$getWechatTokenUrl);
            }
            $this->ajaxReturn['state'] = 1;
            $this->ajaxReturn['message'] = '获取成功';
            $this->ajaxReturn['data'] = $wechatToken;
        }catch(Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }
        return $this->ajaxReturn;
    }

    public function actionGetWechatUserinfo(){
        try{
            if (!$this->getData['wechatToken'])
            {
                throw new Exception('wechatToken 不存在');
            }
            if (!$this->getData['openid'])
            {
                throw new Exception('openid 不存在');
            }
            $getWechatUserInfoUrl = 'https://api.weixin.qq.com/sns/info?access_token='.$this->getData['wechatToken'].'&openid='.$this->getData['openid'].'&&lang=zh_CN';
            $wechatUserInfo = Common::httpRequest($getWechatUserInfoUrl);
            $wechatUserInfo = json_decode($wechatUserInfo,true);
            if (isset($wechatUserInfo['errcode']))
            {
                throw new Exception($wechatUserInfo['errmsg'].'wechatUrl:'.$getWechatUserInfoUrl);
            }
            $this->ajaxReturn['state'] = 1;
            $this->ajaxReturn['message'] = '获取成功';
            $this->ajaxReturn['data'] = json_decode($wechatUserInfo,true);
        }catch(Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }
        return $this->ajaxReturn;
    }
}
