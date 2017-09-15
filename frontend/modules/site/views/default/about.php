<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no,email=no,date=no,aItemress=no">
		<title>宛聆歌王活动介绍</title>
		<link rel="stylesheet" type="text/css" href="/css/aui.css" />
		<!--<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">-->
		<link rel="stylesheet" type="text/css" href="/css/video-js.css">
		<style>
		body{
				background: url(/images/aboutbg.png);
				background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;
			
		}
		
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
			
		</style>
		
	</head>
	<body>
		<div class="aui-content-padded" style="height: 200px;" >
			
		<div class="m">
		<video id="my-video" class="video-js" controls preload="none"
		  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
			<source src="/music/WeChat_20170913214431.mp4" type="video/mp4">
			<p class="vjs-no-js">
			  To view this video please enable JavaScript, and consider upgrading to a web browser that
			  <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
			</p>
		  </video>
		  
	</div>
	
			
			
			
		</div>
		<div style="height: 480px;"></div>
		
		<footer class="my-footer">本次活动最终解释权归宣城宛聆音乐</footer>
	</body>
    <script src="/script/jquery.min.js"></script>
	<script src="/script/video.min.js"></script>	
		  <script type="text/javascript">
			var myPlayer = videojs('my-video');
			videojs("my-video").ready(function(){
				var myPlayer = this;
				//myPlayer.play();				
				var playerH= $(".aui-content-padded").height();
				var playerW= $(".aui-content-padded").width();
				myPlayer.width(playerW);
				myPlayer.height(playerH);

			});
			
			
			
			
		</script>
	
	
</html>
