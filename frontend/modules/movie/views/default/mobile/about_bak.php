<?php

use yii\helpers\Url;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>维尔斯</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand pull-right" href="#">维尔斯</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo Url::to(['/movie/default/index']) ?>">作品</a></li>
                <li class="active"><a href="<?php echo Url::to(['/movie/default/about']) ?>">成员</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-12">
        <ul class="media-list">
            <?php foreach ($memberList as $key => $value): ?>
                <li class="media" style="border-bottom: 1px solid #cecece;padding: 5px;display: flex">
                    <a class="media-left" href="#">
                        <img class="media-object img-rounded" width="80" src="<?php echo $value['avatar_url'] ?>">
                    </a>
                    <div class="media-body" style="margin-right: 50px;">
                        <h4 class="media-heading"><?php echo $value['name'] ?></h4>
                        <p><?php echo $value['desc'] ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>