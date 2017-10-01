<?php

use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,aItemress=no">
    <title>美女与螃蟹中秋大抢购</title>
    <link rel="stylesheet" type="text/css" href="/css/aui.css"/>
    <link rel="stylesheet" type="text/css" href="/css/aui-slide.css"/>
    <link rel="stylesheet" type="text/css" href="/css/video-js.css">

    <style type="text/css">


        .video-js .vjs-big-play-button {
            margin: 0 auto;
            top: 40%;
            position: inherit;
        }

        .goods-title {
            color: #757575 !important;
        }

        .goods-price {
            color: #666666 !important;
            font-weight: 700;
        }

        .checklist {
            text-align: center;
            margin-top: 30px
        }

        .layui-layer-btn0 {
            font-size: 0.75rem;
        }

        /* 订单确认样式 */
        body .confim-class .layui-layer-title {
            background: #c00;
            color: #fff;
            border: none;
        }

        body .confim-class .layui-layer-btn {
            border-top: 1px solid #E9E7E7
        }

        body .confim-class .layui-layer-btn a {
            background: #333;
        }

        body .confim-class .layui-layer-btn .layui-layer-btn1 {
            background: #999;
        }

        .aui-bar-btn-item.aui-active {
            background-color: transparent;
            color: #212121;
        }

        .aui-bar-btn {
            min-height: 0.3rem;
        }

        .aui-btn.aui-btn.aui-btn-outlined.aui-btn-warning {
            margin-left: 65px;
            margin-top: 5px;
        }

        .my-anim {
            animation: twinkling 1.5s infinite ease-in-out;
        }

        @keyframes twinkling { /*透明度由0到1*/
            0% {
                opacity: 0.4;
                透明度为0
            }
            50% {
                opacity: 0.7; /*透明度为0*/
            }
            100% {
                opacity: 1; /*透明度为1*/
            }
        }


    </style>


</head>

<body>

<div id="aui-slide3">
    <div class="aui-slide-wrap">
        <div class="aui-slide-node bg-dark">

            <div class="m">

                <video id="my-video" class="video-js" controls preload="auto" poster="/images/banner2.jpg" height="210"
                       x5-playsinline="" playsinline="" webkit-playsinline=""
                       data-setup="{}">
                    <source src="http://advert.ztwliot.com/QB1506764582" type="video/mp4">
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
            </div>
        </div>
        <div class="aui-slide-node bg-dark">
            <img src="/images/banner2.jpg"/>

        </div>
        <div class="aui-slide-node bg-dark">
            <img src="/images/banner3.jpg"/>

        </div>
        <div class="aui-slide-node bg-dark">
            <img src="/images/banner1.jpg"/>

        </div>


    </div>
    <div class="aui-slide-page-wrap">
        <!--分页容器-->
    </div>
</div>


<div class="aui-tips aui-margin-b-2 aui-margin-t-2 aui-bg-danger" id="tips-1">

    <i class="aui-iconfont aui-icon-info "></i>

    <div class="aui-tips-title my-anim">当前渠道总销售数量:<?php echo isset($res['total_num']) ? $res['total_num'] : 0; ?> <span style="margin-left:5px;"></span>
        总销售额:￥<?php echo isset($res['all_money']) ? $res['all_money'] : 0; ?>
        
    </div>

    <i class="aui-iconfont aui-icon-close" tapmode onclick="closeTips('tips-1')"></i>

</div>

<section class="aui-content" style="margin:5px 0px 10px 0px">
    <div class="aui-tips aui-margin-b-2 aui-margin-t-2 aui-bg-warning" id="tips-2" style="height:100px">

        <div style="line-height:25px;">
            <small>选择下面任意套餐
                我们贴心的为大家准备了工具包
                里面有紫苏包、养胃姜茶、洗手茶还有剪刀一把另配专门的蟹醋一瓶.
            </small>
        </div>

        <i class="aui-iconfont aui-icon-close" tapmode onclick="closeTips('tips-2')"></i>

    </div>
</section>

<section id="crab_1" class="aui-content">

    <div class="aui-card-list">
        <div class="aui-card-list-header aui-card-list-user">
            <div class="aui-card-list-user-avatar">
                <img src="/images/crab.png">
            </div>
            <div class="aui-card-list-user-name">
                <div class="aui-font-size-16">A.家庭装<i class="aui-iconfont aui-icon-right aui-font-size-12"></i></div>
                <small class="aui-font-size-14 aui-text-danger">￥188</small>
            </div>
            <div class="aui-card-list-user-info">舌尖美味 餐桌必备</div>
        </div>

        <div class="aui-row">
            <div class="aui-col-xs-3">
                <div class="checklist"><input class="aui-radio" type="radio" name="radio" value="1" checked></div>
            </div>

            <div class="aui-col-xs-9">

                <div class="aui-card-list-content aui-border-t">

                    <ul class="aui-list aui-list-noborder">


                        <div class="aui-list-item aui-padded-l-0">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title aui-font-size-14 goods-title">重量:3两</div>
                                <div class="aui-list-item-title aui-font-size-14 goods-title">种类:公</div>

                                <div class="aui-list-item-right goods-price">4只</div>
                            </div>
                        </div>
                        <div class="aui-list-item aui-padded-l-0">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title aui-font-size-14 goods-title">重量:2两</div>
                                <div class="aui-list-item-title aui-font-size-14 goods-title">种类:母</div>
                                <div class="aui-list-item-right goods-price">4只</div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div class="aui-card-list-footer aui-border-t">
                    <div></div>
                    <div>
                        <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">数量</div>
                        <!-- <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">评价得积分</div> -->

                        <div class="aui-bar aui-bar-btn" style="width:50%;float:right;" type="count">
                            <div class="aui-bar-btn-item aui-font-size-20">
                                <i class="aui-iconfont aui-icon-minus"></i>
                            </div>
                            <div class="aui-bar-btn-item">
                                <input type="number" readonly="readonly" class="aui-input aui-text-center" id="count1"
                                       value="1">
                            </div>
                            <div class="aui-bar-btn-item aui-font-size-20">
                                <i class="aui-iconfont aui-icon-plus"></i>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

</section>

<!-- 1 end  -->

<!-- 2 begin -->
<section id="crab_2" class="aui-content">

    <div class="aui-card-list">
        <div class="aui-card-list-header aui-card-list-user">
            <div class="aui-card-list-user-avatar">
                <img src="/images/crab.png">
            </div>
            <div class="aui-card-list-user-name">
                <div class="aui-font-size-16">B.尊享装 <i class="aui-iconfont aui-icon-right aui-font-size-12"></i></div>
                <small class="aui-font-size-14 aui-text-danger">￥298</small>
            </div>
            <div class="aui-card-list-user-info">吃的健康 购的安心送礼的不二选择</div>
        </div>

        <div class="aui-row">

            <div class="aui-col-xs-3">
                <div class="checklist"><input class="aui-radio" type="radio" value="2" name="radio"></div>
            </div>

            <div class="aui-col-xs-9">

                <div class="aui-card-list-content aui-border-t">

                    <ul class="aui-list aui-list-noborder">


                        <div class="aui-list-item aui-padded-l-0">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title aui-font-size-14 goods-title">重量:3.5两</div>
                                <div class="aui-list-item-title aui-font-size-14 goods-title">种类:公</div>

                                <div class="aui-list-item-right goods-price">4只</div>
                            </div>
                        </div>
                        <div class="aui-list-item aui-padded-l-0">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title aui-font-size-14 goods-title">重量:2.5两</div>
                                <div class="aui-list-item-title aui-font-size-14 goods-title">种类:母</div>
                                <div class="aui-list-item-right goods-price">4只</div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div class="aui-card-list-footer aui-border-t">
                    <div></div>
                    <div>
                        <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">数量</div>
                        <!-- <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">评价得积分</div> -->

                        <div class="aui-bar aui-bar-btn" style="width:50%;float:right;" type="count">
                            <div class="aui-bar-btn-item aui-font-size-20">
                                <i class="aui-iconfont aui-icon-minus"></i>
                            </div>
                            <div class="aui-bar-btn-item">
                                <input type="number" readonly="readonly" class="aui-input aui-text-center" id="count2"
                                       value="1">
                            </div>
                            <div class="aui-bar-btn-item aui-font-size-20">
                                <i class="aui-iconfont aui-icon-plus"></i>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

</section>

<!-- 2 end  -->


<!-- 3 begin -->
<section id="crab_3" class="aui-content" style="margin-bottom:50px;">

    <div class="aui-card-list ">
        <div class="aui-card-list-header aui-card-list-user">
            <div class="aui-card-list-user-avatar">
                <img src="/images/crab.png">
            </div>
            <div class="aui-card-list-user-name">
                <div class="aui-font-size-16">C.豪华装 <i class="aui-iconfont aui-icon-right aui-font-size-12"></i></div>
                <small class="aui-font-size-14 aui-text-danger">￥468</small>
            </div>
            <div class="aui-card-list-user-info">原生态 高品质 送亲朋送好友<br/><span
                        style="margin-left:2.5rem">吃的健康 购的安心送礼的不二选择</span></div>
        </div>

        <div class="aui-row">

            <div class="aui-col-xs-3">
                <div class="checklist"><input class="aui-radio" type="radio" value="3" name="radio"></div>
            </div>

            <div class="aui-col-xs-9">

                <div class="aui-card-list-content aui-border-t">

                    <ul class="aui-list aui-list-noborder">


                        <div class="aui-list-item aui-padded-l-0">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title aui-font-size-14 goods-title">重量:4两</div>
                                <div class="aui-list-item-title aui-font-size-14 goods-title">种类:公</div>

                                <div class="aui-list-item-right goods-price">4只</div>
                            </div>
                        </div>
                        <div class="aui-list-item aui-padded-l-0">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title aui-font-size-14 goods-title">重量:3两</div>
                                <div class="aui-list-item-title aui-font-size-14 goods-title">种类:母</div>
                                <div class="aui-list-item-right goods-price">4只</div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div class="aui-card-list-footer aui-border-t">
                    <div></div>
                    <div>
                        <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">数量</div>
                        <!-- <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">评价得积分</div> -->

                        <div class="aui-bar aui-bar-btn" style="width:50%;float:right;" type="count">
                            <div class="aui-bar-btn-item aui-font-size-20">
                                <i class="aui-iconfont aui-icon-minus"></i>
                            </div>
                            <div class="aui-bar-btn-item">
                                <input type="number" readonly="readonly" class="aui-input aui-text-center" id="count3"
                                       value="1">
                            </div>
                            <div class="aui-bar-btn-item aui-font-size-20">
                                <i class="aui-iconfont aui-icon-plus"></i>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

</section>

<!-- 3 end  -->

<footer class="aui-bar aui-bar-tab ">
    <div class="aui-bar-tab-item" tapmode onclick="crabmessage()" style="width: 3rem;">
        <i class="aui-iconfont aui-icon-comment aui-text-info"></i>
        <div class="aui-bar-tab-label aui-text-info">咨询</div>
    </div>
    <div class="aui-bar-tab-item aui-bg-warning aui-text-white " tapmode onclick="crabaddress()" style="width: 6rem;">
        <i class="aui-iconfont aui-icon-location aui-text-white"></i>
        <div class="aui-bar-tab-label aui-text-white">我的收货地址</div>
    </div>
    <!-- <div class="aui-bar-tab-item aui-bg-warning aui-icon-location aui-text-white" tapmode style="width: auto;"></div> -->
    <div class="aui-bar-tab-item aui-bg-danger aui-text-white" tapmode onclick="wxplayconfim();" style="width: auto;">
        立即购买
    </div>
</footer>


</body>
<script type="text/javascript" src="/script/jquery.min.js"></script>
<script type="text/javascript" src="/script/template-native.js"></script>
<script type="text/javascript" src="/script/aui-tab.js"></script>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/script/aui-slide.js"></script>
<script type="text/javascript" src="/script/video.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script type="text/template" id="payconf">
    <div class="aui-card-list-content aui-border-b aui-padded-15" style="margin:10px;width:270px">
        <ul class="aui-list aui-list-noborder"> 
        <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">联系人:<%=lianxiren%></div>                       
                </div>
            </div>
        
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">电话:<%=dianhua%></div>                      
                </div>
            </div>
        
        <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">收货地址:<%=dizhi%></div>
                </div>
            </div>

            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">套餐:<%=taocan%></div>

                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">数量:<%=shuliang%></div>

                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">金额:￥<%=qian%></div>
                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">快递费:￥<%=kuaidi%></div>
                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">合计:￥<%=zongji%></div>
                </div>
            </div>

        </ul>

        <div style="width:100px;margin:0 auto;background-color: red;text-align: center; margin-top: 10px;padding: 5px;color: white;"
             tapmode onclick="crabwxplay();">立即付款
        </div>

    </div>
</script>




<input type="hidden" id="name" value="">
<input type="hidden" id="tel" value="">
<input type="hidden" id="address" value="">
<input type="hidden" id="provinceName" value="">
<script>

    //触摸
    $(document).ready(function () {
        wx.config(<?= json_encode($jsApiConfig) ?>);
    });

    wx.ready(function(){
    
        wx.onMenuShareAppMessage({
            title: '[感蟹有您] 买蟹进来看!', // 分享标题
            desc: '原生态 高品质 送亲朋送好友 吃的健康 购的安心送礼的不二选择', // 分享描述
            link: 'http://www.taozihu.com/site/default/crab?channel='+'<?php echo $channel?>', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: 'http://www.taozihu.com/images/shareimg.jpg', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () { 
              
            },
            cancel: function () { 
                
            }
        });

        wx.onMenuShareTimeline({
            title: '[感蟹有您] 买蟹进来看!',
            link: '原生态 高品质 送亲朋送好友 吃的健康 购的安心送礼的不二选择',
            link: 'http://www.taozihu.com/site/default/crab?channel='+'<?php echo $channel;?>', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: 'http://www.taozihu.com/images/shareimg.jpg', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () { 
                // 用户确认分享后执行的回调函数
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
            }
        });
    });




    function getAddress() {
        wx.openAddress({
            success: function (res) {
                $('#name').val(res.userName);
                $('#tel').val(res.telNumber);
                $('#provinceName').val(res.provinceName);
                $('#address').val(res.provinceName + res.cityName + res.countryName + res.detailInfo);
            }
        });
    }

    //发起访问微信地址,简易输入,调用共享收货地址接口
    function crabaddress() {
        getAddress();
        layer.msg('发起访问微信共享地址', {
            offset: 'c',
            anim: 1
        });
    }

    //支付確認
    function wxplayconfim() {

        var item = $(":radio:checked");
        var len = item.length;
        if (len > 0) {

            var userName = $('#name').val();
            var telNumber = $('#tel').val();
            var provinceName = $('#provinceName').val();

            if (!userName || !telNumber) {
                //自定页
                layer.open({
                    type: 1,
                    title: '感蟹有您温馨提示',
                    skin: 'confim-class', //样式类名
                    //closeBtn: 0, //不显示关闭按钮
                    anim: 6,
                    shadeClose: true, //开启遮罩关闭
                    content: '<div style="padding: 25px; line-height: 30px;color:#737372;font-size:0.70rem">请点击底部我的收货地址<br/>选择或新增收货地址</div>'
                });
            } else {
                var data = {};
                data.lianxiren= userName;
                data.dianhua=telNumber;
                data.dizhi= $('#address').val();


                var count = parseInt(document.getElementById("count" + $(":radio:checked").val()).value);
                if (parseInt($(":radio:checked").val()) == 1) {
                    data.taocan = ' A.家庭装';
                    data.qian = 188;
                } else if (parseInt($(":radio:checked").val()) == 2) {
                    data.taocan = ' B.尊享装';
                    data.qian = 298;
                } else if (parseInt($(":radio:checked").val()) == 3) {
                    data.taocan = ' C.豪华装';
                    data.qian = 468;
                }
                data.shuliang = count;
                var postal = new Array("江苏省", "浙江省", "上海市", "安徽省");
                var ispostal = $.inArray(provinceName, postal);//判断选择的省份是否在定义的包邮列表中
                //返回-1表示不在包邮列表中
                var is_postal = 2;
                if (ispostal == -1) {
                    data.kuaidi = 15;
                }
                else {
                    is_postal = 1;
                    data.kuaidi = 0;
                }



                data.zongji = data.qian * count + data.kuaidi;

                layer.open({
                    type: 1,
                    title: '支付前信息确认',
                    skin: 'confim-class', //样式类名
                    closeBtn: 0, //不显示关闭按钮
                    anim: 2,
                    shadeClose: true, //开启遮罩关闭
                    content: template("payconf", data)
                });
            }
        }
    }

    //發起支付
    function crabwxplay() {
        layer.closeAll();

        var userName = $('#name').val();
        var telNumber = $('#tel').val();
        var provinceName = $('#provinceName').val();

        var count = parseInt(document.getElementById("count" + $(":radio:checked").val()).value);
        var postal = new Array("江苏省", "浙江省", "上海市", "安徽省");
        var ispostal = $.inArray(provinceName, postal);//判断选择的省份是否在定义的包邮列表中
        //返回-1表示不在包邮列表中
        var is_postal = 2;
        if (ispostal != -1) {
            is_postal = 1;
        }

        $.ajax({
            url: '/ajax/default/create-order?channel='+'<?php echo $channel;?>',
            type: 'POST',
            dataType: 'JSON',
            data: {
                "combo": $(":radio:checked").val(),
                "num": count,
                "name": userName,
                "phone": telNumber,
                "addr": $('#address').val(),
                "is_postal": is_postal
            },
            success: function (res) {
                if (res.state == 1) {
                    window.location.href = "<?php echo Url::to(['/site/default/to-pay'])?>/" + res.data.id;
                } else {
                    layer.open({
                        type: 1,
                        title: '感蟹有您温馨提示',
                        skin: 'confim-class', //样式类名
                        //closeBtn: 0, //不显示关闭按钮
                        anim: 6,
                        shadeClose: true, //开启遮罩关闭
                        content: '<div style="padding: 25px; line-height: 30px;color:#737372;font-size:0.70rem">发生错误，清刷新页面后重新购买</div>'
                    });
                }
            },
            error: function (e) {
                layer.open({
                    type: 1,
                    title: '感蟹有您温馨提示',
                    skin: 'confim-class', //样式类名
                    //closeBtn: 0, //不显示关闭按钮
                    anim: 6,
                    shadeClose: true, //开启遮罩关闭
                    content: '<div style="padding: 25px; line-height: 30px;color:#737372;font-size:0.70rem">发生错误，清刷新页面后重新购买</div>'
                });
            }
        });

//        layer.msg('发起支付', {
//            offset: 'c',
//            anim: 1
//        });
    }

    //发起咨询
    function crabmessage() {
        //https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421140547

        layer.msg('发起咨询', {
            offset: 'c',
            anim: 1
        });

    }


    //关闭消息
    function closeTips(s) {
        $('#' + s).remove();
    }

    //数量控件
    var bar = document.querySelectorAll(".aui-bar-btn");
    if (bar) {
        for (var i = 0; i < bar.length; i++) {
            var d = bar[i];
            var tab = new auiTab({
                element: bar[i],
                repeatClick: true
            }, function (ret) {
                if (ret.dom.parentNode.getAttribute("type") && ret.dom.parentNode.getAttribute("type") == "count") {
                    var count = parseInt(document.getElementById("count" + $(":radio:checked").val()).value);
                    if (ret.index == 2) return;
                    if (ret.index == 1) {
                        //Po Add 限制最少1份
                        if (count > 1) {
                            // document.getElementById("count"+$(":radio:checked").val()).value = count-1;
                            $('#count' + $(":radio:checked").val()).val(count - 1);
                        }
                        else {
                            layer.msg('数量不能为' + (count - 1), {
                                offset: 'c',
                                anim: 6
                            });
                        }
                    }
                    if (ret.index == 3) {
                        //Po Add 限制最多10份
                        if (count < 30) {
                            //document.getElementById("count").value = count+1;

                            $('#count' + $(":radio:checked").val()).val(count + 1);

                        }
                        else {
                            layer.msg('每人最多可以购买' + count, {
                                offset: 'c',
                                anim: 6
                            });
                        }
                    }
                }
            });

        }
    }


    var myPlayer = videojs('my-video');
    videojs("my-video").ready(function () {
        var myPlayer = this;
        //myPlayer.play();
        var playerH = $(".aui-slide-node.bg-dark").outerHeight(true);
        var playerW = $(".aui-slide-node.bg-dark").outerWidth(true);
        myPlayer.width(playerW);
        myPlayer.height(playerH);
    });


    /*广告轮播*/
    var slide2 = new auiSlide({
        container: document.getElementById("aui-slide3"),
        // "width":300,
        "height": 210,
        "speed": 300,
        "autoPlay": 0, //自动播放
        "pageShow": true,
        "loop": false,
        "pageStyle": 'dot'

    });

    layui.use(['jquery', 'layer'], function () {

        // $=	layui.jquery;

        layer = layui.layer;


//公告层
        layer.open({
            type: 1
            ,
            title: false //不显示标题栏
            ,
            closeBtn: false
            ,
            area: '300px;'
            ,
            shade: 0.8
            ,
            id: 'LAY_layuipro' //设定一个id，防止重复弹出
            ,
            resize: false
            ,
            btn: ['亲,我明白了']
            ,
            btnAlign: 'c'
            ,
            anim: 6
            ,
            isOutAnim: false
            ,
            moveType: 0 //拖拽模式，0或者1
            ,
            content: '<div style="padding:30px 10px 30px 10px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 180;font-size:0.75rem">江浙沪皖顺丰包邮<br/>其他地区+15元顺丰包邮<br/><br/>1.选择或新增我的收货地址<br/>2.选择套餐<br/>3.选择套餐数量<br/>4.点击立即购买<br/><br/>注意事項:<br/>1.为保证螃蟹的新鲜 当日下单 次日发货<br/>2.因在运输过程中水分损耗 规格会有0.2两的偏差 属于正常状况 敬请谅解！！<br/><br/>如果遇到什么问题可以点击咨询</div>'

        });
    });


</script>
</html>
