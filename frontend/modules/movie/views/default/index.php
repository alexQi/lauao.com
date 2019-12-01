<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>宣城直播</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="keywords" content="宣城直播,企业会议,教育培训直播,体育直播,电商直播">
    <meta name="description" content="让直播成为生活中的标配">
    <link rel="stylesheet" href="./layui/css/layui.css">


     <style>

         /*https://q42.github.io/delighters/*/

         .ahwes-header{
             position: fixed;
             top: 0px;
             width: 100%;
             z-index: 999;

             height: 65px;
             background-color: rgba(0,0,0,0);
             overflow: hidden;
         }

         .ahwes-header.scroll{ background-color: rgba(0,0,0,.7); }

         .ahwes-bars{
             position: absolute;
             left: 250px;
             /* top: 0; */
             /* padding: 0; */
             background: none;}

          .logo{
             position: absolute;
             top: 10px;
             left: 25px;

         }

          .logo img{ width: 220px;height: 45px;}

         .ahwes-title{padding: 10px 10px 0px 25px; }

         .ahwes-title .two{ text-align: center}

         .ahwes-title p{ }

         .number{display: inline;width:30px;padding-right:15px;font-size: 75px;font-weight: bold}
         .enname{display: inline;width: 200px;vertical-align:top;font-size: 28px;letter-spacing: 5px;}

         .cnname{font-size: 35px;font-weight: bold;letter-spacing: 3px;}
         .cnname2{font-size: 28px;font-weight: bold;letter-spacing: 3px;}

         .ahwes-content p{padding: 10px 10px 0px 25px; font-size:14px;line-height: 30px;margin: 20px 0px}

         .ahwes-business li{
             list-style-type: none;
             width: 100px;
             float: left;
             /*line-height: 40px;!*行内元素不能设置高度，但可以设置行高*!*/
             text-align: center;/*让li内的内容水平居中，行内元素默认垂直居中*/
             padding: 10px 0px;

         }
         .pic {margin:0 auto;
             -webkit-border-radius: 40px;
             -moz-border-radius: 40px;
             border-radius: 40px;
             background-color:#4e694a;
             width: 80px;
             height: 80px;
             position: relative;
         }
         .pic img{width: 50px;
             height: 50px;
             position: absolute;
             top: 0;
             left: 0;
             right: 0;
             bottom: 0;
             margin: auto;}

         .ahwes-business #title{ font-size: 15px;font-weight: bold;padding-top: 16px;padding-bottom: 5px;color: white}
         .ahwes-business #enname{ font-size: 10px;color: #f8faf9;letter-spacing: 1px;}


         .ones{color: white;height: 780px;padding-top: 80px}
         .twos{padding-top: 65px}
         #roundone{
             background: url(http://images.ahwes.com/background001.png) no-repeat;
             background-size: 100% 100%;
             width: 100%;
         }

         #sixbackground{

             background: url(http://images.ahwes.com/background006.png) no-repeat;
             background-size: 100% 100%;
             width: 100%;
             height: 500px;
         }

         .ahwes-twotitleexend{ padding-top: 400px;color: white;padding-left: 65px}

         .ahwes-sixtitleexend{ padding-top: 50px;color: white;padding-left: 65px}

         .ahwes-footer {
             position: relative;
             height: 280px;
             background-color: #f9f9f9;

         }

         .ahwes-copyRight p{
             position: absolute;
             bottom: 10px;
             margin: auto 0;
             height: 34px;
             font-size: 12px;
             line-height: 34px;
             color: #bbc2cd;
             text-align: center;
             width: 100%;
         }

         .ahwes-footer hr{position: absolute;
             bottom:45px; width: 100%}

         .ahwes-advert{ color: #bbc2cd; font-size: 25px;text-align: center;font-weight: bold ;letter-spacing: 5px;position: absolute;bottom: 70px;left: 32px}

         .ahwes-contact{ color: #bbc2cd; padding: 20px}
         .ahwes-contact p{margin: 5px;padding: 5px}

         .ahwes-contact .ahwesico{ font-size: 20px; padding-right: 5px; color: #bbc2cd;}

          #roundsix{color: white;background: #4e694a;margin-top: 20px}

         .ahwes-our{margin: 30px}

         .ahwes-ourlist { width:100%

                               list-style: none;
                               margin:10px 80px;
                               }

         .ahwes-ourlist li{width:170px;
             margin:0 10px;
           float: left;/*该处换为display:inline-block;同样效果*/}
         .ahwes-ourlist p{ padding: 10px 20px;text-align: center}

         .ahwes-qrcode li {float: left;margin: 50px 10px;}

         .ahwes-qrcode p {font-weight: bold;color:#bbc2cd ;text-align: center;padding: 10px}
         .ahwes-qrcode img {width: 120px ;height: 120px;}

     </style>


</head>
<body>
<div class="ahwes-header">

    <a class="logo" href="/">
        <img src="./xinpian/img/logo.png"  />
    </a>

<ul class="layui-nav ahwes-bars " lay-filter="bar">
<li class="layui-nav-item  layui-this"><a class="topLink" href="#roundone">企业简介</a></li>
<li class="layui-nav-item "><a class="topLink" href="#roundtwo">发展历程</a></li>
<li class="layui-nav-item "><a class="topLink" href="#roundfour">设备优势</a></li>
<li class="layui-nav-item "><a class="topLink" href="#roundsix">合作伙伴</a></li>
</ul>
</div>
<!--企业简介-->
<div class="layui-row " id="roundone" >
<!--    <img src="./xinpian/img/03bg.png" height="200px" width="200px" style="float: top">  -->

    <div class="layui-col-md6 ones">
        <div class="ahwes-title">
            <div style="float: left">
                <h1 class="number">01</h1>
            </div>
            <p class="enname">COMPANY PROFILE</p>
            <div style="clear: left">
            <p class="cnname">企业简介</p>
            </div>

        </div>
        <div class="ahwes-content">
            <div class="layui-row">
                <div class="layui-col-md6">
                  <p>
                      安徽维尔斯传媒策划有限公司是一家专注现场直播执行服务公司，主营业务有：教育培训直播、峰会论坛直播、户外活动直播、电商直播、医疗直播、年会庆典直播、音乐节直播等。现有员工23人，在安徽合肥、芜湖、马鞍山、铜陵、江苏南京、浙江杭州、上海等地设有分公司、截至目前，我们服务中大型活动700余次、线上同时观看用户最高370万人次。通过直播带货总销量突破2000万。
                  </p>
                  <p>
                    Anhui Wealth Media Co., Ltd. was founded in 2016. Meanwhile,We created the subsidiary brand - The Live XuanCheng. Our company has 23 current staffs. Offices have been established at seven locations.A total of 278 live broadcast activities were carried out.
                      We attracted more than 380000 regular fans in Xuanzhou District and the total number of visitors to the live broadcast platform was more than 20 million.
                  </p>
                </div>
                <div class="layui-col-md6">
                    <p>下一步,我们打算以安徽为片区开设直播网点,全面覆盖安徽16个地级市和54个县级市</p>
                    <p>Next,we plan to set up outlets of live broad-cast in Anhui, covering 16 prefecture-level cities and 54 county-level cities in Anhui. </p>
                </div>
            </div>
        </div>



            </div>

    <div class="layui-col-md6 ">
       <div class="layui-row " >
           <div class="layui-col-md8">
               <div class="ahwes-title ahwes-twotitleexend">
                   <div style="float: left">
                   <h1 class="number">02</h1>
                   </div>
                   <div ">
                   <h2 class="enname">BUSINESS SCOPE</h2>
                   <h1 class="cnname2">业务介绍</h1>
                   </div>

               </div>
           </div>
           <div class="layui-col-md2 twos">
               <ul class="ahwes-business">
                   <li>
                       <div class="pic">
                          <img src="./xinpian/img/hy.png" />
                       </div>
                       <p id="title">企业会议</p>
                       <p id="enname">BUSINESS</p>
                       <p id="enname">MEETING</p>
                   </li>
                   <li>
                       <div class="pic">
                           <img src="./xinpian/img/jy.png" />
                       </div>
                       <p id="title">教育培训直播</p>
                       <p id="enname">LIVE</p>
                       <p id="enname">EDUCATIONAL</p>
                       <p id="enname">TRAINING</p>
                   </li>
                   <li> <div class="pic">
                           <img src="./xinpian/img/ty.png" />
                       </div>
                       <p id="title">体育直播</p>
                       <p id="enname">LIVE</p>
                       <p id="enname">SPORT</p>

                   </li>
               </ul>
           </div>
           <div class="layui-col-md2">

               <ul class="ahwes-business">
                   <li>
                       <div class="pic">
                           <img src="./xinpian/img/hd.png" />
                       </div>
                       <p id="title">盛典直播</p>
                       <p id="enname">LIVE</p>
                       <p id="enname">CEREMONY</p>
                   </li>
                   <li>
                       <div class="pic">
                           <img src="./xinpian/img/yy.png" />
                       </div>
                       <p id="title">音乐直播</p>
                       <p id="enname">LIVE</p>
                       <p id="enname">MUSIC</p>

                   </li>
                   <li> <div class="pic">
                           <img src="./xinpian/img/yl.png" />
                       </div>
                       <p id="title">文化娱乐</p>
                       <p id="enname">CULTURAL</p>
                       <p id="enname">ENTERTAINMENT</p>

                   </li>
                   <li> <div class="pic">
                           <img src="./xinpian/img/ds.png" />
                       </div>
                       <p id="title">电商直播</p>
                       <p id="enname">LIVE</p>
                       <p id="enname">E-COMMERCE</p>

                   </li>
               </ul>
           </div>
       </div>
    </div>
</div>

<!--发展历程-->
<div class="layui-row" id="roundtwo">
    <div class="layui-col-md12">

            <div style="height: 570px; background: url('http://images.ahwes.com/background030.png');background-repeat:no-repeat;
	background-size:100% 100%;
	-moz-background-size:100% 100%;">

                    <div style="padding:10px;color:white;z-index:0;width: 320px;height: 250px;background:#669676 ;background-color: rgba(79, 105, 74,0.5);position: relative;top:20%">

                        <div class="ahwes-title" style="" >
                            <div>

                                <h1 class="number">03</h1>
                            </div>
                            <div>
                                <h3 class="enname">DEVELOPMENT </h3>
                                <h3 class="enname">HISTORY</h3>
                                <h1 class="cnname2">发展历程</h1>
                            </div>

                        </div>

                    </div>


            </div>

    </div>
    <div class="layui-col-md12">
        <div style="height: 520px; background: url('http://images.ahwes.com/background031.png');background-repeat:no-repeat;
        background-size:100% 100%;
        -moz-background-size:100% 100%;"></div>

    </div>
</div>
<!--设备优势-->
<div class="layui-row" id="roundfour">
    <div class="layui-col-md12">
        <div class="layui-row" style="height: 580px; margin: 0 auto; background: url(http://images.ahwes.com/background040.png) no-repeat top center;
                 /* 以父元素的百分比来设置背景图像的宽度和高度。*/
               background-size:100% 100%; ">
            <div style=" position: relative;top:40%">

                <div class="ahwes-title" style="position: relative; /*脱离文档流*/
            top: 30%; /*偏移*/">
                    <div style="float: left">
                        <h1 class="number">04</h1>
                    </div>
                    <div>
                        <h2 class="enname">EQUIPMENT ADVANTAGES</h2>
                        <h1 class="cnname2">设备优势</h1>
                    </div>

                </div>

            </div>


        </div>
    </div>
    <div class="layui-col-md12">
        <div style="height: 320px; background: url('http://images.ahwes.com/background041.png');background-repeat:no-repeat;
        background-size:100% 100%;
        -moz-background-size:100% 100%;"></div>
    </div>
</div>


<!--合作伙伴-->
<div class="layui-row " id="roundsix">

    <div class="layui-col-md12">
        <div class="ahwes-title ahwes-sixtitleexend">
            <div style="float: left">
                <h1 class="number">06</h1>
            </div>
            <div>
            <h2 class="enname">OUR PARTNERS</h2>
            <h1 class="cnname2">合作伙伴</h1>
        </div>

    </div>
    </div>

    <div class="layui-col-md12" >
        <div id="sixbackground"></div>

    </div>

    <div class="layui-col-md12">

        <div class="layui-row ahwes-our">
            <ul class="ahwes-ourlist">
                <li>
                    <div >
                        <p>北京现代</p>
                        <p>中国平安</p>
                        <p>三只松鼠</p>
                        <p>百辣归川</p>
                        <p>湖南卫视</p>
                        <p>安徽卫视</p>
                        <p>东方卫视</p>
                    </div>
                </li>
                <li>
                    <div>
                        <p>拾光瑜伽</p>
                        <p>小城渔家</p>
                        <p>中国电信</p>
                        <p>中国移动</p>
                        <p>中国联通</p>
                        <p>宣城论坛</p>
                        <p>益益乳业</p>
                    </div>
                </li>
                <li>
                    <div >
                        <p>泾县论坛</p>
                        <p>宣城社区</p>
                        <p>建材商会</p>
                        <p>吖吖孕婴</p>
                        <p>迪儿母婴</p>
                        <p>阿里巴巴</p>
                        <p>今日头条</p>
                    </div>
                </li>
                <li>
                    <div >
                        <p>盛唐金融</p>
                        <p>美的冰箱</p>
                        <p>一汽丰田</p>
                        <p>北汽坤宝</p>
                        <p>徽商银行</p>
                        <p>溜溜果园</p>
                        <p>可口可乐</p>
                    </div>
                </li>
                <li>
                    <div >
                        <p>保时捷</p>
                        <p>周黑鸭</p>
                        <p>报喜鸟</p>
                        <p>新片场</p>
                        <p>叮当星</p>
                        <p>九牧王</p>
                        <p>淘宝网</p>
                    </div>
                </li>
                <li>
                    <div >
                        <p>梅赛德斯-奔驰</p>
                        <p>腾讯(Tencent)</p>
                        <p>宝马(BMW)</p>
                        <p>奥迪(Audi)</p>
                        <p>碧邦广告</p>
                        <p>万达集团</p>
                        <p>优之颜</p>
                    </div>
                </li>
                <li>
                    <div >
                        <p>上海浦东发展银行</p>
                        <p>碧桂园黄金时代</p>
                        <p>中国农业银行</p>
                        <p>中国建设银行</p>
                        <p>中国人民保险</p>
                        <p>中国好声音</p>
                        <p>抖音短视频</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>


</div>

<div class="ahwes-footer" id="footer">


    <div class="layui-row">
        <div class="layui-col-md4 ahwes-contact">
            <p><i class="layui-icon layui-icon-cellphone ahwesico" ></i> 专属热线:18905631879</p>
            <p><i class="layui-icon layui-icon-location ahwesico" ></i> 地址:安徽省宣城高新技术产业开发区麒麟大道11号</p>
            <p><i class="layui-icon layui-icon-list ahwesico" ></i>邮箱地址：ahwes@admin.com</p>
        </div>

        <div class="layui-col-md8">
            <ul class="ahwes-qrcode">
                <li >
                <div>
                    <img src="./xinpian/img/v2s.jpg" />
                </div>
                    <p>微信公众号</p>
                </li>

                <li >
                    <div>
                        <img src="./xinpian/img/wechat.jpg" />
                    </div>
                    <p>关注微信</p>
                </li>

                <li >
                    <div>
                        <img src="./xinpian/img/Tik.png" />
                    </div>
                    <p>关注抖音</p>
                </li>
            </ul>
        </div>



    </div>
    <div class="ahwes-advert" >
        <img src="./xinpian/img/footerlogo.jpg" style="width: 68px ;height: 68px;"/>
        让维尔斯成为生活中的标配
    </div>
    <hr/>
    <div class="ahwes-copyRight">
        <p>Copyright © 2016 - 2019 维尔斯. All rights reserved. 皖ICP备17005514号-1 皖网文[2019] 4652-199 号</p>

    </div>

</div>

<script src="./layui/layui.js"></script>
<script async="" charset="utf-8" src="./script/ahwes.js?v=20191123"></script>
<!--<script>-->
<!--    //注意：导航 依赖 element 模块，否则无法进行功能性操作-->
<!--    layui.use('element', function(){-->
<!--        var element = layui.element;-->
<!---->
<!--        element.on('nav(bar)', function(elem){-->
<!--            console.log(elem); //得到当前点击的DOM对象-->
<!--        });-->
<!--    });-->
<!--</script>-->
</body>
</html>