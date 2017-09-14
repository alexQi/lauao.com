<?php
use yii\helpers\Url;
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no,email=no,date=no,aItemress=no">
		<title>宛聆歌王报名通道</title>
		<!--	<link rel="stylesheet" type="text/css" href="../css/aui.css" />-->
		<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">

		<style>
			.my-frm {
				background: white;
				padding: 10px 35px 10px 20px;
			}
			
			.layui-form-radio i:hover,
			.layui-form-radioed i {
				color: #c2c2c2;
			}
			
			.layui-elem-field legend {
				font-size: 12px;
			}
			
			.layui-container {
				margin-bottom: 20px;
			}
			
			.mylogo img {
				height: 150px;
				width: 100%;
			}
			
			.layui-input,
			.layui-select,
			.layui-textarea {
				height: 38px;
				border: 0px;
				border-bottom: 1px solid #e6e6e6;
				;
			}
			/*	.layui-form-label {width: 100px;}*/
			
			.my-btnmarg {
				width: 110px;
				margin: 0 auto;
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

		<div class="mylogo">
			<img src="/images/apicloud-bg.png" />
		</div>

		<div class="my-frm">
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
				<legend>输入基本信息</legend>
			</fieldset>

			<form class="layui-form" action="">
				<div class="layui-form-item">
					<label class="layui-form-label">姓名</label>
					<div class="layui-input-block">
						<input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入姓名" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">性别</label>
					<div class="layui-input-block ">
						<input type="radio" name="sex" value="男" title="男">
						<input type="radio" name="sex" value="女" title="女" checked="">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">手机号码</label>
					<div class="layui-input-block">
						<input type="tel" name="phone" lay-verify="phone" autocomplete="off" placeholder="输入手机号码" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">自我介绍</label>
					<div class=layui-input-block>
						<textarea placeholder="请输入自我介绍内容" class="layui-textarea"></textarea>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">推荐单位</label>
					<div class=layui-input-block>
						<input type="text" name="unit" lay-verify="required" autocomplete="off" placeholder="请输入推荐单位" class="layui-input">
					</div>
				</div>
				
				</div>
				<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
					<legend>上传展示资料</legend>
				</fieldset>

				<div class="layui-container">

					<div class="layui-row ">
						<div class="layui-col-xs6 ">
							<div class="my-btnmarg">
								<div class="layui-upload">
									<button type="button" name="upload" class="layui-btn layui-btn-radius  layui-btn-primary" id="uploadimg"> <i class="layui-icon">&#xe64a;</i>上传照片</button>
									<div class="layui-upload-list">
										<img class="layui-upload-img" id="demo1" src="">
										<p id="demoText"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="layui-col-xs6">
							<!--<div class="my-btnmarg">
								<button type="button" name="upload" class="layui-btn layui-btn-radius layui-btn-primary" id="uploadaudio"><i class="layui-icon"> &#xe652;</i>上传音频</button>
							</div>-->
						</div>

					</div>
					<hr class="layui-bg-gray">

					<div class="my-btnmarg">
						<button class="layui-btn layui-btn-radius layui-btn-primary" lay-submit="" lay-filter="" id="yessubmit">
    					<i class="layui-icon"> &#xe618;</i>立即报名</button>
					</div>
					<br/>
					<footer class="my-footer">本次活动最终解释权归宣城宛聆音乐</footer>
                </div>
			</form>

			<script type="text/javascript" src="/script/jquery.min.js"></script>
			<script type="text/javascript" src="/layui/layui.js"></script>
			<!--	<script type="text/javascript" src="script/fastclick.js"></script>-->
			<!--<script type="text/javascript" src="script/aui-collapse.js"></script>-->
			<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
			<script>
				/*加載Layer和Form*/
				layui.use(['layer','form', 'upload'], function() {

					//var layer = layui.layer,
					var	form = layui.form,
						upload = layui.upload;

					form.render();

					/*开始上传图片*/
					upload.render({
                        elem:'#uploadimg',
                        url:'<?php echo Url::to(['/ajax/default/ajax-upload'])?>',
                        //auto:false,
                        //bindAction:'#yessubmit', //指向一个按钮触发上传
    //					choose: function(obj){
    //					var files=obj.pushFile();
    //						obj.preview(function(index, file, result){
    //   					 console.log(index); //得到文件索引
    //  					  console.log(file); //得到文件对象
    //   					});
                         before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
                            // layer.load(); //上传loading
                         }
                        ,done: function(res, index, upload){

                            layer.alert(res.message);
                            $('.layui-upload-img').attr('src',res.data.file_url);
                        }
					});
					
					/*开始音频*/
//					upload.render({
//					elem:'#uploadaudio',
//					url:'<?php echo Url::to(['/ajax/default/ajax-upload'])?>',
//					auto:false,
//					accept:'audio',
//					bindAction: '#yessubmit', //指向一个按钮触发上传
//						choose: function(obj){
//						var files=obj.pushFile();
//						obj.preview(function(index, file, result){
//					  console.log(index); //得到文件索引
// 					  console.log(file); //得到文件对象
//					});
//				}
//						
//					
//					});
					
});
				
			</script>

	</body>

</html>