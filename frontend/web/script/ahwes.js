/**
 @Name: ahwes javascript fucnction
 @Author: Po
 */

layui.use(['form', 'element'], function(){
    var $ = layui.$
        ,form = layui.form
        ,element = layui.element
        ,util = layui.util
        ,scrChange = function(){

            var scr = $(document).scrollTop();
            scr > 0 ? $(".ahwes-header").addClass('scroll') : $(".ahwes-header").removeClass('scroll');



    };




    //平滑滚动到描点
    $("a.topLink").click(function() {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top - 65 + "px"
        }, {
            duration: 900,
            easing: "swing"
        });
        return false;
    });

    //头部切换
    $(".xian-header-nav-btn").on('click', function(){
        if($(".xian-header").height() == 60){
            $(".xian-header").height(70 + $(".xian-header-nav").height());
        }else{
            $(".xian-header").height(60);
        };
    });

    //滚动监听
    $(window).scroll(function(){

        scrChange();

        for(var i = 0; i < $("a.topLink").length; i++) {
            //65是header的高度
            if($(window).scrollTop() > $($("a.topLink").eq(i).attr("href")).offset().top  - 120)
            {
                $(".layui-nav li").eq(i).addClass("layui-this").siblings().removeClass("layui-this");
            }

        }






        });

    $(window).resize(function(){
        if(document.body.clientWidth > 751){
            $(".xian-header").height(60);
        }
    });
    $(function(){
        scrChange();
        $(".xian-index-banner").find(".xian-banner-txt").addClass("loading");
    });

    //修复锚点偏移
    var fixAnchor = function(){
        var hash = this.hash.slice(1)
            ,hashElem = $('a[name="'+ hash +'"]');
        if (!hash || !hashElem[0]) return;

        var targetOffset = hashElem.offset().top - 60;

        $('html,body').animate({
            scrollTop: targetOffset
        }, 200);

        return false;
    }
    $('a[data-target="anchor"]').on('click', function() {
        fixAnchor.call(this);
    });
    fixAnchor.call(location);

    //首页——提交
    form.on('submit(formIndex)', function(obj){
        var field = obj.field;
        location.href = "https://console.xiankefu.com/#/user/regist/phone="+ field.phone;
    });

    //试用页——提交
    form.on('submit(formFree)', function(obj){
        var field = obj.field;
        location.href = "https://console.xiankefu.com/#/user/regist/phone="+ field.phone;
    });





    //教程页——点击
    $(".xian-docs-side").children("dl").each(function(){
        $(this).find("dd,li").children("a").on('click', function(){
            $(this).parent("dd,li").addClass("xian-side-this").siblings().removeClass("xian-side-this");
            $(this).parents("dl").siblings().children("dd,li").removeClass("xian-side-this");
        });
    });

    $(".xian-docs-btn").on('click', function(){
        if($(".xian-docs").hasClass("open")){
            $(".xian-docs").removeClass("open");
        }else{
            $(".xian-docs").addClass("open");
        };
        $(".xian-docs-side").children("dl").each(function(){
            $(this).children("dd").children("a").on('click', function(){
                $(".xian-docs").removeClass("open");
            });
        });
    });

    //关于我们——手风琴切换
    $(".xian-join-main").find(".layui-colla-item").each(function(){
        $(this).on('click', function(){
            if($(this).find(".xian-colla-change").hasClass("layui-icon-up")){
                $(this).find(".xian-colla-change").addClass("layui-icon-down").removeClass("layui-icon-up");
            }else{
                $(this).find(".xian-colla-change").addClass("layui-icon-up").removeClass("layui-icon-down");
                $(this).siblings().find(".xian-colla-change").addClass("layui-icon-down").removeClass("layui-icon-up");
            };
        });
    });
    //找回密码1
    form.on('submit(formFindCode)', function(data){
        window.location.href = "../user/setcode.html";
    });
    form.on('submit(formSetCode)', function(data){
        window.location.href = "../user/login.html";
    });
    $(".xian-user-main").find(".verifyNum").on('click', function(){
        layer.msg('验证码已发出！')
    });

    //exports('xian', {});
});