<?php
/**
 * Created by PhpStorm.
 * User: 44844
 * Date: 2019/8/18
 * Time: 15:36
 */
use common\models\Pay\Wechat;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>宣城直播创作团队</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>
    <style>
        .footer{
            position: fixed;
            bottom: 0px;
            width: 100%;
            height: 30px;
            padding: 5px;
            border-top: 1px solid #801e99;
            text-align: center;
            color: white;
            background: #031871;

            line-height: 30px;
        }
    </style>
</head>
<body>
<div >

    <div class="layui-row" >
            <div >
                <img class="layui-col-xs12" src="http://image.sboyo.com/ahwes_app_images.jpg" />
            </div>

    </div>
    <div class="footer" >皖ICP备17005514号-1 皖网文[2019] 4652-199 号</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"/>

<script>

    /*
     * 注意：
     * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
     * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
     * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
     *
     * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
     * 邮箱地址：weixin-open@qq.com
     * 邮件主题：【微信JS-SDK反馈】具体问题
     * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
     */
    wx.config({
        debug: true,
        appId: '<?php echo $data["appId"];?>',
        timestamp: <?php echo $data["timestamp"];?>,
        nonceStr: '<?php echo $data["nonceStr"];?>',
        signature: '<?php echo $data["signature"];?>',
        jsApiList: [
            'checkJsApi',//判断当前客户端版本是否支持指定JS接口
            'onMenuShareTimeline',//分享到朋友圈
        ]
    });
    wx.ready(function () {
        // 分享到朋友圈
        // wx.onMenuShareTimeline({
        //     title: '测试朋友圈', // 商品名
        //     link: 'http://umk2hh.natappfree.cc/v1/web/oauth', // 分享链接   与公众号后台一致
        //     desc: '测试分享到朋友圈', // 描述
        //     imgUrl: 'http://135523_DRVV_1444646.jpg', // 分享的图标
        //     fail: function (res) {
        //         alert(JSON.stringify(res));
        //     }
        // });
        wx.updateAppMessageShareData({
            title: '维尔斯直播团队', // 分享标题
            desc: '让直播成为生活的标配', // 分享描述
            link: 'https://www.ahwes.com/movie-default-newabout.html', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: 'https://www.ahwes.com/xinpian/images/sharelogo.jpg', // 分享图标
            success: function () {
                // 设置成功
            }
        })
    });

</script>

</div>
