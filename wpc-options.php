<?php
include_once 'wpc-options-serialize.php';
include_once 'includes/wpc-db-helper.php';

class WPC_Options {

    public $wpc_options_serialized;
    public $wpc_usergroups_for_support_title;
    public $wpc_db_helper;

    public function __construct() {
        $this->wpc_db_helper = new WPC_DB_Helper();
        $this->wpc_options_serialized = new WPC_Options_Serialize($this->wpc_db_helper);
        $this->wpc_usergroups_for_support_title = $this->wpc_options_serialized->wpc_usergroups_for_support_title;
    }

    /**
     * Builds options page
     */
    public function main_options_form() {
        global $wp_roles;
        $roles = $wp_roles->get_names();



        if (empty($this->wpc_options_serialized->wpc_usergroups_for_support_title)) {
            $this->wpc_options_serialized->wpc_usergroups_for_support_title = array('administrator', 'shop_manager');
        }

        if (isset($_POST['wpc_submit_options'])) {

            if (function_exists('current_user_can') && !current_user_can('manage_options')) {
                die(_e('Hacker?', 'woodiscuz'));
            }

            if (function_exists('check_admin_referer')) {
                check_admin_referer('wpc_options_form');
            }

            $this->wpc_options_serialized->wpc_tab_on_off = isset($_POST['wpc_tab_on_off']) ? $_POST['wpc_tab_on_off'] : 0;
            $this->wpc_options_serialized->wpc_comment_tab_priority = isset($_POST['wpc_comment_tab_priority']) ? $_POST['wpc_comment_tab_priority'] : 0;
            $this->wpc_options_serialized->wpc_tab_show_hide = isset($_POST['wpc_tab_show_hide']) ? $_POST['wpc_tab_show_hide'] : 0;
            $this->wpc_options_serialized->wpc_voting_buttons_show_hide = isset($_POST['wpc_voting_buttons_show_hide']) ? $_POST['wpc_voting_buttons_show_hide'] : 0;
            $this->wpc_options_serialized->wpc_share_buttons_show_hide = isset($_POST['wpc_share_buttons_show_hide']) ? $_POST['wpc_share_buttons_show_hide'] : 0;
            $this->wpc_options_serialized->wpc_captcha_show_hide = isset($_POST['wpc_captcha_show_hide']) ? $_POST['wpc_captcha_show_hide'] : 0;
            $this->wpc_options_serialized->wpc_user_must_be_registered = isset($_POST['wpc_user_must_be_registered']) ? $_POST['wpc_user_must_be_registered'] : 0;
            $this->wpc_options_serialized->wpc_held_comment_to_moderate = isset($_POST['wpc_held_comment_to_moderate']) ? $_POST['wpc_held_comment_to_moderate'] : 0;
            $this->wpc_options_serialized->wpc_reply_button_guests_show_hide = isset($_POST['wpc_reply_button_guests_show_hide']) ? $_POST['wpc_reply_button_guests_show_hide'] : 0;
            $this->wpc_options_serialized->wpc_reply_button_customers_show_hide = isset($_POST['wpc_reply_button_customers_show_hide']) ? $_POST['wpc_reply_button_customers_show_hide'] : 0;
            $this->wpc_options_serialized->wpc_author_titles_show_hide = isset($_POST['wpc_author_titles_show_hide']) ? $_POST['wpc_author_titles_show_hide'] : 0;
            $this->wpc_options_serialized->wpc_usergroups_for_support_title = isset($_POST['wpc_usergroups_for_support_title']) ? $_POST['wpc_usergroups_for_support_title'] : array('administrator');
            $this->wpc_options_serialized->wpc_comment_count = isset($_POST['wpc_comment_count']) ? $_POST['wpc_comment_count'] : 10;
            $this->wpc_options_serialized->wpc_notify_moderator = isset($_POST['wpc_notify_moderator']) ? $_POST['wpc_notify_moderator'] : 0;
            $this->wpc_options_serialized->wpc_notify_comment_author = isset($_POST['wpc_notify_comment_author']) ? $_POST['wpc_notify_comment_author'] : 0;
            $this->wpc_options_serialized->wpc_request_for_comment = isset($_POST['wpc_request_for_comment']) ? $_POST['wpc_request_for_comment'] : 0;

            $this->wpc_options_serialized->wpc_comment_bg_color = isset($_POST['wpc_comment_bg_color']) ? $_POST['wpc_comment_bg_color'] : '#fefefe';
            $this->wpc_options_serialized->wpc_reply_bg_color = isset($_POST['wpc_reply_bg_color']) ? $_POST['wpc_reply_bg_color'] : '#f8f8f8';
            $this->wpc_options_serialized->wpc_comment_text_color = isset($_POST['wpc_comment_text_color']) ? $_POST['wpc_comment_text_color'] : '#555';

            $this->wpc_options_serialized->update_options();
        }
        ?>

        <div class="wrap woodiscuz_options_page">

            <div style="float:left; width:50px; height:55px; margin:10px 10px 20px 0px;">
                <img src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/plugin-icon/plugin-icon-48.png'); ?>" style="height:43px;"/>
            </div>
            <h2 style="padding-bottom:20px; padding-top:15px;"><?php _e('WooDiscuz General Settings', 'woodiscuz'); ?></h2>
            <br style="clear:both" />
            <form action="<?php echo admin_url(); ?>admin.php?page=woodiscuz_options_page&updated=true" method="post" name="woodiscuz_options_page" class="wpc-main-settings-form wpc-form">
                <?php
                if (function_exists('wp_nonce_field')) {
                    wp_nonce_field('wpc_options_form');
                }
                ?>
                <table cellspacing="0" class="wp-list-table widefat plugins">
                    <thead>
                        <tr>
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
                        <tr valign="top" >
                            <td colspan="4">
                                <p class="submit">
                                    <input type="submit" class="button button-primary" name="wpc_submit_options" value="<?php _e('Save Changes', 'woodiscuz'); ?>" />
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

        if (isset($_POST['wpc_submit_phrases'])) {

            if (function_exists('current_user_can') && !current_user_can('manage_options')) {
                die(_e('Hacker?', 'woodiscuz'));
            }

            if (function_exists('check_admin_referer')) {
                check_admin_referer('wpc_phrases_form');
            }

            $this->wpc_options_serialized->wpc_phrases['wpc_discuss_tab'] = $_POST['wpc_discuss_tab'];
            $this->wpc_options_serialized->wpc_phrases['wpc_header_text'] = $_POST['wpc_header_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_comment_start_text'] = $_POST['wpc_comment_start_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_comment_join_text'] = $_POST['wpc_comment_join_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_email_text'] = $_POST['wpc_email_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_name_text'] = $_POST['wpc_name_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_captcha_text'] = $_POST['wpc_captcha_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_submit_text'] = $_POST['wpc_submit_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_load_more_submit_text'] = $_POST['wpc_load_more_submit_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_reply_text'] = $_POST['wpc_reply_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_share_text'] = $_POST['wpc_share_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_share_facebook'] = $_POST['wpc_share_facebook'];
            $this->wpc_options_serialized->wpc_phrases['wpc_share_twitter'] = $_POST['wpc_share_twitter'];
            $this->wpc_options_serialized->wpc_phrases['wpc_share_google'] = $_POST['wpc_share_google'];
            $this->wpc_options_serialized->wpc_phrases['wpc_hide_replies_text'] = $_POST['wpc_hide_replies_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_show_replies_text'] = $_POST['wpc_show_replies_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_user_title_guest_text'] = $_POST['wpc_user_title_guest_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_user_title_member_text'] = $_POST['wpc_user_title_member_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_user_title_customer_text'] = $_POST['wpc_user_title_customer_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_user_title_support_text'] = $_POST['wpc_user_title_support_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_email_subject'] = $_POST['wpc_email_subject'];
            $this->wpc_options_serialized->wpc_phrases['wpc_email_message'] = $_POST['wpc_email_message'];
            $this->wpc_options_serialized->wpc_phrases['wpc_error_empty_text'] = $_POST['wpc_error_empty_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_error_email_text'] = $_POST['wpc_error_email_text'];

            $this->wpc_options_serialized->wpc_phrases['wpc_year_text']['datetime'][0] = $_POST['wpc_year_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_month_text']['datetime'][0] = $_POST['wpc_month_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_day_text']['datetime'][0] = $_POST['wpc_day_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_hour_text']['datetime'][0] = $_POST['wpc_hour_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_minute_text']['datetime'][0] = $_POST['wpc_minute_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_second_text']['datetime'][0] = $_POST['wpc_second_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_plural_text'] = $_POST['wpc_plural_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_right_now_text'] = $_POST['wpc_right_now_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_ago_text'] = $_POST['wpc_ago_text'];

            $this->wpc_options_serialized->wpc_phrases['wpc_you_must_be_text'] = $_POST['wpc_you_must_be_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_logged_in_text'] = $_POST['wpc_logged_in_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_to_post_comment_text'] = $_POST['wpc_to_post_comment_text'];
            $this->wpc_options_serialized->wpc_phrases['wpc_vote_counted'] = $_POST['wpc_vote_counted'];
            $this->wpc_options_serialized->wpc_phrases['wpc_vote_up'] = $_POST['wpc_vote_up'];
            $this->wpc_options_serialized->wpc_phrases['wpc_vote_down'] = $_POST['wpc_vote_down'];
            $this->wpc_options_serialized->wpc_phrases['wpc_held_for_moderate'] = $_POST['wpc_held_for_moderate'];
            $this->wpc_options_serialized->wpc_phrases['wpc_vote_only_one_time'] = $_POST['wpc_vote_only_one_time'];
            $this->wpc_options_serialized->wpc_phrases['wpc_voting_error'] = $_POST['wpc_voting_error'];
            $this->wpc_options_serialized->wpc_phrases['wpc_self_vote'] = $_POST['wpc_self_vote'];
            $this->wpc_options_serialized->wpc_phrases['wpc_login_to_vote'] = $_POST['wpc_login_to_vote'];
            $this->wpc_options_serialized->wpc_phrases['wpc_invalid_captcha'] = $_POST['wpc_invalid_captcha'];
            $this->wpc_options_serialized->wpc_phrases['wpc_invalid_field'] = $_POST['wpc_invalid_field'];

            $this->wpc_db_helper->update_phrases($this->wpc_options_serialized->wpc_phrases);
        }
        if ($this->wpc_db_helper->is_phrase_exists('wpc_discuss_tab')) {
            $this->wpc_options_serialized->wpc_phrases = $this->wpc_db_helper->get_phrases();
        }
        ?>
        <div class="wrap woodiscuz_options_page">

            <div style="float:left; width:50px; height:55px; margin:10px 10px 20px 0px;">
                <img src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/plugin-icon/plugin-icon-48.png'); ?>" style="height:43px;"/>
            </div>
            <h2 style="padding-bottom:20px; padding-top:15px;"><?php _e('WooDiscuz Front-end Phrases', 'woodiscuz'); ?></h2>
            <br style="clear:both" />
            <form action="<?php echo admin_url(); ?>admin.php?page=woodiscuz_phrases_page&updated=true" method="post" name="woodiscuz_phrases_page" class="wpc-phrases-settings-form wpc-form">
                <?php
                if (function_exists('wp_nonce_field')) {
                    wp_nonce_field('wpc_phrases_form');
                }
                ?>
                <table cellspacing="0" class="wp-list-table widefat plugins">
                    <thead>
                        <tr>
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

                        <tr valign="top">
                            <td colspan="4">
                                <p class="submit">
                                    <input type="submit" class="button button-primary" name="wpc_submit_phrases" value="<?php _e('Save Changes', 'woodiscuz'); ?>" />
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