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
    <script>
        if (top.location != location) {
            top.location.href = location.href;
        }
    </script>
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
                <img src="./xinpian/images/blacklogo.png" width="120" height="40" style="margin-top:10px;">
            </span>
        </a>
        <ul class="fs_16 fw_300 nav-list clearfix v-center">
            <li class="nav-item select">
                <a href="<?php echo Url::to(['/movie/default/index']) ?>">首页</a>
            </li>
            <li class="nav-item hover-elem">
                <i class="icon-arrow-down"></i>
                <a href="<?php echo Url::to(['default/discover']) ?>">我们的案例</a>
                <div class="common-hover-wrap issue-hover-wrap">
                    <div class="hover-box">
                        <ul class="list">
                            <li class="nav-dropdown-item">
                                <ul class="nav-sublist">
                                    <?php foreach ($cateList as $key => $cate): ?>
                                        <li class="nav-sublist-item">
                                            <a href="<?php echo Url::to(['/movie/default/discover', 'video_cate_id' => $cate['id']]) ?>"><?php echo $cate['cate_name']; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="line"></li>
                        </ul>
                    </div>
                </div>
            </li>
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
            <!--            <li class="reg-btn"><a class="disabled" href="">登录</a></li>-->
            <li class="login-btn"><a  href="<?php echo Url::to(['/movie/default/signup'])?>">注册</a></li>
        </ul>
    </div>
</div>

<div class="layui-container" style="background: white;margin-bottom: 200px;top:100px">
    <ul >
        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                    <img class="product-img"  src="http://images.ahwes.com/books/items1.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                                <div class="product-desc" style="margin-top: 10px;">
                                    <p style="font-size: 20px;line-height: 25px;">

                                            庆典会展租赁 气球拱门、舞台设备、同传设备等舞美灯
                                        </p>
                                    <p style="color:#999;margin-top: 10px">
                                        专一文化传媒有限公司专业从事各种舞台活动场布，舞美服装灯光影响摄影摄像电子屏一条龙服务，服务全程总监跟随，保质保量。物美价廉，服务到位，欢迎咨询。
                                    </p>
                                    <p style="color: #666;font-size: 14px;padding:8px 0">合肥专壹文化传播有限公司</p>

                                </div>
                        </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img"  src="http://images.ahwes.com/books/items2.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">

                            摄影摄像 宣传汇报片无人机年会议拍摄 照片视频直播
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            胡椒传媒聚焦于宣传片、专题片、微视频、微电影、纪录片等视频项目的拍摄和制作，至2018年10月底已完成1000部各类商业影片的拍摄和制作，本着让每一个企业都做得起宣传片的理念，我们会根据企业的不同情况来制定较适合的拍摄方案，优化制作思路，为企业宣传助力！</p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">南京市江北新区胡椒文化传媒工作室</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img"  src="http://images.ahwes.com/books/items3.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">

                            合肥舞台桁架灯光音响租赁投影摄像电视追光灯摄像摄影
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            合肥爱追梦文化传媒有限公司有活动策划、展会设计、舞台搭建、音响及大屏等设备的租赁而所涉及的领域有文艺演出、礼仪庆典、节日庆典、时装走秀、开业剪彩、广场文化、促销推广。</p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">合肥爱追梦</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img"  src="http://images.ahwes.com/books/items4.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">
                            子弹时间 展会年会 180度 360度3D环绕拍摄
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            3D环绕180-360度特效拍摄体验，可用于展览展会、庆典、年会、活动暖场、广告宣传等，拍摄形式新颖，五大亮点，瞬间引爆活动现场人气！自主研发的高科技拍摄设备，CCTV5现场报道产品！ </p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">长沙全度影像科技有限公司</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img"  src="http://images.ahwes.com/books/items5.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">

                            开业庆典 会展活动 舞台搭建 灯光音响大屏租赁
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            合肥何盛传媒有限公司是一家主要从事广告策划，舞台舞美系统工程搭建及技术服务的物料供应商。承接会展演出，企业年会，开业典礼，舞台灯光音响大屏租赁，舞台舞美搭建制作，会议活动场地布置！公司不但有各类专业的灯光设备、音响设备、LED屏幕和舞台结构，而且有经验丰富的技术团队为各类演出保驾护航。</p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">合肥何盛传媒有限公司</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img"  src="http://images.ahwes.com/books/items6.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">

                            音响 灯光 舞台 桁架 大屏 电视机 桌椅凳出租
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            合肥鸿幸租赁成立16年，专业为 活动执行 搭建 策划，拥有多年丰富经验，物料设备质量可靠。设备租赁类：舞台，桁架，铝合金桁架，truss架，葫芦，方管桁架，合唱台， P3大屏，电视机，LED帕灯，光束灯，电脑灯，追光灯，图案灯，演出四眼灯，洗墙灯， 音响，线阵音响，TW线阵音响，JBL音响，声扬线阵等。
                        </p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">鸿幸租赁</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img" alt="7" src="http://images.ahwes.com/books/items7.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6">
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">

                            服装出租，摄影摄像，纪念册制作
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            安徽梦美瑞文化传播有限公司致力于合肥高校毕业文化研究，专业提供学士服、学生装等服装租赁；创意摄影、团体摄影；无人机航拍服务；照片冲印；毕业纪念册定制等一条龙服务。我们不断升级设备和服务质量，为了给客户创造更好的服务体验，三年来我们一直走在行业较前沿。
                        </p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">安徽梦美瑞文化传播有限公司</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img" alt="8"  src="http://images.ahwes.com/books/items8.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">

                            合肥庆典/年会/演出/展会/活动策划/演出设备租赁
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            安徽莫陌文化传媒是一家专注致力于活动策划运作、品牌活动战略、展览展示服务、影视拍摄制作、演艺资源管理、演出设备租赁、会议会务代理等业务为一体的专业活动运作品牌机构。
                        </p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">安徽莫陌文化传媒</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img"  alt="9" src="http://images.ahwes.com/books/items9.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">

                            合肥舞台年会，婚礼场景设备租赁 设计布置
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            会务，展览展示，婚庆婚典，礼仪，摄影摄像服务；企业形象策划，晚会活动策划；电子设备运营技术；电子设备租赁，花卉租赁；景观设计；电脑图文设计制作服务   </p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">合肥经济技术开发区青春印象服装租赁工作室</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

        <li id="product-list">
            <div class="layui-row" style="margin-top: 30px">
                <div class="layui-col-md3">
                    <div >
                        <img class="product-img" alt="10"  src="http://images.ahwes.com/books/items10.jpg"/>
                    </div>
                </div>
                <div class="layui-col-md6" >
                    <div class="product-desc" style="margin-top: 10px;">
                        <p style="font-size: 20px;line-height: 25px;">

                            安徽地区专业提供视频音频灯光舞台效果控台供应商
                        </p>
                        <p style="color:#999;margin-top: 10px">
                            专业从事视频音频灯光广告物料制作搭建服务
                        </p>
                        <p style="color: #666;font-size: 14px;padding:8px 0">合肥创影会议会展服务有限公司</p>

                    </div>
                </div>

                <div class="layui-col-md3" style=" display: flex;align-items: center;max-width: 220px;height: 100px;justify-content: flex-end;">
                    <button type="button" class="layui-btn layui-btn-danger">
                        <i class="layui-icon layui-icon-cellphone" style="font-size: 18px"></i>
                        联系商家</button>
                </div>

            </div>

            <hr class="layui-bg-gray po-hr" />

        </li>

    </ul>

</div>

<div class="footer-wrap">
    <div class="footer-inner">
        <div class="footer-con clearfix">
            <div class="left fl">
                <div>
                    <a class="logo-wrap v-center disabled" href="#">
                        <span class="logo-wrap">
                <img src="./xinpian/images/blacklogo.png" width="120" height="40" style="margin-top:10px;">
            </span>
                    </a>
                    <span class="v-center fs_14 c_b_3">用作品打动世界！</span>
                </div>
                <p class="fs_12 c_b_9 fw_300">
                    维尔斯是专业的影视制作团队，汇聚精通专项人才，我们只做自己最擅长的领域，创作优秀作品。</p>
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

</body>
</html>