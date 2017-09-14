<?php
namespace backend\modules\ajax\controllers;

use yii;
use yii\base\Exception;
use common\models\service\MessageService;
use app\models\MessageSearch;
use app\models\MessageGroupSearch;
use app\models\UserSearch;

/**
 * ajax 消息处理类
 * Class MessageController
 * @package backend\modules\ajax\controllers
 */
class MessageController extends BaseController
{

    /**
     * 处理邮件
     * @return array
     */
    public function actionDealMail()
    {

        try {
            if (!$this->postData['status'] || !in_array($this->postData['status'],MessageSearch::$STATUSLIST))
            {
                throw new Exception('邮件状态错误');
            }

            //处理邮件
            if (isset($this->postData['id']) && $this->postData['id']!='')
            {
                $messageInfo = MessageSearch::findOne($this->postData['id']);

                if (empty($messageInfo))
                {
                    throw new Exception('未查找到ID: '.$this->postData['id'].' 的邮件');
                }

                $messageInfo->to      = $this->postData['to'];
                $messageInfo->title   = $this->postData['title'];
                $messageInfo->content = $this->postData['content'];
                $messageInfo->status  = 1;
                $messageInfo->updated_at  = time();

            }else{

                $messageInfo = new MessageSearch();
                $messageInfo->title = $this->postData['title'];
                $messageInfo->from_user_id = yii::$app->user->identity->id;
                $messageInfo->from = yii::$app->user->identity->email;
                $messageInfo->to = $this->postData['to'];
                $messageInfo->content = $this->postData['content'];
                $messageInfo->created_at = time();
                $messageInfo->updated_at = time();
            }

            if (!$messageInfo->save())
            {
                throw new Exception('写入邮件内容失败');
            }

            if ($this->postData['status']==2)
            {
                //入邮件发送队列
                $data['title'] = $this->postData['title'];
                $data['from']  = [
                    $messageInfo->from => yii::$app->user->identity->username
                ];
                $data['to']      = $messageInfo->to;
                $data['content'] = $messageInfo->content;

                if (!MessageService::InToQueue(json_encode($data)))
                {
                    //更新邮件到草稿箱
                    $messageInfo->status = 3;
                    $messageInfo->save();
                    throw new Exception('发送邮件失败');
                }
            }

            $messageInfo->status = $this->postData['status'];

            if (!$messageInfo->save())
            {
                throw new Exception('修改邮件状态失败');
            }

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = 'sucess';
            $this->ajaxReturn['status']  = $messageInfo->status;

        }catch (Exception $e){

            $this->ajaxReturn['message'] = $e->getMessage();
        }

        return $this->ajaxReturn;
    }

    /**
     * 刷新缓存
     * @return array|mixed
     */
    public function actionRefresh()
    {
        $mailList = UserSearch::getUserMail();

        $cache = Yii::$app->cache;
        $cache->set('mailList_'.yii::$app->user->identity->id, $mailList, 60*60);

        return $mailList;
    }

    /**
     * 添加到缓存列表
     * @return array|mixed
     */
    public function actionAssign()
    {
        $mails  = $this->postData['mail'];

        $cache = Yii::$app->cache;
        $mailList = $cache->get('mailList_'.yii::$app->user->identity->id);

        //处理未选中的项目
        foreach ($mails as $mail)
        {
            $key = array_search($mail,$mailList['avaliable']);
            if ($key!==false)
            {
                array_splice($mailList['avaliable'], $key, 1);
            }
        }

        //处理选中项目
        $mailList['assigned'] = array_merge($mailList['assigned'],$mails);

        //重新暂存数据
        $cache->set('mailList_'.yii::$app->user->identity->id, $mailList, 60*60);

        return $mailList;
    }

    /**
     * 从缓存列表移除
     * @return array|mixed
     */
    public function actionRemove()
    {
        $mails  = $this->postData['mail'];

        $cache = Yii::$app->cache;
        $mailList = $cache->get('mailList_'.yii::$app->user->identity->id);

        //处理未选中的项目
        foreach ($mails as $mail)
        {
            $key = array_search($mail,$mailList['assigned']);
            if ($key!==false)
            {
                array_splice($mailList['assigned'], $key, 1);
            }
        }

        //处理选中项目
        $mailList['avaliable'] = array_merge($mailList['avaliable'],$mails);

        //重新暂存数据
        $cache->set('mailList_'.yii::$app->user->identity->id, $mailList, 60*60);

        return $mailList;
    }

    /**
     * 添加新邮件地址
     * @return mixed
     */
    public function actionAddNewMail(){
        $mails  = $this->postData['mail'];

        $cache = Yii::$app->cache;
        $mailList = $cache->get('mailList_'.yii::$app->user->identity->id);

        //处理选中项目
        array_push($mailList['assigned'],$mails);

        //重新暂存数据
        $cache->set('mailList_'.yii::$app->user->identity->id, $mailList, 60*60);

        return $mailList;
    }

    /**
     * 添加邮件组
     * @param  array $this->postData
     * @return array $this->ajaxReturn
     */
    public function actionDealMessageGroup()
    {
        try{
            $cache = Yii::$app->cache;
            $mailList = $cache->get('mailList_'.yii::$app->user->identity->id);

            if (empty($mailList['assigned']))
            {
                throw new Exception('组成员最少有一个');
            }

            if (!isset($this->postData['groupName']))
            {
                throw new Exception('消息组名称不能为空');
            }

            if (isset($this->postData['id']) && $this->postData['id'])
            {
                $MessageGroupSearch = MessageGroupSearch::findOne($this->postData['id']);
                if (empty($MessageGroupSearch))
                {
                    throw new Exception('未查找到该条记录');
                }

                $MessageGroupSearch->group_name = $this->postData['groupName'];
                $MessageGroupSearch->type       = $this->postData['groupType'];
                $MessageGroupSearch->members    = json_encode($mailList['assigned']);
                $MessageGroupSearch->user_id    = yii::$app->user->identity->id;
                $MessageGroupSearch->updated_at = time();

            }else{
                $MessageGroupSearch = new MessageGroupSearch();

                $MessageGroupSearch->group_name = $this->postData['groupName'];
                $MessageGroupSearch->type       = $this->postData['groupType'];
                $MessageGroupSearch->members    = json_encode($mailList['assigned']);
                $MessageGroupSearch->user_id    = yii::$app->user->identity->id;
                $MessageGroupSearch->created_at = time();
                $MessageGroupSearch->updated_at = time();
            }

            if (!$MessageGroupSearch->save())
            {
                throw new Exception('处理数据失败');
            }

            $cache->delete('mailList_'.yii::$app->user->identity->id);

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = '操作成功';

        }catch (Exception $e){

            $this->ajaxReturn['message'] = $e->getMessage();
        }

        return $this->ajaxReturn;
    }
}