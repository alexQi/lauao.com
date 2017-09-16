<?php
use yii\helpers\Url;
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
			  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no,email=no,date=no,aItemress=no">
		<title>宛聆歌王报名通道</title>
		<!--	<link rel="stylesheet" type="text/css" href="../css/aui.css" />-->
		<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">

		<style>
			.my-frm {
				
				padding: 10px 35px 10px 20px;
			}
			
			
			.layui-form{
				background: url(/images/joinbg.png);
				background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;
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
				height: 180px;
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
		
	<form class="layui-form" action="">
		<div class="mylogo">
			<img src="/images/apicloud-bg.png" />
		</div>

		<div class="my-frm">
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
				<legend>输入基本信息</legend>
			</fieldset>

		
				<div class="layui-form-item">
					<label class="layui-form-label">姓名</label>
					<div class="layui-input-block">
						<input type="text" name="apply_name" lay-verify="required" autocomplete="off" placeholder="请输入姓名" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">性别</label>
					<div class="layui-input-block ">
						<input type="radio" name="gender" value="1" title="男">
						<input type="radio" name="gender" value="2" title="女" checked="">
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
						<textarea name="self_desc" placeholder="请输入自我介绍内容" class="layui-textarea"></textarea>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">推荐单位</label>
					<div class=layui-input-block>
						<input type="text" name="recommend" lay-verify="required" autocomplete="off" placeholder="请输入推荐单位" class="layui-input">
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
									<button type="button" class="layui-btn layui-btn-radius  layui-btn-primary self_info" lay-data="{url:'<?php echo Url::to(['/ajax/default/ajax-upload'])?>'}" >
										 <i class="layui-icon">&#xe64a;</i>
										 上传照片
										 </button>
									
									
								</div>
							</div>
						</div>
						<div class="layui-col-xs6">
							<div class="my-btnmarg">
								<div class="layui-upload">
								<button type="button"  class="layui-btn layui-btn-radius layui-btn-primary self_info" lay-data="{url:'<?php echo Url::to(['/ajax/default/ajax-upload'])?>',accept:'audio'}" >
									<i class="layui-icon"> &#xe652;</i>
									上传音频
								</button>
								
								</div>
							</div>
						</div>

					</div>
					
					<hr class="layui-bg-gray">

					<div class="my-btnmarg">
						<div id="now_upload"></div>
						
						<button class="layui-btn layui-btn-radius layui-btn-primary" lay-submit="" lay-filter="commitinfo">
    					<i class="layui-icon"> &#xe618;</i>
    					立即报名
    					</button>
    					
    					
    					
					</div>
					
					</form>
					<br/>
					<footer class="my-footer">本次活动最终解释权归宣城宛聆音乐</footer>
                </div>
			
	</body>
	
	
		<!--	<script type="text/javascript" src="/script/jquery.min.js"></script>-->
			<script type="text/javascript" src="/layui/layui.js"></script>
			<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
			<script>
				
				var $,files;
				/*加載Layer和Form*/
				layui.use(['jquery','layer','form', 'upload'], function() {

					var layer = layui.layer,
						form = layui.form,
						
						upload = layui.upload,
						passimages=false,
						passaudio=false;
						
					var self=null;
					 
					 $ = layui.jquery;
					

					form.render();

					/*开始上传图片和音頻*/
					upload.render({
                        elem:'.self_info',
                        auto:false,
                        bindAction:'#now_upload', //指向一个按钮触发上传
                        choose: function(obj){
                        
                            files = obj.pushFile(); //将每次选择的文件追加到文件队列
                           
                        	 obj.preview(function(index, file, result){
                        	 	
                        	 	
                        	 	//判斷有選擇這兩個
                        	 	if(file.type.split("/")[0]=="image")
                        	 	{
                        	 		passimages=true;
                        	 	}
                        	 	if(file.type.split("/")[0]=="audio")
                        	 	{
                        	 		passaudio=true;
                        	 	}
                        	 	
                        	 	
                        	 	//console.log(index);
                        	 	//console.log(file);
                        	 	
                        	 	// delete files[index];
                         });
                         },
                        before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
                		 layer.load(1);
                 	    },
                       done: function(res, index, upload){
                                      
                          
                          if(res.data.mimeType.split("/")[0]=="image")
                          {                     	
                        	 
                        	 self.field["self_picture"]=res.data.file_url;
                        	                    	 
                          }
                          if(res.data.mimeType.split("/")[0]=="audio")
                          {
                        	
                        	self.field["self_media"]=res.data.file_url;
                        	
                          }
                          
                          //上面2个地址都不是空的话,就写入数据库
                         if(self.field["self_picture"]!=undefined && self.field["self_media"]!=undefined)
                         {
                         	$.post('/ajax/default/save-user',self.field,function(res){
     
    						  
     						  //res就是返回的结果
							  // console.log(JSON.stringify(self.field));
							  if(res.state==1)
							  {
							  	layer.alert(res.message,{
							  	 title:'报名结果',
 								 icon:1,
 								 closeBtn: 0
 								 ,anim: 4 //动画类型
								}, function(){
 								    
 								    window.location.href="index.html";
									
								}
								);
							  	
							  
							  }
							  
							  passimages=false;
						      passaudio=false;

							 });
                         	
                         	 layer.closeAll('loading'); //关闭loading	
                         }
                         
                         delete files[index];
                         return;
                          

                        }
                      });
					
                   
                            //监听提交
			form.on('submit(commitinfo)',function(data){
				
		  if(!passaudio)
			{
				layer.msg('请上传您的音频作品.', {icon: 5,shift: 6});
				
			   return false;
			}
			if(!passimages)
			{
				
				layer.msg('请上传您的个人照片.', {icon: 5,shift: 6});
			    return false;
			}
			
			   self=data;
			   
			   $("#now_upload").click();
			   
			   return false;
				
							
			});
                
			
			
			
				
				//$("now_upload").click();
				
				
		
			
//			
			 		 

				
});
				
</script>

</html>