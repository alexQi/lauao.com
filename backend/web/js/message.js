/**
 * Created by alex on 17-8-18.
 */
/**
 *
 * @param title
 * @param message
 * @param icon
 */
function notify(title,message,icon,tag_id){
    if(Notification.permission==="granted"){
        var notification = new Notification(title, {
            body: message,
            tag:tag_id,
            icon: 'http://image.zhangxinxu.com/image/study/s/s128/'+icon+'.jpg',
            silent:false
        });
        notification.onclick = function() {
            var message_id = $(".just-do-it").attr("data-message-id");
            var obj = $("#message-count");
            var message_count = parseInt(obj.html());
            obj.html(message_count-1);
            $.get("/site/msgmanager?message_id="+message_id,function(data){
                $("#message-li-"+message_id).remove();
            });
            notification.close();
        };
    }
}
function knowmsg(msg_id)
{
    var obj = $("#message-count");
    var message_count = parseInt(obj.html());
    obj.html(message_count-1);
    $.get("/site/msgmanager?message_id="+msg_id,function(data){
        // $(".panel-group").addClass("animated hinge");
        $("#message-li-"+msg_id).addClass("animated bounceOutRight");
        window.setTimeout(function(){
            $("#message-li-"+msg_id).remove();
        },500);
    });
}
function getMsgList()
{
    $.get("/site/msglist",function(data){
        $(".messages").html(data);
    });
}
$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});
$(function(){

    $("#timer").html((new Date(current_time).Format("yyyy-MM-dd hh:mm:ss")));
    // 是否允许系统通知
    if(Notification){
        if(Notification.permission === 'default') {
            Notification.requestPermission(function() {
            });
        }
    }
    var socket = io(socket_url);
    socket.on('connect', function(){
        console.log('connected '+socket_url);
        var data = {
            user:current_user,
            sessid:session_id,
            event:"register"
        };
        console.log(data);
        socket.emit("register",data);
    });

    socket.on("timer",function(data){
        current_time = data.msg;
        console.log(current_time);
    });
    socket.on("reconnect",function(data){

    });
    socket.on("disconnect",function(){

    });

    socket.on('redissub',function(data){
        // notify("test",data,'mm1');
        var obj = $("#message-count");
        var message_count = parseInt(obj.html());
        obj.html(message_count+1).animateCss("flash");
        notify(data.title,data.content,"mm2",data.msg_id);
        getMsgList();
    });

    setInterval(function(){
        current_time = current_time+1000;
        $("#timer").html((new Date(current_time).Format("yyyy-MM-dd hh:mm:ss")));
    },1000);
    /* 加载消息列表 */
    getMsgList();

});