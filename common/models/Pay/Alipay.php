<?php
namespace app\models\Pay;
use app\models\Pay\Alipay\AlipaySubmit;
use yii\base\Component;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/17
 * Time: 16:53
 */
class Alipay extends Component
{
    /**
     * @var string 合作身份者ID，签约账号，以2088开头由16位纯数字组成的字符串，查看地址：https://b.alipay.com/order/pidAndKey.htm
     */
    public $partner;

    /**
     * @var string 收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
     */
    public $seller_id;

    /**
     * @var string MD5密钥，安全检验码，由数字和字母组成的32位字符串，查看地址：https://b.alipay.com/order/pidAndKey.htm
     */
    public $key;

    /**
     * @var string 商户的私钥,此处填写原始私钥，RSA公私钥生成：https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.nBDxfy&treeId=58&articleId=103242&docType=1
     */
    public $private_key_path;

    /**
     * @var string 支付宝的公钥，查看地址：https://b.alipay.com/order/pidAndKey.htm
     */
    public $ali_public_key_path;

    /**
     * @var string 服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
     */
    public $notify_url;

    /**
     * @var string 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
     */
    public $return_url;

    /**
     * @var string 签名方式
     */
    public $sign_type;

    /**
     * @var string 字符编码格式 目前支持utf-8
     */
    public $input_charset;

    /**
     * @var string ca证书路径地址，用于curl中ssl校验 请保证cacert.pem文件在当前文件夹目录中
     */
    public $cacert;

    /**
     * @var string 访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
     */
    public $transport = 'http';

    /**
     * @var string 支付类型 ，无需修改
     */
    public $payment_type = "1";

    /**
     * 产品类型 手机网页支付
     */
    const TYPE_WAP = 'alipay.wap.create.direct.pay.by.user';

    /**
     * 产品类型 即时到帐
     */
    const TYPE_JSDZ = 'create_direct_pay_by_user';

    /**
     * 产品类型 即时到帐
     */
    const TYPE_APP = 'mobile.securitypay.pay';

    /**
     * @var string 产品类型，无需修改 手机网页支付alipay.wap.create.direct.pay.by.user  即时到帐create_direct_pay_by_user
     */
    public $service;

    /**
     * @var string 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
     */
    public $anti_phishing_key = '';

    /**
     * @var string 客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
     */
    public $exter_invoke_ip = '';

    /**
     * 获取支付宝配置
     */
    public function getConfig($type){
        $res = [];
        $alipay = $this;
        $res['service'] = $type;
        $res['partner'] = $alipay->partner;
        $res['seller_id'] = $alipay->seller_id;
        $res['key'] = $alipay->key;
        $res['sign_type'] = $alipay->sign_type;
        $res['input_charset'] = $alipay->input_charset;
        $res['cacert'] = $alipay->cacert;
        $res['transport'] = $alipay->transport;
        $res['payment_type'] = $alipay->payment_type;
        $res['anti_phishing_key'] = $alipay->anti_phishing_key;
        $res['exter_invoke_ip'] = $alipay->exter_invoke_ip;
        $res['return_url'] = '';
        return $res;
    }

    /**
     * 创建订单配置
     * @param string $out_trade_no
     * @param string $total_fee
     * @param string $subject
     * @param string $notify_url
     * @param string $body
     */
    public function unifiedOrder($type,$out_trade_no='',$total_fee='',$subject='',$notify_url='',$body='',$return_url = ''){
        $alipay_config = self::getConfig($type);
        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type"	=> $alipay_config['payment_type'],
            "notify_url"	=> $notify_url,
            "return_url"	=> ($return_url=='')?$alipay_config['return_url']:$return_url,

            "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
            "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
            "out_trade_no"	=> $out_trade_no.'',
            "subject"	=> $subject,
            "total_fee"	=> $total_fee.'',
            "body"	=> $body,
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"
        );
        ApiService::pay_log("支付宝支付参数",$parameter,$out_trade_no,'alipay');
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        return $html_text;
    }
}