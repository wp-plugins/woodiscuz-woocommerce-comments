<?php
include_once 'wpc-options-serialize.php';
include_once 'includes/wpc-db-helper.php';

class WPC_Options {

    public $wpc_options_serialize;
    public $wpc_usergroups_for_support_title;
    public $wpc_db_helper;

    public function __construct() {
        $this->wpc_db_helper = new WPC_DB_Helper();
        $this->wpc_options_serialize = new WPC_Options_Serialize($this->wpc_db_helper);
        $this->wpc_usergroups_for_support_title = $this->wpc_options_serialize->wpc_usergroups_for_support_title;
    }

    /**
     * Builds options page
     */
    public function main_options_form() {
        global $wp_roles;
        $roles = $wp_roles->get_names();



        if (empty($this->wpc_options_serialize->wpc_usergroups_for_support_title)) {
            $this->wpc_options_serialize->wpc_usergroups_for_support_title = array('administrator', 'shop_manager');
        }

        if (isset($_POST['submit_options'])) {

            if (function_exists('current_user_can') && !current_user_can('manage_options')) {
                die(_e('Hacker?', 'woodiscuz'));
            }

            if (function_exists('check_admin_referer')) {
                check_admin_referer('wpc_options_form');
            }

            $this->wpc_options_serialize->wpc_tab_on_off = isset($_POST['wpc_tab_on_off']) ? $_POST['wpc_tab_on_off'] : 0;
            $this->wpc_options_serialize->wpc_comment_tab_priority = isset($_POST['wpc_comment_tab_priority']) ? $_POST['wpc_comment_tab_priority'] : 0;
            $this->wpc_options_serialize->wpc_tab_show_hide = isset($_POST['wpc_tab_show_hide']) ? $_POST['wpc_tab_show_hide'] : 0;
            $this->wpc_options_serialize->wpc_voting_buttons_show_hide = isset($_POST['wpc_voting_buttons_show_hide']) ? $_POST['wpc_voting_buttons_show_hide'] : 0;
            $this->wpc_options_serialize->wpc_share_buttons_show_hide = isset($_POST['wpc_share_buttons_show_hide']) ? $_POST['wpc_share_buttons_show_hide'] : 0;
            $this->wpc_options_serialize->wpc_captcha_show_hide = isset($_POST['wpc_captcha_show_hide']) ? $_POST['wpc_captcha_show_hide'] : 0;
            $this->wpc_options_serialize->wpc_user_must_be_registered = isset($_POST['wpc_user_must_be_registered']) ? $_POST['wpc_user_must_be_registered'] : 0;
            $this->wpc_options_serialize->wpc_held_comment_to_moderate = isset($_POST['wpc_held_comment_to_moderate']) ? $_POST['wpc_held_comment_to_moderate'] : 0;
            $this->wpc_options_serialize->wpc_reply_button_guests_show_hide = isset($_POST['wpc_reply_button_guests_show_hide']) ? $_POST['wpc_reply_button_guests_show_hide'] : 0;
            $this->wpc_options_serialize->wpc_reply_button_customers_show_hide = isset($_POST['wpc_reply_button_customers_show_hide']) ? $_POST['wpc_reply_button_customers_show_hide'] : 0;
            $this->wpc_options_serialize->wpc_author_titles_show_hide = isset($_POST['wpc_author_titles_show_hide']) ? $_POST['wpc_author_titles_show_hide'] : 0;
            $this->wpc_options_serialize->wpc_usergroups_for_support_title = isset($_POST['wpc_usergroups_for_support_title']) ? $_POST['wpc_usergroups_for_support_title'] : array('administrator');
            $this->wpc_options_serialize->wpc_comment_count = isset($_POST['wpc_comment_count']) ? $_POST['wpc_comment_count'] : 10;
            $this->wpc_options_serialize->wpc_notify_moderator = isset($_POST['wpc_notify_moderator']) ? $_POST['wpc_notify_moderator'] : 0;
            $this->wpc_options_serialize->wpc_notify_comment_author = isset($_POST['wpc_notify_comment_author']) ? $_POST['wpc_notify_comment_author'] : 0;

            $this->wpc_options_serialize->wpc_comment_bg_color = isset($_POST['wpc_comment_bg_color']) ? $_POST['wpc_comment_bg_color'] : '#fefefe';
            $this->wpc_options_serialize->wpc_reply_bg_color = isset($_POST['wpc_reply_bg_color']) ? $_POST['wpc_reply_bg_color'] : '#f8f8f8';
            $this->wpc_options_serialize->wpc_comment_text_color = isset($_POST['wpc_comment_text_color']) ? $_POST['wpc_comment_text_color'] : '#555';

            $this->wpc_options_serialize->update_options();
        }
        ?>

        <div class="wrap woodiscuz_options_page">

            <div style="float:left; width:50px; height:55px; margin:10px 10px 20px 0px;">
                <img src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/plugin-icon/plugin-icon-48.png'); ?>" style="height:43px;"/>
            </div>
            <h2 style="padding-bottom:20px; padding-top:15px;"><?php _e('WooDiscuz General Settings', 'woodiscuz'); ?></h2>
            <br style="clear:both" />
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=woodiscuz_options_page&updated=true" method="post" name="woodiscuz_options_page" class="wpc-main-settings-form wpc-form">
                <?php
                if (function_exists('wp_nonce_field')) {
                    wp_nonce_field('wpc_options_form');
                }
                ?>
                <table cellspacing="0" class="wp-list-table widefat plugins">
                    <thead>
                        <tr class="wpc-row-light">
                            <th colspan="4" scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="4">&nbsp;</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php include 'options-templates/options-template-main.php'; ?>
                        <tr valign="top"  class="wpc-row-dark">
                            <td colspan="4">
                                <p class="submit">
                                    <input type="submit" class="button button-primary" name="submit_options" value="<?php _e('Save Changes', 'woodiscuz'); ?>" />
                                </p>
                            </td>
                        </tr>

                    <input type="hidden" name="action" value="update" />
                    </tbody>
                </table>
            </form>            
        </div>

        <?php
    }

    public function phrases_options_form() {

        if (isset($_POST['submit_phrases'])) {

            if (function_exists('current_user_can') && !current_user_can('manage_options')) {
                die(_e('Hacker?', 'woodiscuz'));
            }

            if (function_exists('check_admin_referer')) {
                check_admin_referer('wpc_phrases_form');
            }

            $this->wpc_options_serialize->wpc_phrases['wpc_discuss_tab'] = isset($_POST['wpc_discuss_tab']) ? $_POST['wpc_discuss_tab'] : 'Discussions';
            $this->wpc_options_serialize->wpc_phrases['wpc_header_text'] = isset($_POST['wpc_header_text']) ? $_POST['wpc_header_text'] : 'Got something to discuss?';
            $this->wpc_options_serialize->wpc_phrases['wpc_comment_start_text'] = isset($_POST['wpc_comment_start_text']) ? $_POST['wpc_comment_start_text'] : 'Start the discussion';
            $this->wpc_options_serialize->wpc_phrases['wpc_comment_join_text'] = isset($_POST['wpc_comment_join_text']) ? $_POST['wpc_comment_join_text'] : 'Join the discussion';
            $this->wpc_options_serialize->wpc_phrases['wpc_email_text'] = isset($_POST['wpc_email_text']) ? $_POST['wpc_email_text'] : 'Email';
            $this->wpc_options_serialize->wpc_phrases['wpc_name_text'] = isset($_POST['wpc_name_text']) ? $_POST['wpc_name_text'] : 'Name';
            $this->wpc_options_serialize->wpc_phrases['wpc_captcha_text'] = isset($_POST['wpc_captcha_text']) ? $_POST['wpc_captcha_text'] : 'Please insert the code above to comment';
            $this->wpc_options_serialize->wpc_phrases['wpc_submit_text'] = isset($_POST['wpc_submit_text']) ? $_POST['wpc_submit_text'] : 'Post Comment';
            $this->wpc_options_serialize->wpc_phrases['wpc_load_more_submit_text'] = isset($_POST['wpc_load_more_submit_text']) ? $_POST['wpc_load_more_submit_text'] : 'Load More';
            $this->wpc_options_serialize->wpc_phrases['wpc_reply_text'] = isset($_POST['wpc_reply_text']) ? $_POST['wpc_reply_text'] : 'Reply';
            $this->wpc_options_serialize->wpc_phrases['wpc_share_text'] = isset($_POST['wpc_share_text']) ? $_POST['wpc_share_text'] : 'Share';
            $this->wpc_options_serialize->wpc_phrases['wpc_share_facebook'] = isset($_POST['wpc_share_facebook']) ? $_POST['wpc_share_facebook'] : 'Share On Facebook';
            $this->wpc_options_serialize->wpc_phrases['wpc_share_twitter'] = isset($_POST['wpc_share_twitter']) ? $_POST['wpc_share_twitter'] : 'Share On Twitter';
            $this->wpc_options_serialize->wpc_phrases['wpc_share_google'] = isset($_POST['wpc_share_google']) ? $_POST['wpc_share_google'] : 'Share On Google';
            $this->wpc_options_serialize->wpc_phrases['wpc_hide_replies_text'] = isset($_POST['wpc_hide_replies_text']) ? $_POST['wpc_hide_replies_text'] : 'Hide Replies';
            $this->wpc_options_serialize->wpc_phrases['wpc_show_replies_text'] = isset($_POST['wpc_show_replies_text']) ? $_POST['wpc_show_replies_text'] : 'Show Replies';
            $this->wpc_options_serialize->wpc_phrases['wpc_user_title_guest_text'] = isset($_POST['wpc_user_title_guest_text']) ? $_POST['wpc_user_title_guest_text'] : 'Guest';
            $this->wpc_options_serialize->wpc_phrases['wpc_user_title_member_text'] = isset($_POST['wpc_user_title_member_text']) ? $_POST['wpc_user_title_member_text'] : 'Member';
            $this->wpc_options_serialize->wpc_phrases['wpc_user_title_customer_text'] = isset($_POST['wpc_user_title_customer_text']) ? $_POST['wpc_user_title_customer_text'] : 'Customer';
            $this->wpc_options_serialize->wpc_phrases['wpc_user_title_support_text'] = isset($_POST['wpc_user_title_support_text']) ? $_POST['wpc_user_title_support_text'] : 'Support';
            $this->wpc_options_serialize->wpc_phrases['wpc_email_subject'] = isset($_POST['wpc_email_subject']) ? $_POST['wpc_email_subject'] : 'New Comment';
            $this->wpc_options_serialize->wpc_phrases['wpc_email_message'] = isset($_POST['wpc_email_message']) ? $_POST['wpc_email_message'] : 'New comment on the product discussion section you\'ve been interested in';
            $this->wpc_options_serialize->wpc_phrases['wpc_error_empty_text'] = isset($_POST['wpc_error_empty_text']) ? $_POST['wpc_error_empty_text'] : 'please fill out this field to comment';
            $this->wpc_options_serialize->wpc_phrases['wpc_error_email_text'] = isset($_POST['wpc_error_email_text']) ? $_POST['wpc_error_email_text'] : 'email address is invalid';
            $this->wpc_options_serialize->wpc_phrases['wpc_year_text'] = isset($_POST['wpc_year_text']) ? $_POST['wpc_year_text'] : 'year';
            $this->wpc_options_serialize->wpc_phrases['wpc_month_text'] = isset($_POST['wpc_month_text']) ? $_POST['wpc_month_text'] : 'month';
            $this->wpc_options_serialize->wpc_phrases['wpc_day_text'] = isset($_POST['wpc_day_text']) ? $_POST['wpc_day_text'] : 'day';
            $this->wpc_options_serialize->wpc_phrases['wpc_hour_text'] = isset($_POST['wpc_hour_text']) ? $_POST['wpc_hour_text'] : 'hour';
            $this->wpc_options_serialize->wpc_phrases['wpc_minute_text'] = isset($_POST['wpc_minute_text']) ? $_POST['wpc_minute_text'] : 'minute';
            $this->wpc_options_serialize->wpc_phrases['wpc_second_text'] = isset($_POST['wpc_second_text']) ? $_POST['wpc_second_text'] : 'second';
            $this->wpc_options_serialize->wpc_phrases['wpc_plural_text'] = isset($_POST['wpc_plural_text']) ? $_POST['wpc_plural_text'] : 's';
            $this->wpc_options_serialize->wpc_phrases['wpc_right_now_text'] = isset($_POST['wpc_right_now_text']) ? $_POST['wpc_right_now_text'] : 'right now';
            $this->wpc_options_serialize->wpc_phrases['wpc_ago_text'] = isset($_POST['wpc_ago_text']) ? $_POST['wpc_ago_text'] : 'ago';
            $this->wpc_options_serialize->wpc_phrases['wpc_you_must_be_text'] = isset($_POST['wpc_you_must_be_text']) ? $_POST['wpc_you_must_be_text'] : 'You must be';
            $this->wpc_options_serialize->wpc_phrases['wpc_logged_in_text'] = isset($_POST['wpc_logged_in_text']) ? $_POST['wpc_logged_in_text'] : 'logged in';
            $this->wpc_options_serialize->wpc_phrases['wpc_to_post_comment_text'] = isset($_POST['wpc_to_post_comment_text']) ? $_POST['wpc_to_post_comment_text'] : 'to post a comment';
            $this->wpc_options_serialize->wpc_phrases['wpc_vote_counted'] = isset($_POST['wpc_vote_counted']) ? $_POST['wpc_vote_counted'] : 'Vote Counted';
            $this->wpc_options_serialize->wpc_phrases['wpc_vote_up'] = isset($_POST['wpc_vote_up']) ? $_POST['wpc_vote_up'] : 'Vote Up';
            $this->wpc_options_serialize->wpc_phrases['wpc_vote_down'] = isset($_POST['wpc_vote_down']) ? $_POST['wpc_vote_down'] : 'Vote Down';
            $this->wpc_options_serialize->wpc_phrases['wpc_held_for_moderate'] = isset($_POST['wpc_held_for_moderate']) ? $_POST['wpc_held_for_moderate'] : 'Your Comment waiting moderation';
            $this->wpc_options_serialize->wpc_phrases['wpc_vote_only_one_time'] = isset($_POST['wpc_vote_only_one_time']) ? $_POST['wpc_vote_only_one_time'] : 'You\'ve already voted for this comment';
            $this->wpc_options_serialize->wpc_phrases['wpc_voting_error'] = isset($_POST['wpc_voting_error']) ? $_POST['wpc_voting_error'] : 'Voting Error';
            $this->wpc_options_serialize->wpc_phrases['wpc_self_vote'] = isset($_POST['wpc_self_vote']) ? $_POST['wpc_self_vote'] : 'You cannot vote for your comment';
            $this->wpc_options_serialize->wpc_phrases['wpc_login_to_vote'] = isset($_POST['wpc_login_to_vote']) ? $_POST['wpc_login_to_vote'] : 'You Must Be Logged In To Vote';
            $this->wpc_options_serialize->wpc_phrases['wpc_invalid_captcha'] = isset($_POST['wpc_invalid_captcha']) ? $_POST['wpc_invalid_captcha'] : 'Invalid Captcha Code';
            $this->wpc_options_serialize->wpc_phrases['wpc_invalid_field'] = isset($_POST['wpc_invalid_field']) ? $_POST['wpc_invalid_field'] : 'Some of field value is invalid';

            $this->wpc_db_helper->update_phrases($this->wpc_options_serialize->wpc_phrases);
        }
        if ($this->wpc_db_helper->is_phrase_exists('wpc_discuss_tab')) {
            $this->wpc_options_serialize->wpc_phrases = $this->wpc_db_helper->get_phrases();
        }
        ?>
        <div class="wrap woodiscuz_options_page">

            <div style="float:left; width:50px; height:55px; margin:10px 10px 20px 0px;">
                <img src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/plugin-icon/plugin-icon-48.png'); ?>" style="height:43px;"/>
            </div>
            <h2 style="padding-bottom:20px; padding-top:15px;"><?php _e('WooDiscuz Front-end Phrases', 'woodiscuz'); ?></h2>
            <br style="clear:both" />
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=woodiscuz_phrases_page&updated=true" method="post" name="woodiscuz_phrases_page" class="wpc-phrases-settings-form wpc-form">
                <?php
                if (function_exists('wp_nonce_field')) {
                    wp_nonce_field('wpc_phrases_form');
                }
                ?>
                <table cellspacing="0" class="wp-list-table widefat plugins">
                    <thead>
                        <tr class="wpc-row-light">
                            <th colspan="4" scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="4">&nbsp;</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php include 'options-templates/options-template-phrases.php'; ?>

                        <tr valign="top" class="wpc-row-dark">
                            <td colspan="4">
                                <p class="submit">
                                    <input type="submit" class="button button-primary" name="submit_phrases" value="<?php _e('Save Changes', 'woodiscuz'); ?>" />
                                </p>
                            </td>
                        </tr>

                    <input type="hidden" name="action" value="update" />
                    </tbody>
                </table>
            </form>

        </div>
        <?php
    }

}
?>