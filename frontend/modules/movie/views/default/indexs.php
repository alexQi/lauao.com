<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>宣城直播</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>
     <style>

         /*https://q42.github.io/delighters/*/

         .ahwesbars{ position: fixed;
             top: 0px;
         width: 100%;
         z-index: 999;
          background: transparent;
         }
         .logo{
             position: absolute;
             top: 16px;
             left: 0px;
         }

         .ahwestitle{padding: 10px 10px 0px 25px; }

         .ahwestitle two{ text-align: center}

         .ahwestitle p{ }

         .number{display: inline;width:30px;padding-right:15px;font-size: 75px;font-weight: bold}
         .enname{display: inline;width: 200px;vertical-align:top;font-size: 28px;letter-spacing: 5px;}

         .cnname{font-size: 35px;font-weight: bold;letter-spacing: 3px;}
         .cnname2{font-size: 28px;font-weight: bold;letter-spacing: 3px;}

         .ahwescontent p{padding: 10px 10px 0px 25px; font-size:14px;line-height: 30px;margin: 20px 0px}





         .business li{
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

         .business #title{ font-size: 15px;font-weight: bold;padding-top: 16px;padding-bottom: 5px;color: white}
         .business #enname{ font-size: 1px;color: #f8faf9;letter-spacing: 1px;}

         .ones{background-color: #4f694a;color: white;height: 780px;padding-top: 80px}
         .twos{background-color: #90b695;color:white;height: 780px;padding-top: 25px}



     </style>
</head>
<body>
<!--<div class="layui-main">-->
    <a class="logo" href="/">
    <img src="./xinpian/images/blacklogo.png" width="120" height="40" >
    </a>
<ul class="layui-nav ahwesbars" lay-filter="bar">

<li class="layui-nav-item layui-this"><a href="#jianjie">企业简介</a></li>
<li class="layui-nav-item "><a href="#fazhanlicheng">发展历程</a></li>
<li class="layui-nav-item"><a href="javascript:;">设备优势</a></li>
<li class="layui-nav-item">
    <a href="javascript:;">合作伙伴</a>

</li>

</ul>
<!--</div>-->
<!--企业简介-->
<div class="layui-row" id="jianjie" >
<!--    <img src="./xinpian/img/03bg.png" height="200px" width="200px" style="float: top">  -->

    <div class="layui-col-md6 ones">
        <div class="ahwestitle ">
            <div style="float: left">
                <h1 class="number">01</h1>
            </div>
            <p class="enname">COMPANY PROFILE</p>
            <div style="clear: left">
            <p class="cnname">企业简介</p>
            </div>

        </div>
        <div class="ahwescontent">
            <div class="layui-row">
                <div class="layui-col-md6">
                  <p>
                      安徽维尔斯传媒策划有限公司于2016年12月成立，并建立了直播品牌"宣城直播",现有员工23人，截至目前,在7个地点
                      设立了办事处,共执行直播活动高达278场次,在宣州区吸引固定粉丝38万余人,直播平台总浏览人次高达1300余万。
                  </p>
                  <p>
                    Anhui Wealth Media Co., Ltd. was founded in 2016. Meanwhile,We created the subsidiary brand - The Live XuanCheng. Our company has 23 current staffs. Offices have been established at seven locations.A total of 278 live broadcast activities were carried out.
                      We attracted more than 380000 regular fans in Xuanzhou District and the total number of visitors to the live broadcast platform was more than 13 million.
                  </p>
                </div>
                <div class="layui-col-md6">
                    <p>下一步,我们打算以安徽为片区开设直播网点,全面覆盖安徽16个地级市和54个县级市</p>
                    <p>Next,we plan to set up outlets of live broad-cast in Anhui, covering 16 prefecture-level cities and 54 county-level cities in Anhui. </p>
                </div>
            </div>
        </div>



            </div>

    <div class="layui-col-md6 twos">
       <div class="layui-row " >
           <div class="layui-col-md8 twos ">
               <div class="ahwestitle" style="position: relative; /*脱离文档流*/
            top: 30%; /*偏移*/">
                   <div style="float: left">
                   <h1 class="number">02</h1>
                   </div>
                   <div>
                   <h2 class="enname">BUSINESS SCOPE</h2>
                   <h1 class="cnname2">业务介绍</h1>
                   </div>

               </div>
           </div>
           <div class="layui-col-md2 twos">
               <ul class="business" style="position: relative; /*脱离文档流*/
            top: 10%; /*偏移*/">
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

               <ul class="business ">
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
<div class="layui-row" id="fazhanlicheng">
    <div class="layui-col-md12">

            <div style="height: 570px; background: url('./xinpian/img/03bg.png');background-repeat:no-repeat;
	background-size:100% 100%;
	-moz-background-size:100% 100%;">

                    <div style="padding:10px;color:white;margin-left: 120px;z-index:0;width: 320px;height: 250px;background:#669676 ;background-color: rgba(79, 105, 74,0.5);position: relative;top:20%">

                        <div class="ahwestitle" style="" >
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
        <div class="layui-row" style="position: relative; height: 550px; width: 80%;margin: 0 auto; background: url(./xinpian/img/03jtnew.png) no-repeat top center;
                 /* 以父元素的百分比来设置背景图像的宽度和高度。*/
               background-size:100% 100%; ">
<!--            <div class="layui-col-md2">-->
<!--                2016.12-->
<!--            </div>-->
<!--            <div class="layui-col-md2">-->
<!--                2017.9-->
<!--            </div>-->
<!--            <div class="layui-col-md2">-->
<!--                2018.6-->
<!--            </div>-->
<!--            <div class="layui-col-md2">-->
<!--                2019.3-->
<!--            </div>-->
<!--            <div class="layui-col-md4">-->
<!--                2019.6-->
<!--            </div>-->


        </div>

    </div>
</div>
<!--设备优势-->
<div class="layui-row">
    <div class="layui-col-md12">
        <div class="layui-row" style="height: 580px; margin: 0 auto; background: url(./xinpian/img/04ys.png) no-repeat top center;
                 /* 以父元素的百分比来设置背景图像的宽度和高度。*/
               background-size:100% 100%; ">
            <div style=" position: relative;top:40%">

                <div class="ahwestitle" style="position: relative; /*脱离文档流*/
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
        <div class="layui-row">
            <div class="layui-col-md2">
                讯道摄像机
            </div>
            <div class="layui-col-md2">
                电动轨道
            </div>
            <div class="layui-col-md2">
                无人机航拍
            </div>
            <div class="layui-col-md2">
                飞喵索道
            </div>
            <div class="layui-col-md2">
                导播切换台
            </div>
            <div class="layui-col-md2">
                高清摄像机
            </div>
        </div>
    </div>
</div>

<div class="layui-row">
    <div class="layui-col-md12">
        <h2>06合作伙伴</h2>
    </div>

    <div class="layui-col-md12">
        <h2>LIVE图片组合</h2>
    </div>

    <div class="layui-col-md12">
        <h2>合作伙伴厂商</h2>
    </div>


</div>


<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        element.on('nav(bar)', function(elem){
            console.log(elem); //得到当前点击的DOM对象
        });
    });
</script>
</body>
</html>