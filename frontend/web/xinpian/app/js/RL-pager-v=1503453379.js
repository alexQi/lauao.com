(function($) {
	if (typeof jQuery == 'undefined') {
		alert('加载jQuery失败');
		return;
	}
	var fadePace = 200;
	rl_c = $.rl_c || {};
	rl_c.tools = {
		ajax: function(options) {	
			$.ajax({
				url: options.url,
				data: options.data + ((options.extralData != undefined) ? ('&' + options.extralData) : ''),
				dataType: "json",
				type: (options.type == undefined) ? "POST": options.type,
				error: function() {},
				success: function(res) {
					var totalCount = parseInt(res.totalCount),
					pageNo = parseInt(res.pageNo),
					pageSize = parseInt(res.pageSize);
					rl_c.tools.initResult(res,options);
					rl_c.tools.pager({
						"pageNo": pageNo,
						"pageSize": pageSize,
						"totalCount": totalCount
					});
					if (res.totalCountRe) {
						$("#xm_recommend_tab span").text("("+res.totalCountRe+")");
					};
					if(res.weibo==1){
						$("#weibo_comment_tab span").text("("+res.totalCountCo+")");
					}else{
						$("#xm_comment_tab span").text("("+res.totalCountCo+")");
					}
					rl_c.tools.pagerBind(options);
					if (typeof(options.success) == 'function')
					 options.success(res);
				}
			});
		},
		pager: function(pagerMsg) {
			var pageNo = pagerMsg.pageNo,
			pageSize = pagerMsg.pageSize,
			totalCount = pagerMsg.totalCount;
			var totalPage = Math.ceil(totalCount / pageSize);
			var hasPre = (pageNo > 1) ? true: false,
			hasNext = (pageNo < totalPage) ? true: false,
			hasFirst = (pageNo == 1) ? false: true,
			hasLast = (pageNo == totalPage) ? false: true;
			$('.pager').html('');
			if (totalCount == 0)
			 return;
			// if (hasFirst)
			//  $('<a href="javascript:void(0);" hidefocus n="1">首页</a>').appendTo('.pager');
			if (hasPre)
			 $('<a href="javascript:void(0);" hidefocus n="' + (pageNo - 1) + '"><</a>').appendTo('.pager');
			var left = pageNo - 4,
			right = pageNo + 5,
			start = left,
			end = right;
			end += (left < 1) ? (1 - left) : 0;
			end = (end > totalPage) ? totalPage: end;
			start -= (right > totalPage) ? (right - totalPage) : 0;
			start = (start < 1) ? 1: start;
			for (var i = start; i <= end; i++) {
				if (i == pageNo)
				 $('<span class="cur">' + i + '</span>').appendTo('.pager');
				else
				 $('<a href="javascript:void(0);" hidefocus n="' + i + '">' + i + '</a>').appendTo('.pager');
			}
			if (hasNext)
			 $('<a href="javascript:void(0);" hidefocus n="' + (pageNo + 1) + '">></a>').appendTo('.pager');
			// if (hasLast)
			//  $('<a href="javascript:void(0);" hidefocus n="' + totalPage + '">尾页</a>').appendTo('.pager');
			if (totalCount < 9)
			 $(".pager").hide();
			else
			 $(".pager").show();

		},
		pagerBind: function(options) {
			if( userid != 0 ){
				$('#xm_comment > li div.group_banned a.xm_reply,#recom_comment > li div.group_banned a.xm_reply').each(function(){
					$(this).bind('click',function(){
						var node = $(this).parent().parent().parent();
						var yyContent = node.find('.xm_content').html();
						toUserName = node.find('h4 a').eq(0).text();
						toUserHref = node.find('h4 a').eq(0).attr('href');
						yyuid = node.find('.xm_yy>a').data('uid');
						$('#xm_reply_tip .xm_name').html('<a href="'+toUserHref+'">'+toUserName+'</a>');
						$('#xm_reply_tip span').html(yyContent);
						$('#xm_reply_tip').attr('commentId',node.parent().attr('id'));
						
						$('#xm_reply_tip').fadeIn(fadePace);
						location.href = "#like_count";
						$('#together').html('');
						if(options.from){
							editor.focus();
						}else{
							commentInput.focus();
						}
						
						
					});
				});
			}else{
				$('#xm_comment > li div.group_banned a.xm_reply,#recom_comment > li div.group_banned a.xm_reply').each(function(){
					$(this).bind('click',function(){
						loginIframe.show();
					});
				});
			}
			$(".pager a").unbind().bind('click',function() {
				var n = $(this).attr('n');
				$(".pager").html('');
				rl_c.tools.ajax({
					url: options.url,
					dataType: 'json',
					type: 'POST',
					first:first,
					t:options.t,
					data: "pageNo=" + n + '&id=' +articleId,
					extralData: options.extralData,
					success: function(res) {
						location.href="#ajax_comment";
					}
				});
			});
			var approveIng = 0;
			$('.approve').on('click',function(){
				if (approveIng) {return;};
				var comment_userid = $(this).data('userid');
				if (comment_userid==userid) {
					showDialogTip({tip:"不能赞同自己哦",error:true});
					return;
				};
				approveIng = 1;
				var _this = $(this);
				var commentid = $(this).data('id');
				var obj = {commentid:commentid,type:t};
				$.post(siteUrl+'index.php?app=article&ac=filmplay&ts=approve',obj,function(res){
					var _dom = _this.find('.xm_approve');
					var appendBase = _this.parent('.bby-appr-face').next().find('h4');//插入目标
					var approveInfo=_this.parent('.bby-appr-face').next().find('.xm_approve_people');//赞同人数的信息
					var approvePeople=approveInfo.find("a");//所有赞的人的连接
					var username=res.user.regname;//本人用户名
					// var approveWrap=_this.parent(".xm_ope");//赞包裹层
					if( res.status == 1 ){
						if(_dom.length==0){
							$(_this).html('<span class="xm_approve">0</span>');
							_dom = _this.find('.xm_approve');
						}
						$("a[data-id="+commentid+"]")
							.addClass('approved')
							.find('.xm_approve')
							.text(parseInt(_dom.text())+1);
						$('<span class="add-one" id="add-one">+1</span>').css({left:(_dom.width()-10)/2}).appendTo($("a[data-id="+commentid+"]"));
						$('.add-one').animate({'opacity':1,'top':-40},600,function(){
							$(this).fadeOut(100,function(){
								$(this).remove();
							});
						});
						//增加底部赞信息
						if(approveInfo.length){
							if(approvePeople.size()>=3){//人数>=3需要去掉最后一个人
								approveInfo.find("a:last").remove();//删除最后一个人
								approveInfo.find("a:last span").remove();//删除倒数第二个人后面的顿号
							}
							approveInfo.prepend("<a target='_blank' href='/u"+res.user.userid+"' class='overdot inb'>\
								"+username+"</a>");
							if(approvePeople.size()==0){
								approveInfo.append("<span class='overdot inb'>&nbsp;&nbsp;赞同</span>")
							}
							else{
								approveInfo.find("a:first").append("<span>、</span>");
							}
						}
						else{//没有人赞同过
							appendBase.after("<span class='xm_approve_people db'>\
								<a target='_blank' href='/u"+res.user.userid+"' class='overdot inb'>\
								"+username+"</a><span class='overdot inb'>&nbsp;&nbsp;赞同</span></span>");
						}
					}else{
						// 取消赞
						$("a[data-id="+commentid+"]").removeClass('approved');
						var count = parseInt(_dom?_dom.text():0)-1;
						$("a[data-id="+commentid+"]").html(count?'<span class="xm_approve">'+count+'</span>':'赞同');

						//只有自己赞过
						if(approvePeople.size()==1){
							approveInfo.html("");
						}

						//别人也赞过
						else{
							for(var i=0;i<approvePeople.size();i++){
								var shortText=approvePeople.eq(i).text().replace(/^(\s|\xA0)+|(\s|\xA0)+$/g,'').replace(/、/g,'');
								if(username==shortText){
									approvePeople.eq(i).remove();
									if(i==2){
										approveInfo.find("a:last span").remove();//删除倒数第二个人后面的顿号
									}
								}
							}
						}
					}
					approveIng = 0;
				},'json');
			});
		},
		initResult: function(res,options) {
			if(options.t){
				$('#xm_recommend').html(res.result);
			}else{
				$('#xm_comment').html(res.result);
			}
		},
		getUrl: function(key) {
			var value = location.search.match(new RegExp("[\?\&]" + key + "=([^\&]*)(\&?)", "i"));
			return value ? value[1] : value;
		}
	};

	// @人的弹框
	var commentInput=$("#comment_content,#main-form-desc");
	commentInput.on("keydown",function(event){
		if($(".at-list").is(":visible")&&event.keyCode==13){
			var currentLi=$(".at-list").find(".at-list-sel");
			var lastAtIndex = commentInput.val().lastIndexOf('@');
			var content = commentInput.val().substr(0,lastAtIndex);
			commentInput.val(content+'@'+currentLi.text()+" ");
        	$(".at-wrap").hide();
			return false;
		}
	});
	commentInput.on("keyup",function(event){
		var atpos=null;
		//输入@
		if("@"==commentInput.val().charAt(commentInput.val().length-1)){
			//初始化
			$(".at-list").html('');

			atpos=commentInput.val().length-1;
			var X = commentInput.offset().left;
			var Y = commentInput.offset().top;
			var commentFieldWidth=commentInput.width();
			var topMargin=12;
			var textHei=20;
			var offHei=Math.floor(commentInput.val().visualLength()/commentFieldWidth)*textHei+topMargin; 
			var offLen=commentInput.val().visualLength()%commentFieldWidth;  
			if(X+offLen+$(".at-wrap").width()+30<$(window).width()){
				$(".at-wrap").css({"left":X+offLen,"top":Y+textHei+offHei,'display':'block'});
			}
			else{
				$(".at-wrap").css({"left":$(window).width()-$(".at-wrap").width()-30,"top":Y+textHei+offHei,'display':'block'});
			}
		}

        //键盘上下键选择li
		var currentLi=$(".at-list").find(".at-list-sel");
		if(event.keyCode==38&&currentLi.index()!=0){//上
            currentLi.removeClass("at-list-sel");
        	currentLi.prev().addClass("at-list-sel");
        	return false;
        }
        if (event.keyCode==40&&currentLi.index()<$(".at-list li").size()-1){//下
        	console.log(currentLi.index(),$(".at-list li").size());
        	currentLi.removeClass("at-list-sel");
        	currentLi.next("li").addClass("at-list-sel");
        	return false;
        }

		//输入@之后继续输入
		else if(true==$(".at-wrap").is(":visible") && "@"!=commentInput.val().charAt(commentInput.val().length-1&&event.keyCode!=38&&event.keyCode!=40)){
			var lastAtIndex = commentInput.val().lastIndexOf('@');
			var length = commentInput.val().length;
			var atname = commentInput.val().substr(lastAtIndex+1);

			$.post('/article/filmplay/ts-at_name_tip',{username:atname},function(res){
				if (res.status) {
					$(".at-list").html('');
					var str = '';
					$.each(res.list,function(i,n){
						str +='<li class="db overdot" data-userid="'+n.userid+'">'+(n.verifyname?n.verifyname:n.username)+'</li>';
					});
					
					$(".at-list").html(str).show();
				};
				$(".at-list li:first").addClass("at-list-sel");
			},'json');
		}
		//输入@之后继续输入，以空格结束
		else if(true==$(".at-wrap").is(":visible")
			&&" "==commentInput.val().charAt(commentInput.val().length-1)){
			$(".at-wrap").hide();
		}
	});
	//list hover
	$(".at-list").on('mouseenter','li',function(){
		$(".at-list li").removeClass("at-list-sel");
		$(this).addClass("at-list-sel");
	}).on('mouseleave','li',function(){
		$(".at-list li").removeClass("at-list-sel");
		// $(this).addClass("at-list-sel");
	});

	//获取内容显示长度
	String.prototype.visualLength = function()
	{
	    var ruler = $("#ruler");
	    ruler.text(commentInput.val());
	    return ruler[0].offsetWidth;
	}
	//@点击
	$(".at-wrap").on("click",".at-list li",function(){
		commentInput.focus();
		var lastAtIndex = commentInput.val().lastIndexOf('@');
		var content = commentInput.val().substr(0,lastAtIndex);
		commentInput.val(content+'@'+$(this).text()+" ");
	});
	//@消失
	$(document).click(function(e){ 
		e = window.event || e; // 兼容IE7
		obj = $(e.srcElement || e.target);
		  if ($(obj).is(".at-wrap")) { 
		} else {
		    $(".at-wrap").hide();
		} 
	});
})(jQuery);