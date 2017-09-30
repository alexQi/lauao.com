<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-6-6
 * Time: 下午2:00
 */

namespace app\models\Pay;

use yii\base\Component;
use app\models\Pay\Unionpay\AcpService;


class Unionpay extends Component
{
    // 验签证书路径（请配到文件夹，不要配到具体文件）
    const SDK_VERIFY_CERT_DIR = '../cert/test_env/';

    const SDK_SIGN_CERT_PATH = '../cert/unionpay.pfx';
    const SDK_FRONT_TRANS_URL = 'https://gateway.95516.com/gateway/api/frontTransReq.do';// 前台请求地址
    const SDK_BACK_TRANS_URL = 'https://gateway.95516.com/gateway/api/backTransReq.do';// 后台请求地址
    const SDK_Card_Request_Url = 'https://gateway.95516.com/gateway/api/cardTransReq.do';//有卡交易地址
    const SDK_App_Request_Url = 'https://gateway.95516.com/gateway/api/appTransReq.do';//App交易地址

//    const SDK_SIGN_CERT_PATH = '../cert/test_env/acp_test_sign.pfx';
//    const SDK_FRONT_TRANS_URL = 'https://101.231.204.80:5000/gateway/api/frontTransReq.do';
//    const SDK_BACK_TRANS_URL = 'https://101.231.204.80:5000/gateway/api/backTransReq.do';
//    const SDK_Card_Request_Url = 'https://101.231.204.80:5000/gateway/api/cardTransReq.do';
//    const SDK_App_Request_Url = 'https://101.231.204.80:5000/gateway/api/appTransReq.do';


    const SDK_BATCH_TRANS_URL = 'https://gateway.95516.com/gateway/api/batchTrans.do';// 批量交易
    const SDK_SINGLE_QUERY_URL = 'https://gateway.95516.com/gateway/api/queryTrans.do';//单笔查询请求地址
    const SDK_FILE_QUERY_URL = 'https://filedownload.95516.com/';//文件传输请求地址

    public $merId;
    public $signPwd;
    public $version;
    public $encoding;
    public $txnType;
    public $txnSubType;
    public $bizType;
    public $frontUrl;
    public $backUrl;
    public $signMethod;
    public $channelType;
    public $accessType;
    public $currencyCode;

    public function unifiedOrder($out_trade_no,$total_fee,$notify_url,$time){

        //构造要请求的参数数组，无需改动
        $params = array(

            //以下信息非特殊情况不需要改动
            'version'     => $this->version,            //版本号
            'encoding'    => $this->encoding,			//编码方式
            'txnType'     => $this->txnType,			//交易类型
            'txnSubType'  => $this->txnSubType,			//交易子类
            'bizType'     => $this->bizType,			//业务类型
            'frontUrl'    => $this->frontUrl,           //前台应答通知地址
            'backUrl'     => $notify_url,	            //后台通知地址
            'signMethod'  => $this->signMethod,	        //签名方法
            'channelType' => $this->channelType,	    //渠道类型，07-PC，08-手机
            'accessType'  => $this->accessType,		    //接入类型
            'currencyCode'=> $this->currencyCode,	    //交易币种，境内商户固定156

            //TODO 以下信息需要填写
            'merId'       => $this->merId,		        //商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
            'orderId'     => $out_trade_no,	            //商户订单号，8-32位数字字母，不能含“-”或“_”，此处默认取demo演示页面传递的参数，可以自行定制规则
            'txnTime'     => $time,	                    //订单发送时间，格式为YYYYMMDDhhmmss，取北京时间，此处默认取demo演示页面传递的参数
            'txnAmt'      => $total_fee,	            //交易金额，单位分，此处默认取demo演示页面传递的参数
        );

        ApiService::pay_log("银联支付参数",json_encode($params),$out_trade_no,'unionpay');

        $params = AcpService::sign($params,self::SDK_SIGN_CERT_PATH,$this->signPwd);
        $html_form = AcpService::createAutoFormHtml($params,self::SDK_FRONT_TRANS_URL);
        return $html_form;
    }

    public function verifyNotify($data){
        return AcpService::validate($data,$cartPath=self::SDK_SIGN_CERT_PATH);
//        return AcpService::validateAppResponse($data,$cartPath=self::SDK_SIGN_CERT_PATH);
    }
}