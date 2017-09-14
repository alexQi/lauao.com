<?php
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<div class="box box-success direct-chat direct-chat-success">
    <div class="box-header with-border">
        <h3 class="box-title">Direct Chat</h3>

        <div class="box-tools pull-right">
            <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="3 New Messages">3</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                <i class="fa fa-comments"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-dismiss="modal"><i class="fa fa-times"></i></button>
<!--            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages">
            <?php foreach($messageList  as $key=>$value):?>
            <div class="direct-chat-msg <?php echo $value['from_user_id']==$from_user_id ? '':'right'; ?>">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"><?php echo $value['from_user_id']==$from_user_id ? $value['f_username']:$value['t_username']; ?></span>
                    <span class="direct-chat-timestamp pull-left"><?php echo date('H:i',$value['created_at']); ?></span>
                </div>
                <img class="direct-chat-img" src="<?= $directoryAsset ?>/img/user3-128x128.jpg" alt="Message User Image">
                <div class="direct-chat-text"><?php echo $value['content']; ?></div>
            </div>
            <?php endforeach;?>
        </div>
        <!--/.direct-chat-messages-->

        <!-- Contacts are loaded here -->
        <div class="direct-chat-contacts">
            <ul class="contacts-list">
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="<?= $directoryAsset ?>/img/user1-128x128.jpg" alt="User Image">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
            </ul>
            <!-- /.contatcts-list -->
        </div>
        <!-- /.direct-chat-pane -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <form action="#" method="post">
            <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control chat-message-content">
                <span class="input-group-btn">
                        <button type="button" class="btn btn-success btn-flat send-chat-message">Send</button>
                      </span>
            </div>
        </form>
    </div>
    <!-- /.box-footer-->
</div>
<script>
    //发送消息
    $('.send-chat-message').click(function () {
        var message = $('.chat-message-content').val();
        var userId = '<?php echo yii::$app->user->identity->id;?>';

        var data = {type:'message',data:{userId:userId,toUserId:'<?php echo $from_user_id;?>',content:message}};
        data = JSON.stringify(data);
        socket.send(data);

        var html = '<div class="direct-chat-msg right">';
        html += '<div class="direct-chat-info clearfix">';
        html += '<span class="direct-chat-name pull-right">Sarah Bullock</span>';
        html += '<span class="direct-chat-timestamp pull-left">'+(new Date()).getHours()+':'+(new Date()).getMinutes()+'</span>';
        html += '</div>';
        html += '<img class="direct-chat-img" src="<?= $directoryAsset ?>/img/user3-128x128.jpg" alt="Message User Image">';
        html += '<div class="direct-chat-text">'+message+'</div>';
        html += '</div>';

        $('.direct-chat-messages').append(html);

        $('.direct-chat-messages').scrollTop( $('.direct-chat-messages')[0].scrollHeight );
    });
</script>