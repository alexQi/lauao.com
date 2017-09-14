<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-7-12
 * Time: 下午5:00
 */
namespace console\controllers;

use yii;
use yii\console\Controller;
use yii\base\Exception;
use common\components\yii2beanstalk\Beanstalk;
use common\models\service\MessageService;
use common\models\Mail;
use common\models\Api;

class ConsController extends Controller
{

    public function actionIndex()
    {
        $beanstalk = new Beanstalk();
        $beanstalk->useTube('oliu.sendEmail');
        $beanstalk->watch('oliu.sendEmail');

        while (true){
            $job  = $beanstalk->reserve();
            try{
                $data = $job->getData();

                $param = json_decode(json_encode($data,JSON_UNESCAPED_UNICODE),true);

                $mail = new Mail();
                $res = $mail->SendMail($param);

                if (!$res){
                    throw new Exception('发送失败');
                }
                $beanstalk->delete($job);
            }catch (Exception $e)
            {
                $beanstalk->release($job,5,10);
                echo $e->getMessage();
            }
        }
    }

    public function actionSaveImessage()
    {
        $beanstalk = new Beanstalk();
        $beanstalk->useTube('oliu.saveiMassage');
        $beanstalk->watch('oliu.saveiMassage');

        while (true){
            $job  = $beanstalk->reserve();
            try{
                $data = $job->getData();

                $param = json_decode(json_encode($data,JSON_UNESCAPED_UNICODE),true);

                $message = new MessageService();
                $res = $message->saveiMessage($param);
//                var_dump($message->getFirstError());
                if (!$res){
                    throw new Exception('持久化消息失败');
                }
                $beanstalk->delete($job);
            }catch (Exception $e)
            {
                $beanstalk->release($job,5,10);
                echo $e->getMessage();
            }
        }
    }

    public function actionInvokeWork(){
        //初始化Api
        $api = new Api();
        $api->queryParam['queryString'] = '杭州天气';

        $api->getApiInfo();

        $data['content'] = $api->run();
        $data['title']   = $api->queryParam['queryString'];
        $data['to']      = 'alex.qiubo@qq.com';
        $data['from'] = [
            'alex.qiubo@qq.com' => 'Alex'
        ];

        if (MessageService::InToQueue(json_encode($data)))
        {
            $messageInfo = new MessageService();
            $messageInfo->title = $data['title'];
            $messageInfo->from_user_id = 3;
            $messageInfo->from = key($data['from']);
            $messageInfo->to   = $data['to'];
            $messageInfo->content = $data['content'];
            $messageInfo->status = 2;
            $messageInfo->created_at = time();
            $messageInfo->updated_at = time();

            $result = $messageInfo->save();
        }else{
            $result = false;
        }
        return $result;
    }

    public function actionDeleteAll(){
        $beanstalk = new Beanstalk();
        $beanstalk->useTube('oliu.sendEmail');
        $beanstalk->watch('oliu.sendEmail');

        while ($job  = $beanstalk->reserve(0))
        {
            $beanstalk->delete($job);
        }
    }
}