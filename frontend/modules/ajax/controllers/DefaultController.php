<?php

namespace frontend\modules\ajax\controllers;

use yii;
use frontend\models\ApplyUserService;
use yii\base\Exception;
use yii\web\UploadedFile;
use common\components\MyQiniu;

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

        $dataList = [];
        foreach ($list as $item)
        {
            $value['id']     = $item['id'];
            $value['name']   = $item['apply_name'];
            $value['desc']   = $item['self_desc'];
            $value['height'] = '275';
            $value['icon']   = $item['self_picture'];
            $value['width']  = '200';
            $value['music']  = $item['self_media'];
            $value['votes'] = $item['votes'] ? $item['votes'] : 0;

            $dataList[] = $value;
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
            $key = 'QB'.time();
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
            if (!yii::$app->request->post('weichat_uid'))
            {
                throw new Exception('微信id不能为空');
            }

            $model = new ApplyUserService();
            $model->apply_name = yii::$app->request->post('apply_name');
            $model->gender = yii::$app->request->post('gender');
            $model->phone = yii::$app->request->post('phone');
            $model->self_desc = yii::$app->request->post('self_desc');
            $model->self_picture = yii::$app->request->post('self_picture');
            $model->self_media = yii::$app->request->post('self_media');
            $model->recommend = yii::$app->request->post('recommend');
            $model->weichat_uid = yii::$app->request->post('weichat_uid');
            $model->status     = 1;
            $model->created_at = time();
            $model->updated_at = time();

            if (!$model->save())
            {
                throw new Exception('保存申请信息失败');
            }

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = '申请成功';
        }catch(Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }
        return $this->ajaxReturn;
    }

    public function actionDoVote()
    {
        try{
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
                    throw new Exception('每人每天只能投三票');
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
            $this->ajaxReturn['message'] = '投票成功,感谢你的参与';
            $this->ajaxReturn['vote_num']= $redis->get('vote_apply_'.$this->getData['id']);

        }catch (Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }

        return $this->ajaxReturn;
    }
}
