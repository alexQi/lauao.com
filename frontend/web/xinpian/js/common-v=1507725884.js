/*! http://mths.be/placeholder v2.0.7 by @mathias */
;(function(f,h,$){var a='placeholder' in h.createElement('input'),d='placeholder' in h.createElement('textarea'),i=$.fn,c=$.valHooks,k,j;if(a&&d){j=i.placeholder=function(){return this};j.input=j.textarea=true}else{j=i.placeholder=function(){var l=this;l.filter((a?'textarea':':input')+'[placeholder]').not('.placeholder').bind({'focus.placeholder':b,'blur.placeholder':e}).data('placeholder-enabled',true).trigger('blur.placeholder');return l};j.input=a;j.textarea=d;k={get:function(m){var l=$(m);return l.data('placeholder-enabled')&&l.hasClass('placeholder')?'':m.value},set:function(m,n){var l=$(m);if(!l.data('placeholder-enabled')){return m.value=n}if(n==''){m.value=n;if(m!=h.activeElement){e.call(m)}}else{if(l.hasClass('placeholder')){b.call(m,true,n)||(m.value=n)}else{m.value=n}}return l}};a||(c.input=k);d||(c.textarea=k);$(function(){$(h).delegate('form','submit.placeholder',function(){var l=$('.placeholder',this).each(b);setTimeout(function(){l.each(e)},10)})});$(f).bind('beforeunload.placeholder',function(){$('.placeholder').each(function(){this.value=''})})}function g(m){var l={},n=/^jQuery\d+$/;$.each(m.attributes,function(p,o){if(o.specified&&!n.test(o.name)){l[o.name]=o.value}});return l}function b(m,n){var l=this,o=$(l);if(l.value==o.attr('placeholder')&&o.hasClass('placeholder')){if(o.data('placeholder-password')){o=o.hide().next().show().attr('id',o.removeAttr('id').data('placeholder-id'));if(m===true){return o[0].value=n}o.focus()}else{l.value='';o.removeClass('placeholder');l==h.activeElement&&l.select()}}}function e(){var q,l=this,p=$(l),m=p,o=this.id;if(l.value==''){if(l.type=='password'){if(!p.data('placeholder-textinput')){try{q=p.clone().attr({type:'text'})}catch(n){q=$('<input>').attr($.extend(g(this),{type:'text'}))}q.removeAttr('name').data({'placeholder-password':true,'placeholder-id':o}).bind('focus.placeholder',b);p.data({'placeholder-textinput':q,'placeholder-id':o}).before(q)}p=p.removeAttr('id').hide().prev().attr('id',o).show()}p.addClass('placeholder');p[0].value=p.attr('placeholder')}else{p.removeClass('placeholder')}}}(this,document,jQuery));
//placeholder
var doc=window.document,input=doc.createElement('input');if(typeof input['placeholder']=='undefined')
{$('input').each(function(ele)
{var me=$(this);var ph=me.attr('placeholder');if(ph&&!me.val())
{me.val(ph).css('color','#aaa').css('line-height',me.css('height'));}
me.on('focus',function()
{if(me.val()===ph)
{me.val(null).css('color','');}}).on('blur',function()
{if(!me.val())
{me.val(ph).css('color','#aaa').css('line-height',me.css('height'));}});});}
//chrome 提醒
function notify(content, url, title, image) {
	if (image==undefined) {image=siteUrl+"touch-icon-iphone.png"};
	if (title==undefined) {title="提醒"};
	if (url==undefined) {url=siteUrl+"message/my/ts-notice"};
	if (window.webkitNotifications) {
		if (window.webkitNotifications.checkPermission() == 0) {
			var deskBox = window.webkitNotifications.createNotification(image, title, content);
			deskBox.ondisplay = function(event) {
				setTimeout(function() {
					event.currentTarget.cancel();
				},
				10 * 1000);
			};
			deskBox.onerror = function() {};
			deskBox.onclose = function() {};
			deskBox.onclick = function(event) {
				location.href = url;
				window.focus();
				event.currentTarget.cancel();
			};
			deskBox.replaceId = 'box1';
			deskBox.show();
		} else {
			window.webkitNotifications.requestPermission(notify);
		}
	}
}
// notify('0.0');
function searchon(){
	$("#searchto").click();
}

function falseCallBack(){
	showDialogTip({tip:"已被其他账号绑定",error:true,complete:function(){location.reload();}});
}


/*视频弹出或隐藏播放*/
function showVideo(id,url)
{
	 if($('#play_'+id).is(":hidden")){
		  $('#swf_'+id).html('<object width="500" height="420" id="swf_'+id+'"><param name="allowscriptaccess" value="always"></param><param name="wmode" value="window"></param><param name="movie" value="'+url+'"></param><embed src="'+url+'" width="500" height="420" allowscriptaccess="always" wmode="window" type="application/x-shockwave-flash"></embed></object>')
		  $('#play_'+id).show();
	 }else{
		$('#swf_'+id).find('object').remove();
		$('#play_'+id).hide();
	 }
	$('#img_'+id).toggle();
}
/*整站操作成功弹框提示样式@小毛*/
/*
	参数以对象形式传入.对象是无序数组,可以不用在意变量顺序.
	调用demo:
	showDialogTip({tip:"提示消息",error:true,complete:function(){
		alert('操作成功的回调函数');
	}});
	tip: "要显示的消息", 
	error: "是否是错误提示，默认是OK提示", 
	complete: "回调函数，执行完showDialogTip后执行", 
*/
// function showDialogTip(obj){
// 	var fade = (obj.fade == undefined)?200:obj.fade,delay = (obj.delay == undefined)?1500:obj.delay;
// 	var imgUrl;
// 	if( obj.error == undefined || obj.error == false)
// 		imgUrl = "xm_tip_ok.png";
// 	else
// 		imgUrl = "xm_tip_error.png";
// 	$('#xm-tip-dialog').remove();
// 	var dom = '<div class="xm-group-dialog" id="xm-tip-dialog">'+
// 				'<img src="/public/images/' + imgUrl + '" alt="图片" /><span>'+ obj.tip +'</span>'+
// 			  '</div>';
// 	$(dom).appendTo('body');
// 	$('#xm-tip-dialog').css({marginLeft:-$('#xm-tip-dialog').width()/2}).fadeIn(fade).delay(delay).fadeOut(fade,function(){
// 		$(this).remove();
// 		if( obj.complete != undefined && typeof obj.complete == "function" ) 
// 			obj.complete();
// 	});
// }
/*	获得字符串实际长度@小毛	*/
function getLength(str){
	var len = 0;
	var code = -1;
	for(var i=0;i<str.length;i++){
		code = str.charCodeAt(i);
		if( code >= 0 && code <= 128 )
			len++;
		else
			len+=2;
	}
	return len;
}
/*	select逻辑	*/
(function(){
$('[data-tip]').hover(function(){
	var _val = $(this).data('tip'),_pos = $(this).offset(),
		_tw = $(this).outerWidth(),_th = $(this).outerHeight();
	if( $('#tooltip').length != 0 )
		$('#tooltip').text(_val);
	else
		$('<div class="tooltip tooltip-dn" id="tooltip">'+_val+'</div>').appendTo($('body'));
	var _w = $('#tooltip').outerWidth(),_h = $('#tooltip').outerHeight();
	$('#tooltip').css({'left':_pos.left+(_tw-_w)/2,'top':_pos.top-_h-14,opacity:1}).removeClass('dn');
},function(){
	$('#tooltip').css({'opacity':.8}).addClass('dn');
});
$.extend({
	reglist:{
		email:"/\w+((-w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+/",
		url:/[a-zA-z]+:\/\/[^\s]+/
	},
	confirm:function(obj){
		var pace = 200;
		var def = {};
		var o = $.extend({},def,obj);
		var conDom = '';
		if( o.buttons != undefined ){
			conDom += (o.buttons.length==0)?'':'<div class="xm-con-btn">';
			for(var i=0;i<o.buttons.length;i++){
				var tmp = 	'<a href="javascript:void(0);" class="rl-btn">'+
								o.buttons[i].name +
							'</a>';
				conDom += tmp;
			}
			conDom += (o.buttons.length==0)?'':'</div>';
		}
		var dom = 	'<div class="xm-mask" id="xm-mask"></div>'+
					'<div class="xm-con-dialog" id="xm-con-dialog">'+
						'<div class="xm-con-title">'+
							'<a href="javascript:void(0);" class="dialog-close">×</a>'+
						'</div>'+
						'<div class="xm-con-main">'+o.content+'</div>'+conDom+
				  	'</div>';
		$(dom).appendTo('body');
		if( o.init != undefined && typeof o.init == 'function' )
			o.init();
		if( obj.buttons.length != 0 ){
			$('#xm-con-dialog .xm-con-btn>a').each(function(i){
				if( obj.buttons[i].callback != undefined ){
					$(this).bind('click',function(){
						if( obj.buttons[i].callback() == false )
							return;
						$('#xm-con-dialog,#xm-mask').remove();
					});
				}
			});
		}
		$('#xm-con-dialog a.dialog-close').bind('click',function(){
			$('#xm-con-dialog,#xm-mask').remove();
		});
		$('#xm-con-dialog').css({
			marginLeft:-$('#xm-con-dialog').width()/2,
			marginTop:-$('#xm-con-dialog').height()/2
		}).fadeIn(pace);
	}
});
	
	$('.vsns-select').live('click',function(){
		var dis = $(this).data('dis');
		if( dis == 1 )
			return false;
		var dom = $(this).find('.content:eq(0)');
		if( dom.css('display') == 'none' ){
			dom.show();
			$('.vsns-select').not($(this)).find('ul.content').hide();
		}else{
			dom.hide();
		}
	});
	$('.vsns-select>ul.content>li').live('click',function(){
		var val = $(this).attr('value');
		var text = $(this).text();
		$(this).closest('.vsns-select').find('div.title a.vsns-select-cur').text(text).attr('value',val);
	});
	$(document).live('click',function(e){
		var target = $(e.target);
		if( target.closest('.vsns-select').length == 0 ){
			$('.vsns-select>ul.content').hide();
		}
	});
})();
/*	加载省市区	*/
$("#id-province>ul.content>li").live('click',function(){
	var provinceid=$(this).val();
	if( provinceid == 0 ){
		$('#id-city').removeClass('vsns-select-dis').data('dis','0');
		$('#id-area').removeClass('vsns-select-dis').data('dis','0');
		$('#id-city>ul.content').html('<li value="0">请选择市</li>');
		$('#id-area>ul.content').html('<li value="0">请选择区</li>');
		return;
	}
	$.get(siteUrl+"index.php?app=user&ac=city&provinceid="+provinceid,function(res){
		$("#id-city .vsns-select-cur").text('请选择市').val(0);
		$("#id-area .vsns-select-cur").text('请选择区').val(0);
		$('#id-city>ul.content').html('<li value="0">请选择市</li>');
		$('#id-area>ul.content').html('<li value="0">请选择区</li>');
		if(res){
			$('#id-city').removeClass('vsns-select-dis').data('dis','0');
			$('#id-area').removeClass('vsns-select-dis').data('dis','0');
			$('#id-city>ul.content').html(res);
		}else{
			$('#id-city').addClass('vsns-select-dis').data('dis','1');
			$('#id-area').addClass('vsns-select-dis').data('dis','1');
		}
	});
});
$("#id-city>ul.content>li").live('click',function(){
	$("#id-area .vsns-select-cur").text('请选择区').val(0);
	var city=$(this).val();
	if( city==0 ){
		$('#id-area').removeClass('vsns-select-dis').data('dis','0');
		$('#id-area>ul.content').html('<li value="0">请选择区</li>');
		return;
	}
	$('#id-city a.vsns-select-cur').attr('value',city).text($(this).text());
	$.get(siteUrl+"index.php?app=user&ac=area&cityid="+city,function(res){
		$("#id-area .vsns-select-cur").text('请选择区').val(0);
		$('#id-area>ul.content').html('<li value="0">请选择区</li>');
		if(res){
			$('#id-area>ul.content').html(res);
		}else{
			$('#id-area').addClass('vsns-select-dis');
		}
	});
});

if (userid) {
	var h_pace = 100;
	$('#h_xm_tip > a.close').bind('click',function(){
		$('#h_xm_tip').fadeOut(h_pace);
		$.post(siteUrl+'index.php?app=message&ac=un',{t:0},function(re){
			$(".msginfo").hide();
		},'json');
	});
	setInterval(function(){
		interval();
	 },60000);
	$('input, textarea').placeholder();

	interval();
};

function interval(h_pace){
	$.getJSON('/index.php?app=message&ac=my',{getMessageNum:1},
		function(res){
			var ss = $("#h_xm_tip >ul").find('li').length;
			if(!ss){
				$('#h_xm_tip').fadeOut(h_pace);
			}
			$("#h_xm_tip >ul").html('');
			
			if( parseInt(res.systemNum) ){
				$("#csystemNum").text('('+res.systemNum+')');
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=system">' + res.systemNum + '条新通知</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="5">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}
			if( parseInt(res.replayNum) ){
				
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">' + res.replayNum + '条新评论回复</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="3">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}
			if( parseInt(res.selfNum) ){
				$("#cselfNum").text('('+res.selfNum+')');
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=self">' + res.selfNum + '个新约片合作</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="6">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}
			if( parseInt(res.articleCommentNum) ){
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"   href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">'+res.articleCommentNum+'条新作品评论</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="1">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}
			if( parseInt(res.topicCommentNum) ){
					var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">'+res.topicCommentNum+'条新帖子评论</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="2">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
				
			}
			if( parseInt(res.projectCommentNum) ){
					var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">'+res.projectCommentNum+'条新拍摄计划评论</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="7">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
				
			}
			
			if( parseInt(res.fans )){
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l fans-tip" href="javascript:;" data-link="/u'+ userid + '?from=fans">' + res.fans + '个新粉丝</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="4">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}
			if( parseInt(res.inviteNum) ){
				
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">' + res.inviteNum + '个邀请</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="8">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}

			if( parseInt(res.atNum) ){
				
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">' + res.atNum + '个@提醒</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="9">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}

			if( parseInt(res.approveNum) ){
				
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">获得' + res.approveNum + '个赞同</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="10">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}

			if( parseInt(res.lyNum) ){
				
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">' + res.lyNum + '条新留言</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="16">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}

			if( parseInt(res.stillsNum) ){
				
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">' + res.stillsNum + '条图集留言</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="17">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}
			if( parseInt(res.likeNum) ){
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">' + res.likeNum + '条新喜欢</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="18">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}

			if( parseInt(res.expCommentNum) ){
				var tmp = 	'<li class="clearfix">'+
								'<a class="msg_tip_l"  href="' + siteUrl + 'index.php?app=message&ac=my&ts=notice">' + res.expCommentNum + '条新文章评论</a>' +
								'<a class="msg_tip_r" href="javascript:void(0);" mark="20">忽略</a>'+
							'</li>';
				$(tmp).prependTo('#h_xm_tip > ul:eq(0)');
			}

			var noticeNum = parseInt(res.topicCommentNum)+parseInt(res.articleCommentNum)+parseInt(res.replayNum);
			if(noticeNum){
				$("#cnoticeNum").text('('+noticeNum+')');
			}
			if( res.all){
				$('.msginfo').fadeIn(h_pace);
				$('#h_xm_tip').fadeIn(h_pace);
				$('#h_xm_tip a.msg_tip_r').bind('click',function(){
					var mark = $(this).attr('mark');
					if( $('#h_xm_tip > ul >li').length == 1 ){
						$('#h_xm_tip').fadeOut(h_pace);
					}
					$(this).parent().remove();
					$.post(siteUrl+'index.php?app=message&ac=un',{t:mark},function(re){
						$(".msginfo").fadeOut(h_pace);
					},'json');
				});
			}else{
				$('.msginfo').fadeOut(h_pace);
				$('#h_xm_tip').fadeOut(h_pace);
			}
	});
}
function is_iPad(){  
    var ua = navigator.userAgent.toLowerCase();  
    if(ua.match(/iPad/i)=="ipad") {  
        return true;  
    } else {  
        return false;  
    }  
}  
if( is_iPad() ){
	$('#u_set a.header_user_pad').bind('click',function(e){
		$(this).unbind('click');
		return false;
	});
}

//头像卡片
var hideEvent;
var showEvent;
var hideSpeed=500;
function hideCard(){
	$("#card-wrap").hide();
}
$("body").on("mouseenter",".one-user-tip",function(){
	var userid = $(this).data('userid');
	var _this = $(this);
	var cardWrap=$("#card-wrap");

	clearTimeout(hideEvent);
	showEvent=setTimeout(function(){ //延迟300ms显示
		$.get('/user/oneuser/userid-'+userid,{},function(res){
			$("#card-wrap").remove();
			$('body').append(res);
			
			var posx=_this.offset().left+0;
			var posy=_this.offset().top;
			$("#card-wrap").css("opacity","0");//为了先show()以获取card-wrap宽高
			$(".card-up-out-tri,.card-down-out-tri").css("left",_this.width()/2-8>3?_this.width()/2-8:3);
			if(posy-240<($(document).scrollTop())){
				// 卡片在下
				posy+=_this.height()+10;
				
				$(".card-down-out-tri").hide();
				$(".card-up-out-tri").show();

				if($.browser.msie&&($.browser.version == "7.0"))//IE7 
				{ 
					$("#card-wrap").css({"top":posy,"left":posx}).show();
				} 
				else{
					$("#card-wrap").css({"top":posy,"left":posx}).show();
					$(".card-intro").css("width",$(".card-info").width()+$(".card-head-bg").width()+$(".card-wrap .like-agree").width()+20);
				}
			}
			else{
				// 卡片在上
				$(".card-up-out-tri").hide();
				$(".card-down-out-tri").show();

				if($.browser.msie&&($.browser.version == "7.0"))//IE7 
				{ 
					$("#card-wrap").css({"top":posy-$("#card-wrap").height()-38,"left":posx}).show();
				} 
				else{
					$("#card-wrap").show();//卡片在上面时，卡片高度对位置有影响，所以要先show()获取高度再定位
					$(".card-intro").css("width",$(".card-info").width()+$(".card-head-bg").width()+$(".card-wrap .like-agree").width()+20);
					$("#card-wrap").css({"top":posy-$("#card-wrap").height()-108,"left":posx});
				}
			}
			//超出右边界
			var rightBeyond=$("#card-wrap").width()+$("#card-wrap").offset().left+80-$(window).width();
			if(rightBeyond>0){
				$("#card-wrap").css("left",posx-rightBeyond);//校正卡片
				$(".card-up-out-tri,.card-down-out-tri").css("left",_this.width()/2-8+rightBeyond);//校正三角
			}
			$("#card-wrap").css("opacity","1");//最后显示
			
			var followText = $("#one-user-follow").text();
			$("#card-wrap").on("mouseenter","#one-user-follow",function(){
				var isfollow = $("#one-user-follow").data('status');
				if (isfollow) {
					$(this).text('取   消');
				};
			}).on("mouseleave","#one-user-follow",function(){
				var isfollow = $("#one-user-follow").data('status');
				if (isfollow) {
					$(this).text(followText);
				};
			});
			//卡片关注
			$("#one-user-follow").click(function(){
				var isfollow = $("#one-user-follow").data('status');
				var userid = $("#one-user-follow").data('id');
				var ts = isfollow?'un':'do';
				if (isfollow) {
					artDialog({
						content:"确认取消关注？",
						width:260,lock:true,
						height:70,
						button:[{
							value:'确定',callback:function(){
								$.getJSON('/index.php?app=user&ac=follow&ts='+ts,{'userid':userid},function(res){
									$("#one-user-follow").data('status',0).text('+关注');
									followText = '+关注';
								});
								showDialogTip({tip:"已取消关注"});
							}
						},
						{
							value:'取消',callback:function(){}
						}]
					});
					// $("#one-user-follow").data('status',0).text('+关注');
				}else{
					$.getJSON('/index.php?app=user&ac=follow&ts='+ts,{'userid':userid},function(res){
						if (res.status == 2) {
							$("#one-user-follow").data('status',1).text('已关注');
							followText = '已关注';
						}else{
							showDialogTip({tip:res.msg});
						}
					});
				}
			})
			clearTimeout(hideEvent);
		},'html');
	},hideSpeed);
}).on("mouseleave",".one-user-tip",function(){ //鼠标离开头像或名字
	clearTimeout(showEvent);
	hideEvent=setTimeout(hideCard,hideSpeed);
});
var mouseenterTest=0;
$(document).on("mouseenter","#card-wrap",function(){ //浮在card自身
	clearTimeout(hideEvent);
});
$(document).on("mouseleave","#card-wrap",function(e){
	hideEvent=setTimeout(hideCard,hideSpeed);
});
$(document).click(function(e){ //点击使card消失
    e = window.event || e; 
    obj = $(e.srcElement || e.target);
    if ($(obj).is("#card-wrap,#card-wrap *")) { 
    } else {
        $("#card-wrap").hide();
    } 
});
$(document).scroll(function(e){ //滚到屏幕外面使card消失
    if($("#card-wrap").is(":visible")&&$("#card-wrap").offset().top-$(document).scrollTop()<20){
    	$("#card-wrap").hide();
    }
    if($(document).scrollTop()<20){
    	$('#header .header').slideDown();
    }else{
    	$('#header .header').slideUp();
    }
});

/*	data-type = 0是已关注，=1是加关注	*/
	$('body').on('click','.atten-btn',function(){
		if ($(this).hasClass('needLogin')) {return;};
		var type = $(this).attr('data-type');
		var deling =0;
		var userid = $(this).data('userid');
		var istop = $(this).data('top');
		var obj = $(this);
		if( type == 1 ){
			// 加关注操作。回调成功记得修改data-type的值。
			$.getJSON(siteUrl+'index.php?app=user&ac=follow&ts=do',{'userid':userid},function(res){
				if( res.status == 2 ){
					obj.attr('data-type',0);
					type = 0;
					obj.addClass('user-followed');
					obj.text('已关注');
					showDialogTip({tip:"关注成功"});						
				}else{
					showDialogTip({tip:"操作失败"});
				}
				
			});
		}else{
			// 取消关注操作。回调成功记得修改data-type的值。
			if(deling){
				return;
			}
			var obj = $(this);
			deling =1;
			artDialog({
				content:"确认取消关注吗？",lock:true,
				width:260,
				height:70,
				button:[
					{
						value:'确定',callback:function(){
							$.getJSON(siteUrl+'index.php?app=user&ac=follow&ts=un',{'userid':userid},function(res){
								if( res.status == 1 ){
									obj.attr('data-type',1);
									type = 1;
									deling = 0;
									obj.removeClass('user-followed');
									obj.text('+关注');
								}else{
									showDialogTip({tip:"操作失败"});
								}
								
							});
						}
					}
				],
				cancel: function () {
					deling =0;
				}
			});
		}
	});
	var hover_con = '';
	$('body').on('mouseenter','.atten-btn',function(){
		var type = $(this).attr('data-type');
		hover_con = $(this).text();
		if(type == 0)
			$(this).text('取 消');
			
	});
	$('body').on('mouseleave','.atten-btn',function(){
		hover_con = $(this).text();
		var type = $(this).attr('data-type');
		if(type == 0)
			$(this).text('已关注');
	});


// 功能:停止事件冒泡
function stopBubble(e) {
    //如果提供了事件对象，则这是一个非IE浏览器
    if ( e && e.stopPropagation )
        //因此它支持W3C的stopPropagation()方法
        e.stopPropagation();
    else
        //否则，我们需要使用IE的方式来取消事件冒泡
        window.event.cancelBubble = true;
}
//阻止浏览器的默认行为
function stopDefault( e ) {
    //阻止默认浏览器动作(W3C)
    if ( e && e.preventDefault )
        e.preventDefault();
    //IE中阻止函数器默认动作的方式
    else
        window.event.returnValue = false;
    return false;
}

function checkPhone(phone, country_type){ 
	var checkArr = [86,852,853,886,1];
	if( checkArr.indexOf(country_type) == -1 ){
		return true;
	}
	if (country_type == 86 && /^1[3|4|5|7|8]\d{9}$/.test(phone)) {
		return true;
	}
	else if (country_type == 852 && /^[5|6|9]\d{7}$/.test(phone)) {
		return true;
	}
	else if (country_type == 853 && /^6\d{7}$/.test(phone)) {
		return true;
	}
	else if (country_type == 886 && /^09\d{8}$/.test(phone)) {
		return true;
	}
	else if (country_type == 1) {
		var regexObj = /^\(?([0-9]{3})\)?[- ]?([0-9]{3})[- ]?([0-9]{4})$/;
		if (regexObj.test(phone)) {
		    var formattedPhoneNumber = phone.replace(regexObj, "$1$2$3");
		    return formattedPhoneNumber;
		} 
	}
	else {
		return false;
	}
}
function getLength(str){
	var len = 0;
	var code = -1;
	for(var i=0;i<str.length;i++){
		code = str.charCodeAt(i);
		if( code >= 0 && code <= 128 )
			len++;
		else
			len+=2;
	}
	return len;
}