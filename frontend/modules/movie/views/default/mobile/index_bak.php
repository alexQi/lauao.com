<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>维尔斯</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand pull-right" href="#">维尔斯</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo Url::to(['/movie/default/index']) ?>">作品</a></li>
                <li><a href="<?php echo Url::to(['/movie/default/about']) ?>">成员</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <?php foreach ($videoList['list'] as $key => $video): ?>
    <div class="col-md-12">
        <div class="thumbnail" style="border: 0" >
            <img class="img-rounded video-image" onclick="playVideo(this)" data-id="<?php echo trim($video['video_url']); ?>" style="width: 100%;height: 200px;" src="<?php echo $video['poster']; ?>">
            <div class="video-mask" id="<?php echo trim($video['video_url']); ?>" style="display: none"></div>
            <div class="caption">
                <h4><?php echo $video['video_name']; ?></h4>
            </div>
        </div>
    </div>
    <?php endforeach;?>
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
</script>
</body>
</html>