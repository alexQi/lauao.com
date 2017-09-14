/**
 * Created by alex on 17-8-8.
 */

yii.allowAction = function ($e) {
    var message = $e.data('confirm');
    return message === undefined || yii.confirm(message, $e);
};
// --- Delete action (bootbox) ---
yii.confirm = function (message, ok, cancel) {

    bootbox.confirm(
        {
            title  : '提示',
            message: message,
            buttons: {
                confirm: {
                    label: "OK"
                },
                cancel: {
                    label: "Cancel"
                }
            },
            callback: function (confirmed) {
                if (confirmed) {
                    !ok || ok();
                } else {
                    !cancel || cancel();
                }
            }
        }
    );
    // confirm will always return false on the first call
    // to cancel click handler
    return false;
};

function showAlert(msg){
    bootbox.alert({
        title: '<i class="fa fa-danger text-info"></i> 提示',
        buttons: {
            ok: {
                label: '我知道啦~',
                className: 'btn bg-olive'
            }
        },
        message: msg
    });
    return false;
}