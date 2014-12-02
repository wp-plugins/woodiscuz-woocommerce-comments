<?php

include_once 'includes/wpc-db-helper.php';

class WPC_Options_Serialize {

    public $wpc_options_slug = 'wpc_options';

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Turn On/Off WooDiscuss Tab
     * Default Value - Unchecked
     */
    public $wpc_tab_on_off;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Comment Tab High priority/Low Priority
     * Default Value - Unchecked
     */
    public $wpc_comment_tab_priority;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Show/Hide WooCommerce Review Tab
     * Default Value - Unchecked
     */
    public $wpc_tab_show_hide;

    /* Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Show/Hide Voting buttons
     * Default Value - Unchecked
     */
    public $wpc_voting_buttons_show_hide;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Show/Hide Share Buttons
     * Default Value - Unchecked
     */
    public $wpc_share_buttons_show_hide;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Show/Hide the  CAPTCHA field
     * Default Value - Unchecked
     */
    public $wpc_captcha_show_hide;

    /*
     * Type - Radiobutton
     * Available Values - Yes/No
     * Description - User Must be registered to comment
     *      (If this option is set “Yes”, the comment form will be hidden, 
     *      instead of the form there will be a link to registration page.)
     * Default Value - No
     */
    public $wpc_user_must_be_registered;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - If checked held the comment to approve manually    
     * Default Value - Unchecked
     */
    public $wpc_held_comment_to_moderate;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Show/Hide Reply button for Guests 
     * Default Value - Unchecked
     */
    public $wpc_reply_button_guests_show_hide;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Show/Hide Reply button for Customers 
     * Default Value - Unchecked
     */
    public $wpc_reply_button_customers_show_hide;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Show/Hide Author Titles
     * Default Value - Unchecked   
     */
    public $wpc_author_titles_show_hide;

    /*
     * Type - Checkbox (Group)
     * Available Values - Admin, Editor, Author, Contributor, Shop Manager
     * Description - Usergroups for User Title “Support”
     * Default Value - Admin, Shop Manager
     */
    public $wpc_usergroups_for_support_title = array('administrator', 'shop_manager');

    /*
     * Type - Input
     * Available Values - Integer
     * Description - Comment count per click
     * Default Value - 10
     */
    public $wpc_comment_count;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Notify moderator on new comment
     * Default Value - Checked
     */
    public $wpc_notify_moderator;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Notify comment author on new reply
     * Default Value - Checked
     */
    public $wpc_notify_comment_author;

    /*
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Request for comment 
     * Default Value - Checked
     */
    public $wpc_request_for_comment;

    /*
     * Type - Input
     * Available Values - color codes
     * Description - Comment Background Color
     * Default Value - #fefefe
     */
    public $wpc_comment_bg_color;

    /*
     * Type - Input
     * Available Values - color codes
     * Description - Reply Background Color
     * Default Value - #f8f8f8
     */
    public $wpc_reply_bg_color;

    /*
     * Type - Input
     * Available Values - color codes
     * Description - Comment Text Color
     * Default Value - #555
     */
    public $wpc_comment_text_color;

    /*
     * Type - HTML elements array
     * Available Values - Text
     * Description - Phrases for form elements texts
     * Default Value - 
     */
    public $wpc_phrases;
    public $wpc_db_helper;

    function __construct($wpc_db_helper) {
        $this->wpc_db_helper = $wpc_db_helper;
        $this->init_phrases();
        $this->add_options();
        $this->init_options(get_option($this->wpc_options_slug));
        add_action('plugins_loaded', array(&$this, 'init_phrases_on_load'), -126);
    }

    public function init_options($serialize_options) {
        $options = unserialize($serialize_options);
        $this->wpc_tab_on_off = $options['wpc_tab_on_off'];
        $this->wpc_comment_tab_priority = $options['wpc_comment_tab_priority'];
        $this->wpc_tab_show_hide = $options['wpc_tab_show_hide'];
        $this->wpc_voting_buttons_show_hide = $options['wpc_voting_buttons_show_hide'];
        $this->wpc_share_buttons_show_hide = $options['wpc_share_buttons_show_hide'];
        $this->wpc_captcha_show_hide = $options['wpc_captcha_show_hide'];
        $this->wpc_user_must_be_registered = $options['wpc_user_must_be_registered'];
        $this->wpc_held_comment_to_moderate = $options['wpc_held_comment_to_moderate'];
        $this->wpc_reply_button_guests_show_hide = $options['wpc_reply_button_guests_show_hide'];
        $this->wpc_reply_button_customers_show_hide = $options['wpc_reply_button_customers_show_hide'];
        $this->wpc_author_titles_show_hide = $options['wpc_author_titles_show_hide'];
        $this->wpc_usergroups_for_support_title = $options['wpc_usergroups_for_support_title'];
        $this->wpc_comment_count = $options['wpc_comment_count'];
        $this->wpc_notify_moderator = $options['wpc_notify_moderator'];
        $this->wpc_notify_comment_author = $options['wpc_notify_comment_author'];
        $this->wpc_request_for_comment = $options['wpc_request_for_comment'];
        $this->wpc_comment_bg_color = $options['wpc_comment_bg_color'];
        $this->wpc_reply_bg_color = $options['wpc_reply_bg_color'];
        $this->wpc_comment_text_color = $options['wpc_comment_text_color'];
    }

    /**
     * initialize default phrases
     */
    public function init_phrases() {
        $this->wpc_phrases = array(
            'wpc_discuss_tab' => 'Discussions',
            'wpc_header_text' => 'Got something to discuss?',
            'wpc_comment_start_text' => 'Start the discussion',
            'wpc_comment_join_text' => 'Join the discussion',
            'wpc_email_text' => 'Email',
            'wpc_name_text' => 'Name',
            'wpc_captcha_text' => 'Please insert the code above to comment',
            'wpc_submit_text' => 'Post Comment',
            'wpc_load_more_submit_text' => 'Load More Comments',
            'wpc_reply_text' => 'Reply',
            'wpc_share_text' => 'Share',
            'wpc_share_facebook' => 'Share On Facebook',
            'wpc_share_twitter' => 'Share On Twitter',
            'wpc_share_google' => 'Share On Google',
            'wpc_hide_replies_text' => 'Hide Replies',
            'wpc_show_replies_text' => 'Show Replies',
            'wpc_user_title_guest_text' => 'Guest',
            'wpc_user_title_member_text' => 'Member',
            'wpc_user_title_customer_text' => 'Customer',
            'wpc_user_title_support_text' => 'Support',
            'wpc_email_subject' => 'New Comment',
            'wpc_email_message' => 'New comment on the product discussion section you\'ve been interested in',            
            'wpc_request_reply_subject' => 'Leave a Reply',
            'wpc_request_reply_message' => 'Please, leave a reply on',            
            'wpc_error_empty_text' => 'please fill out this field to comment',
            'wpc_error_email_text' => 'email address is invalid',
            'wpc_year_text' => array('datetime' => array('year', 1)),
            'wpc_month_text' => array('datetime' => array('month', 2)),
            'wpc_day_text' => array('datetime' => array('day', 3)),
            'wpc_hour_text' => array('datetime' => array('hour', 4)),
            'wpc_minute_text' => array('datetime' => array('minute', 5)),
            'wpc_second_text' => array('datetime' => array('second', 6)),
            'wpc_plural_text' => 's',
            'wpc_right_now_text' => 'right now',
            'wpc_ago_text' => 'ago',
            'wpc_you_must_be_text' => 'You must be',
            'wpc_logged_in_text' => 'logged in',
            'wpc_to_post_comment_text' => 'to post a comment.',
            'wpc_vote_up' => 'Vote Up',
            'wpc_vote_down' => 'Vote Down',
            'wpc_vote_counted' => 'Vote Counted',
            'wpc_vote_only_one_time' => "You've already voted for this comment",
            'wpc_voting_error' => 'Voting Error',
            'wpc_login_to_vote' => 'You Must Be Logged In To Vote',
            'wpc_self_vote' => 'You cannot vote for your comment',
            'wpc_invalid_captcha' => 'Invalid Captcha Code',
            'wpc_invalid_field' => 'Some of field value is invalid',
            'wpc_held_for_moderate' => 'Your Comment awaiting moderation',
        );
    }

    public function to_array() {
        $options = array(
            'wpc_tab_on_off' => $this->wpc_tab_on_off,
            'wpc_comment_tab_priority' => $this->wpc_comment_tab_priority,
            'wpc_tab_show_hide' => $this->wpc_tab_show_hide,
            'wpc_voting_buttons_show_hide' => $this->wpc_voting_buttons_show_hide,
            'wpc_share_buttons_show_hide' => $this->wpc_share_buttons_show_hide,
            'wpc_captcha_show_hide' => $this->wpc_captcha_show_hide,
            'wpc_user_must_be_registered' => $this->wpc_user_must_be_registered,
            'wpc_held_comment_to_moderate' => $this->wpc_held_comment_to_moderate,
            'wpc_reply_button_guests_show_hide' => $this->wpc_reply_button_guests_show_hide,
            'wpc_reply_button_customers_show_hide' => $this->wpc_reply_button_customers_show_hide,
            'wpc_author_titles_show_hide' => $this->wpc_author_titles_show_hide,
            'wpc_usergroups_for_support_title' => $this->wpc_usergroups_for_support_title,
            'wpc_comment_count' => $this->wpc_comment_count,
            'wpc_notify_moderator' => $this->wpc_notify_moderator,
            'wpc_notify_comment_author' => $this->wpc_notify_comment_author,
            'wpc_request_for_comment' => $this->wpc_request_for_comment,
            'wpc_comment_bg_color' => $this->wpc_comment_bg_color,
            'wpc_reply_bg_color' => $this->wpc_reply_bg_color,
            'wpc_comment_text_color' => $this->wpc_comment_text_color
        );

        return $options;
    }

    public function update_options() {
        update_option($this->wpc_options_slug, serialize($this->to_array()));
    }

    public function add_options() {
        $options = array(
            'wpc_tab_on_off' => '0',
            'wpc_comment_tab_priority' => '0',
            'wpc_tab_show_hide' => '0',
            'wpc_voting_buttons_show_hide' => '0',
            'wpc_share_buttons_show_hide' => '0',
            'wpc_captcha_show_hide' => '0',
            'wpc_user_must_be_registered' => '0',
            'wpc_held_comment_to_moderate' => '0',
            'wpc_reply_button_guests_show_hide' => '0',
            'wpc_reply_button_customers_show_hide' => '0',
            'wpc_author_titles_show_hide' => '0',
            'wpc_usergroups_for_support_title' => $this->wpc_usergroups_for_support_title,
            'wpc_comment_count' => '5',
            'wpc_notify_moderator' => '1',
            'wpc_notify_comment_author' => '1',
            'wpc_request_for_comment' => '0',
            'wpc_comment_bg_color' => '#fefefe',
            'wpc_reply_bg_color' => '#f8f8f8',
            'wpc_comment_text_color' => '#555'
        );
        add_option($this->wpc_options_slug, serialize($options));
    }

    public function init_phrases_on_load() {
        if ($this->wpc_db_helper->is_phrase_exists('wpc_discuss_tab')) {
            $this->wpc_phrases = $this->wpc_db_helper->get_phrases();
        }
    }

}
