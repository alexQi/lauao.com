<?php
namespace common\models\Pay;
use common\models\Orders;
use yii;
use yii\base\Exception;

/**
 * 支付服务公共类
 * Class ApiService
 * @package app\models\Pay
 */
class ApiService
{
    /**
     * 创建微信订单
     * @param int $payment_id           支付方式ID
     * @param string $out_trade_no      订单号
     * @param string $total_fee         订单价格
     * @param string $notify_url        通知回调地址
     * @param string $body              商品描述
     * @param string $attach            订单属性
     * @param string $goods_tag         商品标签
     * @return mixed
     */
    public function wxpayCreateOrder($orderInfo){
        //模拟使用，具体使用自行更改逻辑
        $wechat  = \Yii::$app->wechat;
        $out_trade_no = $orderInfo->order_id;
        $total_fee    = $orderInfo->total_money;
        $notify_url   = 'http://www.taozihu.com/site/default/notify';
        if ($orderInfo->combo==1){
            $body = 'A.家庭装套餐';
        }elseif($orderInfo->combo==2){
            $body = 'B.家庭装套餐';
        }elseif($orderInfo->combo==3){
            $body = 'C.家庭装套餐';
        }else{
            return false;
        }
        $attach       = '';
        $goods_tag    = '';
        $code_url     = '';
        if($attach == ''){
            $attach = [];
            $attach['action'] = $body;
        }
        if(is_array($attach)){
            $attach = serialize($attach);
        }
        $goods_tag = ($goods_tag=='')?'':$goods_tag;
        $total_fee  = '0.01';

        return $wechat->unifiedOrder($out_trade_no,$total_fee,$notify_url,$body,$attach,$goods_tag,$code_url);
    }

    /**
     * 默认微信通知回调处理函数
     * @param array     $notify_data
     */
    public function wxpayNotify($notify_data){
        $this->orderSuccess($notify_data['out_trade_no']);
    }

    /**
     * 支付成功
     * @param $orderId
     */
    private function orderSuccess($orderId)
    {
        $orders = new Orders();
        $orderInfo = $orders->find()->where(['order_id'=>$orderId])->one();

        if(!empty($orderInfo)&&$orderInfo->status==1)
        {
            $orderInfo->state = 2;
            $orderInfo->pay_time = time();
            return $orderInfo->save();
        }else{
            return false;
        }
    }
}