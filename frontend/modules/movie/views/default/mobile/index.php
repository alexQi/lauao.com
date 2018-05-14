<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> 宣城直播创作团队 - 专业的影视创作</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>


    <style type="text/css">
       body{margin-bottom: 35px}/* 解決屏幕低端的footer*/

      .logo{
          position: absolute;
          top: 80px;
          left: 20px;
      }

      .background{width: 100%;height: auto;
         }

      .banner-content{

          position: absolute;
          top: 160px;
          left: 20px;
      }

      .fs_30_b{
          line-height: 1.5;
          -webkit-text-size-adjust: none;
          font-family: "PingFang SC", "Microsoft YaHei", "微软雅黑", STHeiti, sans-serif;

          font-size: 2rem;
          font-weight: 600;
          color: #;
      }
      .fs_16_l{
          font-family: "PingFang SC", "Microsoft YaHei", "微软雅黑", STHeiti, sans-serif;
          font-size: 1.3rem;font-weight: 380;}
 .button-red{
     display: block;
     width: 142px;
     height: 40px;
     line-height: 40px;
     border-radius: 2px;
     background-color: #e74b3b;
     text-align: center;
     font-size: 14px;
     color: #ffffff;
     transition: background .2s;
     margin-top: 100px;
 }

.c_w_1{color: #ffffff;}

        .footer{
           position: fixed;
            bottom: 0px;
            text-align: center;
            color: #999;
            font-size: 8px;
            padding: 12px;
            background-color: #f1f1f1;
            margin-top: 25px;
            width: 100%;
        }

        .nav_li
        {
            padding: 18px 20px;
            border-bottom:1px solid #e6e6e6;
            margin: 0px 20px 0px 20px;
        }

        .nav_li a:hover{
            color: #e74b3b;
            font-weight: bold;
        }

    </style>
</head>
<body>
<div class="banner">
    <img id="nav_btn"  src="./xinpian/images/nav_wbtn.png" style="color:#fff; position: absolute; width: 20px;height: 20px;
          top: 20px;
          left: 20px;"></img>
    <img class="background" src="./xinpian/images/mbanner.png" />
    <span class="lays"/>
    <img class="logo" src="./xinpian/images/logo40.png"/>
    <div class="banner-content c_w_1">
    <h2 class="fs_30_b">用作品打动世界</h2>
     <p class="fs_16_l">902401位粉丝已经加入</p>
        <a class="button-red" href="javascript:;" data-link="https://passport.xinpianchang.com?callback=http%3A%2F%2Fwww.xinpianchang.com%2F" data-zg="新片场WAP-首页-点击未登录首页的马上加入按钮">马上加入</a>
    </div>
</div>


<div class="layui-row">
    <div class="layui-col-xs12">
        <h2 class="fs_30_b" style="padding: 20px 15px">编辑精选</h2>
    </div>
</div>

<div class="layui-row">
    <?php foreach ($videoList['list'] as $key => $video): ?>
        <div class="layui-col-xs12">
            <div class="thumbnail" style="border: 0" >
                <img class="img-rounded video-image" onclick="playVideo(this)" data-id="<?php echo trim($video['video_url']); ?>" style="width: 100%;height: 200px;" src="<?php echo $video['poster']; ?>">
                <div class="video-mask" id="<?php echo trim($video['video_url']); ?>" style="display: none"></div>
                <div class="layui-row">
                    <div class="layui-col-xs9">
                        <p  style="margin: 12px 15px;color:#888897"><?php echo $video['cate_name']; ?></p>
                    </div>
                </div>
                <div class="layui-row">
                    <div class="layui-col-xs10">
                    <h4 class="fs_16_l" style="margin: 0px 0px 50px 15px"><?php echo $video['video_name']; ?></h4>
                    </div>
                    <div class="layui-col-xs2">
                        <i class="layui-icon layui-icon-login-wechat" style="font-size: 30px;color:#36b157"></i>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>

<div class="footer">
    <p>Copyright © 2017 - 2018 维尔斯. All rights reserved. </p>
</div>



<script language="javascript" src="http://qzs.qq.com/tencentvideo_v1/js/tvp/tvp.player.js" charset="utf-8"></script>

<script language="javascript">
    function playVideo(obj){
        $('.video-image').show();
        $('.video-mask').empty();
        var id = $(obj).attr('data-id');
        var width  = $(obj).width();
        var height = $(obj).height();

        $(obj).hide();
        $('#'+id).attr('width',width);
        $('#'+id).attr('height',height);
        $('#'+id).show();

        var video = new tvp.VideoInfo();
        //向视频对象传入直播频道id
        video.setVid(id);
        var player = new tvp.Player(width, height);
        //设置播放器初始化时加载的视频
        player.setCurVideo(video);
        //设置播放器为直播状态，1表示直播，2表示点播，默认为2
        player.addParam("type", "2");
        player.addParam("autoplay", 1);
        player.addParam("wmode", "transparent");
        player.addParam("showcfg", "0");
        player.addParam("flashskin", "http://imgcache.qq.com/minivideo_v1/vd/res/skins/TencentPlayerMiniSkin.swf");
        player.addParam("showend", 0);
        //输出播放器
        player.write(id);

}

    layui.use(['layer','jquery'], function(){
        var layer = layui.layer;
        $=layui.jquery;
        //layer.msg('Hello World');

        $('#nav_btn').click(
            function(){
              var w=  $(document.body).width();
                layer.open({
                    type:1,
                    title: false, //不显示标题
                    content:$('.popup'),
                    offset:'lt',
                    closeBtn:0,
                    shadeClose:'yes',
                    shift:1,
                    area:w+'px',
                    isOutAnim: false
                });
            });




    });
</script>
</body>
<div class="popup" style="display: none">
 <ul >
     <li class="nav_li">
         <a href="<?php echo Url::to(['/movie/default/index']) ?>">全部作品</a>
     </li>
     <?php foreach ($cateList as $key => $cate): ?>
         <li class="nav_li">
             <a href="<?php echo Url::to(['/movie/default/index', 'video_cate_id' => $cate['id']]) ?>"><?php echo $cate['cate_name']; ?></a>
         </li>
     <?php endforeach; ?>
     <li class="nav_li">
         <a href="<?php echo Url::to(['/movie/default/about']) ?>">团队介绍</a>
     </li>

 </ul>
    </div>

</div>


</html>