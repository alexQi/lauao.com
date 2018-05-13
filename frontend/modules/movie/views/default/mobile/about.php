<?php

use yii\helpers\Url;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>维尔斯社区 - 专业的影视创作人社区</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>


    <style type="text/css">
        body{word-wrap: break-word;}
        .img-rounded{ border-radius: 90px;width: 120px;height: 120px;margin-right: 20px}

        .fs_30_b{
            line-height: 1.5;
            -webkit-text-size-adjust: none;
            font-family: "PingFang SC", "Microsoft YaHei", "微软雅黑", STHeiti, sans-serif;

            font-size: 1rem;
            font-weight: 600;


        }



        .nav_li
        {
            padding: 18px 20px;
            border-bottom:1px solid #F7F7F7;

        }

        .nav_li a:hover{
            color: #e74b3b;
            font-weight: bold;
        }
        .list_data{ border-bottom:1px solid #F7F7F7;padding: 20px;display: flex;}

        .footer{

        bottom: 0px;
        text-align: center;
        color: #999;
        font-size: 8px;
        padding: 12px;
        background-color: #f1f1f1;
        margin-top: 25px;
        width: 100%;
        }
    </style>
</head>
<body>
<div class="nav">
    <div class="layui-row" style="margin: 10px 20px ">

        <div class="layui-col-xs3">
<img id="nav_btn"  src="./xinpian/images/nav_btn.png" style="color:#fff; position: absolute; width: 20px;height: 20px;top:10px
         "/>
        </div>

        <div class="layui-col-xs9 layui-col-xs-offset4">

                <img id="nav_btn"  src="./xinpian/images/blacklogo.png"/>
         </div>

   </div>
</div>


<div class="row">
    <div class="col-md-12">
        <ul class="media-list">
            <?php foreach ($memberList as $key => $value): ?>
                <li class="list_data" >
                    <a class="media-left" href="#">
                        <img class="img-rounded" src="<?php echo $value['avatar_url'] ?>">
                    </a>

                    <div class="media-body" style="line-height: 25px;text-align:left; ">
                        <h4 class="fs_30_b"><?php echo $value['name'] ?></h4>
                        <p><?php echo $value['desc'] ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="footer">
    <p>Copyright © 2017 - 2018 维尔斯. All rights reserved. </p>
</div>
<script language="javascript">

    layui.use(['layer','jquery'], function(){
        var layer = layui.layer;
        $=layui.jquery;
        //layer.msg('Hello World');

        $('#nav_btn').click(
            function(){
                var w=  $(document.body).width();
                layer.open({
                    type:1,
                    title: false, //不显示标题
                    content:$('.popup'),
                    offset:'lt',
                    closeBtn:0,
                    shadeClose:'yes',
                    shift:3,
                    area:w+'px',
                    isOutAnim: false
                });
            });

    });
</script>
</body>
<div class="popup" style="display: none">
    <ul >
        <li class="nav_li">
            <a href="<?php echo Url::to(['/movie/default/index']) ?>">作品</a>
        </li>
        <li class="nav_li">
            <a href="<?php echo Url::to(['/movie/default/about']) ?>">团队成员</a>
        </li>
        <div style="clear:both;"></div>
    </ul>
</div>

</html>