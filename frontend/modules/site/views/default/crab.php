<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,aItemress=no">
    <title>美女与螃蟹中秋大抢购</title>
    <link rel="stylesheet" type="text/css" href="/css/aui.css"/>
    <link rel="stylesheet" type="text/css" href="/css/aui-slide.css" />
    <link rel="stylesheet" type="text/css" href="/css/video-js.css">

    <style type="text/css">


        .video-js .vjs-big-play-button{
			margin: 0 auto;
           top: 40%;
		   position: inherit;
		}


        .goods-title {
            color: #757575 !important;
        }
        .goods-price {
            color: #666666 !important;
            font-weight: 700;
        }
        .checklist{text-align:center;margin-top:30px}

        .layui-layer-btn0{font-size: 0.75rem;}



        /* 订单确认样式 */
        body .confim-class .layui-layer-title{background:#c00; color:#fff; border: none;}
        body .confim-class .layui-layer-btn{border-top:1px solid #E9E7E7}
        body .confim-class .layui-layer-btn a{background:#333;}
        body .confim-class .layui-layer-btn .layui-layer-btn1{background:#999;}


      
        .aui-bar-btn-item.aui-active {
            background-color: transparent;
            color: #212121; 
        }

        .aui-bar-btn {
            min-height: 0.3rem;
        }

        .aui-btn.aui-btn.aui-btn-outlined.aui-btn-warning {margin-left: 65px;margin-top: 5px;}



        .my-anim{ animation: twinkling 1.5s  infinite ease-in-out; }

            @keyframes twinkling{ /*透明度由0到1*/
             0%{opacity:0.4;透明度为0}
            50%{opacity:0.7; /*透明度为0*/}
            100%{opacity:1; /*透明度为1*/}
            }


    </style>


</head>

<body>

<div id="aui-slide3">
    <div class="aui-slide-wrap">
    <div class="aui-slide-node bg-dark">
          
					<div class="m">
							
						  <video id="my-video" class="video-js" controls preload="auto"  poster="/images/banner2.jpg" height="210"  x5-playsinline="" playsinline="" webkit-playsinline=""
							 data-setup="{}">
							  <source src="http://advert.ztwliot.com/QB1505583886" type="video/mp4">
							  <p class="vjs-no-js">
								To view this video please enable JavaScript, and consider upgrading to a web browser that
								<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
							  </p>
                          </video>
                    </div>
            </div>
            <div class="aui-slide-node bg-dark">
                <img src="/images/banner2.jpg"/>
             
            </div>
            <div class="aui-slide-node bg-dark">
            <img src="/images/banner3.jpg"/>
             
            </div>
            <div class="aui-slide-node bg-dark">
            <img src="/images/banner1.jpg"/>
             
            </div>

       
            
   
    </div>
    <div class="aui-slide-page-wrap">
        <!--分页容器-->
    </div>
</div>


<div class="aui-tips aui-margin-b-2 aui-margin-t-2 aui-bg-danger" id="tips-1" >

    <i class="aui-iconfont aui-icon-info "></i>
   
    <div class="aui-tips-title my-anim"> <small>好消息,当前渠道已经销售数量:</small>80
    </div>
    
    <i class="aui-iconfont aui-icon-close" tapmode onclick="closeTips()"></i>
   
</div>


<section id="crab_1" class="aui-content">

<div class="aui-card-list">
    <div class="aui-card-list-header aui-card-list-user">
        <div class="aui-card-list-user-avatar">
            <img src="/images/crab.png">
        </div>
        <div class="aui-card-list-user-name">
            <div class="aui-font-size-16">A.家庭装<i class="aui-iconfont aui-icon-right aui-font-size-12"></i></div>
            <small class="aui-font-size-14 aui-text-danger">￥188</small>
        </div>
        <div class="aui-card-list-user-info">舌尖美味 餐桌必备</div>
    </div>

<div class="aui-row">
<div class="aui-col-xs-3">
<div class="checklist" > <input class="aui-radio" type="radio" name="radio" value="1" checked></div>
</div>

<div class="aui-col-xs-9">

    <div class="aui-card-list-content aui-border-t" >

        <ul class="aui-list aui-list-noborder">
   
        
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">重量:3两</div>
                    <div class="aui-list-item-title aui-font-size-14 goods-title">种类:公</div>

                    <div class="aui-list-item-right goods-price">4只</div>
                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">重量:2两</div>
                    <div class="aui-list-item-title aui-font-size-14 goods-title">种类:母</div>
                    <div class="aui-list-item-right goods-price">4只</div>
                </div>
            </div>
        </ul>
    </div>
   <div class="aui-card-list-footer aui-border-t">
        <div></div>
        <div>
            <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">数量</div>
            <!-- <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">评价得积分</div> -->

        <div class="aui-bar aui-bar-btn" style="width:50%;float:right;" type="count">
        <div class="aui-bar-btn-item aui-font-size-20">
            <i class="aui-iconfont aui-icon-minus"></i>
        </div>
        <div class="aui-bar-btn-item">
            <input type="number" readonly="readonly" class="aui-input aui-text-center" id="count1" value="1">
        </div>
        <div class="aui-bar-btn-item aui-font-size-20">
            <i class="aui-iconfont aui-icon-plus"></i>
        </div>
    </div>


        </div>
    </div>
</div>
</div>

</section>

<!-- 1 end  -->

<!-- 2 begin -->
<section id="crab_2" class="aui-content">

<div class="aui-card-list">
    <div class="aui-card-list-header aui-card-list-user">
        <div class="aui-card-list-user-avatar">
            <img src="/images/crab.png">
        </div>
        <div class="aui-card-list-user-name">
            <div class="aui-font-size-16">B.尊享装 <i class="aui-iconfont aui-icon-right aui-font-size-12"></i></div>
            <small class="aui-font-size-14 aui-text-danger">￥298</small>
        </div>
        <div class="aui-card-list-user-info">吃的健康 购的安心送礼的不二选择</div>
    </div>

<div class="aui-row">

<div class="aui-col-xs-3">
<div class="checklist" > <input class="aui-radio" type="radio" value="2" name="radio" ></div>
</div>

<div class="aui-col-xs-9">

    <div class="aui-card-list-content aui-border-t" >

        <ul class="aui-list aui-list-noborder">
   
        
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">重量:3.5两</div>
                    <div class="aui-list-item-title aui-font-size-14 goods-title">种类:公</div>

                    <div class="aui-list-item-right goods-price">4只</div>
                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">重量:2.5两</div>
                    <div class="aui-list-item-title aui-font-size-14 goods-title">种类:母</div>
                    <div class="aui-list-item-right goods-price">4只</div>
                </div>
            </div>
        </ul>
    </div>
    <div class="aui-card-list-footer aui-border-t">
    <div></div>
    <div>
        <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">数量</div>
        <!-- <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">评价得积分</div> -->

    <div class="aui-bar aui-bar-btn" style="width:50%;float:right;" type="count">
    <div class="aui-bar-btn-item aui-font-size-20">
        <i class="aui-iconfont aui-icon-minus"></i>
    </div>
    <div class="aui-bar-btn-item">
        <input type="number" readonly="readonly" class="aui-input aui-text-center" id="count2" value="1">
    </div>
    <div class="aui-bar-btn-item aui-font-size-20">
        <i class="aui-iconfont aui-icon-plus"></i>
    </div>
</div>


    </div>
</div>
</div>
</div>

</section>

<!-- 2 end  -->


<!-- 3 begin -->
<section id="crab_3" class="aui-content" style="margin-bottom:50px;">

<div class="aui-card-list ">
    <div class="aui-card-list-header aui-card-list-user">
        <div class="aui-card-list-user-avatar">
            <img src="/images/crab.png">
        </div>
        <div class="aui-card-list-user-name">
            <div class="aui-font-size-16">C.豪华装 <i class="aui-iconfont aui-icon-right aui-font-size-12"></i></div>
            <small class="aui-font-size-14 aui-text-danger">￥468</small>
        </div>
        <div class="aui-card-list-user-info">原生态 高品质 送亲朋送好友<br/><span style="margin-left:2.5rem">吃的健康 购的安心送礼的不二选择</span></div>
    </div>

<div class="aui-row">

<div class="aui-col-xs-3">
<div class="checklist" > <input class="aui-radio" type="radio" value="3" name="radio" ></div>
</div>

<div class="aui-col-xs-9">

    <div class="aui-card-list-content aui-border-t" >

        <ul class="aui-list aui-list-noborder">
   
        
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">重量:4两</div>
                    <div class="aui-list-item-title aui-font-size-14 goods-title">种类:公</div>

                    <div class="aui-list-item-right goods-price">4只</div>
                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">重量:3两</div>
                    <div class="aui-list-item-title aui-font-size-14 goods-title">种类:母</div>
                    <div class="aui-list-item-right goods-price">4只</div>
                </div>
            </div>
        </ul>
    </div>
    <div class="aui-card-list-footer aui-border-t">
    <div></div>
    <div>
        <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning"  >数量</div>
        <!-- <div class="aui-btn aui-btn aui-btn-outlined aui-btn-warning">评价得积分</div> -->

    <div class="aui-bar aui-bar-btn" style="width:50%;float:right;" type="count">
    <div class="aui-bar-btn-item aui-font-size-20">
        <i class="aui-iconfont aui-icon-minus"></i>
    </div>
    <div class="aui-bar-btn-item">
        <input type="number" readonly="readonly" class="aui-input aui-text-center" id="count3" value="1">
    </div>
    <div class="aui-bar-btn-item aui-font-size-20">
        <i class="aui-iconfont aui-icon-plus"></i>
    </div>
</div>


    </div>
</div>
</div>
</div>

</section>

<!-- 3 end  -->

<footer class="aui-bar aui-bar-tab ">
        <div class="aui-bar-tab-item" tapmode onclick="crabmessage()" style="width: 3rem;">
            <i class="aui-iconfont aui-icon-comment aui-text-info"></i>
            <div class="aui-bar-tab-label aui-text-info">咨询</div>
        </div>
        <div class="aui-bar-tab-item aui-bg-warning aui-text-white " tapmode onclick="crabaddress()" style="width: 6rem;">
            <i class="aui-iconfont aui-icon-location aui-text-white"></i>
            <div class="aui-bar-tab-label aui-text-white" >我的收货地址</div>
        </div>
        <!-- <div class="aui-bar-tab-item aui-bg-warning aui-icon-location aui-text-white" tapmode style="width: auto;"></div> -->
        <div class="aui-bar-tab-item aui-bg-danger aui-text-white" tapmode onclick="crabwxplay();" style="width: auto;">立即购买</div>
    </footer>




</body>
<script type="text/javascript" src="/script/api.js"></script>
 <script type="text/javascript" src="/script/jquery.min.js"></script>
<script type="text/javascript" src="/script/aui-tab.js"></script>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/script/aui-slide.js"></script>
<script type="text/javascript" src="/script/video.min.js"></script>	
<!-- <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script> 使用微信的时候启用-->
<script type="text/template" id="payconf">

<div class="aui-card-list-content aui-border-t" >

        <ul class="aui-list aui-list-noborder">
   
        
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">套餐:家庭装</div>

                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">数量:3</div>
           
                </div>
            </div>
            <div class="aui-list-item aui-padded-l-0">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title aui-font-size-14 goods-title">金额:￥468</div>
                </div>
            </div>
        </ul>
    </div>
<div class="aui-bar-tab-item aui-bg-danger aui-text-white" style="width:auto;margin:0 auto">立即付款</div>



</script>

<script>

//触摸

apiready = function(){
        api.parseTapmode();
}


var userName, //收货人
postalCode, //邮编
provinceName, //省
cityName, //城市
countryName,//区
detailInfo,//详细地址
telNumber;//手机号码




layui.use(['jquery','layer'], function() {

   // $=	layui.jquery;

    layer=layui.layer;



//公告层
layer.open({
    type: 1
    ,title: false //不显示标题栏
    ,closeBtn: false
    ,area: '300px;'
    ,shade: 0.8
    ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
    ,resize: false
    ,btn: ['亲,我明白了']
    ,btnAlign: 'c'
    ,anim: 6
    ,isOutAnim: false 
    ,moveType: 0 //拖拽模式，0或者1
    ,content: '<div style="padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 180;font-size:0.75rem">江浙沪皖顺丰包邮<br/>其他地区+15元顺丰包邮<br/><br/>1.选择或新增我的收货地址<br/>2.选择套餐<br/>3.选择套餐数量<br/>4.点击立即购买<br/><br/>如果遇到什么问题可以点击咨询</div>'
 
  });


});


//支付
function crabwxplay()
{
  
var item = $(":radio:checked"); 
var len=item.length; 
if(len>0){ 

    //测试數據
    userName='Pozm',
    telNumber=13712841283,
    provinceName='上海市'
    //测试數據

//如果这2个信息是空的说明没有找到收货人和联系方式
if(userName==undefined &&telNumber==undefined)
{
   //自定页
layer.open({
  type: 1,
  title:'感蟹有您温馨提示',
  skin: 'confim-class', //样式类名
  //closeBtn: 0, //不显示关闭按钮
  anim:6,
  shadeClose: true, //开启遮罩关闭
  content: '<div style="padding: 25px; line-height: 30px;color:#737372;font-size:0.70rem">请点击底部我的收货地址<br/>选择或新增收货地址</div>'

});
}
else{

var money=0;
//获取选择的数据的值进行转换
var count = parseInt(document.getElementById("count"+$(":radio:checked").val()).value);

//江浙沪皖包邮,其他另外+15元
var postal=new Array("江苏省","浙江省","上海市","安徽省");

var ispostal=$.inArray(provinceName, postal);//判断选择的省份是否在定义的包邮列表中
//返回-1表示不在包邮列表中
if(ispostal==-1)
{
    money=money+15;
    postalstr='<div>快递费:￥15</div>';
}
else
{
    postalstr='<div>快递费:￥0</div>';
}





//这里说明有地址有联系方式,可以进行支付动作了.
layer.open({
  type: 1,
  title:'支付前信息确认',
  skin: 'confim-class', //样式类名
  closeBtn: 0, //不显示关闭按钮
  anim: 2,
  shadeClose: true, //开启遮罩关闭
  content: $('#crab_'+ $(":radio:checked").val())
});





}
} 

}



//发起访问微信地址,简易输入,调用共享收货地址接口
function crabaddress()
{

//     wx.openAddress({
//     success: function (res) {
//          userName = res.userName; // 收货人姓名
//          postalCode = res.postalCode; // 邮编
//          provinceName = res.provinceName; // 国标收货地址第一级地址（省）
//          cityName = res.cityName; // 国标收货地址第二级地址（市）
//          countryName = res.countryName; // 国标收货地址第三级地址（国家）
//          detailInfo = res.detailInfo; // 详细收货地址信息
//          nationalCode = res.nationalCode; // 收货地址国家码
//          telNumber = res.telNumber; // 收货人手机号码
//     }
// });

layer.msg('发起访问微信共享地址', {
                offset: 'c',
                anim: 1
            });

}


//发起咨询
function crabmessage()
{
    //https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421140547
    
    layer.msg('发起咨询', {
                offset: 'c',
                anim: 1
            });

}




//关闭消息
function closeTips()
    {
        $('#tips-1').remove();
    }

//数量控件
    var bar = document.querySelectorAll(".aui-bar-btn");
    if(bar){
        for(var i=0; i<bar.length;i++){
            var d = bar[i];
            var tab = new auiTab({
                element:bar[i],
                repeatClick:true
            },function(ret){
                if(ret.dom.parentNode.getAttribute("type") && ret.dom.parentNode.getAttribute("type")=="count"){
                    var count = parseInt(document.getElementById("count"+$(":radio:checked").val()).value);
                    if(ret.index==2)return;
                    if(ret.index==1){
                        //Po Add 限制最少1份
                        if(count>1)
                        {
                         // document.getElementById("count"+$(":radio:checked").val()).value = count-1;
                         $('#count'+$(":radio:checked").val()).val(count-1);
                        }
                        else
                        {
                            layer.msg('数量不能为'+(count-1), {
                             offset: 'c',
                             anim: 6
                                  });
                        }
                    }
                    if(ret.index==3){
                         //Po Add 限制最多10份
                         if(count<30)
                        {
                        //document.getElementById("count").value = count+1;

                        $('#count'+$(":radio:checked").val()).val(count+1);

                        }
                        else
                        {
                            layer.msg('每人最多可以购买'+count, {
                             offset: 'c',
                             anim: 6
                                  });
                        }
                    }
                }
            });

        }
    }



    var myPlayer = videojs('my-video');
			videojs("my-video").ready(function(){
				var myPlayer = this;
				//myPlayer.play();
				var playerH= $(".aui-slide-node.bg-dark").outerHeight(true);
				var playerW= $(".aui-slide-node.bg-dark").outerWidth(true);
				myPlayer.width(playerW);
				myPlayer.height(playerH);
            });
            


    /*广告轮播*/
    var slide2 = new auiSlide({
        container: document.getElementById("aui-slide3"),
        // "width":300,
        "height": 210,
        "speed": 300,
        "autoPlay": 0, //自动播放
        "pageShow": true,
        "loop": false,
        "pageStyle": 'dot'
    
    });


</script>
</html>
