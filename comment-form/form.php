<script type="text/javascript">
//    initialize the validator function
    validator.message['invalid'] = '<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_invalid_field']; ?>';
    validator.message['empty'] = '<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_error_empty_text']; ?>';
    validator.message['email'] = '<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_error_email_text']; ?>';

    jQuery(document).ready(function ($) {
        $(document).delegate('.wpc-toggle', 'click', function() {
            var toggleID = $(this).attr('id');
            var uniqueID = toggleID.substring(toggleID.lastIndexOf('-') + 1);
            $('#wpc-comm-' + uniqueID + ' .wpc-reply').slideToggle(500, function () {
                if ($(this).is(':hidden')) {
                    $('#' + toggleID).html('<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_show_replies_text']; ?> &or;');
                } else {
                    $('#' + toggleID).html('<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_hide_replies_text']; ?> &and;');
                }
            });
        });

        if ($.cookie('wpc_author_name') !== '' && $.cookie('wpc_author_email')) {
            $('#woopcomm .wpc_name').val($.cookie('wpc_author_name'));
            $('#woopcomm .wpc_email').val($.cookie('wpc_author_email'));
        }
    });
</script>
<?php
global $post;
$textarea_placeholder = '';
if ($this->wpc_db_helper->get_reviews_count('woop_comm', $post->ID)) {
    $textarea_placeholder = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_comment_join_text'];
} else {
    $textarea_placeholder = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_comment_start_text'];
}
$unique_id = $post->ID . '_' . 0;
?>

<div id="woopcomm">
    <p class="wpc-comment-title"><?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_header_text']; ?></p>
    <div class="wpc-form-wrapper">
        <?php
        if ($this->is_guest_can_comment()) {
            ?>

            <form action="" method="post" id="wpc_comm_form-<?php echo $unique_id; ?>" class="wpc_comm_form">
                <div class="wpc-field-comment">
                    <div style="width:60px; float:left; position:absolute;">
                        <?php echo $this->wpc_helper->get_comment_author_avatar(); ?>                        
                    </div>
                    <div style="margin-left:65px;" class="item"><textarea id="wpc_comment-<?php echo $unique_id; ?>" class="wpc_comment" name="wpc_comment" required="required" placeholder="<?php echo $textarea_placeholder; ?>"></textarea></div>
                    <div style="clear:both"></div>
                </div>
                <div id="wpc-form-footer-<?php echo $unique_id; ?>" class="wpc-form-footer">
                    <?php if (!is_user_logged_in()) { ?>
                        <div class="wpc-author-data">
                            <div class="wpc-field-name item"><input id="wpc_name-<?php echo $unique_id; ?>" class="wpc_name" name="wpc_name" required="required" value="" type="text" placeholder="<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_name_text'] ?>"/></div>
                            <div class="wpc-field-email item"><input id="wpc_email-<?php echo $unique_id; ?>" class="wpc_email email" name="wpc_email" required="required" value="" type="email" placeholder="<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_email_text']; ?>"/></div>
                            <div style="clear:both"></div>
                        </div>
                    <?php } ?>
                    <div class="wpc-form-submit">
                        <?php if (!$this->wpc_options->wpc_options_serialize->wpc_captcha_show_hide) { ?>
                            <?php if (!is_user_logged_in()) { ?>
                                <div class="wpc-field-captcha item">
                                    <input id="wpc_captcha-<?php echo $unique_id; ?>" name="wpc_captcha" required="required" value="" type="text" />
                                    <span class="wpc-label wpc-captcha-label">
                                        <img src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/captcha/captcha.php?comm_id=' . $post->ID . '-' . 0); ?>" id="wpc_captcha_img-<?php echo $unique_id; ?>" />
                                        <img src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/refresh-16x16.png'); ?>" id="wpc_captcha_refresh_img-<?php echo $unique_id; ?>" class="wpc_captcha_refresh_img" />
                                    </span>
                                    <span class="captcha_msg"><?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_captcha_text']; ?></span>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="wpc-field-submit"><input type="button" name="submit" value="<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_submit_text']; ?>" id="wpc_comm-<?php echo $unique_id; ?>" class="wpc_comm_submit button alt"/></div>
                        <div style="clear:both"></div>
                    </div>
                </div>           
                <input type="hidden" name="wpc_home_url" value="<?php echo plugins_url(); ?>" id="wpc_home_url" />
                <input type="hidden" name="wpc_plugin_dir_url" value="<?php echo WPC::$PLUGIN_DIRECTORY; ?>" id="wpc_plugin_dir_url" />
                <input type="hidden" name="wpc_comment_post_ID" value="<?php echo $post->ID; ?>" id="wpc_comment_post_ID-<?php echo $unique_id; ?>" />
                <input type="hidden" name="wpc_comment_parent"  value="0" id="wpc_comment_parent-<?php echo $unique_id; ?>" />
            </form>
        <?php } else { ?>
            <p class="wpc-must-login"><?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_you_must_be_text']; ?> <a href="<?php echo wp_login_url(); ?>"><?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_logged_in_text']; ?></a> <?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_to_post_comment_text']; ?></p>
        <?php } ?>
    </div>
    <hr/>

    <div class="wpc-thread-wrapper">
        <?php $wpc_parent_comments_count = $this->get_comments_by_type(1); ?>
    </div>

    <?php if ($wpc_parent_comments_count > $this->wpc_options->wpc_options_serialize->wpc_comment_count) { ?>
        <div class="wpc-load-more-submit-wrap">
            <input type="button" name="submit" value="<?php echo $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_load_more_submit_text']; ?>" id="wpc-load-more-submit-<?php echo $unique_id; ?>" class="wpc-load-more-submit button"/>
            <input type="hidden" name="wpc_comments_offset" id="wpc_comments_offset" value="1" />
            <input type="hidden" name="wpc_parent_per_page" id="wpc_parent_per_page" value="<?php echo $this->wpc_options->wpc_options_serialize->wpc_comment_count; ?>" />
            <input type="hidden" name="wpc_parent_comments_count" id="wpc_parent_comments_count" value="<?php echo $wpc_parent_comments_count; ?>" />
        </div>
    <?php } ?>
    
    <div id="wpc_openModalFormAction" class="modalDialog">
        <div id="wpc_response_info" class="wpc_modal">
            <div id="wpc_response_info_box">
                <a href="#close" title="Close" class="close">&nbsp;</a>
                <img width="64" height="64" src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/loader/ajax-loader-200x200.gif'); ?>" />
            </div>
        </div>
    </div>
</div>