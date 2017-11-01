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
            <?php echo $activity['activity_desc']; ?>
        </div>
        <div class="rule">
            <?php echo $activity['activity_rules']; ?>
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
