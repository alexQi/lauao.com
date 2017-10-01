<script type="text/javascript">
    //调用微信JS api 支付
    function jsApiCall(){
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            <?= $payConfig; ?>,
            function(res){
                if(res.err_msg=='get_brand_wcpay_request:ok'){
                    window.location.href = "<?php echo \yii\helpers\Url::to(['/site/default/crab'])?>";
                }else{
                    alert('支付已取消');
                }
            }
        );
    }

    function callpay(){
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall();
        }
    }
    callpay();
</script>