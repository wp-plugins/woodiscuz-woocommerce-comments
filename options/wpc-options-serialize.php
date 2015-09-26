<?php

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
     * Type - Input number
     * Available Values - Integer values
     * Description - Comment Tab priority
     * Default Value - 1000 for initializing comment tab last
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

    /**
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - If checked user must fill this field
     * Default Value - Checked
     */
    public $wpc_is_name_field_required;

    /**
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - If checked user must fill this field
     * Default Value - Checked
     */
    public $wpc_is_email_field_required;

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
     * Description - Show Reply button only for product author
     * Default Value - Unchecked
     */
    public $wpc_reply_button_only_author_show;

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
    public $wpc_usergroups_for_support_title;

    /*
     * Type - Input
     * Available Values - Integer
     * Description - Comment count per click
     * Default Value - 5
     */
    public $wpc_comment_count;

    /**
     * Type - Dropdown menu
     * Available Values - 1, 2, 3, 4, 5
     * Description - Define comments depth value in comment list
     * Default Value - 3
     */
    public $wpc_comments_max_depth;

    /**
     * Type - Dropdown menu
     * Available Values - list of pages (ids)
     * Description - Redirect first commenter to the selected page
     * Default Value - 0
     */
    public $woodiscuz_redirect_page;

    /**
     * Type - Dropdown menu
     * Available Values - Not Allow(0), 900s(15 minutes)  1800s(30 minutes), 3600s(1 hour), 10800s(3 hours), 86400(24 hours)
     * Description - Allow commnet editing after comment subimt
     * Default Value - Editable comment time value
     */
    public $wpc_comment_editable_time;

    /**
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Allow guests to vote on comments
     * Default Value - Checked
     */
    public $wpc_is_guest_can_vote;

    /**
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Comment date format - 20-01-2015
     * Default Value - Checked
     */
    public $wpc_simple_comment_date;

    /**
     * Type - Radio Button
     * Available Values - Top / Bottom
     * Description - Comment list order
     * Default Value - Top
     */
    public $wpc_comment_list_order;

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

    /**
     * Type - Select
     * Available Values - 12px-16px
     * Description - Comment Text Size
     * Default Value - 14px
     */
    public $wpc_comment_text_size;

    /**
     * Type - Input
     * Available Values - color codes
     * Description - Form Background Color
     * Default Value - #F9F9F9
     */
    public $wpc_form_bg_color;

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

    /**
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - Use .PO/.MO files
     * Default Value - Unchecked
     */
    public $wpc_is_use_po_mo;
    public $wpc_db_helper;

    /**
     * Type - Checkbox
     * Available Values - Checked/Unchecked
     * Description - On/Off subscription
     * Default Value - Unchecked
     */
    public $wpc_reply_subscription_on_off;
    
    public $wpc_show_plugin_powered_by;

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
        $this->wpc_is_name_field_required = isset($options['wpc_is_name_field_required']) ? $options['wpc_is_name_field_required'] : 1;
        $this->wpc_is_email_field_required = isset($options['wpc_is_email_field_required']) ? $options['wpc_is_email_field_required'] : 1;
        $this->wpc_reply_button_guests_show_hide = $options['wpc_reply_button_guests_show_hide'];
        $this->wpc_reply_button_customers_show_hide = $options['wpc_reply_button_customers_show_hide'];
        $this->wpc_reply_button_only_author_show = $options['wpc_reply_button_only_author_show'];
        $this->wpc_author_titles_show_hide = $options['wpc_author_titles_show_hide'];
        $this->wpc_usergroups_for_support_title = $options['wpc_usergroups_for_support_title'];
        $this->wpc_comment_count = $options['wpc_comment_count'];
        $this->wpc_comments_max_depth = isset($options['wpc_comments_max_depth']) ? $options['wpc_comments_max_depth'] : 3;
        $this->woodiscuz_redirect_page = isset($options['woodiscuz_redirect_page']) ? $options['woodiscuz_redirect_page'] : 0;
        $this->wpc_comment_editable_time = isset($options['wpc_comment_editable_time']) ? $options['wpc_comment_editable_time'] : 900;
        $this->wpc_is_guest_can_vote = isset($options['wpc_is_guest_can_vote']) ? $options['wpc_is_guest_can_vote'] : 0;
        $this->wpc_simple_comment_date = isset($options['wpc_simple_comment_date']) ? $options['wpc_simple_comment_date'] : 0;
        $this->wpc_comment_list_order = $options['wpc_comment_list_order'];
        $this->wpc_notify_moderator = $options['wpc_notify_moderator'];
        $this->wpc_notify_comment_author = $options['wpc_notify_comment_author'];
        $this->wpc_request_for_comment = $options['wpc_request_for_comment'];

        $this->wpc_comment_text_size = $options['wpc_comment_text_size'];
        $this->wpc_form_bg_color = $options['wpc_form_bg_color'];

        $this->wpc_comment_bg_color = $options['wpc_comment_bg_color'];
        $this->wpc_reply_bg_color = $options['wpc_reply_bg_color'];
        $this->wpc_comment_text_color = $options['wpc_comment_text_color'];
        $this->wpc_is_use_po_mo = isset($options['wpc_is_use_po_mo']) ? $options['wpc_is_use_po_mo'] : 0;
        $this->wpc_reply_subscription_on_off = isset($options['wpc_reply_subscription_on_off']) ? $options['wpc_reply_subscription_on_off'] : 0;
        $this->wpc_show_plugin_powered_by = isset($options['wpc_show_plugin_powered_by']) ? $options['wpc_show_plugin_powered_by'] : 0;
    }

    /**
     * initialize default phrases
     */
    public function init_phrases() {
        $this->wpc_phrases = array(
            'wpc_discuss_tab' => __('Discussions', WPC_Core::$TEXT_DOMAIN),
            'wpc_header_text' => __('Got something to discuss?', WPC_Core::$TEXT_DOMAIN),
            'wpc_comment_start_text' => __('Start the discussion', WPC_Core::$TEXT_DOMAIN),
            'wpc_comment_join_text' => __('Join the discussion', WPC_Core::$TEXT_DOMAIN),
            'wpc_email_text' => __('Email', WPC_Core::$TEXT_DOMAIN),
            'wpc_name_text' => __('Name', WPC_Core::$TEXT_DOMAIN),
            'wpc_captcha_text' => __('Please insert the code above to comment', WPC_Core::$TEXT_DOMAIN),
            'wpc_submit_text' => __('Post Comment', WPC_Core::$TEXT_DOMAIN),
            'wpc_load_more_submit_text' => __('Load More Comments', WPC_Core::$TEXT_DOMAIN),
            'wpc_reply_text' => __('Reply', WPC_Core::$TEXT_DOMAIN),
            'wpc_share_text' => __('Share', WPC_Core::$TEXT_DOMAIN),
            'wpc_edit_text' => __('Edit', WPC_Core::$TEXT_DOMAIN),
            'wpc_comment_edit_cancel_button' => __('Cancel', WPC_Core::$TEXT_DOMAIN),
            'wpc_comment_edit_save_button' => __('Save', WPC_Core::$TEXT_DOMAIN),
            'wpc_share_facebook' => __('Share On Facebook', WPC_Core::$TEXT_DOMAIN),
            'wpc_share_twitter' => __('Share On Twitter', WPC_Core::$TEXT_DOMAIN),
            'wpc_share_google' => __('Share On Google', WPC_Core::$TEXT_DOMAIN),
            'wpc_share_vk' => __('Share On VKontakte', WPC_Core::$TEXT_DOMAIN),
            'wpc_share_ok' => __('Share On Odnoklassniki', WPC_Core::$TEXT_DOMAIN),
            'wpc_hide_replies_text' => __('Hide Replies', WPC_Core::$TEXT_DOMAIN),
            'wpc_show_replies_text' => __('Show Replies', WPC_Core::$TEXT_DOMAIN),
            'wpc_user_title_guest_text' => __('Guest', WPC_Core::$TEXT_DOMAIN),
            'wpc_user_title_member_text' => __('Member', WPC_Core::$TEXT_DOMAIN),
            'wpc_user_title_customer_text' => __('Customer', WPC_Core::$TEXT_DOMAIN),
            'wpc_user_title_support_text' => __('Support', WPC_Core::$TEXT_DOMAIN),
            'wpc_email_subject' => __('New Comment', WPC_Core::$TEXT_DOMAIN),
            'wpc_email_message' => __('New comment on the product discussion section you\'ve been interested in', WPC_Core::$TEXT_DOMAIN),
            'wpc_request_reply_subject' => __('Leave a Reply', WPC_Core::$TEXT_DOMAIN),
            'wpc_request_reply_message' => __('Please, leave a reply on', WPC_Core::$TEXT_DOMAIN),
            'wpc_error_empty_text' => __('please fill out this field to comment', WPC_Core::$TEXT_DOMAIN),
            'wpc_error_email_text' => __('email address is invalid', WPC_Core::$TEXT_DOMAIN),
            'wpc_year_text' => array('datetime' => array(__('year', WPC_Core::$TEXT_DOMAIN), 1)),
            'wpc_year_text_plural' => array('datetime' => array(__('years', WPC_Core::$TEXT_DOMAIN), 1)), // PLURAL
            'wpc_month_text' => array('datetime' => array(__('month', WPC_Core::$TEXT_DOMAIN), 2)),
            'wpc_month_text_plural' => array('datetime' => array(__('months', WPC_Core::$TEXT_DOMAIN), 2)), // PLURAL
            'wpc_day_text' => array('datetime' => array(__('day', WPC_Core::$TEXT_DOMAIN), 3)),
            'wpc_day_text_plural' => array('datetime' => array(__('days', WPC_Core::$TEXT_DOMAIN), 3)), // PLURAL
            'wpc_hour_text' => array('datetime' => array(__('hour', WPC_Core::$TEXT_DOMAIN), 4)),
            'wpc_hour_text_plural' => array('datetime' => array(__('hours', WPC_Core::$TEXT_DOMAIN), 4)), // PLURAL
            'wpc_minute_text' => array('datetime' => array(__('minute', WPC_Core::$TEXT_DOMAIN), 5)),
            'wpc_minute_text_plural' => array('datetime' => array(__('minutes', WPC_Core::$TEXT_DOMAIN), 5)), // PLURAL
            'wpc_second_text' => array('datetime' => array(__('second', WPC_Core::$TEXT_DOMAIN), 6)),
            'wpc_second_text_plural' => array('datetime' => array(__('seconds', WPC_Core::$TEXT_DOMAIN), 6)), // PLURAL
            'wpc_plural_text' => __('s', WPC_Core::$TEXT_DOMAIN),
            'wpc_right_now_text' => __('right now', WPC_Core::$TEXT_DOMAIN),
            'wpc_ago_text' => __('ago', WPC_Core::$TEXT_DOMAIN),
            'wpc_posted_today_text' => __('today', WPC_Core::$TEXT_DOMAIN),
            'wpc_you_must_be_text' => __('You must be', WPC_Core::$TEXT_DOMAIN),
            'wpc_logged_in_text' => __('logged in', WPC_Core::$TEXT_DOMAIN),
            'wpc_to_post_comment_text' => __('to post a comment.', WPC_Core::$TEXT_DOMAIN),
            'wpc_vote_up' => __('Vote Up', WPC_Core::$TEXT_DOMAIN),
            'wpc_vote_down' => __('Vote Down', WPC_Core::$TEXT_DOMAIN),
            'wpc_vote_counted' => __('Vote Counted', WPC_Core::$TEXT_DOMAIN),
            'wpc_vote_only_one_time' => __("You've already voted for this comment", WPC_Core::$TEXT_DOMAIN),
            'wpc_voting_error' => __('Voting Error', WPC_Core::$TEXT_DOMAIN),
            'wpc_login_to_vote' => __('You Must Be Logged In To Vote', WPC_Core::$TEXT_DOMAIN),
            'wpc_self_vote' => __('You cannot vote for your comment', WPC_Core::$TEXT_DOMAIN),
            'wpc_deny_voting_from_same_ip' => __('You are not allowed to vote for this comment', WPC_Core::$TEXT_DOMAIN),
            'wpc_invalid_captcha' => __('Invalid Captcha Code', WPC_Core::$TEXT_DOMAIN),
            'wpc_invalid_field' => __('Some of field value is invalid', WPC_Core::$TEXT_DOMAIN),
            'wpc_held_for_moderate' => __('Your Comment awaiting moderation', WPC_Core::$TEXT_DOMAIN),
            'wpc_comment_not_updated' => __('Sorry, the comment was not updated', WPC_Core::$TEXT_DOMAIN),
            'wpc_comment_edit_not_possible' => __('Sorry, this comment no longer possible to edit', WPC_Core::$TEXT_DOMAIN),
            'wpc_comment_not_edited' => __('You\'ve not made any changes', WPC_Core::$TEXT_DOMAIN),
            'wpc_notify_on_new_reply' => __('Notify of new replies to this comment', WPC_Core::$TEXT_DOMAIN),
            'wpc_confirm_email_subject' => __('Subscribe Confirmation', WPC_Core::$TEXT_DOMAIN),
            'wpc_confirm_email_message' => __('Hi, <br/> You just subscribed for new comments on our website. This means you will receive an email when new comments are posted according to subscription option you\'ve chosen. <br/> To activate, click confirm below. If you believe this is an error, ignore this message and we\'ll never bother you again.', WPC_Core::$TEXT_DOMAIN),
            'wpc_confirm_email' => __('Confirm Subscription', WPC_Core::$TEXT_DOMAIN),
            'wpc_ignore_subscription' => __('Ignore Subscription', WPC_Core::$TEXT_DOMAIN),
            'wpc_unsubscribe_message' => __('You\'ve successfully unsubscribed.', WPC_Core::$TEXT_DOMAIN),
            'wpc_confirm_success_message' => __('You\'ve successfully confirmed your subscription.', WPC_Core::$TEXT_DOMAIN),
            'wpc_unsubscribe' => __('Unsubscribe', WPC_Core::$TEXT_DOMAIN),
            'wpc_new_reply_email_subject' => __('New Reply', WPC_Core::$TEXT_DOMAIN),
            'wpc_new_reply_email_message' => __('New reply on the discussion section you\'ve been interested in', WPC_Core::$TEXT_DOMAIN),
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
            'wpc_is_name_field_required' => $this->wpc_is_name_field_required,
            'wpc_is_email_field_required' => $this->wpc_is_email_field_required,
            'wpc_reply_button_guests_show_hide' => $this->wpc_reply_button_guests_show_hide,
            'wpc_reply_button_customers_show_hide' => $this->wpc_reply_button_customers_show_hide,
            'wpc_reply_button_only_author_show' => $this->wpc_reply_button_only_author_show,
            'wpc_author_titles_show_hide' => $this->wpc_author_titles_show_hide,
            'wpc_usergroups_for_support_title' => $this->wpc_usergroups_for_support_title,
            'wpc_comment_count' => $this->wpc_comment_count,
            'wpc_comments_max_depth' => $this->wpc_comments_max_depth,
            'woodiscuz_redirect_page' => $this->woodiscuz_redirect_page,
            'wpc_comment_editable_time' => $this->wpc_comment_editable_time,
            'wpc_is_guest_can_vote' => $this->wpc_is_guest_can_vote,
            'wpc_simple_comment_date' => $this->wpc_simple_comment_date,
            'wpc_comment_list_order' => $this->wpc_comment_list_order,
            'wpc_notify_moderator' => $this->wpc_notify_moderator,
            'wpc_notify_comment_author' => $this->wpc_notify_comment_author,
            'wpc_request_for_comment' => $this->wpc_request_for_comment,
            'wpc_comment_text_size' => $this->wpc_comment_text_size,
            'wpc_form_bg_color' => $this->wpc_form_bg_color,
            'wpc_comment_bg_color' => $this->wpc_comment_bg_color,
            'wpc_reply_bg_color' => $this->wpc_reply_bg_color,
            'wpc_comment_text_color' => $this->wpc_comment_text_color,
            'wpc_is_use_po_mo' => $this->wpc_is_use_po_mo,
            'wpc_reply_subscription_on_off' => $this->wpc_reply_subscription_on_off,
            'wpc_show_plugin_powered_by' => $this->wpc_show_plugin_powered_by,
        );

        return $options;
    }

    public function update_options() {
        update_option($this->wpc_options_slug, serialize($this->to_array()));
    }

    public function add_options() {
        $options = array(
            'wpc_tab_on_off' => '0',
            'wpc_comment_tab_priority' => '1000',
            'wpc_tab_show_hide' => '0',
            'wpc_voting_buttons_show_hide' => '0',
            'wpc_share_buttons_show_hide' => '0',
            'wpc_captcha_show_hide' => '0',
            'wpc_user_must_be_registered' => '0',
            'wpc_is_name_field_required' => '1',
            'wpc_is_email_field_required' => '1',
            'wpc_reply_button_guests_show_hide' => '0',
            'wpc_reply_button_customers_show_hide' => '0',
            'wpc_reply_button_only_author_show' => '0',
            'wpc_author_titles_show_hide' => '0',
            'wpc_usergroups_for_support_title' => array('administrator', 'shop_manager'),
            'wpc_comment_count' => '5',
            'wpc_comments_max_depth' => '3',
            'woodiscuz_redirect_page' => '0',
            'wpc_comment_editable_time' => '900',
            'wpc_is_guest_can_vote' => '0',
            'wpc_simple_comment_date' => '0',
            'wpc_comment_list_order' => 'desc',
            'wpc_notify_moderator' => '1',
            'wpc_notify_comment_author' => '1',
            'wpc_request_for_comment' => '0',
            'wpc_comment_text_size' => '14px',
            'wpc_form_bg_color' => '#f9f9f9',
            'wpc_comment_bg_color' => '#fefefe',
            'wpc_reply_bg_color' => '#f8f8f8',
            'wpc_comment_text_color' => '#555',
            'wpc_is_use_po_mo' => '0',
            'wpc_reply_subscription_on_off' => '0',
            'wpc_show_plugin_powered_by' => '0',
        );
        add_option($this->wpc_options_slug, serialize($options));
    }

    public function init_phrases_on_load() {
        if (!$this->wpc_is_use_po_mo && $this->wpc_db_helper->is_phrase_exists('wpc_discuss_tab')) {
            $this->wpc_phrases = $this->wpc_db_helper->get_phrases();
        } else {
            $this->init_phrases();
        }
    }

}
