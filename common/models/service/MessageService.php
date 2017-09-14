<?php
namespace common\models\service;

use common\models\Message;
use common\components\yii2beanstalk\Beanstalk;

class MessageService extends Message
{
    public function saveMessage($param)
    {
        $this->title = $param['title'];
        $this->from = key($param['from']);
        $this->from_user_id = $param['from_user_id'];
        $this->from = key($param['from']);
        $this->to = $param['to'];
        $this->content = $param['content'];
        $this->created_at = $param['created_at'];
        $this->updated_at = $param['updated_at'];

        return $this->save();
    }

    public function saveiMessage($param)
    {
        $this->title = '用户消息';
        $this->type = 2;
        $this->from         = '0';
        $this->from_user_id = $param['from_user_id'];
        $this->to_user_id   = $param['to_user_id'];
        $this->to           = '0';
        $this->content      = $param['content'];
        $this->status       = 2;
        $this->is_read      = $param['isRead'];
        $this->created_at   = $param['create_time'];
        $this->updated_at   = $param['create_time'];

        return $this->save();
    }

    public static function InToQueue($data){
        $beanstalk = new Beanstalk();
        return $beanstalk->putInTube('oliu.sendEmail',$data);
    }
}