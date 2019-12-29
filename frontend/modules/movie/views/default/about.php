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
    <title>维尔斯创作团队-关于</title>
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
    <script>
        if (top.location != location) {
            top.location.href = location.href;
        }

        layui.use('element', function(){
            var element = layui.element;

            //一些事件监听
            element.on('tab(demo)', function(data){
                console.log(data);
            });
        })

    </script>
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

        .about-ahwes p {

            line-height: 30px;
        }
        .about-users p{
            line-height: 30px;
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
                <a href="<?php echo Url::to(['/movie/default/about']) ?>">关于维尔斯</a>
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

<div class="layui-container" style="background: white;margin-bottom: 200px;top:100px;padding: 20px;min-height: 500px">
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">关于维尔斯</li>
            <li>用户协议</li>

        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div class="about-ahwes" style="margin: 20px;background: white">
                    <p>安徽维尔斯传媒策划有限公司是一家专注现场直播执行服务公司</p>
                    <p>主营业务有： 教育培训直播、峰会论坛直播、户外活动直播、电商直播、医疗直播、年会庆典直播、音乐节直播等。</p>
                    <p>现有员工23人，在安徽合肥、芜湖、马鞍山、铜陵、江苏南京、浙江杭州、上海等地设有分公司</p>
                    <p>截至目前，我们服务中大型活动700余次、线上同时观看用户最高370万人次。</p>
                    <p>通过直播带货总销量突破2000万。</p>

                </div>
            </div>
            <div class="layui-tab-item">

                    <div class="about-users" style="margin: 20px;background: white">
                        <h2><strong>总 则</strong></h2>
                        <p>用户在维尔斯服务之前，请务必仔细阅读本条款并同意本声明。</p>
                        <p>用户直接或通过各类方式（如站外引用等）间接使用维尔斯服务和数据的行为，都将被视作已无条件接受本声明所涉全部内容；若用户对本声明的任何条款有异议，请停止使用维尔斯所提供的全部服务。</p>
                        <br/>
                        <h2><strong>第一条</strong></h2>
                        <p>用户以各种方式使用维尔斯服务和数据（包括但不限于发表、宣传介绍、转载、浏览及利用维尔斯或维尔斯用户发布内容）的过程中，不得以任何方式利用维尔斯直接或间接从事违反中国法律、以及社会公德的行为，且用户应当恪守下述承诺：</p>
                        <p>1. 发布、转载或提供的内容符合中国法律、社会公德；</p>
                        <p>2. 不得干扰、损害和侵犯维尔斯的各种合法权利与利益；</p>
                        <p>3. 遵守维尔斯以及与之相关的网络服务的协议、指导原则、管理细则等；</p>
                        <p>维尔斯有权对违反上述承诺的内容予以删除。</p>
                        <br/>
                        <h2><strong>第二条</strong></h2>
                        <p>1. 维尔斯仅为用户发布文字及图片内容提供存储空间，维尔斯不对用户发表、转载的内容提供任何形式的保证：不保证内容满足你的要求，不保证维尔斯的服务不会中断。因网络状况、通讯线路、第三方网站或管理部门的要求等任何原因而导致你不能正常使用维尔斯，维尔斯不承担任何法律责任。</p>
                        <p>2. 用户在维尔斯发表的内容（包含但不限于维尔斯目前各产品功能里的内容）仅表明其个人的立场和观点，并不代表维尔斯的立场或观点。作为内容的发表者，需自行对所发表内容负责，因所发表内容引发的一切纠纷，由该内容的发表者承担全部法律及连带责任。维尔斯不承担任何法律及连带责任。</p>
                        <p>3. 用户在维尔斯发布侵犯他人知识产权或其他合法权益的内容，维尔斯有权予以删除，并保留移交司法机关处理的权利。</p>
                        <p>4. 个人或单位如认为维尔斯上存在侵犯自身合法权益的内容，应准备好具有法律效应的证明材料，及时与维尔斯取得联系，以便维尔斯迅速做出处理。</p>
                        <br/>
                        <h2><strong>第三条</strong></h2>
                        <p>1. 用户购买的音乐、视频或图片素材, 除因无法下载造成的问题外, 一经售出概不退换。</p>
                        <br/>
                        <h2><strong>附则</strong></h2>
                        <p>对免责声明的解释、修改及更新权均属于维尔斯所有。</p>
                        <p>联系我们：service@ahwes.com</p></div>

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