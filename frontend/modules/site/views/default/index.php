<?php

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no,email=no,date=no,aItemress=no">
    <title>宛聆歌王投票</title>
    <link rel="stylesheet" type="text/css" href="/css/aui.css" />
    <link rel="stylesheet" type="text/css" href="/css/loader.css" />
    <link rel="stylesheet" type="text/css" href="/css/aui-slide.css" />

    <style>
        * {
            padding: 0;
            margin: 0;
            /*box-sizing: border-box;*/
        }

        .parent {
            /*padding: 2px;*/
        }

        .items {
            width: 100%;
            height: auto;
            position: relative;
        }

        .item {
            position: absolute;
        }

        .item>img {
            width: 100%;
            display: block;
        }

        .item>p {
            position: fixed;
            left: 0;
            bottom: 25px;
            top: 50px;
            width: 100%;
            height: 20px;
            text-align: center;
            line-height: 20px;
            background-color: rgba(249, 255, 127, 0.71);
        }

        .mychart {

            background: url(/images/mychart.jpg) no-repeat scroll -120px -10px;;
            height: 100%;


        }

        .person span {
            /*background-color: #f5f5f5;*/
            background-position: 5px center;
            background-repeat: no-repeat;
            border-radius: 50px;
            /*padding: 0 7px 0 26px;*/
            height: 50px;
            width: 50px;
            font-size: 14px;
            line-height: 24px;
            cursor: pointer;
            position: absolute;
            z-index: 9;
            visibility: hidden;
            bottom: 10px;
            right: 20px;
        }

        .person:hover span {
            visibility: visible;
        }

        .person span:hover {

            /*border: 1px solid #39f;*/
        }

        .wlplayer{
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAERUlEQVRoQ+2ZjVEVQQzHkwrUCoQKlAqUCpQKxA6wAqECsQKhAqECpQKxAqECsYI4P2bD5Pbt3X68hw4zZOZG597ebv7JPx8bVB646APXXx4B4EEzeyoir0TktYi8FJGt9EQHX4kIz3ceVb3YhPfX8oCZofA7EXkrIoDokRsRORORz6p62fNhXDsEICn+MVl89Oz4HV75MAKkC0CiyicR2S9ofZ0sijJY90pVoQwUc0rhJbzF86Swx6GqHvVYpBmAmcHtrwVun4rIca/1khcPRORNpjB02nPwNTBNANJhKB95ThDutx40p0ja+zAlAV+GB3dbjFIFkCz/I1Pgvaqe1KzT87uZ4Q3o2QViEUBS/luw/B8Ct8UyPcr7WjMjNjCMxwee2Fny8iyAFLBYngBEUH5LVdn03iQZjUTgIC5VdWfuwCUAWIIc74IlhvN1D+LkCWLO5UhViZMVKQJIgQV1XDbO+RogM0Nhao3LdolKcwBQniqLXKiq/7927kZ/NzM8/iJteqqqK/VnBUDB+kXkuaZm5pmKigqH15YWXUoAIveLqEuamZmF9+wBkLUD3swwBo0iQt9Eur2TEoDfIW02B24GgANQ/kBVqdTDkgU07cn2LIBs8bWqegqtKlAA4N8MN2pskNI5RnWZGHXigSzym+mTDooUKgE+FhHSYTetzIy223smqMlet5IDiHyjoeLDJlnwQPye7hQFmvdNxokpdRIHOYBfofLSTDVnk0YAkVbUltt2uyZZNpqk9RxApEFT+vTDOwH4Z1gWiy7SagiAqlY71Wi5QQBswf14d8kL6UIEO5AbVX02FwN3HviHAKrJImvpJ9nxf1KI7pY6Ub1X9FAo9h73GcQUN5RvSqlZfVoM4vtOoz+T4s3ZrTeNxnxb5WZHEEMXJg53BaiWOrO9o2EnrX0eA7TNfg+YRHvtwIUsdJ6s3pTz83MKrcQkvZeaOXjp17nmOCgAYE7E1KKLLgUA3AG+pPcr/VmtnT5T1b2a9RNPPQVDF+ZExStgy14ZfbhnMJNCJn0QL0oA6EC9aLCmyQupb2f92rOiUN2j9Xm90h3MXSlj0FQrZa9VW9ebWezN2q6UiQ65F1Zc16rE6Dozg/d+B54d6SyNVfKpQFd7Pap4MmBOnVkD1iZzsTI3zyvXVJ7pXJwJnasq74pSAwCVABFHfRSSrgtJKyAzyy1P5WaUOdtyVFvmwqgPfbrn+DUQGedZ3jTKrAJInCQPx3klr6mseGPdQsX4kniLA4Sq5d0gTQBCZoI6PinzPQBAj0OX2Npd8ncGLunMeLxI+X60HtSSpr2aAYTigrU4uPQnIgASMzwoQDuBsqzlX5Sl3yqNKocavm4AwRsAidPrGs2Xfu+6H8SNhgAEb8BbvEGae96JAO9AvZNWupT2XwtA3DBlK6gBKOe1B6a30k4v2pOh9joHsTEAndbf2PJHABsz5eBGfwE8ag9PEPr50wAAAABJRU5ErkJggg==");
        }

        .btnplayer{
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAERUlEQVRoQ+2ZjVEVQQzHkwrUCoQKlAqUCpQKxA6wAqECsQKhAqECpQKxAqECsYI4P2bD5Pbt3X68hw4zZOZG597ebv7JPx8bVB646APXXx4B4EEzeyoir0TktYi8FJGt9EQHX4kIz3ceVb3YhPfX8oCZofA7EXkrIoDokRsRORORz6p62fNhXDsEICn+MVl89Oz4HV75MAKkC0CiyicR2S9ofZ0sijJY90pVoQwUc0rhJbzF86Swx6GqHvVYpBmAmcHtrwVun4rIca/1khcPRORNpjB02nPwNTBNANJhKB95ThDutx40p0ja+zAlAV+GB3dbjFIFkCz/I1Pgvaqe1KzT87uZ4Q3o2QViEUBS/luw/B8Ct8UyPcr7WjMjNjCMxwee2Fny8iyAFLBYngBEUH5LVdn03iQZjUTgIC5VdWfuwCUAWIIc74IlhvN1D+LkCWLO5UhViZMVKQJIgQV1XDbO+RogM0Nhao3LdolKcwBQniqLXKiq/7927kZ/NzM8/iJteqqqK/VnBUDB+kXkuaZm5pmKigqH15YWXUoAIveLqEuamZmF9+wBkLUD3swwBo0iQt9Eur2TEoDfIW02B24GgANQ/kBVqdTDkgU07cn2LIBs8bWqegqtKlAA4N8MN2pskNI5RnWZGHXigSzym+mTDooUKgE+FhHSYTetzIy223smqMlet5IDiHyjoeLDJlnwQPye7hQFmvdNxokpdRIHOYBfofLSTDVnk0YAkVbUltt2uyZZNpqk9RxApEFT+vTDOwH4Z1gWiy7SagiAqlY71Wi5QQBswf14d8kL6UIEO5AbVX02FwN3HviHAKrJImvpJ9nxf1KI7pY6Ub1X9FAo9h73GcQUN5RvSqlZfVoM4vtOoz+T4s3ZrTeNxnxb5WZHEEMXJg53BaiWOrO9o2EnrX0eA7TNfg+YRHvtwIUsdJ6s3pTz83MKrcQkvZeaOXjp17nmOCgAYE7E1KKLLgUA3AG+pPcr/VmtnT5T1b2a9RNPPQVDF+ZExStgy14ZfbhnMJNCJn0QL0oA6EC9aLCmyQupb2f92rOiUN2j9Xm90h3MXSlj0FQrZa9VW9ebWezN2q6UiQ65F1Zc16rE6Dozg/d+B54d6SyNVfKpQFd7Pap4MmBOnVkD1iZzsTI3zyvXVJ7pXJwJnasq74pSAwCVABFHfRSSrgtJKyAzyy1P5WaUOdtyVFvmwqgPfbrn+DUQGedZ3jTKrAJInCQPx3klr6mseGPdQsX4kniLA4Sq5d0gTQBCZoI6PinzPQBAj0OX2Npd8ncGLunMeLxI+X60HtSSpr2aAYTigrU4uPQnIgASMzwoQDuBsqzlX5Sl3yqNKocavm4AwRsAidPrGs2Xfu+6H8SNhgAEb8BbvEGae96JAO9AvZNWupT2XwtA3DBlK6gBKOe1B6a30k4v2pOh9joHsTEAndbf2PJHABsz5eBGfwE8ag9PEPr50wAAAABJRU5ErkJggg==");
        }
        .btnpause{
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAADw0lEQVRoQ+2Zj1UTQRDGZypQKxAqUCoQKhArUCoQKxAqECoQKhAqECsQKhAqECoY3++ciZvN3mUvuVwIz3nvIJC7vf1mvvm7KhsuOuT+zey5iLwSkS2/0uVvRYTrRlXvh3rv0gDM7LWIvBeRXRHhc41ci8iViJyrKp8XloUBmBmbPipouu9msMqRqp73fZD7ewPo2PiDazW0W9pPWInfz7IbAPJJVS/6AKkG4Pz+5lRJ34HmzlQVSlSLmQHig9MvfY513tX6SRUA5/l3EcFJQ45F5KT2RW3IzAyHh4pQMgQn36vxj7kAzAwtfU0Wv0FzNYtXm0NEXElnHsV4FBBQiv+1SieAwuaJGgBamZgZG06tcdAFohWAcxTahHQuNCQiMzsUkS++ZiedigDcYX8lnB9t86GIAojtkr+1AUDzRAlk5bTpcPCUTlequpffOwPAzPZFhHCJkPZrs+uQLJqsZWbkFcoThPA6lSdKAKAOoQ3ZGTra9EXp0emnP3erqtvpGlMAsqhzrKrE57VLFpmm/DEHENqnLNhaNkkNhdyTHXtDpqwwAZCZqtpxzQwrfc42SxadKi0KYZlHqq2cWWFC7RTAiYh87Mv9EQGkweVUVckV/6pRM8NRiDgPqprWPJ1MGAsAmzAzkhpV7LWq7kwAeOL67Tu9VFXQVsnIAAihb5uNqzbsaX5k/KzmpT87ig8U3tX4WQBIK84ZB+wyxcgWSP2gCacBINXiYwZAeRMFZsOU/wBGptDTtcAmOnFTmT6ZMErm3dxE5kkiGod7VX1RlYb/JsExExlKRtmTRqutmKvOBWMByDrFYjFHIRedz+aV004j5pMvnT5MAfh77ZI1NFN9eldLWW2FVSOsbikLVngMTX2afe9UNQYOjd7mjVUmjcOqtVxa3/sUircY7cwfq7gV6Gff+KKMzg/WBIChcsxii41W12gRB45DCKbE9MyjSRae77BC9WjRrYDZsESAOFTV0zEQmBlTjphJMeLZbRuw9R2vM6vEGoOdMqYKcc4zlU5H+DO8T5+pPeCAPmEJSg7auaVOF3NLel/O5sNh0TwHKZ1nZnMBtNCJf2MN2rqlkp0nKSiTah3O79coqQqAg6CIQhsRnUKJALlQ1cs+/mFmjEdo0vMTH9ZB81U0rQYQm/OiCkpFyRFf8UKcHmpx5RtAAdCDi+SUD8/QOhvvddrZG0ACBM0x3ovZfR8DpPdyaMhpZ+dhXtviCwNIgKBRqMBVC+aHWwvqLRUMlgbQEk2CLunXDa36UmSeWQcHMO+FQ3//B59HaE+x1ofPAAAAAElFTkSuQmCC");		}
        /*.loadMore{
        width: 100%;
        height: 30px;
        text-align: center;
        line-height: 30px;
        background-color: #ffa87f;
    }*/

        .myvote {
            z-index: 10;
            position: fixed;
            right: 0px;
            border-bottom-left-radius: 25px;
            border-top-left-radius: 25px;
            background: #FF6666;
            height: 50px;
            width: 120px;
            opacity: 0.9;
            filter: Alpha(opacity=90);
            /* IE8 以及更早的浏览器 */
        }

        .myvote a {
            color: white;
            position: absolute;
            right: 10px;
            top: 15px;
            font-size: 15px;
        }

        .myvotenum
        {
            position:absolute;
            top:5px;
            left: 5px;
            height: 30px;
            width:70px;
            padding: 5px;
            text-align: center;
            border-bottom-right-radius: 20px;
            color: white;
            background:red
        ;opacity: 0.5;
            filter: Alpha(opacity=50);

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

<div id="aui-slide3">
    <div class="aui-slide-wrap">
        <?php foreach($advertList  as $key=>$value):?>

        <div class="aui-slide-node bg-dark">
            <img src="<?php echo $value['file_url']; ?>" />
        </div>
        <?php endforeach;?>
    </div>
    <div class="aui-slide-page-wrap">
        <!--分页容器-->
    </div>
</div>

<div class="mychart">

    <br/>

    <div style="margin: 0 auto; background:#FF6666;width:260px ;margin-bottom:8px;padding:10px;font-size: 15px;border-radius: 20px;text-align: center;color: white;">

        <li id="chartouttime" style="padding:5px;">倒计时:19天22小时22分钟</li>
    </div>

    <div class="aui-content-padded aui-card-list " style="margin-bottom: 0px;">

        <div class="aui-card-list-header aui-border-b">
            排行榜
        </div>

        <div class="aui-card-list-content">
            <section class="aui-grid aui-margin-b-15">
                <div class="aui-row">
                    <div class="aui-col-xs-4">

                        <div class="aui-badge">1</div>
                        <i class="aui-iconfont aui-icon-home"></i>
                        <div class="aui-grid-label"><?php echo $activityInfo['TopThree'][0]['apply_name']; ?></div>
                    </div>
                    <div class="aui-col-xs-4">
                        <div class="aui-badge">2</div>
                        <i class="aui-iconfont aui-icon-gear"></i>
                        <div class="aui-grid-label"><?php echo $activityInfo['TopThree'][1]['apply_name']; ?></div>
                    </div>
                    <div class="aui-col-xs-4">
                        <div class="aui-badge">3</div>
                        <i class="aui-iconfont aui-icon-map"></i>
                        <div class="aui-grid-label"><?php echo $activityInfo['TopThree'][2]['apply_name']; ?></div>
                    </div>
                </div>
            </section>

        </div>

    </div>

    <section class="aui-grid">
        <div class="aui-col-xs-6 aui-border-r">

            <i class="aui-iconfont aui-icon-my aui-text-danger "></i> 参赛选手:<?php echo $activityInfo['countApply']; ?>

        </div>
        <div class="aui-col-xs-6">

            <i class="aui-iconfont aui-icon-laud aui-text-danger">	</i>总投票:<?php echo $activityInfo['countVotes']['count_votes']?$activityInfo['countVotes']['count_votes']:0; ?>
        </div>
    </section>


</div>







<div class="aui-searchbar" id="search">
    <div class="aui-searchbar-input aui-border-radius">
        <i class="aui-iconfont aui-icon-search"></i>
        <input type="search" placeholder="搜索参赛选手号码进行投票" id="search-input">
        <div class="aui-searchbar-clear-btn">
            <i class="aui-iconfont aui-icon-close"></i>
        </div>
    </div>
    <div class="aui-searchbar-btn" tapmode>取消</div>
</div>



<div class="seachperson" style="margin: 10px; display: none;">

    <div class="aui-card-list" style="margin-bottom: 0px;">

        <div class="aui-collapse-item">
            <div class="aui-card-list" style="margin-bottom: 0px;">
                <div class="aui-card-list-header aui-collapse-header" tapmode>
                    <div class="aui-iconfont aui-icon-my">
                        12号</div>
                    <i class="aui-iconfont aui-icon-down aui-collapse-arrow"></i>
                </div>
                <div class="aui-card-list-content-padded aui-collapse-content">
                    <div class="aui-row aui-row-padded">
                        <p>姓名:我是搜索来的</p>
                        <p>介绍:我是搜索得出来的</p>

                    </div>
                </div>
            </div>
        </div>
        <!-- </div>-->

        <div class="aui-card-list-content aui-padded-5">
            <div class="person">
                <div class="myvotenum">888</div>
                <img class="personimg" src="/images/zovz9_kqyuwtdykfbgo2dwgfjeg5sckzsew_290x383.jpg_200x999.jpg" alt="">
                <span class="wlplayer">

                <audio id="12"  preload="none">
                	<source src="/music/0f82285d8dd225392721813f52218717[1].mp3" type="audio/mpeg">
                </audio>

                </span>
            </div>
        </div>
        <div class="aui-card-list-footer aui-border-t">

            <div class="aui-text-danger" style="margin: 0 auto;">
                <div class="voteyes">
                    <i class="aui-iconfont aui-icon-laud aui-text-danger"></i>
                    投Ta一票
                </div>
            </div>
        </div>
    </div>
</div>

<div class="parent">

    <div class="items">
    </div>

    <div class="box">
        <div class="loader">
            <span class="loadMore"></span>
            <div class="loading-2">
                <i></i>
                <i></i>
                <i></i>
                <i></i>
                <i></i>
                <i></i>
                <i></i>
            </div>
        </div>
    </div>

</div>

<div class="myvote" style="	bottom:120px;">
    <a href="about.html">活动介绍</a>
</div>

<div class="myvote" style="	bottom:50px;">
    <a href="join.html">我要报名</a>
</div>
<footer class="my-footer">本次活动最终解释权归宣城宛聆音乐</footer>
<script type="text/template" id="water">
    <% for(var i=0;i< items.length;i++){%>
    <div class="item">

        <div class="aui-card-list" style="margin-bottom: 0px;">

            <div class="aui-collapse-item">
                <div class="aui-card-list" style="margin-bottom: 0px;">
                    <div class="aui-card-list-header aui-collapse-header" tapmode>
                        <div class="aui-iconfont aui-icon-my">
                            <%= items[i].id%> 号</div>
                        <i class="aui-iconfont aui-icon-down aui-collapse-arrow"></i>
                    </div>
                    <div class="aui-card-list-content-padded aui-collapse-content">
                        <div class="aui-row aui-row-padded">
                            <p>姓名:<%= items[i].name%></p>
                            <p>介绍:<%= items[i].desc%></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div>-->

            <div class="aui-card-list-content aui-padded-5">
                <div class="person">
                    <div class="myvotenum vote-num-<%= items[i].id%>"><%= items[i].votes%></div>
                    <img class="personimg" src="<%= items[i].icon%>" alt="">
                    <span class="wlplayer">
                        <audio id="<%= items[i].id%>"  preload="none">
                            <source src="<%= items[i].music%>" type="audio/mpeg">
                        </audio>
                    </span>
                </div>
            </div>
            <div class="aui-card-list-footer aui-border-t">

                <div class="aui-text-danger" style="margin: 0 auto;">
                    <div class="voteyes" data-id="<%= items[i].id%>">
                        <i class="aui-iconfont aui-icon-laud aui-text-danger"></i>
                        <small>投Ta一票</small>
                    </div>
                </div>
                <!--<div class="aui-text-danger aui-list-item-right">
                    <i class="aui-iconfont aui-icon-like aui-text-danger"></i>
                    <samll>8888</samll>
                </div>-->
            </div>
        </div>
    </div>

    </div>
    <%}%>

</script>

</body>

<!--<script src="script/template-web.js"></script>-->
<script type="text/javascript" src="/script/jquery.min.js"></script>
<script type="text/javascript" src="/script/template-native.js"></script>
<script type="text/javascript" src="/script/water.js"></script>
<script type="text/javascript" src="/script/aui-slide.js"></script>
<script type="text/javascript" src="/layui/layui.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>


<script>

		/*加載Layer模塊*/
    	layui.use(['layer'], function(){
			var layer = layui.layer
		});	
    

    var Hispalyer = null; //記錄只播放一個播放器.

    function loadData(currentPage) {
        if($(".loadMore").hasClass("loading")) {
            return;
        }
        $.ajax({
            type: "get",
            url: "<?php echo Url::to(['/ajax/default/user-list'])?>",
            data: {
                page: currentPage
            },
            beforeSend: function() {

                $(".loadMore").addClass("loading");
            },
            success: function(result) {
                if (result){
                    var html = template("water", {
                        "items": result
                    });

                    $(".items").append(html);

                    $(".loadMore").attr("page", currentPage);

                    $(".items").waterFall({
                        col: 2,
                        pad: 7
                    });
                }else{
                    $(".loadMore").removeClass("loading");
                }

            },
            complete: function() {

                $(".loadMore").removeClass("loading");
            }
        });
    }

    loadData(1);

    //Wenxin SDK
    wx.ready(function() {});

    $(".voteyes").live("click", function() {
        var id = $(this).attr('data-id');
        var user = '11';
        $.get('<?php echo Url::to(['/ajax/default/do-vote'])?>?id='+id+'&vote_user='+user,function(data,status){

            if (data.state==1)
            {
                $('.vote-num-'+id).html(data.vote_num);
            }
           // layer.open({
             //   content : data.message,
             //   skin    : 'msg',
             //   time    : 3 //2秒后自动关闭
           // });
			
			layer.msg( data.message,{
			offset: 'c',
			anim:1
			});
     

    });
    
    });

    $(".items,.seachperson").on("click",".person", function(e) {


            if($(e.target).hasClass("wlplayer"))
            {
                var media = $(this).find("audio")[0]; //找到當前對象下的audio標籤

                /*判斷是否有來源文件*/
                if(media.currentSrc != '')
                {
                    if(Hispalyer != null && media.paused) {
                        Hispalyer.pause();
                        Hispalyer = null;

                        $(".wlplayer").addClass("btnplayer");

                        $(".wlplayer").removeClass("btnpause");
                    }

                    if(media.paused) {
                        media.play();
                        Hispalyer = media;

                        $(".wlplayer").addClass("btnplayer");

                        $(e.target).removeClass("btnplayer");

                        $(e.target).addClass("btnpause");

                    } else {
                        media.pause();
                        $(e.target).removeClass("btnpause");

                        $(e.target).addClass("btnplayer");

                    }

                }
            }
        }
    );

    $(".aui-collapse-header").live("click", function() {

        if(this.nextElementSibling.className.indexOf("aui-collapse-content") > -1) {
            if(this.nextElementSibling.className.indexOf("aui-show") > -1) {
                this.nextElementSibling.classList.remove("aui-show");
                this.classList.remove("aui-active");
            } else {

                this.nextElementSibling.classList.toggle("aui-show");
                this.classList.toggle("aui-active");
            }
        }
    });

    watershow();

    /*定時處理即時調整樣式*/
    function watershow() {
        $(".items").waterFall({
            col: 2,
            pad: 7
        });
        setTimeout(watershow, 300); //water是指本身,延时递归调用自己,100为间隔调用时间,单位毫秒
    }

    /*实现自动滚动加载*/
    $(window).on("scroll", function() {

        var offsetTop = $(".items").offset().top;
        var itemsHeight = $(".items").height();

        var windowScrollTop = $(this).scrollTop();
        var windowHeight = $(this).height();

        var offset = offsetTop + itemsHeight - windowScrollTop - windowHeight;
        if(offset <= 100 && !$(".loadMore").hasClass("loading")) {
            var cp = $(".loadMore").attr("page");
            cp++;
            loadData(cp);
        }
    });

    /*广告轮播*/
    var slide2 = new auiSlide({
        container: document.getElementById("aui-slide3"),
        // "width":300,
        "height": 150,
        "speed": 300,
        "autoPlay": 2000, //自动播放
        "pageShow": true,
        "loop": true,
        "pageStyle": 'dot',
        'dotPosition': 'center'
    });

    /*搜索选手*/
    var searchBar = document.querySelector(".aui-searchbar");
    var searchBarInput = document.querySelector(".aui-searchbar input");
    var searchBarBtn = document.querySelector(".aui-searchbar .aui-searchbar-btn");
    var searchBarClearBtn = document.querySelector(".aui-searchbar .aui-searchbar-clear-btn");
    if(searchBar) {
        searchBarInput.onclick = function() {
            searchBarBtn.style.marginRight = 0;
        }
        searchBarInput.oninput = function() {
            if(this.value.length) {
                searchBarClearBtn.style.display = 'block';
                searchBarBtn.classList.add("aui-text-info");
                searchBarBtn.textContent = "搜索";
            } else {
                searchBarClearBtn.style.display = 'none';
                searchBarBtn.classList.remove("aui-text-info");
                searchBarBtn.textContent = "取消";
            }
        }
    }
    searchBarClearBtn.onclick = function() {
        this.style.display = 'none';
        searchBarInput.value = '';
        searchBarBtn.classList.remove("aui-text-info");
        searchBarBtn.textContent = "取消";
    }
    searchBarBtn.onclick = function() {
        var keywords = searchBarInput.value;
        if(keywords.length) {
            searchBarInput.blur();
            //document.getElementById("search-keywords").textContent = keywords;
            $(".seachperson").css("display",'block');

        } else {
            this.style.marginRight = "-" + this.offsetWidth + "px";
            searchBarInput.value = '';
            searchBarInput.blur();
            $(".seachperson").css("display",'none');
        }
    }


    /*Touch事件*/
    //To solve PR-198
    $(".personimg").live("touchstart", touchStart);
    // $(".pr-account-tab").on("touchmove", touchMove);
    $(".personimg").live("touchend", touchEnd);
    //$(".personimg").live("mouseover", touchStart);
    //$(".personimg").live("mouseout", touchEnd);

    function touchStart(event) {
//		$(this).addClass("btnplayer");

    }

    // function touchMove(event) {
    //   // $("pr-account-tab-mobile").html("You are moving");
    //   // $(this).addClass("pr-account-tab-mobile");
    // }

    function touchEnd(event) {
        //$(this).removeClass(".person:hover span");


//				if(Hispalyer != null) {
//					Hispalyer.pause();
//					Hispalyer = null;
//				$(".wlplayer").addClass("btnplayer");
//				$(".wlplayer").removeClass("btnpause");
//			}

    }
    /*投票彈窗*/
</script>

</html>