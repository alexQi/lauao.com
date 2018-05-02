<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
$Uri = array(
    'default/discover',
);

if ($isNew) {
    $Uri['isNew'] = 1;
}

if ($video_cate_id) {
    $Uri['video_cate_id'] = $video_cate_id;
}

?>
<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta property="qc:admins" content="20574040667416216375"/>
    <meta property="qc:admins" content="205740460760160116301676375"/>
    <meta name="robots" content="all"/>
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="author" content=""/>
    <meta name="Copyright" content=""/>
    <meta name="renderer" content="webkit">
    <title>作品 - 维尔斯社区</title>
    <meta name="keywords" content="原创短片,原创视频,微电影,原创作品,创作人,影人社区,影视社区,新媒体电影,新媒体影视,互联网影视,互联网电影,发行,短片,微电影,原创视频,创作人"/>
    <meta name="description" content="汇集维尔斯创作人短片原创作品,覆盖剧情片,动画,纪录片,广告短片,宣传片,MV,特殊摄影,混剪,配音,栏目,网剧,实验短片,预告片,花絮等丰富类型."/>
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

    <script>

        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-76608034-3', 'auto');
        ga('send', 'pageview');

    </script>
    <script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/zhugeio-v=1503453383.js" type="text/javascript"
            charset="utf-8"></script>
    <script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/jquery-1.7.1.min.js"></script>
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
                <a class="disabled" href="">器械租赁</a>
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
            </li>
            <li class="nav-item newera">
                <a class="disabled" href="" target="_blank">
                    <img src="http://oss-xpc0.xpccdn.com/Upload/boss/2017/12/065a2769d0e9cf1.png">
                </a>
            </li>
        </ul>
        <ul class="fr right-part no-login">
            <li class="search-btn icon-search"></li>
            <li class="reg-btn"><a class="disabled" href="">登录</a></li>
            <li class="login-btn"><a class="disabled" href="">注册</a></li>
        </ul>
    </div>
</div>
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
<script src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/jquery-qrcode-0.14.0-v=1503453383.js"
        type="text/javascript"></script>

<script type="text/javascript">
    var siteUrl = 'http://www.xinpianchang.com/',
        hoverElem = $(".hover-elem");
    $(function () {
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

    checkPosition($(window).height());
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

    $('.qrcode-box').qrcode({
        render: "canvas",
        width: 200,
        height: 200,
        text: location.href
    });

    $('.to-wap').hover(function () {
        $('#qrcode').removeClass("dn");
    }, function () {
        $('#qrcode').addClass("dn");
    })
</script>
<div class="channel-container">
    <!-- 通栏广告 -->
    <!--<a class="create-man-banner" href="/activity/independence/ts-newye2017" target="_blank"><img src="//oss-xpc0.xpccdn.com/Upload/boss/2018/01/155a5c92f6ca3e0.jpeg"></a>-->

    <div class="choose-bar-v2">
        <div class="type-up">
            <div class="type-mark fs_14 fw_300 c_b_3 mar-bottom">
                <span class="mark">分类</span>
                <div class="type-global">
                    <span class="<?php echo !isset($Uri['video_cate_id']) ? 'cur' : ''; ?>" data-type="cate"
                          data-id="0">
                        <?php
                        if (isset($Uri['video_cate_id'])) {
                            $oldCateId = $Uri['video_cate_id'];
                        }
                        ?>
                        <?php if (isset($Uri['video_cate_id'])) {
                            unset($Uri['video_cate_id']);
                        } ?>
                        <a class="fs_14 fw_300 c_b_3" href="<?php echo Url::to($Uri) ?>">全部作品</a>
                    </span>
                    <?php foreach ($cateList as $key => $cate): ?>
                        <?php $Uri['video_cate_id'] = $cate['id']; ?>
                        <span class="<?php echo isset($oldCateId) && $cate['id'] == $oldCateId ? 'cur' : ''; ?>"
                              data-type="cate">
                        <a class="fs_14 fw_300 c_b_3"
                           href="<?php echo Url::to($Uri) ?>"><?php echo $cate['cate_name']; ?></a>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="type-down">
            <div class="sort-type fw_300 c_b_9">
                <?php
                if (isset($oldCateId)) {
                    $Uri['video_cate_id'] = $oldCateId;
                }
                ?>
                <span class="tab fs_16 v-center <?php echo !isset($Uri['isNew']) ? 'pick select' : '' ?>">
                    <?php
                    if (isset($Uri['isNew'])) {
                        $oldIsNew = 1;
                        unset($Uri['isNew']);
                    }
                    ?>
                    <a href="<?php echo Url::to($Uri) ?>">热门</a>
                </span>
                <i class="i-icon v-center fs_16"></i>
                <span class="tab fs_16 last v-center <?php echo isset($oldIsNew) ? 'pick select' : '' ?>"
                      data-id="addtime" data-type="sort">
                    <?php if (!isset($Uri['isNew'])) {
                        $Uri['isNew'] = 1;
                    } ?>
                    <a href="<?php echo Url::to($Uri) ?>">最新</a>
                </span>

            </div>

        </div>
    </div>
    <div class="channel-con">
        <ul class="video-list">
            <?php foreach ($videoList['list'] as $key => $video): ?>
                <li class="enter-filmplay" data-articleid="10178093" data-videourl="ArticleList">
                    <a class="video-cover" href="<?php echo Url::to(['default/detail', 'video_id' => $video['video_id']]); ?>">
                        <img class="" src="<?php echo $video['poster']; ?>">
                        <span class="duration fs_12"><?php echo $video['video_time']; ?></span>
                        <p class="fs_12"><?php echo $video['cate_name']; ?></p>
                        <div class="video-hover-con">
                            <div class="fs_12 fw_300 c_w_f desc line-hide-3"></div>
                            <p class="fs_12"><?php echo $video['created_at']; ?> 发布</p>
                        </div>
                    </a>
                    <div class="video-con">
                        <a href="<?php echo Url::to(['default/detail', 'video_id' => $video['video_id']]); ?>">
                            <p class="fs_14 fw_600 c_b_3 line-hide-1"><?php echo $video['video_name']; ?></p>
                        </a>
                        <div class="video-view fs_12 fw_300 c_b_9"><span class="type">播放</span><span
                                    class="fw_600"><?php echo $video['play_num']; ?></span><span class="i-icon v-center"></span><span
                                    class="type">喜欢</span><span class="fw_600"><?php echo $video['like_num']; ?></span></div>
                        <div class="user-info">
                            <a class="v-center enter-creator-space" href="<?php echo Url::to(['default/detail', 'video_id' => $video['video_id']]); ?>"
                               data-userid="10024182">
                            </a>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="page-wrap">
            <?= LinkPager::widget([
                'pagination' => $videoList['pages'],
                'activePageCssClass'=>'current',
                'nextPageLabel' => '下一页',
                'prevPageLabel' => '上一页',
                'options' => ['class'=>'page']
            ]); ?>
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

