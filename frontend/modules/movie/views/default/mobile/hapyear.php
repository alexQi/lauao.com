<?php
/**
 * Created by PhpStorm.
 * User: 44844
 * Date: 2019/10/19
 * Time: 21:56
 */

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>宣城直播年会</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>

    <link rel="stylesheet" href="./css/DPlayer.min.css" />

    <script src="./script/DPlayer.min.js"></script>
    <script type="text/javascript" src="./script/delighters.js"></script>



    <style>


         hr{ background-color: black;margin: 6px 0px;height: 2px}

         .po-hears{letter-spacing: 15px;text-align: center;font-weight: bold;font-size: 25px;margin: 30px 0px}

         .po-bottom-title{ letter-spacing: 6px;text-align: center;font-weight: bold;font-size: 25px;margin-bottom: 90px }

          .po-header-background{ background:url('http://advert.sboyo.com/ahwesbg.png')
          center center no-repeat;background-size: 28% 90% ;padding: 5px 0px;}

          .po-bottom-fixed{border-top: solid 1px #f2f2f2;position: fixed;bottom: 0px;width: 100%;background-color: white;padding: 10px}

         .rect {

             /*position: absolute;*/
             /*top: 20px;*/
             /*left: 20px;*/
             /*width: 100%;*/
             /*height: 100px;*/
             padding: 10px 15px;
             background: linear-gradient(to left, black, black) left top no-repeat,
             linear-gradient(to bottom, black, black) left top no-repeat,
             linear-gradient(to left, black, black) right top no-repeat,
             linear-gradient(to bottom, black, black) right top no-repeat,
             linear-gradient(to left, black, black) left bottom no-repeat,
             linear-gradient(to bottom, black, black) left bottom no-repeat,
             linear-gradient(to left, black, black) right bottom no-repeat,
             linear-gradient(to left, black, black) right bottom no-repeat;
             background-size: 2px 20px, 20px 2px, 2px 20px, 20px 2px;
         }

         .rect p{ letter-spacing: 5px; }

         .po-btn-cat{
             background-color:#0f0f0f;
             width: 90%;
             height: 40px;
             display: block;
             line-height: 45px;
             text-align: center;
             box-shadow: 5px 5px 5px #2323;
             letter-spacing: 5px;
             margin-top: 5px;
         }

        .po-txt-p{letter-spacing: 8px;width: 100%;height: 45px;display: block;line-height: 45px;text-align: center;font-size: 14px;font-weight: bold}

         .delighter.right { transform:translate(-100%); opacity:0; transition: all .75s ease-out; }
         .delighter.right.started { transform:none; opacity:1; }


    </style>
</head>
<body>

<div id="dplayer"></div>

<div class="layui-row po-header-background" >
    <div class="layui-col-xs12" >
        <h2 class="po-hears">企/业/介/绍</h2>
    </div>
</div>
<div class="layui-row" style="margin: 20px 5px" >

    <div class="layui-col-xs12 rect" >
        <p data-delighter="start:0.1">安徽维尔斯于2016年12月成立,并创建了直播品牌"宣城直播"。现有员工23人，7个网点办事处
        ,截至目前共执行直播活动月300余次,在宣州区吸引粉丝38万人,直播总浏览人次已达1300万。</p>
    </div>
</div>

 <div class="layui-row" >
    <div class="layui-col-xs12">
        <div class="layui-row"><div class="layui-col-xs-offset11"><hr/></div></div>
        <div class="layui-row" >
            <div class="layui-col-xs12">
                <img style="height: 230px;background-size: cover;width:100%;" src="http://advert.sboyo.com/hapyear_01.jpg">
            </div>
        </div>
        <div class="layui-row"><div class="layui-col-xs1"><hr/></div></div>
    </div>
</div>

<div class="layui-row" >
    <div class="layui-col-xs12">
        <div class="layui-row"><div class="layui-col-xs-offset11"><hr/></div></div>
        <div class="layui-row" >
            <div class="layui-col-xs12">
                <img style="height: 230px;background-size: cover;width:100%;" src="http://advert.sboyo.com/hapyear_02.jpg">
            </div>
        </div>
        <div class="layui-row"><div class="layui-col-xs1"><hr/></div></div>
    </div>
</div>

<div class="layui-row" >
    <div class="layui-col-xs12">
        <div class="layui-row"><div class="layui-col-xs-offset11"><hr/></div></div>
        <div class="layui-row" >
            <div class="layui-col-xs12">
                <img style="height: 230px;background-size: cover;width:100%;" src="http://advert.sboyo.com/hapyear_03.jpg">
            </div>
        </div>
        <div class="layui-row"><div class="layui-col-xs1"><hr/></div></div>
    </div>
</div>

<div class="layui-row" >
    <div class="layui-col-xs12">
        <div class="layui-row"><div class="layui-col-xs-offset11"><hr/></div></div>
        <div class="layui-row" >
            <div class="layui-col-xs12">
                <img style="height: 230px;background-size: cover;width:100%;" src="http://advert.sboyo.com/hapyear_04.jpg">
            </div>
        </div>
        <div class="layui-row"><div class="layui-col-xs1"><hr/></div></div>
    </div>
</div>

<div class="layui-row" >
    <div class="layui-col-xs12">
        <div class="layui-row"><div class="layui-col-xs-offset11"><hr/></div></div>
        <div class="layui-row" >
            <div class="layui-col-xs12">
                <img style="height: 230px;background-size: cover;width:100%;" src="http://advert.sboyo.com/hapyear_05.jpg">
            </div>
        </div>
        <div class="layui-row"><div class="layui-col-xs1"><hr/></div></div>
    </div>
</div>

<div class="layui-row" >
    <div class="layui-col-xs12">
        <div class="layui-row"><div class="layui-col-xs-offset11"><hr/></div></div>
        <div class="layui-row" >
            <div class="layui-col-xs12">
                <img style="height: 230px;background-size: cover;width:100%;" src="http://advert.sboyo.com/hapyear_06.jpg">
            </div>
        </div>
        <div class="layui-row"><div class="layui-col-xs1"><hr/></div></div>
    </div>
</div>



<div class="layui-row po-header-background">
    <div class="layui-col-xs12">
        <h2 class="po-hears">成/功/案/例</h2>
    </div>
</div>

<div class="layui-row" >
    <div class="layui-col-xs12">
        <div class="layui-row"><div class="layui-col-xs12"><hr style="height: 1px"/></div></div>
        <div class="layui-row" >
            <div class="layui-col-xs12">
                <img style="height: 230px;background-size: cover;width:100%;" src="http://advert.sboyo.com/hapyear_0a.jpg">
            </div>
        </div>
        <div class="layui-row"><div class="layui-col-xs12"><hr style="height: 1px"/></div></div>

        <div class="layui-row"><div class="layui-col-xs12">
                <p  class="po-txt-p">杭州国际电商峰会</p>
            </div></div>

    </div>
</div>

<div class="layui-row" >
    <div class="layui-col-xs12">
        <div class="layui-row"><div class="layui-col-xs12"><hr style="height: 1px"/></div></div>
        <div class="layui-row" >
            <div class="layui-col-xs12">
                <img style="height: 230px;background-size: cover;width:100%;" src="./xinpian/images/splash-52e44096f61ccb97be15902346a4dfb9.jpg">
            </div>
        </div>
        <div class="layui-row"><div class="layui-col-xs12"><hr style="height: 1px"/></div></div>

        <div class="layui-row"><div class="layui-col-xs12">
                <p  class="po-txt-p">杭州国际电商峰会</p>
            </div></div>

    </div>
</div>


<div class="layui-row" >
    <div class="layui-col-xs12">
        <p class="po-bottom-title">让直播成为生活中的标配</p>
    </div>
</div>

<div class="layui-row  po-bottom-fixed" >
    <div class="layui-col-xs6 po-header-background">
        <p  class="po-txt-p">宣城直播</p>
    </div>

    <div class="layui-col-xs6">
        <div >
        <button type="button"  class="layui-btn layui-btn-normal layui-btn-radius po-btn-cat">联系我们</button>
        </div>
    </div>

</div>



<script type="text/javascript">


    const dp = new DPlayer({
        container: document.getElementById('dplayer'),
        autoplay: true,
        preload: 'auto',
        theme: '#FADFA3',
        loop: true,
        lang: 'zh-cn',
        video: {
            url: 'http://video.sboyo.com/ahweslogo2018.mp4',
            //pic: 'dplayer.png',
            //thumbnails: 'thumbnails.jpg',
            type: 'auto',
        },
        logo:'./xinpian/images/logo40.png'
        ,
        contextmenu: [
            {
                text: '访问宣城直播官方网站',
                link: 'http://www.ahwes.com',
            }

        ],
    });

</script>


</body>



</html>