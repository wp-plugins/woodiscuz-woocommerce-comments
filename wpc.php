<?php

/*
  Plugin Name: WooDiscuz - WooCommerce Comments
  Description: WooCommerce product comments and discussion Tab. Allows your customers to discuss about your products and ask pre-sale questions. Adds a new "Discussions" Tab next to "Reviews" Tab. Your shop visitors will thank you for ability to discuss about your products directly on your website product page. WooDiscuz also allows to vote for comments and share products.
  Version: 1.0.3
  Author: gVectors Team (A. Chakhoyan, G. Zakaryan, H. Martirosyan)
  Author URI: http://www.gvectors.com/
  Plugin URI: http://woodiscuz.com/
 */

include_once 'wpc-options.php';
include_once 'helper/wpc-helper.php';
include_once 'includes/wpc-db-helper.php';
include_once 'comment-form/tpl-comment.php';
include_once 'dto/wpc-comment.php';
include_once 'wpc-css.php';

class WPC {

    private $wpc_options;
    private $comment_types;
    private $reviews_count;
    private $wpc_db_helper;
    private $wpc_helper;
    private $comment_tpl_builder;
    private $wpc_css;
    private $wpc_parent_comments_count;
    public static $PLUGIN_DIRECTORY;

    function __construct() {
        add_action('init', array(&$this, 'init_plugin_dir_name'), 1);

        $this->wpc_options = new WPC_Options();
        $this->wpc_db_helper = $this->wpc_options->wpc_db_helper;

        register_activation_hook(__FILE__, array($this, 'db_operations'));


        $this->wpc_helper = new WPC_Helper($this->wpc_options->wpc_options_serialize);
        $this->wpc_css = new WPC_CSS($this->wpc_options);
        $this->comment_tpl_builder = new Comment_Template_Builder($this->wpc_helper, $this->wpc_db_helper, $this->wpc_options);

        add_action('init', array(&$this, 'register_session'), 2);
        add_action('admin_notices', array($this, 'woop_disscus_requirements'));

        add_action('admin_enqueue_scripts', array(&$this, 'admin_page_styles_scripts'), 2315);
        add_action('wp_enqueue_scripts', array(&$this, 'front_end_styles_scripts'));
        add_action('wp_enqueue_scripts', array(&$this->wpc_css, 'init_styles'));

        add_action('admin_menu', array(&$this, 'add_plugin_options_page'), -191);

        add_action('wp_ajax_comms_via_ajax', array(&$this, 'comment_submit_via_ajax'));
        add_action('wp_ajax_nopriv_comms_via_ajax', array(&$this, 'comment_submit_via_ajax'));

        add_action('wp_ajax_load_more_comments', array(&$this, 'load_more_comments'));
        add_action('wp_ajax_nopriv_load_more_comments', array(&$this, 'load_more_comments'));

        add_action('wp_ajax_vote_via_ajax', array(&$this, 'vote_on_comment'));
        add_action('wp_ajax_nopriv_vote_via_ajax', array(&$this, 'vote_on_comment'));

        add_action('wp_ajax_email_notification', array(&$this, 'email_notification'));
        add_action('wp_ajax_nopriv_email_notification', array(&$this, 'email_notification'));
        
        add_action('get_avatar_comment_types', array(&$this, 'woodiscuz_review_avatar'));

        if (!$this->wpc_options->wpc_options_serialize->wpc_tab_on_off) {
            add_filter('woocommerce_product_tabs', array(&$this, 'add_comment_tab'));
        }
        if ($this->wpc_options->wpc_options_serialize->wpc_tab_show_hide) {
            add_filter('woocommerce_product_tabs', array(&$this, 'woo_hide_reviews_tab'), 98);
        }
        add_filter('admin_comment_types_dropdown', array(&$this, 'add_comment_type'));
        add_filter('wp_list_comments_args', array(&$this, 'wpc_list_comments_args'));
        add_filter('preprocess_comment', array(&$this, 'wpc_new_comment'));

        add_filter('woocommerce_product_reviews_tab_title', array(&$this, 'wpc_rename_reviews_tab'));
    }

    public function woop_disscus_requirements() {
        if (!is_plugin_active('woocommerce/woocommerce.php')) {
            echo "<div class='error'><p>" . __('WooDiscuz requires Woocommerce to be installed!', 'woodiscuz') . "</p></div>";
        }

        if ($this->wpc_db_helper->get_empty_comment_types()) {
            echo "<div class='update-nag woocommerce-message wc-connect' style='width:95%'>
						Please click on this button to start using WooDiscuz&nbsp; -&nbsp; <a class='woodiscuz_update_reviews button-primary' href='" . $_SERVER['PHP_SELF'] . "?woodiscuz_update_reviews=s3wc8fs4x1erg5'>Synchronize with WooCommerce</a>
				  		<br /><span style=\"font-size:12px;\">WooCommerce doesn't have its own comment type for product reviews, this synchronization will not allow any conflicts with WooDiscuz comments.</span>
				  </div>";
        }
    }

    /**
     * create table
     * updates the comments to set comment type review if comment id is exists in comment meta table
     */
    public function db_operations() {
        $this->wpc_db_helper->create_tables();
    }

    /*
     * register new session
     */

    public function register_session() {
        if (!session_id()) {
            session_start();
        }
    }

    public function wpc_rename_reviews_tab() {
        global $post;
        $this->reviews_count = $this->wpc_db_helper->get_reviews_count('woodiscuz_review', $post->ID);
        return _e('Reviews', 'woocommerce') . '(' . $this->reviews_count . ')';
    }

    /*
     * add comment tab 
     */

    public function add_comment_tab($tabs) {
        $priority = ($this->wpc_options->wpc_options_serialize->wpc_comment_tab_priority) ? 1 : 100;

        $tabs['comment_tab'] = array(
            'title' => $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_discuss_tab'],
            'priority' => $priority,
            'callback' => array(&$this, 'wpc_comment_tab_content')
        );
        return $tabs;
    }

    public function wpc_comment_tab_content() {
        include 'comment-form/form.php';
    }

    /*
     * Hide WooCommerce Review Tab 
     */

    function woo_hide_reviews_tab($tabs) {
        unset($tabs['reviews']);    // Remove the reviews tab
        return $tabs;
    }

    /*
     * add new comment type 
     */

    public function add_comment_type($args) {
        $this->comment_types = $args;
        $args['woodiscuz'] = __('WooDiscuz', 'woodiscuz');
        $args['woodiscuz_review'] = __('Woocomerce Review', 'woodiscuz');
        return $args;
    }

    /**
     * change comment type 
     */
    public function wpc_new_comment($commentdata) {
        
         $commentdata['comment_type'] = isset($commentdata['comment_type']) ? $commentdata['comment_type'] : '';
        $comment_post = get_post($commentdata['comment_post_ID']);
        if ($comment_post->post_type === 'product' && $commentdata['comment_type'] != 'woodiscuz') {
            $com_parent = $commentdata['comment_parent'];
            if ($com_parent != 0) {
                $parent_comment = get_comment($com_parent);
                if ($parent_comment->comment_type == 'woodiscuz') {
                    $commentdata['comment_type'] = 'woodiscuz';
                } else {
                    $commentdata['comment_type'] = 'woodiscuz_review';
                }
            } else {
                $commentdata['comment_type'] = 'woodiscuz_review';
            }
        }

        return $commentdata;
    }

    /**
     * register options page for plugin
     */
    public function add_plugin_options_page() {
        if (function_exists('add_options_page')) {
            add_menu_page('WooDiscuz', 'WooDiscuz', 'manage_options', 'woodiscuz_options_page', array(&$this->wpc_options, 'main_options_form'), plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/plugin-icon/plugin-icon-20.png'), 1245);
            add_submenu_page('woodiscuz_options_page', 'Phrases', 'Phrases', 'manage_options', 'woodiscuz_phrases_page', array(&$this->wpc_options, 'phrases_options_form'));
        }
    }

    /**
     * Styles and scripts registration to use on front page
     */
    public function front_end_styles_scripts() {

        wp_register_style('basic-dialog-style', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/css/basic.css'));
        wp_enqueue_style('basic-dialog-style');

        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('/MSIE/i', $u_agent)) {
            wp_register_style('basic-dialog-ie-style', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/css/basic-ie.css'));
            wp_enqueue_style('basic-dialog-ie-style');

            wp_enqueue_script('wpc-html5-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/tooltipster/js/html5.js'), array('jquery'), '1.2', false);
        }

        wp_enqueue_script('basic-dialog-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/js/jquery.simplemodal.js'), array('jquery'), '1.0.0', false);

        wp_enqueue_script('form-validator-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/js/validator.js'), array('jquery'), '1.0.0', false);

        wp_register_style('validator-style', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/css/fv.css'));
        wp_enqueue_style('validator-style');

        wp_enqueue_script('wpc-ajax-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/js/wpc-ajax.js'), array('jquery'), '1.0.0', false);
        wp_localize_script('jquery', 'wpc_ajax_obj', array('url' => admin_url('admin-ajax.php')));

        wp_enqueue_script('wpc-cookie-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/js/jquery.cookie.js'), array('jquery'), '1.4.1', false);

        wp_register_style('wpc-tooltipster-style', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/tooltipster/css/tooltipster.css'));
        wp_enqueue_style('wpc-tooltipster-style');

        wp_enqueue_script('wpc-tooltipster-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/tooltipster/js/jquery.tooltipster.min.js'), array('jquery'), '1.2', false);

        wp_enqueue_script('autogrowtextarea-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/js/jquery.autogrowtextarea.min.js'), array('jquery'), '3.0', false);
    }

    /**
     * Scripts and styles registration on administration pages
     */
    public function admin_page_styles_scripts() {

        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i', $u_agent)) {
            wp_register_style('modal-css-ie', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/modal-box/modal-box-ie.css'));
            wp_enqueue_style('modal-css-ie');
        }

        wp_register_style('modal-box-css', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/modal-box/modal-box.css'));
        wp_enqueue_style('modal-box-css');

        wp_register_style('colorpicker-css', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/colorpicker/css/colorpicker.css'));
        wp_enqueue_style('colorpicker-css');

        wp_register_script('wpc-colorpicker-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/colorpicker/js/colorpicker.js'), array('jquery'), '2.0.0.9', false);
        wp_enqueue_script('wpc-colorpicker-js');

        wp_register_style('wpc-options-css', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/css/options-css.css'));
        wp_enqueue_style('wpc-options-css');

        wp_register_script('wpc-option-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/js/options-js.js'), array('jquery'));
        wp_enqueue_script('wpc-option-js');

        wp_register_script('wpc-scripts-js', plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/js/wpc-scripts.js'), array('jquery'));
        wp_enqueue_script('wpc-scripts-js');
    }

    /*
     * post comment via ajax
     */

    public function comment_submit_via_ajax() {

        $message_array = array();
        $comment_post_ID = intval(filter_input(INPUT_POST, 'comment_post_ID'));
        $comment_parent = intval(filter_input(INPUT_POST, 'comment_parent'));
        if (!$this->wpc_options->wpc_options_serialize->wpc_captcha_show_hide) {
            if (!is_user_logged_in()) {
                $sess_captcha = $_SESSION['wpc_captcha'][$comment_post_ID . '-' . $comment_parent];
                $captcha = filter_input(INPUT_POST, 'captcha');
                if (md5(strtolower($captcha)) !== $sess_captcha) {
                    $message_array['code'] = -1;
                    $message_array['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_invalid_captcha'];
                    echo json_encode($message_array);
                    exit;
                }
            }
        }
        $comment = filter_input(INPUT_POST, 'comment');

        if (is_user_logged_in()) {
            $user_id = get_current_user_id();
            $user = get_userdata($user_id);
            $name = $user->display_name;
            $email = $user->user_email;
            $user_url = $user->user_url;
        } else {
            $name = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email');
            $user_id = 0;
            $user_url = '';
        }

        $comment = preg_replace('|[\n]+|', '<br />', wp_kses($comment, 'default'));

        if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $comment && filter_var($comment_post_ID)) {

            $held_moderate = 1;
            if ($this->wpc_options->wpc_options_serialize->wpc_held_comment_to_moderate) {
                $held_moderate = 0;
            }

            $new_commentdata = array(
                'user_id' => $user_id,
                'comment_post_ID' => $comment_post_ID,
                'comment_parent' => $comment_parent,
                'comment_author' => $name,
                'comment_author_email' => $email,
                'comment_content' => $comment,
                'comment_author_url' => $user_url,
                'comment_type' => 'woodiscuz',
                'comment_approved' => $held_moderate
            );
            $new_comment_id = wp_insert_comment($new_commentdata);
            $new_comment = new WPC_Comment(get_comment($new_comment_id, OBJECT));

            if (!$held_moderate) {
                $message_array['code'] = -2;
                $message_array['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_held_for_moderate'];
            } else {
                $message_array['code'] = 1;
                $message_array['message'] = $this->comment_tpl_builder->get_comment_template($new_comment);
            }
            $message_array['wpc_new_comment_id'] = $new_comment_id;
        } else {
            $message_array['code'] = -1;
            $message_array['wpc_new_comment_id'] = -1;
            $message_array['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_invalid_field'];
        }
        echo json_encode($message_array);
        exit;
    }

    /**
     * notify on new comments
     */
    public function email_notification() {

        $wpc_new_comment_id = isset($_POST['wpc_new_comment_id']) ? intval($_POST['wpc_new_comment_id']) : -1;
        $wpc_comment_parent = isset($_POST['wpc_comment_parent']) ? intval($_POST['wpc_comment_parent']) : -1;
        if ($wpc_new_comment_id !== -1 && $wpc_comment_parent !== -1) {
            if ($this->wpc_options->wpc_options_serialize->wpc_notify_moderator) {
                wp_notify_postauthor($wpc_new_comment_id);
            }
            if ($this->wpc_options->wpc_options_serialize->wpc_notify_comment_author && $wpc_comment_parent) {
                $wpc_new_comment_content = get_comment($wpc_new_comment_id)->comment_content;
                $comment = get_comment($wpc_comment_parent);
                $to = $comment->comment_author_email;
                $subject = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_email_subject'];
                $permalink = get_comment_link($wpc_comment_parent);
                $message = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_email_message'];
                $message .= "<br/><br/><a href='$permalink'>$permalink</a>";
                $message .= "<br/><br/>$wpc_new_comment_content";
                $headers = array();
                $headers[] = "Content-Type: text/html; charset=UTF-8";
                $headers[] = "From: " . get_bloginfo('name') . "\r\n";
                wp_mail($to, $subject, $message, $headers);
            }
        }
    }

    /**
     * vote on comment via ajax
     */
    public function vote_on_comment() {
        $messageArray = array();
        $messageArray['code'] = -1;
        $comment_id = '';
        if (!is_user_logged_in()) {
            $messageArray['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_login_to_vote'];
            echo json_encode($messageArray);
            exit();
        }
        if (isset($_POST['comment_ID']) && isset($_POST['vote_type']) && intval($_POST['comment_ID']) && intval($_POST['vote_type'])) {
            $comment_id = $_POST['comment_ID'];
            $user_id = get_current_user_id();
            $vote_type = $_POST['vote_type'];

            $is_user_voted = $this->wpc_db_helper->is_user_voted($user_id, $comment_id);
            $comment = get_comment($comment_id);
            if ($comment->user_id == $user_id) {
                $messageArray['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_self_vote'];
                echo json_encode($messageArray);
                exit();
            }

            if ($is_user_voted != '') {
                $vote = intval($is_user_voted) + intval($vote_type);
                if ($vote >= -1 && $vote <= 1) {
                    $this->wpc_db_helper->update_vote_type($user_id, $comment_id, $vote);
                    $vote_count = intval(get_comment_meta($comment_id, 'woodiscuz_votes', true)) + intval($vote_type);
                    update_comment_meta($comment_id, 'woodiscuz_votes', '' . $vote_count);
                    $messageArray['code'] = 1;
                    $messageArray['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_vote_counted'];
                } else {
                    $messageArray['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_vote_only_one_time'];
                }
            } else {
                $this->wpc_db_helper->add_vote_type($user_id, $comment_id, $vote_type);
                $vote_count = get_comment_meta($comment_id, 'woodiscuz_votes', true);
                if ($vote_count == '') {
                    add_comment_meta($comment_id, 'woodiscuz_votes', '' . $vote_type);
                } else {
                    $vote_count = intval($vote_count) + intval($vote_type);
                    update_comment_meta($comment_id, 'woodiscuz_votes', '' . $vote_count);
                }
                $messageArray['code'] = 1;
                $messageArray['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_vote_counted'];
            }
        } else {
            $messageArray['message'] = $this->wpc_options->wpc_options_serialize->wpc_phrases['wpc_voting_error'];
        }

        echo json_encode($messageArray);
        exit();
    }

    /**
     * get comments by comment type
     */
    public function get_comments_by_type($comments_offset, $post_id = null) {
        global $post;

        if (!$post_id) {
            $post_id = $post->ID;
        }
        $wpc_comment_count = $this->wpc_options->wpc_options_serialize->wpc_comment_count;

        $comm_list_args = array(
            'callback' => array(&$this, 'wpc_comment_callback'),
            'style' => 'div',
            'type' => 'woodiscuz',
            'per_page' => $comments_offset * $wpc_comment_count,
            'max_depth' => 2
        );

        $comments = get_comments(
                array(
                    'type' => 'woodiscuz',
                    'post_id' => $post_id,
                    'status' => 'approve'
                )
        );

        $wpc_comments = $this->init_wpc_comments($comments);
        wp_list_comments($comm_list_args, $wpc_comments);
        return $this->wpc_parent_comments_count;
    }

    /**
     * load more comments by offset
     */
    public function load_more_comments() {
        $c_offset = intval($_POST['comments_offset']);
        $c_offset = ($c_offset) ? $c_offset : 1;
        $post_id = intval($_POST['wpc_post_id']);
        if ($c_offset && $post_id) {
            $this->get_comments_by_type($c_offset, $post_id);
        }
        exit();
    }

    /**
     * initialize WPC comments 
     */
    public function init_wpc_comments($comments) {
        $wpc_comments = array();
        if ($comments) {
            foreach ($comments as $comment) {
                if (!$comment->comment_parent) {
                    $this->wpc_parent_comments_count++;
                }
                $wpc_comments[] = new WPC_Comment($comment);
            }
        }
        return $wpc_comments;
    }

    public function wpc_list_comments_args($args) {
        global $post;
        if ($args['type'] == 'all' && $post->post_type == 'product') {
            $args['type'] = 'woodiscuz_review';
        }
        return $args;
    }

    public function wpc_comment_callback($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        echo $this->comment_tpl_builder->get_comment_template($comment);
    }

    public function is_guest_can_comment() {
        $user_can_comment = TRUE;
        if ($this->wpc_options->wpc_options_serialize->wpc_user_must_be_registered) {
            if (!is_user_logged_in()) {
                $user_can_comment = FALSE;
            }
        }
        return $user_can_comment;
    }

    public function update_product_comments() {
        $this->wpc_db_helper->update_comments_types();
    }

    public function init_plugin_dir_name() {
        $plugin_dir_path = plugin_dir_path(__FILE__);
        $path_array = array_values(array_filter(explode(DIRECTORY_SEPARATOR, $plugin_dir_path)));
        $path_last_part = $path_array[count($path_array) - 1];
        WPC::$PLUGIN_DIRECTORY = untrailingslashit($path_last_part);
    }
    
    /**
     * check comment types and return arguments
     * by default comment type is comment
     */
    public function woodiscuz_review_avatar($args){
        $args[] = 'woodiscuz_review';
        return $args;
    }

}

$wpc = new WPC();
if (isset($_GET['woodiscuz_update_reviews'])) {
    $wpc->update_product_comments();
    unset($_GET['woodiscuz_update_reviews']);
}
?>