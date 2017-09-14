<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php Modal::begin([
        'id'     => 'messageChat-modal',
        'header' => false,
        'footer' => false
    ]);?>
    <?php Modal::end();?>

    <script>
        //        $(document).on("click",".message-chat",function() {
        //            $.get($(this).attr("href"),
        //                function (data) {
        //                    $('#messageChat-modal').find('.modal-body').html(data);
        //                    $('#messageChat-modal').modal();
        //                }
        //            );
        //        });

        var socket;
        var log = function(msg) {
            showAlert(msg);
        };

        var initWebSocket = function() {
            if (window.WebSocket) {
                socket = new WebSocket("ws://127.0.0.1:9501");
                socket.onmessage = function(event) {
                    var res = JSON.parse(event.data);
                    if (res.type=='time'){
                        setInterval(function(){
                            var newDate = new Date();
                            newDate.setTime(res.data.time * 1000);
                            var year  = new newDate().getFullYear();
                            var month = new newDate().getMonth();
                            var day   = new newDate().getDate();
                            var hours = new newDate().getHours();
                            var minutes = new newDate().getMinutes();
                            var seconds = new newDate().getSeconds();
                            if(hours<10){
                                hours = '0'+hour;
                            }
                            if(minutes<10){
                                minutes = '0'+minutes;
                            }
                            if(seconds<10){
                                seconds = '0'+seconds;
                            }
                            $('.time-clock').text(year+'-'+month+'-'+day+' '+hours+":"+minutes+":"+seconds);
                            res.data.time += 1;
                        },1000);
                    }

                    if (res.type=='totalNotRead'){
                        $('.message-num').html(res.data.num);
                        $('.chat-num-notice').html("You have "+res.data.num+" messages");

                        var html = '<li>';
                        html += '<a href="<?php echo Url::to(['/message/default/chat']) ?>" class="message-chat" data-pjax="0" data-key="default" data-toggle="modal" data-target="#messageChat-modal">';
                        html += '<div class="pull-left">';
                        html += '<img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>';
                        html += '</div>';
                        html += '<h4>Support Team<small><i class="fa fa-clock-o"></i> 5 mins</small></h4>';
                        html += '<p>Why not buy a new awesome theme?</p>';
                        html += '</a>';
                        html += '</li>';

                        $('.chat-list').append(html);

                        $.each(res.data.data,function(data){
                            var html = '<li>';
                            html += '<a href="<?php echo Url::to(['/message/default/chat']) ?>" class="message-chat" data-pjax="0" data-key="default" data-toggle="modal" data-target="#messageChat-modal">';
                            html += '<div class="pull-left">';
                            html += '<img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>';
                            html += '</div>';
                            html += '<h4>Support Team<small><i class="fa fa-clock-o"></i> 5 mins</small></h4>';
                            html += '<p>Why not buy a new awesome theme?</p>';
                            html += '</a>';
                            html += '</li>';

                            $('.chat-list').append(html);
                        });
                    }

                    if (res.type=='message')
                    {
                        var html = '<div class="direct-chat-msg">';
                        html += '<div class="direct-chat-info clearfix">';
                        html += '<span class="direct-chat-name pull-right">Sarah Bullock</span>';
                        html += '<span class="direct-chat-timestamp pull-left">'+res.data.create_time+'</span>';
                        html += '</div>';
                        html += '<img class="direct-chat-img" src="<?= $directoryAsset ?>/img/user3-128x128.jpg" alt="Message User Image">';
                        html += '<div class="direct-chat-text">'+res.data.content+'</div>';
                        html += '</div>';

                        $('.direct-chat-messages').append(html);

                        $('.direct-chat-messages').scrollTop( $('.direct-chat-messages')[0].scrollHeight );
                    }
                };
                socket.onopen = function(event) {
                    var userId = '<?php echo yii::$app->user->identity->id;?>';
                    var data   = {type:'init',data:{userId:userId}};
                    data = JSON.stringify(data);
                    socket.send(data);
                };

                socket.onclose = function(event) {
//                    log("Web Socket closed.");
                };
                socket.onerror = function(event) {
//                    log("Web Socket error.");
                };
            } else {
                log("Your browser does not support Web Socket.");
            }
        };
        window.onload = function() {
//            initWebSocket();
        }
    </script>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
