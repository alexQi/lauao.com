$('i.glyphicon-refresh-animate').hide();
function updateRoutes(r) {
    _opts.mailList.avaliable = r.avaliable;
    _opts.mailList.assigned = r.assigned;
    search('avaliable');
    search('assigned');
}

$('#inp-route').focus(function () {
    $('.new-email').removeClass('has-error');
});

$('#btn-new').click(function () {
    var $this = $(this);
    var mail  = $('#inp-route').val().trim();

    var emailReg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(!emailReg.test(mail))
    {
        $('.inp-route').attr('placeholder','邮箱为空或邮箱格式错误');
        $('.new-email').addClass('has-error');
        return false;
    }

    if (mail != '') {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), {mail: mail}, function (r) {
            $('#inp-route').val('').focus();
            updateRoutes(r);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});

$('.btn-assign').click(function () {
    var $this = $(this);
    var target = $this.data('target');
    var mail = $('select.list[data-target="' + target + '"]').val();

    if (mail && mail.length) {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), {mail: mail}, function (r) {
            updateRoutes(r);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});

$('#btn-refresh').click(function () {
    var $icon = $(this).children('span.glyphicon');
    $icon.addClass('glyphicon-refresh-animate');
    $.post($(this).attr('href'), function (r) {
        updateRoutes(r);
    }).always(function () {
        $icon.removeClass('glyphicon-refresh-animate');
    });
    return false;
});

$('.search[data-target]').keyup(function () {
    search($(this).data('target'));
});

function search(target) {
    var $list = $('select.list[data-target="' + target + '"]');
    $list.html('');
    var q = $('.search[data-target="' + target + '"]').val();
    $.each(_opts.mailList[target], function () {
        var r = this;
        if (r.indexOf(q) >= 0) {
            $('<option>').text(r).val(r).appendTo($list);
        }
    });
}

// initial
search('avaliable');
search('assigned');
