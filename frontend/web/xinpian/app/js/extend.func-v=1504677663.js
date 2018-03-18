var recommendFlag = false,likeFlag = false,likeed = false;
// $('#like').hover(function(){
// 	if( $(this).attr('n') == 0 )
// 		return;
// 	$(this).find('span:eq(0)').html('&nbsp;取 消');
// 	$(this).attr('class','btn-like-a');
// },function(){
// 	if( $(this).attr('n') == 0 )
// 		return;
// 	$(this).find('span:eq(0)').text('已喜欢');
// 	$(this).attr('class','btn-like-a');
// });
function recommend(value,articleid,userid,check){
	if(recommendFlag)
		return;
	if(!value){
		value = '';
		$("#recommend_textarea").text(value);
	}
	if(value.length>140){
		showDialogTip({tip:"最多140字推荐语",error:true});
		return;
	}
	recommendFlag = true;
	$.post(siteUrl+'index.php?app=article&ac=recommend',{articleid:articleid,userid:userid,content:value,check:check},function(rs){
		recommendFlag = false;
		if(rs.status==0){
			//rl_login_class.show({});
			showDialogTip({tip:rs.msg,error:true});
		}else if(rs.status == 1){
			showDialogTip({tip:"你已经推荐过",error:true});
		}else if(rs.status == 2){
			if(rs.re.error_code!=21327){
				showDialogTip({tip:"推荐成功"});
			}
			$('#recommend').attr('class','btn-recommend-a').attr('onclick','');
			$("#recommend_count").text(rs.num+"人推荐").show();
			$('#id-recommend-num').text(rs.allnum);
			$('#xm_recommend_tab span').text("("+rs.allnum+")");
			if(rs.num<=12){
				
				var dom = "";
				dom +='<li data-userid="'+rs.userid+'"><a href="'+siteUrl+'u'+userid+'" class="db"><img src="'+rs.face+'" alt="'+rs.username+'" title="'+rs.username+'"></a>';
				if(parseInt(rs.isadmin)==3){
					dom += '<a href="'+siteUrl+'index.php?app=user&ac=userverify&ts=intro" target="_blank" title="个人认证" class="icon-v-p"></a>';
				}
				if(parseInt(rs.isadmin)==4){
					dom += '<a href="'+siteUrl+'index.php?app=user&ac=userverify&ts=intro" target="_blank" title="个人认证" class="icon-v-c"></a>';
				}

				dom += '</li>';
				$("#user_list li").each(function(){
					if ($(this).data('userid')==rs.userid) {
						$(this).remove();
					};
					
				})
				$(dom).prependTo("#user_list");
			}
		}
		if(rs.re.error_code==21327){
			wbChild = window.open(siteUrl+'index.php?app=pubs&ac=plugin&plugin=weibo&in=login&t=1&reauth=1','weiboChild','width=400,height=300,left=200,top=200');
		}
	},'json')
}

$('#like').bind('click',function(event,s){
	var n = $(this).data('n');
	var articleid = $(this).attr('articleId');
	if(likeFlag)
		return;
	likeFlag = true;
	$.post(siteUrl+'index.php?app=article&ac=like',{articleid:articleid,s:s,andLikeUserid:andLikeUserid},function(rs){
		likeFlag = false;
		if(rs.status>=1){
			likeCurPage = 1;
			getLikeData();
			var ltext = $('#like .click-collec strong').text();
			if(ltext =="已喜欢"){
				$('#islike').addClass('dn');
			}
			$('#id-count-like').text(rs.num);
			$('#id-like-num').text(rs.num);
			if (rs.status==1) {
				$('#like').removeClass('btn-like');
				$('#like').addClass('btn-like-a');
				$('.btn-like-a').find('strong').text('已喜欢');
				// $('#count-like-text').text('感谢您的支持! ');
				$('.isLike').text("");
				$('#id-count-like').text(rs.num + '人喜欢');
			}else{
				$('#like').removeClass('btn-like-a');
				$('#like').removeClass('btn-like-cancle');
				$('#like').addClass('btn-like');
				$('#like').find('strong').text('喜欢');
				$('#count-like-text').text('');
				// $('#count-like-text').text('推上首页 ');
				$('.isLike').text("人喜欢");
			}
			var ltext = $('#like .click-collec strong').text(),
				style = $('#xm_reply_tip').css('display');
					if(ltext =="已喜欢"){
						$('#together').html('');
					}else if(style == 'block'){
						$('#together').html('');
					}else{
						$('#together').html("<input type='checkBox' name='islike' id='islike' />&nbsp;同时喜欢");
					}
		}
		showDialogTip({tip:rs.msg});
	},'json');
});