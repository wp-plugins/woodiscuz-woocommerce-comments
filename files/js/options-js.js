jQuery(document).ready(function ($) {
    $('#wpc_tab_on_off').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_comment_tab_priority').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_tab_show_hide').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_voting_buttons_show_hide').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_share_buttons_show_hide').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_captcha_show_hide').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_reply_button_guests_show_hide').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_reply_button_customers_show_hide').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_reply_button_only_author_show').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_author_titles_show_hide').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_jquery_ajax_features_on_off').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_held_comment_to_moderate').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_notify_moderator').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_notify_comment_author').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });

    $('#wpc_request_for_comment').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });
});