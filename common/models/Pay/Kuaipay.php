<?php
namespace app\models\Pay;
use yii\base\Component;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/17
 * Time: 16:53
 */
class Kuaipay extends Component
{
    /**
     * @var string 人民币网关账号，该账号为11位人民币网关商户编号+01,该参数必填。
     */
    public $merchantAcctId;

    /**
     * @var string 编码方式，1代表 UTF-8; 2 代表 GBK; 3代表 GB2312 默认为1,该参数必填。
     */
    public $inputCharset = "1";

    /**
     * @var string 接收支付结果的页面地址，该参数一般置为空即可。
     */
    public $pageUrl = "";

    /**
     * @var string 服务器接收支付结果的后台地址，该参数务必填写，不能为空。
     */
    public $bgUrl = "";

    /**
     * @var string 网关版本，固定值：v2.0,该参数必填。
     */
    public $version =  "v2.0";

    /**
     * @var string 语言种类，1代表中文显示，2代表英文显示。默认为1,该参数必填。
     */
    public $language =  "1";

    /**
     * @var string 签名类型,该值为4，代表PKI加密方式,该参数必填。
     */
    public $signType =  "4";

    /**
     * @var string 支付人姓名,可以为空。
     */
    public $payerName= "";

    /**
     * @var string 支付人联系类型，1 代表电子邮件方式；2 代表手机联系方式。可以为空。
     */
    public $payerContactType =  "1";

    /**
     * @var string 支付人联系方式，与payerContactType设置对应，payerContactType为1，则填写邮箱地址；payerContactType为2，则填写手机号码。可以为空。
     */
    public $payerContact =  "";

    /**
     * @var string 商户订单号，以下采用时间来定义订单号，商户可以根据自己订单号的定义规则来定义该值，不能为空。
     */
    public $orderId = '';

    /**
     * @var string 订单金额，金额以“分”为单位，商户测试以1分测试即可，切勿以大金额测试。该参数必填。
     */
    public $orderAmount = "";

    /**
     * @var string 订单提交时间，格式：yyyyMMddHHmmss，如：20071117020101，不能为空。
     */
    public $orderTime = "";

    /**
     * @var string 商品名称，可以为空。
     */
    public $productName= "";

    /**
     * @var string 商品数量，可以为空。
     */
    public $productNum = "";

    /**
     * @var string 商品代码，可以为空。
     */
    public $productId = "";

    /**
     * @var string 商品描述，可以为空。
     */
    public $productDesc = "";

    /**
     * @var string 扩展字段1，商户可以传递自己需要的参数，支付完快钱会原值返回，可以为空。
     */
    public $ext1 = "";

    /**
     * @var string 扩展自段2，商户可以传递自己需要的参数，支付完快钱会原值返回，可以为空。
     */
    public $ext2 = "";

    /**
     * @var string 支付方式，一般为00，代表所有的支付方式。如果是银行直连商户，该值为10，必填。
     */
    public $payType = "00";

    /**
     * @var string 银行代码，如果payType为00，该值可以为空；如果payType为10，该值必须填写，具体请参考银行列表。
     */
    public $bankId = "";

    /**
     * @var string 同一订单禁止重复提交标志，实物购物车填1，虚拟产品用0。1代表只能提交一次，0代表在支付不成功情况下可以再提交。可为空。
     */
    public $redoFlag = "";

    /**
     * @var string 快钱合作伙伴的帐户号，即商户编号，可为空。
     */
    public $pid = "";

    /**
     * @var string 签名字符串 不可空，生成加密签名串
     */
    public $signMsg = "";

    /**
     * @var string 请求地址
     */
    public $target = "";

    /**
     * 用于检验设备是否是手机
     */
    public function ismobile() {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
            return true;

        //此条摘自TPM智能切换模板引擎，适合TPM开发
        if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
            return true;
        //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA']))
            //找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
        //判断手机发送的客户端标志,兼容性有待6提高
        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array(
                'micromessenger','nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
            );
            //从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        //协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }
        return false;
    }

    public function kq_ck_null($kq_va,$kq_na){
        if($kq_va == ""){
            $kq_va="";
            $res = $kq_va;
        }else{
            $res = $kq_va=$kq_na.'='.$kq_va.'&';
        }
        return $res;
    }

    /**
     * 获取支付方式
     * @param $type string 1表示直接去 储蓄卡快捷支付   2 表示直接去 信用卡快捷
     */
    public function setPayType($type){
        // 1表示直接去 储蓄卡快捷支付   2 表示直接去 信用卡快捷
        $this->payType = "00";
        if(!empty($type)){
            if($type == 1){
                $this->payType = '21-1';
            }else if($type == 2){
                $this->payType = '21-2';
            }
        }
    }

    /**
     * 设置请求地址
     */
    public function setTarget(){
        $kq_target = "https://www.99bill.com/gateway/recvMerchantInfoAction.htm";
        $kq_version = "v2.0";//默认PC版本
        if (self::ismobile()) { //手机端判断，若是手机端更换手机端的POST地址
            $kq_target = "https://www.99bill.com/mobilegateway/recvMerchantInfoAction.htm";
            $kq_version = "mobile1.0";//手机端版本
        }
        $this->target = $kq_target;
        $this->version = $kq_version;
    }

    /**
     * 设置通知地址
     * @param string $notify_url
     */
    public function setNotifyUrl($notify_url = ''){
        $this->pageUrl = $notify_url;
        $this->bgUrl = $notify_url;
    }

    /**
     * 设置订单号
     * @param $orderId
     */
    public function setOrderId($orderId){
        $this->orderId = $orderId;
    }

    /**
     * 设置订单金额，字符金额 以 分为单位 比如 10 元， 应写成 1000	(10)
     * @param $orderAmount
     */
    public function setOrderAmount($orderAmount){
        $this->orderAmount = (float)$orderAmount*100;
    }

    /**
     * 设置交易时间
     * @param $orderTime string 格式：yyyyMMddHHmmss，如：20071117020101，不能为空。
     */
    public function setOrderTime(){
        $this->orderTime = date('YmdHis');
    }

    /**
     * 设置商品名称英文或者中文字符串(256)
     * @param $productName
     */
    public function setProductName($productName){
        $this->productName = $productName;
    }

    /**
     * 设置商品代码，可以是 字母,数字,-,_   (20)
     * @param $productId
     */
    public function setProductId($productId){
        $this->productId = $productId;
    }

    /**
     * 设置商品数量	(8)
     * @param $productNum
     */
    public function setProductNum($productNum){
        $this->productNum = $productNum;
    }

    /**
     * 设置商品描述， 英文或者中文字符串  (400)
     * @param $productDesc
     */
    public function setProductDesc($productDesc){
        $this->productDesc = $productDesc;
    }

    /**
     * 设置附加字段1
     * @param $ext1
     */
    public function setExt1($ext1){
        $this->ext1 = $ext1;
    }

    /**
     * 设置附加字段2
     * @param $ext2
     */
    public function setExt2($ext2){
        $this->ext2 = $ext2;
    }


    /**
     * 获取签名
     * @return mixed
     */
    public function getSignMsg(){
        $kq_all_para=self::kq_ck_null($this->inputCharset,'inputCharset');
        $kq_all_para.=self::kq_ck_null($this->pageUrl,"pageUrl");
        $kq_all_para.=self::kq_ck_null($this->bgUrl,'bgUrl');
        $kq_all_para.=self::kq_ck_null($this->version,'version');
        $kq_all_para.=self::kq_ck_null($this->language,'language');
        $kq_all_para.=self::kq_ck_null($this->signType,'signType');
        $kq_all_para.=self::kq_ck_null($this->merchantAcctId,'merchantAcctId');
        $kq_all_para.=self::kq_ck_null($this->payerName,'payerName');
        $kq_all_para.=self::kq_ck_null($this->payerContactType,'payerContactType');
        $kq_all_para.=self::kq_ck_null($this->payerContact,'payerContact');
        $kq_all_para.=self::kq_ck_null($this->orderId,'orderId');
        $kq_all_para.=self::kq_ck_null($this->orderAmount,'orderAmount');
        $kq_all_para.=self::kq_ck_null($this->orderTime,'orderTime');
        $kq_all_para.=self::kq_ck_null($this->productName,'productName');
        $kq_all_para.=self::kq_ck_null($this->productNum,'productNum');
        $kq_all_para.=self::kq_ck_null($this->productId,'productId');
        $kq_all_para.=self::kq_ck_null($this->productDesc,'productDesc');
        $kq_all_para.=self::kq_ck_null($this->ext1,'ext1');
        $kq_all_para.=self::kq_ck_null($this->ext2,'ext2');
        $kq_all_para.=self::kq_ck_null($this->payType,'payType');
        $kq_all_para.=self::kq_ck_null($this->bankId,'bankId');
        $kq_all_para.=self::kq_ck_null($this->redoFlag,'redoFlag');
        $kq_all_para.=self::kq_ck_null($this->pid,'pid');
        $kq_all_para=substr($kq_all_para,0,strlen($kq_all_para)-1);

        /////////////  RSA 签名计算 ///////// 开始 //
        $priv_key = file_get_contents("./../99bill-rsa.pem");
//        $fp = fopen("./pcarduser.pem", "r");
//        $priv_key = fread($fp, 123456);
//        fclose($fp);
        $pkeyid = openssl_get_privatekey($priv_key);

        // compute signature
        openssl_sign($kq_all_para, $signMsg, $pkeyid,OPENSSL_ALGO_SHA1);

        // free the key from memory
        openssl_free_key($pkeyid);
        $signMsg = base64_encode($signMsg);
        return $signMsg;
    }

    /**
     * 获取支付配置
     */
    public function getConfig(){
        $res = [];
        $res['merchantAcctId'] = $this->merchantAcctId;
        $res['inputCharset'] = $this->inputCharset;
        $res['pageUrl'] = $this->pageUrl;
        $res['bgUrl'] = $this->bgUrl;
        $res['version'] = $this->version;
        $res['language'] = $this->language;
        $res['signType'] = $this->signType;
        $res['payerName'] = $this->payerName;
        $res['payerContactType'] = $this->payerContactType;
        $res['payerContact'] = $this->payerContact;
        $res['ext1'] = $this->ext1;
        $res['ext2'] = $this->ext2;
        $res['bankId'] = $this->bankId;
        $res['redoFlag'] = $this->redoFlag;
        $res['pid'] = $this->pid;
        $res['payType'] = $this->payType;
        $res['orderId'] = $this->orderId;
        $res['orderTime'] = $this->orderTime;
        $res['orderAmount'] = $this->orderAmount;
        $res['productDesc'] = $this->productDesc;
        $res['productId'] = $this->productId;
        $res['productNum'] = $this->productNum;
        $res['productName'] = $this->productName;
        $res['target'] = $this->target;
        $res['signMsg'] = self::getSignMsg();
        return $res;
    }

    /**
     * 订单配置
     * @param $type
     * @param $out_trade_no
     * @param $total_fee
     * @param $notify_url
     * @param $ext1
     * @param string $productName
     * @param string $productId
     * @param string $productNum
     * @param string $productDesc
     * @return array
     */
    public function unifiedOrder($type,$out_trade_no,$total_fee,$notify_url,$ext1,$productName='',$productId = '',$productNum = '',$productDesc = ''){
        self::setPayType($type);
        self::setTarget();
        self::setOrderId($out_trade_no);
        self::setOrderAmount($total_fee);
        self::setOrderTime();
        self::setProductName($productName);
        self::setProductId($productId);
        self::setProductNum($productNum);
        self::setProductDesc($productDesc);
        self::setNotifyUrl($notify_url);
        self::setExt1($ext1);
        $config = self::getConfig();
        ApiService::pay_log("快钱支付参数",$config,$out_trade_no,'kuaipay');
        $html_text = self::buildRequestForm($config);
        return $html_text;
    }

    /**
     * 构造表单
     * @param $config
     * @return string
     */
    public function buildRequestForm($config){
        $html = '';
        $html .= '<form name="kqPay" action="'.$config['target'].'" method="post">';
        $html .= '<input type="hidden" name="inputCharset" value="'.$config['inputCharset'].'" />';
        $html .= '<input type="hidden" name="pageUrl" value="'.$config['pageUrl'].'" />';
        $html .= '<input type="hidden" name="bgUrl" value="'.$config['bgUrl'].'" />';
        $html .= '<input type="hidden" name="version" value="'.$config['version'].'" />';
        $html .= '<input type="hidden" name="language" value="'.$config['language'].'" />';
        $html .= '<input type="hidden" name="signType" value="'.$config['signType'].'" />';
        $html .= '<input type="hidden" name="signMsg" value="'.$config['signMsg'].'" />';
        $html .= '<input type="hidden" name="merchantAcctId" value="'.$config['merchantAcctId'].'" />';
        $html .= '<input type="hidden" name="payerName" value="'.$config['payerName'].'" />';
        $html .= '<input type="hidden" name="payerContactType" value="'.$config['payerContactType'].'" />';
        $html .= '<input type="hidden" name="payerContact" value="'.$config['payerContact'].'" />';
        $html .= '<input type="hidden" name="orderId" value="'.$config['orderId'].'" />';
        $html .= '<input type="hidden" name="orderAmount" value="'.$config['orderAmount'].'" />';
        $html .= '<input type="hidden" name="orderTime" value="'.$config['orderTime'].'" />';
        $html .= '<input type="hidden" name="productName" value="'.$config['productName'].'" />';
        $html .= '<input type="hidden" name="productNum" value="'.$config['productNum'].'" />';
        $html .= '<input type="hidden" name="productId" value="'.$config['productId'].'" />';
        $html .= '<input type="hidden" name="productDesc" value="'.$config['productDesc'].'" />';
        $html .= '<input type="hidden" name="ext1" value="'.$config['ext1'].'" />';
        $html .= '<input type="hidden" name="ext2" value="'.$config['ext2'].'" />';
        $html .= '<input type="hidden" name="payType" value="'.$config['payType'].'" />';
        $html .= '<input type="hidden" name="bankId" value="'.$config['bankId'].'" />';
        $html .= '<input type="hidden" name="redoFlag" value="'.$config['redoFlag'].'" />';
        $html .= '<input type="hidden" name="pid" value="'.$config['pid'].'" />';
        $html .= '<input type="hidden" name="ext2" value="'.$config['ext2'].'" />';
        $html .= '<input type="submit" id="btn_kuaiqian_submit" style="display: none;" name="submit" value="提交到快钱">';
        $html .= '</form>';
        return $html;
    }

    /**
     * 验证通知
     * @param $get
     * @return mixed
     */
    public function verifyNotify($get){
        $kq_check_all_para = self::kq_ck_null($get['merchantAcctId'],'merchantAcctId');
        $kq_check_all_para.= self::kq_ck_null($get['version'],'version');
        $kq_check_all_para.= self::kq_ck_null($get['language'],'language');
        $kq_check_all_para.= self::kq_ck_null($get['signType'],'signType');
        $kq_check_all_para.= self::kq_ck_null($get['payType'],'payType');
        $kq_check_all_para.= self::kq_ck_null($get['bankId'],'bankId');
        $kq_check_all_para.= self::kq_ck_null($get['orderId'],'orderId');
        $kq_check_all_para.= self::kq_ck_null($get['orderTime'],'orderTime');
        $kq_check_all_para.= self::kq_ck_null($get['orderAmount'],'orderAmount');
        $kq_check_all_para.= self::kq_ck_null($get['bindCard'],'bindCard');
        $kq_check_all_para.= self::kq_ck_null($get['bindMobile'],'bindMobile');
        $kq_check_all_para.= self::kq_ck_null($get['dealId'],'dealId');
        $kq_check_all_para.= self::kq_ck_null($get['bankDealId'],'bankDealId');
        $kq_check_all_para.= self::kq_ck_null($get['dealTime'],'dealTime');
        $kq_check_all_para.= self::kq_ck_null($get['payAmount'],'payAmount');
        $kq_check_all_para.= self::kq_ck_null($get['fee'],'fee');
        $kq_check_all_para.= self::kq_ck_null($get['ext1'],'ext1');
        $kq_check_all_para.= self::kq_ck_null($get['ext2'],'ext2');
        $kq_check_all_para.= self::kq_ck_null($get['payResult'],'payResult');
        $kq_check_all_para.= self::kq_ck_null($get['errCode'],'errCode');

        $trans_body=substr($kq_check_all_para,0,strlen($kq_check_all_para)-1);
        $MAC=base64_decode($get['signMsg']);
        $cert = file_get_contents("./../99bill.cert.rsa.20340630.cer");
        $pubkeyid = openssl_get_publickey($cert);
        $ok = openssl_verify($trans_body, $MAC, $pubkeyid);
        return $ok;
    }
}