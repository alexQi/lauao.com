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
    <title>维尔斯社区 - 专业的影视创作人社区</title>
    <meta name="keywords" content="新媒体电影,新媒体影视,互联网影视,互联网电影,发行,短片,微电影,原创视频,创作人"/>
    <meta name="description"
          content="维尔斯是国内专业的影视创作人社区，汇聚众多优秀创作人，提供作品展示、项目交流、拍摄制作机会等影视行业服务。在这里，你可以找到最合适的创作人；在这里，用作品打动世界！"/>
    <link rel="stylesheet"
          href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/css/new-web/font-icon-v=1519469245.css">
    <link rel="stylesheet"
          href="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/css/new-web/common-v=1520334715.css">
    <script>
        if (top.location != location) {
            top.location.href = location.href;
        }
    </script>
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
                <form action="/index.php" mothod="get">
                    <input type="hidden" name="app" value="search">
                    <input class="search-input" type="text" name="kw" placeholder="搜索作品、创作人、文章">
                </form>
            </div>
            <span class="search-close-btn icon-close"></span>
        </div>
    </div>
</div>
<div class="header-common zIndex-1 header-v2 fixed-header complex-header">
    <div class="header-con">
        <a class="logo v-center" href="<?php echo Url::to(['/movie/default/index']) ?>">
            <span class="logo-wrap">
                <img src="./xinpian/images/logo40.png" width="120" height="40" style="margin-top:10px;">
            </span>
        </a>
        <ul class="fs_16 fw_300 nav-list clearfix v-center">
            <li class="nav-item select">
                <a href="<?php echo Url::to(['/movie/default/index']) ?>">首页</a>
            </li>
            <li class="nav-item hover-elem">
                <i class="icon-arrow-down"></i>
                <a href="<?php echo Url::to(['/movie/default/discover']) ?>">作品</a>
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

<?php ///*var_dump($videoList)*/?>

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
        background: url("<?php echo Yii::$app->request->hostInfo;?>/xinpian/images/error-notice@3x.png") no-repeat;
        background-position: left;
        background-size: 14px;
        display: inline-block;
    }

    .tip-success {
        background-color: #28ca42;
    }

    .tip-success .tip-content {
        background-image: url("<?php echo Yii::$app->request->hostInfo;?>/xinpian/images/success-notice@3x.png")
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
<script type="text/javascript">
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

    $('.to-wap').hover(function () {
        $('#qrcode').removeClass("dn");
    }, function () {
        $('#qrcode').addClass("dn");
    })
</script>
<style type="text/css">body {
        background-color: #fff !important;
    }

    .slide-bar {
        display: none;
    }

    .incremental-counter {
        letter-spacing: 2px;
        font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
    }

    .incremental-counter .num, .incremental-counter .do {
        display: inline-block;
    }
</style>
<div class="wrappage-container">
    <div class="wrappage-cover-wrap banner-wrap">
        <video src="http://video.sboyo.com/background-test.mp4" loop muted autoplay preload
               class="need-though-play opacity0"></video>
        <div class="wrappage-cover-main">
            <div class="wrappage-cover-center">
                <div class="wrappage-cover-detail">
                    <p class="slogan">用作品打动世界</p>
                    <p class="join-num">
                        <i class="incremental-counter" data-current="808610" data-value="848610">808,610</i> 位创作人已加入</p>
                </div>
                <div class="btn-wrap" data-key="位置">
                    <a class="dplus-link join-btn bg-red"
                       href="<?php echo Url::to(['/movie/default/discover']) ?>">随便逛逛</a>
                    <a class="dplus-link join-btn bg-transparent disabled" href="javascript:;"
                       data-link=""
                       data-value="头部">立即加入</a>
                </div>
            </div>
        </div>
    </div>
    <div class="article-set-box">
        <div class="article-show-box float-contaniner">
            <div class="show-left select-list">
                <h4 class="level-title second-level-title float-elem float-down el-2">启发创作灵感</h4>
                <p class="show-intro float-elem float-down el-3">我们浏览海量国内外优质作品;职位创作更佳作品<br>高端快传直播广电技术发挥极致，只为打造精彩直播内容</p>
                <ul class="show-btn-list float-elem float-down el-4" data-eventname="查看作品分类" data-key="分类">
                    <?php foreach ($cateList as $key => $cate): ?>
                        <li>
                            <a class="dplus-link" href="javascript:;"
                               data-link="<?php echo Url::to(['default/discover', 'video_cate_id' => $cate['id']]) ?>"><?php echo $cate['cate_name']; ?></a>
                        </li>
                    <?php endforeach; ?>
                    <li><a class="dplus-link disabled">more</a></li>
                </ul>
            </div>
         <ul class="show-right float-elem float-down el-1" data-eventname="查看作品" data-key="作品ID">
            <?php foreach ($videoList['list'] as $key=>$value):?>
                <li>
                    <a class="dplus-link video-cover disabled" data-value="108864">
                        <img class="lazy-img1"
                             src="<?php echo $value['poster']; ?>">
                        <div class="video-cover-con">
                            <div class="video-mark">
                                <span class="pick vmovier">
                                    <svg width="24" height="24" viewBox="0 0 60 60" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"><g
                                                id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd"><g id="web切片"
                                                                       transform="translate(-836.000000, -489.000000)"><g
                                                        id="Group-4-Copy-3"
                                                        transform="translate(836.000000, 489.000000)"><path
                                                            d="M30,60 C46.5685425,60 60,46.5685425 60,30 C60,13.4314575 46.5685425,0 30,0 C13.4314575,0 0,13.4314575 0,30 C0,46.5685425 13.4314575,60 30,60 Z"
                                                            id="Oval" fill="#000000" fill-rule="nonzero"></path><path
                                                            d="M48.862785,35.7141055 L50.4894847,39.0387973 L53.585081,37.7817071 C52.9140489,39.6724171 52.0276967,41.4616319 50.9304486,43.1116534 L47.7979825,43.3668412 L47.3658673,39.1170935 C47.9720084,38.0412447 48.4704893,36.901599 48.862785,35.7141055 Z M12.6336902,39.1165136 L12.2015751,43.3677112 L9.06910893,43.1110734 C7.97333569,41.461052 7.08550866,39.6732871 6.41447659,37.7811271 L9.51154765,39.0382173 L11.1367726,35.7135255 C11.5290682,36.9024689 12.029024,38.0421147 12.6336902,39.1165136 Z M10.4950889,33.1767263 L8.67519099,37.0103438 L5.75067103,35.5749121 C5.28168599,33.7016013 5.00589918,31.754344 5,29.73749 L7.53959827,32.0211313 L10.1824322,29.2140649 C10.1780078,29.3677576 10.1573607,29.5171005 10.1573607,29.6707932 C10.1573607,30.8684362 10.2841931,32.0385305 10.4950889,33.1767263 Z M17.3418282,11.25 L15.653187,14.5949908 L11.862962,16.4132042 L13.0590213,12.8173754 L17.3418282,11.25 Z M12.2766422,20.9208947 L8.48051795,22.9015004 L6.94378079,20.1379319 C7.72247294,18.3153687 8.7386072,16.6174995 9.916969,15.0486742 L10.5762027,18.3168186 L14.5419284,17.4323607 C13.664425,18.5067596 12.9108044,19.6783038 12.2766422,20.9208947 Z M10.3769578,26.9252039 L7.41704274,29.9323607 L5.09866384,27.6951172 C5.25351739,25.7725087 5.62074153,23.9107973 6.19886146,22.1389817 L7.94207002,24.8764514 L11.3341002,23.0930363 C10.8901867,24.3196779 10.5672064,25.5999669 10.3769578,26.9252039 Z M13.9343126,41.1074138 C14.8250892,42.321006 15.8530219,43.4287533 16.9974634,44.4103566 L17.4782468,48.1888767 L14.1997758,48.75 C12.754476,47.5857054 11.4581305,46.2546688 10.3092647,44.8061877 L13.5316934,44.8902837 L13.9343126,41.1074138 Z M52.4604017,32.0212763 L55,29.737635 C54.9941008,31.7530391 54.718314,33.7017463 54.249329,35.5750571 L51.324809,37.0090389 L49.5049111,33.1768713 C49.7158069,32.0386755 49.8426393,30.8685812 49.8426393,29.6694882 C49.8426393,29.5157955 49.8219922,29.3664527 49.8175678,29.2142099 L52.4604017,32.0212763 Z M47.7235053,20.9208947 C47.0893431,19.6783038 46.3357225,18.5067596 45.458219,17.4323607 L49.4239448,18.3168186 L50.0831785,15.0486742 C51.2615403,16.6174995 52.2776745,18.3153687 53.0563667,20.1379319 L51.5196295,22.9015004 L47.7235053,20.9208947 Z M48.6654573,23.0937612 L52.0589623,24.8771763 L53.8006961,22.1382567 C54.378816,23.9100724 54.7460402,25.7732337 54.9023685,27.6943922 L52.5825148,29.9316358 L49.6225998,26.9259288 C49.4338259,25.6006919 49.1108456,24.3204028 48.6654573,23.0937612 Z M48.1368905,16.4132042 L44.3466655,14.5949908 L42.6580244,11.25 L46.9408312,12.8173754 L48.1368905,16.4132042 Z M46.0658349,41.1074138 L46.4684541,44.8902837 L49.6908828,44.8061877 C48.5420169,46.2546688 47.2456715,47.5857054 45.8003716,48.75 L42.5219007,48.1888767 L43.0026841,44.4103566 C44.1471256,43.4287533 45.1750583,42.321006 46.0658349,41.1074138 Z"
                                                            id="Combined-Shape" fill="#FFFFFF"></path><path
                                                            d="M37.7960982,22.5 L29.9999537,34.9738024 L22.2038555,22.5 L17.5,22.5 L29.9999537,42.5 L42.5,22.5 L37.7960982,22.5 Z M25.0469112,22.5 L29.9798132,30.3926471 L34.9127151,22.5 L25.0469112,22.5 Z"
                                                            id="Page-1" fill="#FFFFFF"></path></g></g></g></svg></span>
                            </div>
                            <span class="duration fs_12"></span>
                        </div>
                        <div class="video-hover-con">
                            <div class="fs_12 fw_600 c_w_f desc line-hide-2"><?php echo $value['video_name']; ?></div>
                            <span class="fs_10 fw_300 "><?php echo $value['cate_name']; ?></span>

                        </div>
                    </a>
                </li>

            <?php endforeach;?>

            </ul>

        </div>
        <div class="creator-show-box float-contaniner">
            <ul class="show-left float-elem float-down el-1" data-eventname="查看创作人" data-key="创作人ID">
                <?php foreach($memberList as $key=>$value):?>

                <li>
                    <a class="dplus-link disabled" data-link="/u10001639" data-value="10001639">
                        <img class="avator"
                             src="<?php echo $value['avatar_url'] ?>">
                        <div class="cover">
                            <div class="cover-inner">
                                <div class="name-wrap">
                                    <span class="fs_14 fw_600 name"><?php echo $value['name'] ?></span>
                                    <span class="author-v yellow-v"></span>
                                </div>
                                <p class="fs_12 fw_300 intro"><?php echo $value['desc'] ?></p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
            <div class="show-right select-list">
                <h4 class="level-title second-level-title float-elem float-down el-2">发现优秀创作人</h4>
                <p class="show-intro float-elem float-down el-3">优秀创作团队<br>优秀创作人聚集地，专业流程，<br>搭建优质创作人团队</p>
            </div>
        </div>
    </div>
    <div class="wrappage-complete-video dn">
        <div class="iframe-layer">
            <i class="iframe-close icon-close"></i>
        </div>
    </div>
</div>
<script type="text/javascript"
        src="<?php echo Yii::$app->request->hostInfo; ?>/xinpian/js/incrementalCounter-v=1520824610.js"></script>
<script type="text/javascript">

    $(".disabled").attr("disabled", true);
    $(".disabled").css("pointer-events", "none");
    $(".incremental-counter").incrementalCounter();

    $(".dplus-link").live("click", function () {
        var _this = $(this),
            link = _this.data("link");

        if (link) {
            location.href = link;
        }
    });

    (function (window, $) {
        $.fn.creatorchange = function () {
            return this.each(function () {
                var random = Math.random() * 1; // 10s内随机开始
                var firstShowIndex = Math.floor(Math.random() * 3);
                $(this).find("a").eq(firstShowIndex).addClass("show");
                setTimeout(function () {
                   changeCreator(this);
                }.bind(this), random * 1000);
            });
        };

        function changeCreator(elem) {
            elem.index = $(elem).find(".show").index();
            var delay = 1;  // 切换间隔时间5s
            nextShow(elem);
            elem.timer = setInterval(nextShow, delay, elem);
            $(elem).on("mouseover", function () {
                clearInterval(elem.timer);
            });
            $(elem).on("mouseout", function () {
                elem.timer = setInterval(nextShow, delay, elem);
            });
        }

        function nextShow(elem) {
            elem.index++;
            if (elem.index == $(elem).find("a").length) elem.index = 0;
            $(elem).find("a").eq(elem.index).addClass("show").siblings("a").removeClass("show");
        }

        $.fn.floatingUp = function () {
            return this.each(function () {
                var _this = $(this);
                scrollToCur();
                $(window).on("scroll", scrollToCur);

                function scrollToCur() {
                    var scrollOverHeight = _this.attr("scrollOverHeight") ? _this.attr("scrollOverHeight") : 200;
                    if (_this.offset().top - $(window).scrollTop() - ($(window).height() - scrollOverHeight) < 0 && !_this[0].flag) {
                        _this[0].flag = true;
                        floatUp(_this);
                    }
                }
            });
        };

        function floatUp(_elem) {
            _elem[0].index = 1;
            while (_elem.find(".el-" + _elem[0].index).length) {
                _elem.find(".el-" + _elem[0].index).removeClass("float-down");
                _elem[0].index++;
            }
        }

    })(window, $);

    $(function () {
        var _secondVideoBox = $(".school-show-box"),
            _window = $(window);

        var playVideoFlag = true;

        function loadVideo(_elem, _window) {
            if (_elem.offset().top - _window.scrollTop() - _window.height() < 0 && playVideoFlag) {
                _elem.find("video")[0].play();
                console.log("play");
                playVideoFlag = false;
            }
        }

        $(".need-though-play").on("canplaythrough", function () {
            $(this).removeClass("opacity0");
        });

        $(".creator-show-box li").creatorchange();
        $(".float-contaniner").floatingUp();
    });


</script>
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
