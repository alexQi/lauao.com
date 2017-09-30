<?php
namespace app\models\Pay;
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
     * 记录日志
     * @param $msg
     * @param string $file
     */
    public function log($msg,$category = 'payment.entryway'){
        if(is_array($msg)){
            $msg = json_encode($msg);
        }
        \Yii::info($msg,$category);
    }

    /**
     * 添加支付日志
     * @param string $msg
     * @param string $out_trade_no
     * @param string $type
     */
    public static function pay_log($msg="",$data = '',$out_trade_no="",$type="")
    {
        return TRUE;
        $log = new PayLog();
        $log->log = $msg;
        $log->out_trade_no = $out_trade_no;
        if(is_array($data)){
            $data = json_encode($data);
        }
        $log->data = $data;
        $log->type = $type;
        $log->created_at = time();
        $log->input_time = date('Y-m-d H:i:s',$log->created_at);
        $log->save();
    }

    /**
     * 创建支付宝订单
     * @param $payment_id
     * @param string $out_trade_no
     * @param string $total_fee
     * @param string $subject
     * @param string $notify_url
     * @param string $body
     * @return mixed
     */
    public function alipayCreateOrder($orderInfo){
        //模拟使用，具体使用自行更改逻辑
        $alipay = \Yii::$app->alipay;
        $payment = Payment::findOne(\Yii::$app->params['alipay']);
        $out_trade_no = $orderInfo->orderId;
        $total_fee    = $orderInfo->paidPrice;
        $notify_url   = $payment['notify_url'].'-1';
        $notify_url   = $notify_url.'-'.(isset($orderInfo->classTitle) ? '1':'2');

        $body         = isset($orderInfo->classTitle) ? $orderInfo->classTitle : '余额充值';
        $subject      = isset($orderInfo->classTitle) ? $orderInfo->classTitle : '余额充值';

        $return_url   = \Yii::$app->params['payFrontDomain'].'/front/payment/success';
//        if(SITE_ENV==="development" || SITE_ENV==="developtest")
//        {
//            $return_url = \Yii::$app->params['payFrontDomainTest'].'/front/payment/success';
//            $total_fee  = '0.01';
//        }

        return $alipay->unifiedOrder($type,$out_trade_no,$total_fee,$subject,$notify_url,$body,$return_url);
    }

    /**
     * 创建快钱网银支付订单
     * @param $payment_id
     * @param string $out_trade_no
     * @param string $total_fee
     * @param string $subject
     * @param string $notify_url
     * @param string $body
     * @return mixed
     */
    public function kuaipayCreateOrder($orderInfo){
        //模拟使用，具体使用自行更改逻辑
        $kuaipay = \Yii::$app->kuaipay;
        $payment = Payment::findOne(\Yii::$app->params['KuaipayCXK']);
        $notify_url = $payment['notify_url'].'-1';
        $notify_url   = $notify_url.'-'.(isset($orderInfo->classTitle) ? '1':'2');
        $out_trade_no = $orderInfo->orderId;
        $total_fee = $orderInfo->paidPrice;
        $ext1 = '';
        $productName = isset($orderInfo->classTitle) ? $orderInfo->classTitle : '余额充值';
        $productDesc = isset($orderInfo->classTitle) ? $orderInfo->classTitle : '余额充值';

        $productId = isset($orderInfo->codeClassId) ? $orderInfo->codeClassId : '';
        $productNum = 1;

//        if(SITE_ENV==="development" || SITE_ENV==="developtest")
//        {
//            $total_fee  = '1';
//        }
        return $kuaipay->unifiedOrder($orderInfo->kType,$out_trade_no,$total_fee,$notify_url,$ext1,$productName,$productId,$productNum,$productDesc);
    }

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
        $payment = Payment::findOne(\Yii::$app->params['wechat']);
        $out_trade_no = $orderInfo->orderId;
        $total_fee    = $orderInfo->paidPrice;
        $notify_url   = $payment['notify_url'].'-1';
        $notify_url   = $notify_url.'-'.(isset($orderInfo->classTitle) ? '1':'2');
        $body         = isset($orderInfo->classTitle) ? $orderInfo->classTitle : '余额充值';
        $attach       = '';
        $goods_tag    = '';
        $code_url     = '';
        if($attach == ''){
            $attach = [];
            $attach['action'] = $payment['action'];
        }
        if(is_array($attach)){
            $attach = serialize($attach);
        }
        $goods_tag = ($goods_tag=='')?'':$goods_tag;
//        if(SITE_ENV==="development" || SITE_ENV==="developtest")
//        {
//            $total_fee  = '0.01';
//        }
        return $wechat->unifiedOrder($out_trade_no,$total_fee,$notify_url,$body,$attach,$goods_tag,$code_url);
    }

    /**
     * 创建记录
     * @param $orderInfo
     * @param $type
     */
    public function createPaymentRecord($oid,$type,$useFund=0){
        $mod = new MembersBuyersOrders();
        $orderInfo = $mod->getInfoByOrderId($oid);
        if(!empty($orderInfo)){
            $PaymentRecord = PaymentRecord::find()->where(['oid'=>$oid])->one();
            if(empty($PaymentRecord)){
                $PaymentRecord = new PaymentRecord();
                $PaymentRecord->oid = $oid;
                $PaymentRecord->member_id = $orderInfo->mem_id;
                $PaymentRecord->mobile = $orderInfo->mem_mobile;
                $PaymentRecord->price = $useFund==1 ? $orderInfo->paidPrice-$orderInfo->fund : $orderInfo->paidPrice;
                $PaymentRecord->state = \Yii::$app->params['frontPaymentRecordNoPay'];
                $PaymentRecord->pay_type = $type;
                $PaymentRecord->pay_remark = '';
                $PaymentRecord->pay_time = 0;
                $PaymentRecord->updatetime = 0;
                $PaymentRecord->inputtime = time();

            }else{
                $PaymentRecord->price = $useFund==1 ? $orderInfo->paidPrice-$orderInfo->fund : $orderInfo->paidPrice;
                $PaymentRecord->pay_type = $type;
                $PaymentRecord->updatetime = time();
            }
            if ($PaymentRecord->save())
            {
                $result = $PaymentRecord;
            }else{
                $result = false;
            }
        }else{
            $result = false;
        }

        return $result;
    }

    /**
     * 创建充值付款记录
     * @param $data
     * @return PaymentRecord|bool
     */
    public function createRechargePaymentRecord($data){
        $PaymentRecord = new PaymentRecord();
        $PaymentRecord->oid = isset($data['oid']) ? $data['oid'] : 0;
        $PaymentRecord->member_id = $data['mem_id'];
        $PaymentRecord->mobile = $data['mem_mobile'];
        $PaymentRecord->price = $data['paidPrice'];
        $PaymentRecord->state = \Yii::$app->params['frontPaymentRecordNoPay'];
        $PaymentRecord->pay_type = $data['type'];
        $PaymentRecord->pay_remark = '';
        $PaymentRecord->pay_time = 0;
        $PaymentRecord->updatetime = 0;
        $PaymentRecord->inputtime = time();
        if ($PaymentRecord->save())
        {
            return $PaymentRecord;
        }else{
            return false;
        }
    }

    private function updatePaymentRecord($out_trade_no,$transaction_id){
        $tran = yii::$app->db->beginTransaction();
        try{
            $order = MembersBuyersOrders::find()->where(['orderId'=>$out_trade_no])->one();
            if(empty($order)){
                throw new Exception('该订单不存在');
            }

            $this->log('orderInfo：'.json_encode($order),'payment.entryway.alipay_notify');
            $PaymentRecord = PaymentRecord::find()->where(['oid'=>$order['id']])->one();
            $this->log('paymentInfo'.$PaymentRecord->id,'payment.entryway.alipay_notify');
            if(empty($PaymentRecord->id)){
                throw new Exception('未查询到缴费记录');
            }
            if ($PaymentRecord->state == \Yii::$app->params['frontPaymentRecordPaySuccess']){
                throw new Exception('数据已处理');
            }

            //更新订单支付方式
            if ($order->payMethod != $PaymentRecord->pay_type){
                $order->payMethod = $PaymentRecord->pay_type;
                if (!$order->save()){
                    throw new Exception('修改订单支付方式失败');
                }
            }

            $PaymentRecord->state = \Yii::$app->params['frontPaymentRecordPaySuccess'];
            $PaymentRecord->pay_remark = json_encode(['out_trade_no'=>$out_trade_no,'trade_no'=>$transaction_id]);
            $PaymentRecord->pay_time = time();
            $PaymentRecord->updatetime = time();
            if (!$PaymentRecord->save()){
                throw new Exception('修改缴费记录状态失败');
            }
            //获取学生信息
            $studentInfo = Students::find()->where(['member_id'=>$PaymentRecord->member_id])->one();
            //获取资金信息
            $memberFund  = MemberFund::find()->where(['member_id'=>$PaymentRecord->member_id])->one();

            //插入充值记录--------------------------------------------------
            $memberFundLog  = new MemberFundLog();
            $memberFundLog->member_id   = $PaymentRecord->member_id;
            $memberFundLog->student_id  = $studentInfo->id;
            $memberFundLog->change_type = MemberFundLog::CHANGE_TYPE_RECHARGE;
            $memberFundLog->before_fund = empty($memberFund) ? '0.00' : $memberFund->fund;
            $memberFundLog->change_fund = $PaymentRecord->price;
            $memberFundLog->result_fund = sprintf('%.2f',floatval($memberFundLog->before_fund) + floatval($PaymentRecord->price));
            $memberFundLog->change_info = MemberFundLog::$RECHARGE_TYPE_LIST[$PaymentRecord->pay_type];
            $memberFundLog->change_remark    = '充值订单ID:'.$out_trade_no.',外部ID:'.$transaction_id;
            $memberFundLog->operation_remark = $PaymentRecord->pay_remark;
            $memberFundLog->input_time    = time();

            if (!$memberFundLog->save()){
                throw new Exception('插入资金流水充值记录失败');
            }

            if (!empty($memberFund))
            {
                $memberFund->fund     += $PaymentRecord->price;
                $memberFund->recharge += $PaymentRecord->price;
                $memberFund->update_time = time();
            }else{
                $memberFund = new MemberFund();
                $memberFund->member_id  = $PaymentRecord->member_id;
                $memberFund->fund       = $PaymentRecord->price;
                $memberFund->recharge   = $PaymentRecord->price;
                $memberFund->input_time = time();
            }

            if (!$memberFund->save()){
                throw new Exception('修改用户资金失败:充值');
            }
            //充值完毕 ---------------------------------------

            //获取资金信息
            $memberFund  = MemberFund::find()->where(['member_id'=>$PaymentRecord->member_id])->one();

            //插入消费记录 ------------------------------------
            $memberFundLog  = new MemberFundLog();
            $memberFundLog->member_id   = $PaymentRecord->member_id;
            $memberFundLog->student_id  = $studentInfo->id;
            $memberFundLog->change_type = MemberFundLog::CHANGE_TYPE_CONSUME;
            $memberFundLog->before_fund = $memberFund->fund;
            $memberFundLog->change_fund = $order->paidPrice;
            $memberFundLog->result_fund = sprintf('%.2f',floatval($memberFundLog->before_fund) - floatval($order->paidPrice));
            $memberFundLog->change_info = '购买课程：购买课程'.$order->classTitle;
            $memberFundLog->change_remark    = '前台接口订单支付,订单ID:'.$order->id;
            $memberFundLog->operation_remark = $PaymentRecord->pay_remark;
            $memberFundLog->input_time    = time();

            if (!$memberFundLog->save()){
                throw new Exception('插入资金流水消费记录失败');
            }

            if (!empty($memberFund))
            {
                $memberFund->fund     -= $order->paidPrice;
                $memberFund->consume  += $order->paidPrice;
                $memberFund->update_time = time();
            }else{
                throw new Exception('用户资金异常');
            }

            if (!$memberFund->save()){
                throw new Exception('修改用户资金失败:消费');
            }
            //消费记录-----------------------------------------

            $tran->commit();

            $res['state']   = 1;
            $res['message'] = 'success';
        }catch (Exception $e){
            $res['state']   = -1;
            $res['message'] = $e->getMessage();
        }

        return $res;
    }

    private function rechargeUpdateRecord($out_trade_no,$transaction_id){
        $id = explode("RR",$out_trade_no);
        $tran = yii::$app->db->beginTransaction();
        try{
            $PaymentRecord = PaymentRecord::findOne($id[1]);

            if (empty($PaymentRecord)){
                throw new Exception('未查询到缴费记录');
            }
            if ($PaymentRecord->state == \Yii::$app->params['frontPaymentRecordPaySuccess']){
                throw new Exception('数据已处理');
            }
            $PaymentRecord->state = \Yii::$app->params['frontPaymentRecordPaySuccess'];
            $PaymentRecord->pay_remark = json_encode(['out_trade_no'=>$out_trade_no,'trade_no'=>$transaction_id]);
            $PaymentRecord->pay_time = time();
            $PaymentRecord->updatetime = time();
            if (!$PaymentRecord->save()){
                throw new Exception('修改缴费记录状态失败');
            }
            //获取学生信息
            $studentInfo = Students::find()->where(['member_id'=>$PaymentRecord->member_id])->one();
            //获取资金信息
            $memberFund  = MemberFund::find()->where(['member_id'=>$PaymentRecord->member_id])->one();

            $memberFundLog  = new MemberFundLog();
            $memberFundLog->member_id   = $PaymentRecord->member_id;
            $memberFundLog->student_id  = $studentInfo->id;
            $memberFundLog->change_type = MemberFundLog::CHANGE_TYPE_RECHARGE;
            $memberFundLog->before_fund = empty($memberFund) ? '0.00' : $memberFund->fund;
            $memberFundLog->change_fund = $PaymentRecord->price;
            $memberFundLog->result_fund = sprintf('%.2f',floatval($memberFundLog->before_fund) + floatval($PaymentRecord->price));
            $memberFundLog->change_info = MemberFundLog::$RECHARGE_TYPE_LIST[$PaymentRecord->pay_type];
            $memberFundLog->change_remark    = '充值订单ID:'.$out_trade_no.',外部订单ID:'.$transaction_id;
            $memberFundLog->operation_remark = $PaymentRecord->pay_remark;
            $memberFundLog->input_time    = time();

            if (!$memberFundLog->save()){
                throw new Exception('插入资金流水记录失败');
            }

            if (!empty($memberFund))
            {
                $memberFund->fund     += $PaymentRecord->price;
                $memberFund->recharge += $PaymentRecord->price;
                $memberFund->update_time = time();
            }else{
                $memberFund = new MemberFund();
                $memberFund->member_id  = $PaymentRecord->member_id;
                $memberFund->fund       = $PaymentRecord->price;
                $memberFund->recharge   = $PaymentRecord->price;
                $memberFund->input_time = time();
            }

            if (!$memberFund->save()){
                throw new Exception('修改用户资金失败');
            }

            $tran->commit();

            $res['state']   = 1;
            $res['message'] = 'success';
        }catch (Exception $e){
            $res['state']   = -1;
            $res['message'] = $e->getMessage();
        }
        $this->log('orderInfo：'.json_encode($res).",$PaymentRecord->state,$PaymentRecord->id",'payment.entryway');
        return $res;
    }


    /**
     * 默认微信通知回调处理函数
     * @param array     $notify_data
     * @param Payment   $mod
     */
    public function wxpayNotify($notify_data,$flag=''){
        if ($flag==2){
            self::rechargeUpdateRecord($notify_data['out_trade_no'],$notify_data['transaction_id']);
        }else{
            //业务逻辑
            $this->orderSuccess($notify_data['out_trade_no']);
            //更新记录表
            self::updatePaymentRecord($notify_data['out_trade_no'],$notify_data['transaction_id'],true);
        }
    }

    /**
     * 支付宝通知回调处理函数
     * @param boolean $verify_result
     * @param Payment $mod
     * @param array $post
     * @return string
     */
    public function alipayNotify($verify_result,$post,$flag=''){

        if($verify_result) {//验证成功
            $out_trade_no = $post['out_trade_no'];
            $trade_no = $post['trade_no'];
            if($post['trade_status'] == 'TRADE_FINISHED') {
                //判断该笔订单是否在商户网站中已经做过处理
                //不做处理
            }else if ($post['trade_status'] == 'TRADE_SUCCESS') {
                //更新记录表
                if($flag==2){
                    self::rechargeUpdateRecord($out_trade_no,$trade_no);
                }else{
                    self::updatePaymentRecord($out_trade_no,$trade_no);
                    $this->orderSuccess($out_trade_no);
                }
            }
            $res = "success";		//请不要修改或删除
        }else {
            $res = "fail";
        }
        return $res;
    }

    /**
     * 快钱通知回调处理函数
     * @param $verify_result
     * @param $mod
     * @param $post
     * @return string
     */
    public function kuaipayNotify($verify_result,$post,$flag=''){
        $res = '';
        if ($verify_result == 1) {
            switch ($post['payResult']) {
                case '10':
                    //此处做商户逻辑处理
                    $rtnOK = 1;
                    //更新记录表
                    if($flag==2){
                        self::rechargeUpdateRecord($post['orderId'],$post['dealId']);
                    }else{
                        self::updatePaymentRecord($post['orderId'],$post['dealId']);
                        $this->orderSuccess($post['orderId']);
                    }

                    $rtnUrl = \Yii::$app->params['kuaipay_success_rtn_url'];
                    break;
                default:
                    $rtnOK = 1;
                    $rtnUrl= \Yii::$app->params['kuaipay_false_rtn_url'];
                    break;
            }
        } else {
            $rtnOK = 0;
            //以下是我们快钱设置的show页面，商户需要自己定义该页面。
            $rtnUrl= \Yii::$app->params['kuaipay_error_rtn_url'];
        }

        if(SITE_ENV==="development" || SITE_ENV==="developtest")
        {
            $rtnUrl = \Yii::$app->params['payFrontDomainTest'].$rtnUrl;
        }else if(SITE_ENV==="production"){
            $rtnUrl = \Yii::$app->params['payFrontDomain'].$rtnUrl;
        }
        $order = MembersBuyersOrders::find()->where(['orderId'=>$post['orderId']])->asArray()->one();
        if(!empty($order)){
            $rtnUrl = $rtnUrl.'?oid='.$order['id'];
        }
        $res .= '<result>' . $rtnOK . '</result> <redirecturl>' . $rtnUrl . '</redirecturl>';

        return $res;
    }

    /**
     * 银联后台通知回调处理函数
     * @param array     $notify_data
     * @param Payment   $mod
     */
    public function unionpayNotify($verify_status,$notify_data,$flag=''){
        if ($verify_status){
            //业务逻辑
            if($flag==2){
                self::rechargeUpdateRecord($notify_data['orderId'], $notify_data['queryId']);
            }else {
                $this->orderSuccess($notify_data['orderId']);
                //更新记录表
                self::updatePaymentRecord($notify_data['orderId'], $notify_data['queryId']);
            }
        }
    }

    /**
     * 支付成功
     * @param $orderId
     */
    private function orderSuccess($orderId)
    {
        $orders = new MembersBuyersOrders();
        $orderInfo = $orders->getInfoByOrderOid($orderId);

        if(!empty($orderInfo)&&$orderInfo->state==7){
            $orderInfo->state = MembersBuyersOrders::ORDER_STATUS_TAKE_EFFECT;
            $orderInfo->paidTime = time();
            $orderInfo->save();

            $memberId = $orderInfo->mem_id;
            //更改优惠券状态
            $coupon = CouponInfo::find()->where(['order_id'=>$orderInfo->id])->one();
            if(!empty($coupon)){
                $coupon->state = \Yii::$app->params['adminCouponStateIsUse'];
                $coupon->save();
                CouponServer::updateCouponNum($coupon->coupon_id);
            }

            $oc = MembersBuyersOrders::find()->where(['mem_id'=>$memberId,'state'=>MembersBuyersOrders::ORDER_STATUS_TAKE_EFFECT,'order_type'=>'2'])->count();
            if($oc==1){
                $mod = new CouponInfo();
                //给予优惠券
                $mod->setByMemberId($memberId,\Yii::$app->params['frontCouponTypeFirstPayment']);
            }

            $MembersBuyersOrdersServer = new MembersBuyersOrdersServer();
            $MembersBuyersOrdersServer->order_id = $orderInfo->id;
            $MembersBuyersOrdersServer->pushMessage();

            //排课
            \Yii::$app->beanstalk->putInTube("order.set",$orderId);

            //同步商品季度到学生
            $roomSeason = json_decode($orderInfo['class_season']);
            $season     = $roomSeason->year.'-'.$roomSeason->season;

            $studentInfo = Students::findOne($orderInfo->student_id);

            if (strpos($studentInfo->season,$season)===false)
            {
                $studentInfo->season = $studentInfo->season.','.$season;
            }

            $studentInfo->save();
        }
    }

    /**
     * 创建支付宝订单
     * @param $payment_id
     * @param string $out_trade_no
     * @param string $total_fee
     * @param string $subject
     * @param string $notify_url
     * @param string $body
     * @return mixed
     */
    public function alipayCreateOrderWx($payment_id,$out_trade_no='',$total_fee='',$subject='',$notify_url='',$body='',$return_url = ''){
        //模拟使用，具体使用自行更改逻辑
        $alipay = \Yii::$app->alipay;
        $payment = Payment::findOne($payment_id);
        $out_trade_no = ($out_trade_no=='')?'CSV'.date('Ymd').time():$out_trade_no;
        $total_fee = ($total_fee=='')?((PAY_DEBUG)?\Yii::$app->params['alipay_price']:''):$total_fee;
        $notify_url = ($notify_url=='')?$payment['notify_url']:$notify_url;
        $body = ($body=='')?\Yii::$app->params['alipay_body']:$body;
        $subject = ($subject=='')?\Yii::$app->params['alipay_subject']:$subject;
        if( $notify_url != '')
            $notify_url = $notify_url.'-1';
        return $alipay->unifiedOrder(Alipay::TYPE_JSDZ,$out_trade_no,$total_fee,$subject,$notify_url,$body,$return_url);
    }

    /**
     * 创建快钱网银支付订单
     * @param $payment_id
     * @param string $out_trade_no
     * @param string $total_fee
     * @param string $subject
     * @param string $notify_url
     * @param string $body
     * @return mixed
     */
    public function kuaipayCreateOrderWx($payment_id,$type,$out_trade_no = '',$total_fee = '',$notify_url = '',$ext1 = '',$productName='',$productId = '',$productNum = '',$productDesc = ''){
        //模拟使用，具体使用自行更改逻辑
        $kuaipay = \Yii::$app->kuaipay;
        $payment = Payment::findOne($payment_id);
        $notify_url = ($notify_url=='')?$payment['notify_url']:$notify_url;
        $out_trade_no = ($out_trade_no=='')?'CS'.date('Ymd').time():$out_trade_no;
        $total_fee = ($total_fee=='')?((PAY_DEBUG)?\Yii::$app->params['kuaipay_price']:'0.01'):$total_fee;
        if( $notify_url != '')
            $notify_url = $notify_url.'-1';
        return $kuaipay->unifiedOrder($type,$out_trade_no,$total_fee,$notify_url,$ext1,$productName,$productId,$productNum,$productDesc);
    }

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
    public function wxpayCreateOrderWx($payment_id,$out_trade_no = '',$total_fee = '',$notify_url = '',$body = '',$attach = '',$goods_tag = '',$code_url = ''){
        //模拟使用，具体使用自行更改逻辑
        $wechat = \Yii::$app->wechat;
        $payment = Payment::findOne($payment_id);
        $out_trade_no = ($out_trade_no=='')?'CS'.date('Ymd').time():$out_trade_no;
        $total_fee = ($total_fee=='')?((PAY_DEBUG)?\Yii::$app->params['wechat_price']:''):$total_fee;
        $notify_url = ($notify_url=='')?$payment['notify_url']:$notify_url;
        $body = ($body=='')?\Yii::$app->params['wechat_body']:$body;
        if($attach == ''){
            $attach = [];
            $attach['action'] = $payment['action'];
        }
        if(is_array($attach)){
            $attach = serialize($attach);
        }
        $goods_tag = ($goods_tag=='')?'':$goods_tag;
        if( $notify_url != '')
            $notify_url = $notify_url.'-1';
        return $wechat->unifiedOrder($out_trade_no,$total_fee,$notify_url,$body,$attach,$goods_tag,$code_url);
    }
}