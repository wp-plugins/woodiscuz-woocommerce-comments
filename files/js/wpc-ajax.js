jQuery(document).ready(function ($) {
    var wpc_home_url = $('#wpc_home_url').val();
    var wpc_plugin_dir_url = $('#wpc_plugin_dir_url').val();
    var wpc_name;
    var wpc_email;
    var wpc_comment;
    var wpc_captcha;
    var wpc_comment_post_ID;
    var wpc_comment_parent;
    var wpc_form;
    var wpc_submitID;
    var wpc_comments_offset;
    var wpc_new_comment_id;

    $(".wpc_comment").autoGrow();

    wpc_comments_offset = $('#wpc_comments_offset');
    wpc_comments_offset.val('1');

    $('.wpc_comment').live('focus', function () {
        var uniqueID = getUniqueID($(this));
        $('#wpc-form-footer-' + uniqueID).slideDown(700);
    });


    $('.wpc-reply-link').live('click', function () {
        var uniqueID = getUniqueID($(this));
        $('#wpc-secondary-forms-wrapper-' + uniqueID).slideToggle(700);
    });

    $('.wpc-share-link').live('click', function () {
        var uniqueID = getUniqueID($(this));
        $('#share_buttons_box-' + uniqueID).slideToggle(1000);
    });

    $('.wpc_captcha_refresh_img').live('click', function () {
        var uniqueID = getUniqueID($(this));
        var wpc_commpost_ID = $('#wpc_comment_post_ID-' + uniqueID).val();
        var wpc_commparent = $('#wpc_comment_parent-' + uniqueID).val();
        $("#wpc_captcha_img-" + uniqueID).attr("src", wpc_home_url + "/" + wpc_plugin_dir_url + "/captcha/captcha.php?comm_id=" + wpc_commpost_ID + '-' + wpc_commparent + '&r=' + Math.random());
    });

    $('.wpc_comm_submit').live('click', function () {

        wpc_submitID = $(this).attr('id');
        var uniqueID = wpc_submitID.substring(wpc_submitID.lastIndexOf('-') + 1);
        wpc_name = $('#wpc_name-' + uniqueID).val();
        wpc_email = $('#wpc_email-' + uniqueID).val();
        wpc_comment = $('textarea#wpc_comment-' + uniqueID).val();
        wpc_captcha = $('#wpc_captcha-' + uniqueID).val();
        wpc_comment_post_ID = $('#wpc_comment_post_ID-' + uniqueID).val();
        wpc_comment_parent = $('#wpc_comment_parent-' + uniqueID).val();
        wpc_form = $('#wpc_comm_form-' + uniqueID);

        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll(wpc_form)) {
            submit = false;
        } else {
            var modal = $('#wpc_response_info').modal();
        }

        if (submit) {
            $.ajax({
                type: 'POST',
                url: wpc_ajax_obj.url,
                data: {
                    name: wpc_name,
                    email: wpc_email,
                    comment: wpc_comment,
                    captcha: wpc_captcha,
                    comment_post_ID: wpc_comment_post_ID,
                    comment_parent: wpc_comment_parent,
                    action: 'comms_via_ajax'
                }
            }).done(function (response) {
                $("#wpc_captcha_img-" + uniqueID).attr("src", wpc_home_url + "/" + wpc_plugin_dir_url + "/captcha/captcha.php?comm_id=" + wpc_comment_post_ID + '-' + wpc_comment_parent + '&r=' + Math.random());
                var obj = $.parseJSON(response);
                wpc_new_comment_id = parseInt(obj.wpc_new_comment_id);
                if (obj.code === -1) {
                    $('#wpc_response_info').html(obj.message);
                } else if (obj.code === -2) {
                    $('#wpc_response_info').html(obj.message);
                    $('#wpc_comment-' + uniqueID).val('');
                    $('.wpc_comm_form textarea').css('height', '46px');

                    if (wpc_submitID === 'wpc_comm-' + wpc_comment_post_ID + '_0') {
                        $('#wpc-form-footer-' + uniqueID).slideToggle(700);
                    } else {
                        $('#wpc-secondary-forms-wrapper-' + uniqueID).slideToggle(700);
                    }
                    if (wpc_new_comment_id !== -1) {
                        emailNotification(wpc_comment_parent, wpc_new_comment_id);
                    }
                    $.cookie('wpc_author_name', wpc_name);
                    $.cookie('wpc_author_email', wpc_email);
                } else {
                    $('#wpc_comment-' + uniqueID).val('');
                    $('.wpc_comm_form textarea').css('height', '46px');

                    if (wpc_submitID === 'wpc_comm-' + wpc_comment_post_ID + '_0') {
                        $('.wpc-thread-wrapper').prepend(obj.message);
                        $('#wpc-form-footer-' + uniqueID).slideToggle(700);
                    } else {
                        $('#wpc-secondary-forms-wrapper-' + uniqueID).slideToggle(700);

                        if ($('#wpc-comm-' + uniqueID).hasClass('wpc-reply')) {
                            $('#wpc-secondary-forms-wrapper-' + uniqueID).after(obj.message.replace('wpc-reply', 'wpc-reply wpc-no-left-margin'));
                        } else {
                            $('#wpc-secondary-forms-wrapper-' + uniqueID).after(obj.message);
                        }
                    }
                    modal.close();
                    if (wpc_name !== '' && wpc_email !== '') {
                        $.cookie('wpc_author_name', wpc_name);
                        $.cookie('wpc_author_email', wpc_email);
                        $('#woopcomm .wpc_name').val(wpc_name);
                        $('#woopcomm .wpc_email').val(wpc_email);
                    }
                    if (wpc_new_comment_id !== -1) {
                        emailNotification(wpc_comment_parent, wpc_new_comment_id);
                    }
                }
                $('#wpc_captcha-' + uniqueID).val('');
                $('.wpc_tooltipster').tooltipster({offsetY: 2});
                $('.wpc_comm_form input').css('box-shadow', '0 0 4px -2px #d4d0ba');
                $('.wpc_comm_form textarea').css('box-shadow', '0 0 4px -2px #d4d0ba');
            });
        }
        else {
            return false;
        }
    });



    $('.wpc_vote').live('click', function () {
        var uniqueID = getUniqueID($(this));
        var commentID = getCommentID(uniqueID);
        var voteType;

        var modal = $('#wpc_response_info').modal();
        if ($(this).hasClass('wpc-up')) {
            voteType = 1;
        } else {
            voteType = -1;
        }

        $.ajax({
            dateType: 'json',
            type: 'POST',
            url: wpc_ajax_obj.url,
            data: {
                comment_ID: commentID,
                vote_type: voteType,
                action: 'vote_via_ajax'
            }
        }).done(function (response) {
            var obj = $.parseJSON(response);

            if (obj.code !== -1) {
                $('#vote-count-' + uniqueID).text(parseInt($('#vote-count-' + uniqueID).text()) + voteType);
                modal.close();
            } else {
                $('#wpc_response_info').html(obj.message);
            }
        });
    });

    $('.wpc-load-more-submit').live('click', function () {

        var modal = $('#wpc_response_info').modal();

        var wpc_comments_offset_value = wpc_comments_offset.val();
        var wpc_post_id = getPostID($(this).attr('id'));
        var wpc_parent_comments_count = parseInt($('#wpc_parent_comments_count').val());
        var wpc_parent_per_page = parseInt($('#wpc_parent_per_page').val());

        wpc_comments_offset_value = parseInt(wpc_comments_offset_value);
        wpc_comments_offset_value++;

        $.ajax({
            type: 'POST',
            url: wpc_ajax_obj.url,
            data: {
                comments_offset: wpc_comments_offset_value,
                wpc_post_id: wpc_post_id,
                action: 'load_more_comments'
            }
        }).done(function (response) {
            wpc_comments_offset.val(wpc_comments_offset_value);
            if (wpc_parent_comments_count <= (wpc_comments_offset_value * wpc_parent_per_page)) {
                $('.wpc-load-more-submit-wrap').remove();
            }
            $('.wpc-thread-wrapper').html(response);
            modal.close();
            $('.wpc_tooltipster').tooltipster({offsetY: 2});
        });
    });

    function getUniqueID(field) {
        var fieldID = field.attr('id');
        var uniqueID = fieldID.substring(fieldID.lastIndexOf('-') + 1);
        return uniqueID;
    }

    function getPostID(uniqueID) {
        var postID = uniqueID.substring(uniqueID.lastIndexOf('-') + 1);
        postID = postID.substring(0, postID.lastIndexOf('_'));
        return postID;
    }

    function getCommentID(uniqueID) {
        var commentID = uniqueID.substring(uniqueID.indexOf('_') + 1);
        return commentID;
    }

    function emailNotification(wpc_comment_parent, wpc_new_comment_id) {
        $.ajax({
            type: 'POST',
            url: wpc_ajax_obj.url,
            data: {
                wpc_comment_parent: wpc_comment_parent,
                wpc_new_comment_id: wpc_new_comment_id,
                action: 'email_notification'
            }
        });
    }

    $('.wpc_tooltipster').tooltipster({offsetY: 2});
});