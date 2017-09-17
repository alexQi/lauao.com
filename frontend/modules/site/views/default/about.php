<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no,email=no,date=no,aItemress=no">
		<title>宛聆歌王活动介绍</title>
		<!-- <link rel="stylesheet" type="text/css" href="/css/aui.css" /> -->
		<!--<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">-->
		<link rel="stylesheet" type="text/css" href="/css/video-js.css">
		<style>
		body{
			/* background:url('/images/about.jpg'); */
			background:#040001;
			color:#BBAEA1;
			 /* background-repeat:no-repeat; background-size:100% 720px;-moz-background-size:100% 100%; */
			
		}

		/* .my-video{    position: absolute;top:60px; 

    word-break: break-all;
    -webkit-overflow-scrolling: touch;
  } */

		.video-js .vjs-big-play-button{
			margin: 0 auto;
           top: 40%;
		   position: inherit;
		}
		
		.my-about img
		{
			width: 100%;
		}

		.aboutinfo .aboutjs{margin-left:20px;font-size:12px; margin-right:20px;}
		.aboutinfo .rule{margin-left:20px;font-size:12px; margin:20px;margin-bottom:50px}

		.my-footer {
				height: 30px;
				background: #000000;
				color: white;
				text-align: center;
				position: fixed;
				bottom: 0px;
				width: 100%;
				left: 0px;
				;
				opacity: 0.5;
				filter: Alpha(opacity=50);
				line-height: 2.8;
				font-size: 12px;
			}

			/* .my-video{top:100px} */
			
		</style>
		
	</head>
	<body>
			

			<div class="my-about">
					<img src="/images/about.jpg" />
		    </div>
            <?php foreach($advertList  as $key=>$advert):?>
			<div class="myvideo" style="width:100%">
					<div class="m">
							  <!--poster="MY_VIDEO_POSTER.jpg"-->
						  <video id="my-video" class="video-js" controls preload="auto"
							 data-setup="{}">
							  <source src="<?php echo $advert['file_url']; ?>" type="video/mp4">
							  <p class="vjs-no-js">
								To view this video please enable JavaScript, and consider upgrading to a web browser that
								<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
							  </p>
                          </video>
                    </div>
            </div>
            <?php endforeach;?>
	
	<div class="aboutinfo">
		<div class="aboutjs">
		<p id="title">活动介绍</p>
			<p > 悦宛聆音乐餐吧首届“宛陵歌王”大赛 </p>
			<p>由宣城市音乐家协会主办、悦宛聆音乐餐吧承办 </p>
			<p > 由九拍、Uke School、杨政、Ukulele、工作室</p>
			<p>星隆国际、驴妈妈旅游网、皇家公馆娱乐、宣城一页KTV</p>
			<p>莱绅通灵珠宝魔劲轻食沙拉等各行业翘楚单位共同协办</p>
			<p>宛陵歌王大赛2017年9月18日拉开报名序幕</p>
	        <p>冠亚季军、八强、最佳人气奖、最佳台风奖可获得钻戒、国内旅游、曼森吉他、尤克里里</p>
			<p>KTV现金卡、悦宛聆餐券等丰厚礼品</p>
			</div>
				<div class="rule">
				<p>活动规则</p>
				<p>1、通过扫描悦宛聆、宣城威尔斯、九拍爵士鼓教育、莱绅通灵、驴妈妈旅游网、Uke School、皇家公馆娱乐</br>
					宣城一页KTV等协办方二维码进入报名渠道，通过唱吧/快手等录制视频上传至指定报名渠道。</p>
				<p>2、凡是爱好唱歌者男女不限<br/>年龄要求14周岁以上、40周岁以下</p>
				<p> 3、参赛者可单人参赛</br>也可采取对唱（包括男女对唱）或组合形式参赛</p>
				<p> 4、自备演唱歌曲不低于8首</p>
				<p> 5、自备演出服装和道具</p>
				<p>6 赛程设置为海选——晋级赛——表演赛——16进8——冠亚季军总决赛五场
					比赛时间安排为10月8日及之后的每个周末，评分标准为现场评委分数95%+网络投票分数5%
					评委为宣城市音协成员及声乐评判老师
					最佳人气奖由网络投票产生
					最佳台风奖由冠亚季军总决赛现场评委及观众投票产生。</p>
				
				</div>
				</div>
		<footer class="my-footer">本次活动最终解释权归宣城宛聆音乐</footer>
	</body>
    <script src="/script/jquery.min.js"></script>
	<script src="/script/video.min.js"></script>	
		  <script type="text/javascript">
			var myPlayer = videojs('my-video');
			videojs("my-video").ready(function(){
				var myPlayer = this;
				//myPlayer.play();
				var playerH= $(".myvideo").outerHeight(true);
				var playerW= $(".myvideo").outerWidth(true);
				myPlayer.width(playerW);
				myPlayer.height(playerH);
			});
		</script>
	
	
</html>
