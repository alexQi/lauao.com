<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ShopAsset;

/* @var $this \yii\web\View */
/* @var $content string */

ShopAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="Robots" Content="All">
    <meta name="googlebot" content="All">
    <meta name="keywords" content="<?//= Html::encode($this->seoKeywords) ?>" />
    <meta name="description" content="<?//= Html::encode($this->seoDescription) ?>" />
    <meta name="author" content="DeathGhost" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name='apple-touch-fullscreen' content='yes'>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">

    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<?php $this->endBody() ?>
<div class="hoverCart">
    <a href="<?php echo Url::to(['shop/order/cart']); ?>">0</a>
</div>
<div style="height:1.2rem;"></div>
<nav>
    <a href="<?php echo Url::to(['shop/index/index']); ?>" class="homeIcon">首页</a>
    <a href="<?php echo Url::to(['shop/index/cates']); ?>" class="categoryIcon">分类</a>
    <a href="<?php echo Url::to(['shop/order/cart']); ?>" class="cartIcon">购物车</a>
    <a href="<?php echo Url::to(['shop/user/index']); ?>" class="userIcon">我的</a>
</nav>
</body>
</html>
<?php $this->endPage() ?>
