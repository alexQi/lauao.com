<?php

use yii\helpers\Url;

?>
<!DOCTYPE HTML>
<html class="noscroll" xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content=""/>
    <meta name="Copyright" content=""/>
    <meta name="renderer" content="webkit">
    <title><?php echo $this->title; ?></title>
    <meta name="keywords" content="资生堂x唐嫣x纽约,新媒体电影,新媒体影视,互联网影视,互联网电影,发行,短片,微电影,原创视频,创作人"/>
    <meta name="description" content=""/>
    <style>.line-hide-1 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
    <link rel="stylesheet"
          href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/css/new-web/font-icon-v=1519469245.css">
    <link rel="stylesheet"
          href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/css/new-web/common-v=1520334715.css">
    <!-- <script src="/<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/wb.js" type="text/javascript" charset="utf-8"></script> -->
    <script>if (top.location != location) {
            top.location.href = location.href;
        }</script>
    <script>
        var userid = 0;
        var username = '';
        // 0 未知  1 男  2 女
        var sex = '';
        // 出生日期
        var year = '';
        // 管理员类型
        var isadmin = '';
        // 职业
        var profession = '';
        // 省份
        var province = '';
        // 入行年份
        var entry_year = '';
    </script>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?dfbb354a7c147964edec94b42797c7ac";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();

        (function (para) {
            var p = para.sdk_url, n = para.name, w = window, d = document, s = 'script', x = null, y = null;
            w['sensorsDataAnalytic201505'] = n;
            w[n] = w[n] || function (a) {
                return function () {
                    (w[n]._q = w[n]._q || []).push([a, arguments]);
                }
            };
            var ifs = ['track', 'quick', 'register', 'registerPage', 'registerOnce', 'clearAllRegister', 'trackSignup', 'trackAbtest', 'setProfile', 'setOnceProfile', 'appendProfile', 'incrementProfile', 'deleteProfile', 'unsetProfile', 'identify', 'login', 'logout', 'trackLink', 'clearAllRegister', 'getAppStatus'];
            for (var i = 0; i < ifs.length; i++) {
                w[n][ifs[i]] = w[n].call(null, ifs[i]);
            }
            if (!w[n]._t) {
                x = d.createElement(s), y = d.getElementsByTagName(s)[0];
                x.async = 1;
                x.src = p;
                x.setAttribute('charset', 'UTF-8');
                y.parentNode.insertBefore(x, y);
                w[n].para = para;
            }
        })({
            sdk_url: 'https://oss-xpc0.xpccdn.com/static/sensorsdata-1.8.14.min.js',
            name: 'sa',
            server_url: 'https://sa.xpccdn.com/sa?project=production',
            show_log: false
        });
        sa.quick('autoTrack');
    </script>
    <!-- start Dplus -->
    <script type="text/javascript">!function (a, b) {
            if (!b.__SV) {
                var c, d, e, f;
                window.dplus = b, b._i = [], b.init = function (a, c, d) {
                    function g(a, b) {
                        var c = b.split(".");
                        2 == c.length && (a = a[c[0]], b = c[1]), a[b] = function () {
                            a.push([b].concat(Array.prototype.slice.call(arguments, 0)))
                        }
                    }

                    var h = b;
                    for ("undefined" != typeof d ? h = b[d] = [] : d = "dplus", h.people = h.people || [], h.toString = function (a) {
                        var b = "dplus";
                        return "dplus" !== d && (b += "." + d), a || (b += " (stub)"), b
                    }, h.people.toString = function () {
                        return h.toString(1) + ".people (stub)"
                    }, e = "disable track track_links track_forms register unregister get_property identify clear set_config get_config get_distinct_id track_pageview register_once track_with_tag time_event people.set people.unset people.delete_user".split(" "), f = 0; f < e.length; f++) g(h, e[f]);
                    b._i.push([a, c, d])
                }, b.__SV = 1.1, c = a.createElement("script"), c.type = "text/javascript", c.charset = "utf-8", c.async = !0, c.src = "//w.cnzz.com/dplus.php?id=1262268826", d = a.getElementsByTagName("script")[0], d.parentNode.insertBefore(c, d)
            }
        }(document, window.dplus || []), dplus.init("1262268826");</script><!-- end Dplus -->

    <script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/zhugeio-v=1503453383.js" type="text/javascript"
            charset="utf-8"></script>
    <script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/jquery-1.7.1.min.js"></script>
</head>
<body>
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
<div class="header-common fixed-header complex-header light-color header-v2  transition">
    <div class="header-con">
        <a class="logo v-center" href="#">
            <span class="logo-wrap">
                <img src="./xinpian/images/logo40.png" width="120" height="40" style="margin-top:10px;">
            </span>
        </a>
        <ul class="fs_16 fw_300 nav-list clearfix v-center">
            <li class="nav-item select">
                <a href="<?php echo Url::to(['default/index']) ?>">首页</a>
            </li>
            <li class="nav-item hover-elem">
                <i class="icon-arrow-down"></i>
                <a href="<?php echo Url::to(['default/discover']) ?>">作品</a>
                <div class="common-hover-wrap issue-hover-wrap">
                    <div class="hover-box">
                        <ul class="list">
                            <li class="nav-dropdown-item">
                                <ul class="nav-sublist">
                                    <?php foreach ($cateList as $key => $cate): ?>
                                        <li class="nav-sublist-item">
                                            <a href="<?php echo Url::to(['default/discover', 'video_cate_id' => $cate['id']]) ?>"><?php echo $cate['cate_name']; ?></a>
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
                <a class="disabled" href="">器材租赁</a>
            </li>
            <li class="nav-item resource hover-elem">
                <i class="icon-arrow-down"></i>
                <a class="resource-video disabled" href="#">素材</a>
            </li>
            <li class="nav-item">
                <a class="disabled" href="" target="_blank">活动</a>
            </li>
            <li class="nav-item">
                <a class="disabled" href="" target="_blank">维尔斯影业</a>
            </li>
            <!--            <li class="nav-item">-->
            <!--                <a class="disabled" href="" target="_blank">魔力短视频</a>-->
            <!--            </li>-->
            <li class="nav-item hover-elem">
                <i class="icon-arrow-down"></i>
                <a href="javascript:;">更多</a>
                <!--                <div class="common-hover-wrap issue-hover-wrap">-->
                <!--                    <div class="hover-box">-->
                <!--                        <ul class="list">-->
                <!--                            <li><a href="http://www.vmovier.com" target="_blank">V电影</a></li>-->
                <!--                        </ul>-->
                <!--                    </div>-->
                <!--                </div>-->
            </li>
            <li class="nav-item newera">
                <a class="disabled" href="" target="_blank">
                    <img src="http://oss-xpc0.xpccdn.com/Upload/boss/2017/12/065a2769d0e9cf1.png">
                </a>
            </li>
        </ul>
        <ul class="fr right-part no-login">
            <li class="search-btn icon-search"></li>
            <li class="reg-btn"><a
                        href="https://passport.xinpianchang.com?callback=http%3A%2F%2Fwww.xinpianchang.com%2Fa101001%3Ffrom%3Darticle_right">登录</a>
            </li>
            <li class="login-btn"><a
                        href="https://passport.xinpianchang.com/register?callback=http%3A%2F%2Fwww.xinpianchang.com%2Fa101001%3Ffrom%3Darticle_right">注册</a>
            </li>
        </ul>
    </div>
</div>
<style>.common-notice-cover {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        background: rgba(0, 0, 0, 0.5);
    }

    .common-notice-cover span {
        display: inline-block;
    }

    .common-notice-cover {
        opacity: 0;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -ms-transition: all 0.5s;
        z-index: 10003;
    }

    .common-notice-cover-ground {
        width: 380px;
        background: #fff;
        position: absolute;
        left: 50%;
        top: 50%;
        margin: -100px 0 0 -190px;
        border-radius: 2px;
    }

    .common-notice-cover-ground .tip-wrap {
        position: relative;
        padding: 11px 20px 12px;
        border-bottom: 4px solid #f7f7f7;
    }

    .common-notice-cover-ground .tip-wrap .tip-title {
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }

    .common-notice-cover-ground .tip-wrap .notice-close {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .common-notice-cover-ground .tip-wrap .notice-close:before {
        font-size: 18px;
        color: #000;
    }

    .common-notice-cover-ground .tip-wrap .notice-close i:hover:before {
        color: #666;
    }

    .common-notice-cover-ground .tip-contaniner {
        padding: 20px 40px;
        text-align: center;
    }

    .common-notice-cover-ground .tip-content {
        font-size: 14px;
        font-weight: 300;
        color: #333;
    }

    .common-notice-cover-ground .close-know {
        width: 100px;
        height: 60px;
        border-radius: 2px;
        background-color: #e74b3b;
        color: #fff;
        line-height: 60px;
        font-size: 14px;
        margin-top: 40px;
        display: inline-block;
    }

    .common-notice-cover-ground .tip-btn {
        margin-top: 30px;
        font-size: 0;
    }

    .common-notice-cover-ground .tip-btn span {
        display: inline-block;
        width: 98px;
        height: 34px;
        font-size: 14px;
        font-weight: 500;
        line-height: 34px;
        border-radius: 2px;
        color: #fff;
        cursor: pointer;
    }

    .common-notice-cover-ground .tip-btn .close-sure {
        background-color: #fff;
        border: solid 0.5px rgba(153, 153, 153, .5);
        color: #333;
        margin-right: 20px;
    }
</style>
<div class="common-notice-cover dn">


    <div class="common-notice-cover-ground">
        <div class="tip-wrap">
            <h2 class="tip-title">提示</h2>
            <span class="common-notice-cover-close notice-close icon-close"></span>
        </div>
        <div class="tip-contaniner">
            <p class="tip-content">你是否要取消绑定（第三方名字）账号？</p>
            <div class="tip-btn">
                <span class="close-sure">确认</span>
                <span class="close-cancel bg-red">取消</span>
            </div>
        </div>
    </div>

</div>

<script>

    var dialogTipCallback;
    var _body = $("body"),
        _commonNoticeCover = $(".common-notice-cover"),
        _tipContent = $(".tip-content"),
        _tipTitle = $(".tip-title"),
        _tipCancel = $(".close-cancel"),
        _tipSure = $(".close-sure");

    function showSureDialogTip(obj, callback) {
        _commonNoticeCover.removeClass("dn");
        setTimeout(function () {
            _commonNoticeCover.addClass("opacity-1");
        }, 0)

        if (obj.title) {
            _tipTitle.text(obj.title);
        }
        if (obj.content) {
            _tipContent.text(obj.content);
        }
        if (obj.cancel) {
            _tipCancel.text(obj.cancel);
        }
        if (obj.sure) {
            _tipSure.text(obj.sure);
        }

        dialogTipCallback = callback || function () {
        };
        _body.addClass("ovh");
    }

    $(".tip-btn span, .notice-close").on("click", function () {
        _commonNoticeCover.removeClass("opacity-1");
        setTimeout(function () {
            _commonNoticeCover.addClass("dn");
        }, 300)
        if ($(this).hasClass("close-sure")) {
            dialogTipCallback();
        }
        _body.removeClass("ovh");
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
        background-position: left;
        background-size: 14px;
        display: inline-block;
    }
</style>
<div class="dialog-tip">
    <span class="tip-content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浏览器版本过低，为了正常使用请升级浏览器，推荐使用Chrome浏览器</span>
</div>
<script>
    var noop = noop || function () {
    };
    var templete = $(".dialog-tip");

    window.showDialogTip = function (obj, callback) {
        callback = callback || obj.complete || noop;
        //var type = obj.type || 'ERROR';
        var content = obj.tip || (obj + '');
        var timeout = obj.timeout || 2500;

        // 每次showDialogTip，都要clone一个tip的模板，让每一次吐司都是独立的调用
        var tip = templete.clone().appendTo(document.body);
        tip.find(".tip-content").text(content);

        setTimeout(function () {
            // appendTo body 之后，需要一点时间（20ms,至少经过一个animate looper）来使得css生效
            // 然后再增加dialog-top-show，就能有css动画了

            tip.addClass("dialog-tip-show tip-" + (obj.error ? "" : "success")).css("z-index", 10003);

            setTimeout(function () {
                // timeout 后开始消失css动画
                tip.removeClass("dialog-tip-show");
                setTimeout(function () {
                    // 500ms css小时动画结束后，移出append的tip
                    tip.remove();
                }, 500);
                callback();
            }, timeout);
        }, 20);
    }
</script>
<script type="text/javascript"
        src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/new-web/common-v=1516708042.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/xpcstat-v=1516694453.js"></script>
<script type="text/javascript">
    // 神策统计
    var pageFrom = getRequest().from ? getRequest().from : 'other',
        stat = new Stat(sa, {
            userid: userid,
            sex: sex,
            year: year,
            province: province,
            isadmin: isadmin

        });
    stat.registerPage({
        userid: userid,
        isadmin: isadmin
    });
</script>
<script type="text/javascript">
    var siteUrl = 'http://www.xinpianchang.com/',
        hoverElem = $(".hover-elem"),
        loginUserid = userid;
    $(function () {
        function setCookie(name, value) {
            var Days = 30;
            var exp = new Date();
            exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
            document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
        }

        function getCookie(name) {
            var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
            if (arr = document.cookie.match(reg))
                return unescape(arr[2]);
            else
                return null;
        }

        var searchWrap = $(".search-wrap"),
            searchLeft = $(".search-left"),
            searchBtn = $(".search-btn"),
            searchClose = $(".search-close-btn"),
            searchInput = $(".search-input");
        searchBtn.on("click", function () {
            searchWrap.removeClass("dn opacity0");
            setTimeout(function () {
                searchLeft.find("input").focus();
                searchLeft.addClass("slideLeft")
                searchClose.addClass("show");
                searchInput.focus();
            }, 30);
        });

        searchClose.on("click", searchInit);

        searchWrap.on("click", function (e) {
            if (e.target.className.indexOf("search-wrap") != -1) {
                searchInit();
            }
        });

        function searchInit() {
            searchWrap.addClass("opacity0");
            setTimeout(function () {
                searchWrap.addClass("dn");
            }, 150);
            searchLeft.removeClass("slideLeft")
            searchClose.removeClass("show");
        }

        hoverElem.hover(function (e) {
            var _this = $(this),
                hoverWrap = _this.find(".common-hover-wrap");
            hoverWrap.addClass('visible')

        }, function (e) {
            var _this = $(this),
                hoverWrap = _this.find(".common-hover-wrap");
            hoverWrap.removeClass('visible')
        });

    })

    $(".to-feedback").click(function () {

        if (!loginUserid) {
            $(".feedback-wrap").addClass("dn");
            loginIframe.show();
            return;
        }
        banPageScroll();
        $(".feedback-wrap").removeClass("dn");
    })

    $(".feedback-btn").on('click', function () {
        var _this = $(this)[0];
        var content = $.trim($(".feedback-input-wrap textarea").val());
        if (!_this.flag) {
            _this.flag = true;
            $.post('/index.php?app=aboutus&ac=feedback', {content: content}, function (res) {

                if (res.status == -1) {
                    $(".feedback-wrap").addClass("dn");
                    loginIframe.show();
                    return;
                }

                if (res.status == 1) {
                    showDialogTip({tip: "反馈成功"}, function () {
                        allowPageScroll();
                        $(".feedback-wrap").addClass("dn");
                        $(".feedback-input-wrap textarea").val("");
                        _this.flag = false;
                    });
                } else {
                    showDialogTip({tip: '反馈内容不能为空', error: true});
                    _this.flag = false;
                }
            }, 'json')
        }

    });

    $("#feedback_close_btn_div").click(function () {
        allowPageScroll();
        $(".feedback_post_bg").fadeOut(200);
        $("#feedback_post_textarea_div textarea").val('');
    });

    $(".slide-bar .to-up").on("click", function () {
        $("html,body").animate({scrollTop: 0}, 800);
    });

    $(window).on("scroll", function () {
        checkPosition($(window).height());
    });

    function checkPosition(pos) {
        if ($(window).scrollTop() > pos) {
            $(".to-up").fadeIn();
        } else {
            $(".to-up").fadeOut();
        }
        ;
    };

    $('.to-wap').hover(function () {
        $('#qrcode').removeClass("dn");
    }, function () {
        $('#qrcode').addClass("dn");
    })
</script>
<link rel="stylesheet"
      href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/login/css/rl_login_p-v=1503453383.css"/>
<link rel="stylesheet" type="text/css"
      href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/app/skins/filmplay_new-v=1521025597.css">
<link rel="stylesheet" type="text/css"
      href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/app/skins/video-js-v=1503453379.css">
<link rel="stylesheet" type="text/css"
      href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/app/skins/skins/vim-v=1505455875.css">
<link rel="stylesheet" type="text/css"
      href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/app/skins/skins/filmplay-loading-v=1505455875.css">
<link rel="stylesheet"
      href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/comment/css/rl_exp-v=1503453382.css"/>

<script type="text/javascript"
        src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/flowplayer-3.2.13.min.js"></script>
<style>.vsns {
        width: 100%;
        min-width: 1180px;
    }

    .video {
        width: 960px;
        height: 580px;
    }

    #xpc_video {
        visibility: hidden;
    }

    .transcoding span {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 180px;
        height: 30px;
        line-height: 30px;
        display: inline-block;
        text-align: center;
        margin-left: -90px;
        margin-top: -20px;
        color: #fff;
        background: rgba(0, 0, 0, 0.5);
    }

    .transcoding span img {
        width: 20px;
        vertical-align: middle;
        position: relative;
        top: -2px;
        margin-right: 2px;
        -webkit-animation: rotate 1s infinite linear;
        -animation: rotate 1s infinite linear;
    }

    @-webkit-keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
</style>
<div class="filmplay-container">
    <div class="play-box bg"
         style="background: url('http://cs.xinpianchang.com/uploadfile/article/2017/11/21/5a139b6ace40c.jpeg@960w_540h_50-30bl_1e_1c') no-repeat; background-size: cover; background-position: center;"
         data-src="http://cs.xinpianchang.com/uploadfile/article/2017/11/21/5a139b6ace40c.jpeg@960w_540h_50-30bl_1e_1c">
        <div class="banner-linear">
            <div class="filmplay">
                <div class="film-main banner-wrap">
                    <div class="video-js-box vim-css" id="mod_player">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript" src="http://qzs.qq.com/tencentvideo_v1/js/tvp/tvp.player.js" charset="utf-8"></script>

    <script language="javascript">
        var video = new tvp.VideoInfo();
        //向视频对象传入直播频道id
        video.setVid("<?php echo $videoDetail['video_url']; ?>");
        var player = new tvp.Player(960, 540);
        //设置播放器初始化时加载的视频
        player.setCurVideo(video);
        //设置播放器为直播状态，1表示直播，2表示点播，默认为2
        player.addParam("type", "2");
        player.addParam("autoplay", 0);
        player.addParam("wmode", "transparent");
        player.addParam("showcfg", "0");
        player.addParam("flashskin", "http://imgcache.qq.com/minivideo_v1/vd/res/skins/TencentPlayerMiniSkin.swf");
        player.addParam("showend", 0);
        //输出播放器
        player.write("mod_player");

    </script>
    <div class="film-main banner-wrap clearfix">
        <div class="filmplay-detail-left film-main clearfix" style="width:auto;">
            <div class="filmplay-info">
                <div class="filmplay-info-common left-section">
                    <div class="video-mark">
                    </div>
                    <span class="authorize-con"></span>
                    <div class="title-wrap">
                        <h3 class="title fs_26 fw_600 c_b_3 "><?php echo $videoDetail['video_name']; ?></h3>
                    </div>
                    <div class="filmplay-intro fs_12 fw_300 c_b_9">
                        <span class="cate v-center"><?php echo $videoDetail['cate_name']; ?></span>
                        <span class="i-icon v-center"></span>

                        <span class="update-time v-center"><i><?php echo $videoDetail['created_at']; ?></i></span>
                        <span class="i-icon v-center"></span>
                    </div>
                    <div class="filmplay-data">
                        <div class="filmplay-data-play filmplay-data-info" title="站内播放数">
                            <span class="icon-play v-center"></span>
                            <i class="fs_12 fw_300 c_b_6 v-center play-counts"
                               data-curplaycounts="600"><?php echo $videoDetail['play_num']; ?></i>
                        </div>
                        <div class="filmplay-data-btn fs_12">
                            <span class="like-btn  v-center">
								<span class="like-hand"></span>
								<i class="fs_12">喜欢</i>
								<span class="v-center like-counts fs_12 c_w_f fw_300"
                                      data-counts="13"><?php echo $videoDetail['like_num']; ?></span>
							</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<span id="ruler" class="ruler">ruler</span>

<div class="footer-wrap">
    <div class="footer-inner">
        <div class="footer-con clearfix">
            <div class="left fl">
                <div>
                    <a class="logo-wrap v-center disabled" href="#">
                        <span class="logo-wrap">
                <img src="./xinpian/images/logo40.png" width="120" height="40" style="margin-top:10px;">
            </span>
                    </a>
                    <span class="v-center fs_14 c_b_3">用作品打动世界！</span>
                </div>
                <p class="fs_12 c_b_9 fw_300">
                    维尔斯是专业的影视制作团队，汇聚精通专项人才，我们只做自己最擅长的领域，创作优秀作品。</p>
            </div>
            <div class="right fr clearfix">
                <div class="column-item fl">
                    <p class="title fs_16 c_b_3 fw_600">关于</p>
                    <ul class="list fs_12 fw_300">
                        <li><a target="_blank" class="disabled">关于我们</a></li>
                        <li><a target="_blank" class="disabled">加入我们</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="bottom-con">
                <span class="copyright">Copyright © 2017 - 2018 维尔斯. All rights reserved.</span>
                <span class="copyright">皖ICP备17005514号-1</span>
                <span class="copyright"><a target="_blank" class="disabled"><img
                                src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/images/ba-icon.png"><p>京公网安备11010102002903号</p></a></span>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/jquery.cookie-v=1503453383.js"></script>
<script>
    $('.first').hover(function () {
        $(this).parent().children().first().css({borderBottom: '7px solid #454545'});
    }, function () {
        $(this).parent().children().first().css({borderBottom: '7px solid #323232'});
    });
</script>
<script>
    var hideCode;
    $('.follow-wx').hover(function () {
        $(this).parent().parent().siblings('.wx-qr').css('display', 'block');
        $(this).next(".follow-wx-tri").css('display', 'block');
    }, function () {
        $(this).parent().parent().siblings('.wx-qr').css('display', 'none');
        $(this).next(".follow-wx-tri").css('display', 'none');
    });
    $('.followus').hover(function () {
        $(this).siblings('.wx-qr-follow').css('display', 'block');
    }, function () {
        hideCode = setTimeout(function () {
            $(".wx-qr-follow").hide();
        }, 300);
        $(this).siblings('.wx-qr-follow').css('display', 'none');
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#xma_search").bind("click", function () {
            var conVal = $('#search').val();
            if (conVal == '') {
                var pace = 600;
                $('#search').css('backgroundColor', '#D9EDF7').animate({opacity: 0.2}, pace).animate({opacity: 1}, pace, function () {
                    $('#search').css('backgroundColor', '#fff');
                });
                return;
            }
            else
                $('#search_btn').click();
        });
        /* 绑定search input框的回车按下按钮。 */
        $("#search").bind("keyup", function (event) {
            if (event.keyCode == 13) {
                var conVal = $.trim($('#search').val());
                if (conVal == '') {
                    var pace = 600;
                    $('#search').css('backgroundColor', '#D9EDF7').animate({opacity: 0.2}, pace).animate({opacity: 1}, pace, function () {
                        $('#search').css('backgroundColor', '#fff');
                    });
                    return false;
                } else {
                    $('#search_btn').click();
                }
            }
        });
    });

</script>
<script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/artDialog/artDialog.min-v=1503453382.js"></script>
<script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/artDialog/artDialog.plugins.min-v=1503453382.js"></script>
</body>
</html>
