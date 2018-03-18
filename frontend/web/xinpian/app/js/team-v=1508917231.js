/*添加团队人员*/
var inviteType = 0;
var ing = 0;
//删除成员
$('.user-team ul li').hover(function(){
	$(this).children('.user-del').show();
},function(){
	$(this).children('.user-del').hide();
});

//编辑职务图标
$('.useer-roles').hover(function(){
	$(this).children('a').show();
},function(){
	$(this).children('a').hide();
});
var liindex = 0;
//编辑职务
$('.useer-roles a').click(function(){
	$('#user-team-role-box').remove();
	liindex = $(this).parents('li').index();
	var userid = $(this).parents('li').data('userid'),
		$li = $(this).parents('li');
	$.post('/article/team/ts-userrole',{userid:userid,articleid:articleId},function(re){
		var str1 = "<div class='user-team-role-box hidden' id='user-team-role-box'><div class='user-team-close dialog-close' id='user-team-role-close'>×</div><div class='title'>片中职务：</div><div class='user-team-role'><ul id='roles'>",
			str2 = "</ul></div><a href='javascript:void(0);' data-edit='0' data-userid='"+userid+"' class='user-edit-btn rl-btn fr' id='user-edit-btn'>修 改</a></div>",
			label = '',
			role = re.result.role.toString().split(','),
			str;
		for (var i = 1; i <= re.result.roles.length; i++) {
			label += "<label style='width: 82px;'><input type='checkbox' name='role' value='"+i+"'> <span>"+ re.result.roles[i-1] +"</span></label>";
		}
		str = str1 + label + str2;
		$li.append(str);
		for(var i = 0,length = role.length; i <= length; i++){
			var j = role[i]-1;
			$('#roles label:eq('+j+')').children('input').attr({checked:'checked'});
		}
		inviteType = 3;
		$('#user-team-role-box').slideDown();
	},'json');
	// $(this).parents('li').children('.user-team-role-box').slideToggle()
	// .parents('li').siblings().children('.user-team-role-box').hide();
});


//添加成员
$('#add-user').click(function(){
	if($('#user-team-add').height() == 0){
		$('#user-team-add').css({height:'100%',width:'280px'}).show();
	}else{
		hideit();
	}
	inviteType = 0;
});


//申请加入
$('#add-team').click(function(){
	$('#user-search-box').hide();
	$('#post-btn').text('申请加入');
	if($('#user-team-add').height() == 0){
		$('#user-team-add').animate({height:'100%',width:'280px'}).show();
		$("#user-team-roles").add('#user-team-roles-intro').show();
	}else{
		$('#user-team-add').animate({width:'0px',height:'0'},'fast',function(){$(this).add('#user-team-roles-intro').hide();});
	}

	inviteType = 2;
});


//关闭窗口-邀请成员
$('#user-team-close').click(function(){
	hideit();
});

function hideit () {
	$('#user-team-add').css({width:'0px',height:'0'}).hide();
	$('#user-search-box').show();
	$('#user-search-no').add('#user-team-roles').add('#user-search').hide();
	$('#email-invite input').add('#search-input').val('');
	$('.user-team-role input').attr({checked:false});
}
function confirm(){/*
			var _this = $("#post-btn");
			var articleid = _this.data('id');
			$.confirm({
				content:"申请已发送，等待对方同意，如果对方长期未处理申请，可直接联系对方处理",
				buttons:[
					{	
						name:"知道了",
						callback:function(){
							hideit();
					}},
					{
						name:"联系TA", 
						callback:function(){
							location.href = "/user/message/ts-add/touserid-"+autherId;
					}}
				]
			});
			if($('.xm-con-main').text().length>=14){$('.xm-con-main').css({textAlign:'left'});console.log('s')}
*/
			$("#add-team").remove();
			myart = artDialog({
				content:"你的申请已发送作者，等待确认。你也可以直接联系TA确认。",
				width:260,lock:true,
				height:70,
				button:[
					{
						value:'知道了',
						callback:function(){
							myart.close();
							hideit();
						}
					},
					{
						value:'联系TA',
						callback:function(){
							location.href="/user/message/ts-add/touserid-"+autherId;
						}
					}
				]
			});
}
//关闭窗口-编辑职务
$('.user-team ul li').on('click','#user-team-role-close',function(){
	$('#user-team-role-box').remove();
});

//搜索提示
$('#search-input').focusin(function(){
	$('#search-list').slideDown();
});

//搜索提示
$('#search-input').focusout(function(){
	$('#search-list').slideUp();
});
/*
$('#search-list li:not(.no-validation, .alr-validation)').click(function(){
	$('.user-search').slideDown();
});
*/

//邮箱邀请
$('#search-no').click(function(){
	$('#user-search-box').hide();
	$('#user-search-no').add('#user-team-roles').slideDown();
	$('#post-btn').text('邀请');
	inviteType = 1;
});


//返回
$('#return').click(function(){
	$('#user-search-no').add('.user-search').add('#user-team-roles').hide();
	$('#user-search-box').slideDown();
	$('#post-btn').text('添加新成员');
	$('#email-invite input').val('');
	$('.user-team-role input').attr({checked:false});
});

//输入动态数据
var username;
$("#search-input").keyup(function(){
	username = $(this).val();
	$.post('article/team/ts-finduser',{username:username,articleid:articleid},function(re){
		if (re.status) {
			$("#search-list ul").html('');
			var str = '';

			for (var i in re.result) {
				var nc = (re.result[i]['invite_status']==1)?'<span class="mr10 alr-validation">已添加</span>':((re.result[i]['invite_status']==2)?'<span class="mr10 no-validation">未验证</span>':'');
				var liclass = (re.result[i]['invite_status']==1)?'alr-validation':((re.result[i]['invite_status']==2)?'no-validation':'');
				str +='<li data-userid="'+re.result[i]['userid']+'" class="overdot line-hide-1 '+liclass+'"><img src="'+re.result[i]['face_54']+'" width="24" height="24" alt="头像">'+re.result[i]['username']+nc+'</li>';
			}
			for (var i = 1; i < re.result.length - 1; i++) {
				
			};
			$("#search-list ul").html(str);
		}else{
			$("#search-list ul").html('');
		}
	},'json')
});

//显示选中人员信息
$('#search-list ul').on('click','li',function(){
	// .no-validation, .alr-validation
	if ($(this).hasClass('no-validation') || $(this).hasClass('alr-validation')) { return;};
	var userid = $(this).data('userid');
	$.post('/article/team/ts-oneuser',{userid:userid,articleid:articleid},function(re){
		$('#user-search-box .user-search .user-avatar').attr({id:userid});
		$('#'+userid+' a').attr({href:"/u"+re.result['userid']});
		$('#'+userid+' a img').attr({src:re.result['face_54'],alt:re.result['username']});
		$('#user-search-box .user-search .user-info .user-intro').text(re.result['desc']);
		$('#user-search-box .user-search .user-info .user-name span').text(re.result['username']);
		$('#user-search-box .user-search').add('#user-team-roles').slideDown();
	},'json');
	
});

$(".user-team .user-del").bind('click',function(){
	var userid = $(this).parent().data('userid');
	showSureDialogTip({
		title : "提示",
		content :"确认删除成员吗？"
	},function(){
		$.post('/article/team/ts-delete',{userid:userid,articleid:articleid},function(re){
			ing = 0;
			if (re.status) {
				showDialogTip({tip:'操作成功'},function(){location.reload()});
			}else{
				showDialogTip({tip:re.msg, error: true});
			}
		},'json');
	})
});

function addInvite(obj){
	$(".inviting").removeClass("dn");
	if (!obj.type) {
		var str = '<li><a href="/u'+ obj.userid +'" class="head-wrap" data-userid="'+obj.userid+'"><img class="avator lazy-img" _src="'+ obj.face_origin +'">'+ (obj.isadmin == 3 || obj.isadmin == 4 ? '<span class="author-v '+ (obj.isadmin == 3 ? "yellow-v" : "blue-v") +'"></span>' : '') +'</a><div class="creator-info"><a class="name-wrap" href="/u'+ obj.userid +'"><span class="name fs_14 fw_600 c_b_3 line-hide-1">'+ obj.username +'</span></a><span class="roles fs_12 fw_300 c_b_9">'+ obj.role +'</span></div></li>';
	}else{
		var str = '<li><a href="javascript:;" style="cursor: default;"><img class="avator lazy-img" _src="/public/images/default.jpg"></a><div class="creator-info"><a class="name-wrap" href="javascript:;" style="cursor: default;"><span class="name fs_14 fw_600 c_b_3 line-hide-1">'+ obj.email +'</span></a><span class="roles fs_12 fw_300 c_b_9">'+ obj.role +'</span></div></li>';
	}

	$("#inviting").prepend(str);
	lazyImg();
}

//发送邀请 0 用户邀请 1 邮件邀请  2 申请
$('#post-btn,#user-edit-btn').live('click',function(){
	if (ing) {return;};
	var role = [];
	$(".user-team-role input:checked").each(function(i){
		if($(this).attr('checked')){
			role[i] = $(this).val();
		}
	});

	if (role.length > 5) {
		showDialogTip({tip:'角色不能超过5个', error: true});
		return;
	}

	if (role == '') {
		showDialogTip({tip:'请选择角色', error: true});
		return;
	};
	var _this = $(this);
	var obj = {role:role,articleid:articleid};
	var complete = function(){};
	switch(inviteType){
		case 0:
			obj.userid = $('#user-search-box .user-search .user-avatar').attr('id');
			var ts = 'invite';
			break;
		case 1:
			obj.username = $('#email-invite input[name=username]').val();
			obj.email = $('#email-invite input[name=email]').val();
			var ts = 'invite_email';
			break;
		case 2:
			var ts = 'apply';
			// complete = confirm();
			break;
		case 3:
			//修改
			obj.userid = $(this).data('userid');
			var ts = 'change';
			break;
	}
	ing = 1;
	$.post('/article/team/ts-'+ts,obj,function(re){
		ing = 0;
		if (re.status) {
			hideit();
			$('#user-team-add').hide();
			$("#user-team-role-box").hide();
			if (inviteType==0 || inviteType==1) {addInvite(re.user)};
			if (inviteType==3) {
				$(".user-team ul li").eq(parseInt(liindex)).find('.role-str').html(re.roles);
			};
			if (inviteType==2) {confirm();};
			complete;
		}else{
			showDialogTip({tip:re.msg, error: true});
		}
	},'json');
});
