<?php

use yii\helpers\Url;

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="all"/>
    <meta name="author" content=""/>
    <meta name="Copyright" content=""/>
    <meta name="renderer" content="webkit">
    <title>维尔斯创作团队-器械租赁 </title>
    <meta name="keywords" content="新媒体电影,新媒体影视,互联网影视,互联网电影,发行,短片,微电影,原创视频,创作人"/>
    <meta name="description"
          content="维尔斯是国内专业的影视创作人社区，汇聚众多优秀创作人，提供作品展示、项目交流、拍摄制作机会等影视行业服务。在这里，你可以找到最合适的创作人；在这里，用作品打动世界！"/>
    <link rel="stylesheet"
          href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/css/new-web/font-icon-v=1519469245.css">
    <link rel="stylesheet"
          href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/css/new-web/common-v=1520334715.css">
    <link rel="stylesheet" href="./layui/css/layui.css">

    <script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/jquery-1.7.1.min.js"></script>
    <script src="./layui/layui.js"></script>
    <style>

        .dialog-tip {
            position: fixed;
            color: #fff;
            z-index: -1;
            opacity: 0;
            transition: all 1s;
            -webkit-transition: all 1s;
            -moz-transition: all 1s;
            -ms-transition: all 1s;
            width: 100%;
            text-align: center;
            background-color: #e74b3b;
            height: 50px;
            line-height: 50px;
            transform: translateY(-50px);
            -webkit-transform: translateY(-50px);
            -moz-transform: translateY(-50px);
            -ms-transform: translateY(-50px);
            top: 0;
            z-index: 100000;
        }

        .dialog-tip .tip-content {
            padding-left: 20px;
            background: url("<?php echo Yii::$app->request->hostInfo; ?>/xinpian/images/error-notice@3x.png") no-repeat;
            background-position: left;
            background-size: 14px;
            display: inline-block;
        }

        .tip-success {
            background-color: #28ca42;
        }

        .tip-success .tip-content {
            background-image: url("<?php echo Yii::$app->request->hostInfo; ?>/xinpian/images/success-notice@3x.png")
        }

        .dialog-tip-show {
            opacity: 1;
            transform: translateY(0px);
            -webkit-transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
        }
        #product-list{padding: 10px;}


        /*最后一个hr不显示*/
        .layui-container ul li:last-of-type hr {
            display: none;
        }

        /*最后一个li底部高度增加*/
        #product-list:last-of-type   {
            padding-bottom: 50px;
        }

        .po-hr{margin: 0 auto;margin-top: 20px;}


        .product-img{width: 230px ;max-height: 150px;clear: both;
            display: block;
            margin: auto ;
            border-radius:5px;
        }


    </style>
</head>
<body>

<div class="filmplay-black-box feedback-wrap dn">
    <div class="filmplay-inner-box feedback-box">
        <div class="feedback-con creator-con">
            <span class="close icon-close"></span>
            <p class="fs_14 fw_600 c_b_3 line-hide-1">在线提交问题/建议</p>
            <div class="feedback-input-wrap">
				<textarea placeholder="亲，遇到什么麻烦了？
或者告诉我们希望增加什么功能呢？"></textarea>
                <span class="feedback-btn bg-red fs_14 fw_600 c_w_f">发送</span>
            </div>
        </div>
    </div>
</div>
<div class="slide-bar">
    <ul class="slide-bar-list">
        <li class="to-up icon-arrow-top"></li>
    </ul>
</div>
<div class="search-wrap zIndex-2 dn opacity0">
    <div class="search-box">
        <div class="search-con">
            <i class="base-v-center v-center"></i>
            <div class="search-left">
                <span class="search-btn icon-search"></span>
                <form action="#" mothod="get">
                    <input type="hidden" name="app" value="search">
                    <input class="search-input" type="text" name="kw" placeholder="搜索作品、创作人、文章">
                </form>
            </div>
            <span class="search-close-btn icon-close"></span>
        </div>
    </div>
</div>
<!-- header-v2: 透明header； fixed-header: fixed形式显隐； complex-header: 多一个absolute形式显隐； transition: 动画-->
<div class="msg_tip new-msg-tip top" id="h_xm_tip">
    <ul class="msg_tip_m list"></ul>
    <div class="new-msg-tip-close">全部忽略</div>
</div>
<div class="header-common fixed-header   transition">
    <div class="header-con">
        <a class="logo v-center" href="<?php echo Url::to(['default/index']); ?>">
            <span class="logo-wrap">
                <img src="./xinpian/img/logo.png" width="150" height="40" style="padding:5px;background: #2b2b2b;margin: 5px;border-radius: 6px;">
            </span>
        </a>
        <ul class="fs_16 fw_300 nav-list clearfix v-center">
            <li class="nav-item select">
                <a href="<?php echo Url::to(['/movie/default/index']) ?>">首页</a>
            </li>
<!--            <li class="nav-item hover-elem">-->
<!--                <i class="icon-arrow-down"></i>-->
<!--                <a href="--><?php //echo Url::to(['default/discover']) ?><!--">我们的案例</a>-->
<!--                <div class="common-hover-wrap issue-hover-wrap">-->
<!--                    <div class="hover-box">-->
<!--                        <ul class="list">-->
<!--                            <li class="nav-dropdown-item">-->
<!--                                <ul class="nav-sublist">-->
<!--                                    --><?php //foreach ($cateList as $key => $cate): ?>
<!--                                        <li class="nav-sublist-item">-->
<!--                                            <a href="--><?php //echo Url::to(['/movie/default/discover', 'video_cate_id' => $cate['id']]) ?><!--">--><?php //echo $cate['cate_name']; ?><!--</a>-->
<!--                                        </li>-->
<!--                                    --><?php //endforeach; ?>
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="line"></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
            <li class="nav-item school ">
                <a href="<?php echo Url::to(['/movie/default/rental']) ?>">器械租赁</a>
            </li>
            <li class="nav-item resource hover-elem">
                <i class="icon-arrow-down"></i>
                <a class="resource-video disabled" href="#">素材</a>
            </li>
            <li class="nav-item">
                <a class="disabled" href="#" >活动</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo Url::to(['/movie/default/about']) ?>" >关于维尔斯</a>
            </li>
            <!--            <li class="nav-item">-->
            <!--                <a class="disabled" href="" target="_blank">魔力短视频</a>-->
            <!--            </li>-->
            <li class="nav-item hover-elem">
                <i class="icon-arrow-down"></i>
                <a href="javascript:;">更多</a>
            </li>
            <!--            <li class="nav-item newera">-->
            <!--                <a class="disabled" href="" target="_blank">-->
            <!--                    <img src="http://oss-xpc0.xpccdn.com/Upload/boss/2017/12/065a2769d0e9cf1.png">-->
            <!--                </a>-->
            <!--            </li>-->
        </ul>
        <ul class="fr right-part no-login">
            <li class="search-btn icon-search"></li>
                        <li class="reg-btn"><a  href="<?php echo Url::to(['/movie/default/login'])?>">登录</a></li>
            <li class="login-btn"><a  href="<?php echo Url::to(['/movie/default/signup'])?>">注册</a></li>
        </ul>
    </div>
</div>

<div class="layui-container" style="background: white;margin-bottom: 200px;top:100px">

            <div class="layui-row" >

                <div class="layui-card">
                    <div class="layui-card-header" style="height: 50px">
                        <h2 style="padding: 10px"><strong> <?php echo $rentaldetail['title']; ?></strong></h2>
                    </div>
                    <div class="layui-card-body">

<!--                        说明-->
                        <div class="layui-row" style="margin-top: 30px">
                            <div class="layui-col-md3">
                                <div >
                                    <img class="product-img"  src="<?php echo $rentaldetail['image']; ?>"/>
                                </div>
                            </div>
                            <div class="layui-col-md6" >
                                <div class="product-desc" style="margin-top: 10px;">
                                    <p style="color:#999;margin-top: 10px">类别：<?php echo $rentaldetail['category']; ?></p>
                                    <p style="color:#999;margin-top: 10px">联系人 ：<?php echo $rentaldetail['person']; ?></p>
                                    <p style="color:#999;margin-top: 10px">联系电话 ：<?php echo $rentaldetail['callnumber']; ?></p>
                                    <p style="color:#999;margin-top: 10px">公司名称：<?php echo $rentaldetail['company']; ?></p>
                                    <p style="color:#999;margin-top: 10px;">
                                        简述：
                                        <?php echo $rentaldetail['desc']; ?>
                                        <!--                                        专一文化传媒有限公司专业从事各种舞台活动场布，舞美服装灯光影响摄影摄像电子屏一条龙服务，服务全程总监跟随，保质保量。物美价廉，服务到位，欢迎咨询。-->
                                    </p>


                                </div>
                            </div>


                        </div>
<!--                        明细-->
                        <div class="layui-row">
                            <div class="layui-tab layui-tab-brief">
                                <ul class="layui-tab-title">
                                    <li class="layui-this">详情描述</li>


                                </ul>
                                <div class="layui-tab-content">
                                    <div class="layui-tab-item layui-show">
                                        <div class="about-ahwes" style="margin: 20px;background: white;line-height: 35px"">
                                            <?php echo $rentaldetail['content']; ?>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


</div>

<div class="footer-wrap">
    <div class="footer-inner">
        <div class="footer-con clearfix">
            <div class="left fl">
                <div>
                    <a class="logo-wrap v-center disabled" href="#">
                        <span class="logo-wrap">
                <img src="./xinpian/images/sharelogo.jpg" width="100" height="100" style="margin-top:8px;padding: 5px">
            </span>
                    </a>
                    <span class="v-center fs_14 c_b_3">用作品打动世界！</span>
                </div>
                <p class="fs_12 c_b_9 fw_300">
                    维尔斯传媒影视器材为主的租赁平台，用户实现“免押金、免压身份证、无需跟机员”等服务。</p>
            </div>
            <div class="right fr clearfix">
                <div class="column-item fl">
                    <p class="title fs_16 c_b_3 fw_600">联系我们</p>
                    <ul class="list fs_12 c_b_9 fw_300">
                        <li><a target="_blank" class="disabled">公司名称:安徽维尔斯传媒策划有限公司</a></li>
                        <li><a target="_blank" class="disabled">地址:安徽省宣城高新技术产业开发区麒麟大道11号</a></li>
                        <li><a target="_blank" class="disabled">手机:18905631879</a></li>
                        <li><a target="_blank" class="disabled">邮箱:279691663@qq.com</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <div class="bottom-con">
                <span class="copyright">Copyright © 2017 - 2019 维尔斯. All rights reserved.</span>
                <span class="copyright">皖ICP备17005514号-1</span>
                <span class="copyright">皖网文[2019] 4652-199 号</span>
            </div>
            <div class="bottom-statute">
                <a target="_blank"  href="http://report.ccm.gov.cn/" class="disabled">12318全国文化市场举报平台</a>
                <a target="_blank"  href="http://report.12377.cn:13225/toreportinputNormal_anis.do" class="disabled">中国互联网违法和不良信息举报中心</a>
            </div>
        </div>
    </div>
</div>


<script>
    if (top.location != location) {
        top.location.href = location.href;
    }

    layui.use(['layer'], function(){
        var layer = layui.layer;

        $('.layui-col-md3>button').on('click', function(){
           var othis = $(this), index = othis.val();

                layer.tips(
                    '联系电话:'+index, this,
                    { tips: [1, '#3595CC'],
                        time:0
                    });}
        );

    });
</script>

</body>
</html>