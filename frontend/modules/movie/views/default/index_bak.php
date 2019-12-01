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
    <title> 宣城直播创作团队 - 专业的影视创作</title>
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
    <script src="./layui/layui.js"></script>
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
                <a href="<?php echo Url::to(['/movie/default/discover']) ?>">我们的案例</a>
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
                <a class="disabled" id="show-weixin" href="javascript:;">器械租赁</a>
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
<!--            <li class="reg-btn"><a class="disabled" href="">登录</a></li>-->
            <li class="login-btn"><a  href="<?php echo Url::to(['/movie/default/signup'])?>">注册</a></li>
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
        <video id="backgroundmovie"  src="http://video.sboyo.com/ahweslogo2018.mp4" loop muted autoplay preload
       class="need-though-play opacity0"></video>
        <div class="wrappage-cover-main">
            <div class="wrappage-cover-center">
                <div class="wrappage-cover-detail">
                    <p class="slogan">让维尔斯成为⽣活中的标配</p>
                    <p class="join-num">
                        <i class="incremental-counter" data-current="13848610" data-value="13848610">13848610</i>位⽤户观看了直播</p>
                </div>
<!--                <div class="btn-wrap" data-key="位置">-->
<!--                    <a class="dplus-link join-btn bg-red"-->
<!--                       href="--><?php //echo Url::to(['/movie/default/discover']) ?><!--">随便逛逛</a>-->
<!---->
<!--                    <a  id="show-weixin" class="dplus-link join-btn bg-transparent " href="javascript:;"-->
<!--                       data-link=""-->
<!--                       data-value="头部" >联系我们</a>-->
<!---->
<!---->
<!--                </div>-->

                 </div>
        </div>
    </div>
    <div class="article-set-box">
        <div class="article-show-box float-contaniner">
            <div class="show-left select-list">

                    <h4 class="level-title second-level-title float-elem el-2">SUCESSFUL CASES</h4>
                <h4 class="level-title second-level-title float-elem float-down el-2">成功案例</h4>

                <p class="show-intro float-elem float-down el-3">我们学习海量国内外优质作品;<br>只为了创作更好的优秀作品</p>
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
<!--                    <a class="dplus-link video-cover " data-value="108864"-->
<!--                       data-link="--><?php //echo Url::to(['default/detail', 'video_id' => $value['video_id']])?><!--"/>-->
                    <a class="dplus-link video-cover " data-value="108864" href="<?php echo $value['video_url']; ?> " target="_blank"/>

                        <img class="lazy-img1"
                             src="<?php echo $value['poster']; ?>">
                        <div class="video-cover-con">

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
                <h4 class="level-title second-level-title float-elem float-down el-2">TEAM ADVANTAGE</h4>
                <h4 class="level-title second-level-title float-elem float-down el-2">团队优势</h4>
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

    layui.use(['layer'], function(){
        var layer = layui.layer;
        //show weixin images
        $("#show-weixin").click(
            function(){
                layer.tips(
                    '<img src="./xinpian/images/weixin.jpg"  width="150px" height="150px"/>', '#show-weixin',
                    {tips:[3,'#000'],
                    time:7000
                    });}
        );



    });

    $(".disabled").attr("disabled", true);
    $(".disabled").css("pointer-events", "none");
    // $(".incremental-counter").incrementalCounter();

    $(".dplus-link").live("click", function () {
        var _this = $(this),
            link = _this.data("link");

        if (link) {
            location.href = link;
        }
    });

    (function (window, $) {
        //var videoEle = document.getElementById("backgroundmovie");
       // videoEle.volume=100;
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
