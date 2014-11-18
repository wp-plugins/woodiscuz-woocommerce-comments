<?php

class WPC_CSS {

    private $primary_color;
    private $highlight_color;
    private $wpc_options;

    function __construct($wpc_options) {
        $this->init_colors();
        $this->wpc_options = $wpc_options;
    }

    /**
     * init woo discuss styles
     */
    public function init_styles() {
        ?>
        <style type="text/css">

            #woopcomm form .item {display: block;} .item input {}

            /* ===== Comment Form CSS ===== */

            #woopcomm { margin:10px auto; width:99%; padding:15px; border:#CCCCCC dotted 1px; }
            #woopcomm form { margin:0px; padding:0px; background:none; border:none; }
            #woopcomm form div{ margin:0px; }
            #woopcomm .wpc-form-wrapper{ padding:10px; background:#F9F9F9; margin-top:10px; border:1px solid #F1F1F1; }
            #woopcomm .wpc-author-data{ margin-bottom:10px; }
            #woopcomm .wpc-field-submit{ padding:5px 0px 13px 0px; }
            #woopcomm .wpc-field-name{ width:49%; float:left; }
            #woopcomm .wpc-field-email{ width:49%; float:right; text-align:right; }
            #woopcomm .wpc-field-comment{ margin:5px auto 10px auto; }
            #woopcomm .wpc-field-captcha{ width:55%; float:left; margin:0px; }
            #woopcomm .wpc-field-submit{ width:45%; float:right; text-align:right; margin:0px; }
            #woopcomm .wpc-field-name input[type="text"]{ width:95%; max-width:100%; padding:5px; font-size:14px; margin:0px; }
            #woopcomm .wpc-field-email input[type="email"]{ width:100%; max-width:100%; padding:5px; font-size:14px; margin:0px; }
            #woopcomm .wpc-field-captcha input[type="text"]{ width:40%; padding:5px; font-size:14px; margin:0px; }
            #woopcomm .wpc-field-submit input[type="submit"]{ margin:1px; }
            #woopcomm .wpc-field-submit input[type="button"]{ margin:1px; }
            #woopcomm .captcha_msg{ color: #aaaaaa; font-family: Lato,sans-serif; font-size: 12px; line-height: 18px; display:block; clear:both; }
            #woopcomm .wpc-field-comment textarea{ width:100%; max-width:100%; height:43px; min-height: 43px !important; padding:5px; box-sizing: border-box; }
            #woopcomm .wpc-label{ display:block; font-size:14px; padding:5px; }
            #woopcomm .wpc-field-captcha .wpc-label{ font-size:18px; padding:5px; text-align:center; display:inline; }
            #woopcomm input[type="text"], #woopcomm input[type="email"], #woopcomm textarea{ font-size:14px; color:#666666; font-family:Lato,sans-serif; box-sizing: border-box; margin:0px; }
            #woopcomm .wpc-copyright{ margin: 0px 0px 0px auto; text-align:right; display: block; padding-top: 2px; }
            #woopcomm .wpc-copyright a{ font-size: 9px; color: #AAAAAA; cursor:help; text-decoration:none; margin:0px; padding:0px; border:none;}
            #woopcomm .wpc-thread-wrapper{ padding:10px 0px; margin-bottom:30px;}
            #woopcomm .wpc-comment { margin-bottom:13px; }
            #woopcomm .wpc-comment .wpc-field-submit{ padding:5px 0px 5px 0px; }
            #woopcomm .wpc-comment .wpc-form-wrapper{ padding:10px 10px 2px 10px; }
            #woopcomm .wpc-comment .wpc-comment-left{ width:62px; float:left; position:absolute; text-align:center; font-family:Lato,sans-serif; line-height:16px; }
            #woopcomm .wpc-comment .wpc-comment-right{ margin-left:70px; border:#F5F5F5 1px solid; padding:10px 10px 3px 10px; background:<?php echo $this->wpc_options->wpc_options_serialize->wpc_comment_bg_color; ?>}
            #woopcomm .wpc-reply .wpc-comment-right{ margin-left:70px; border:#F5F5F5 1px solid; padding:10px 10px 3px 10px; }
            #woopcomm .wpc-reply { margin-top: 10px; margin-bottom:0px; margin-left:40px; }
            #woopcomm .wpc-reply .wpc-comment-right{ background:<?php echo $this->wpc_options->wpc_options_serialize->wpc_reply_bg_color; ?>; }
            #woopcomm .wpc-comment-title{ margin:0px; font-size:18px; line-height:18px; font-weight:bold; padding:10px; margin-bottom:10px; }
            #woopcomm .wpc-must-login{  margin:0px; font-size:14px; line-height:16px; padding:10px }
            #woopcomm hr{ background-color: rgba(0, 0, 0, 0.1); border: 0 none; height: 1px; margin:10px 0px; }
            #woopcomm .avatar{ border: 1px solid rgba(0, 0, 0, 0.1); padding: 2px; margin:0px; float:none; }
            #woopcomm .wpc-comment-text{ font-size:13px; text-align:left; color:<?php echo $this->wpc_options->wpc_options_serialize->wpc_comment_text_color; ?>; }
            #woopcomm .wpc-comment-header{ margin-bottom:7px; font-family:Lato,sans-serif; }
            #woopcomm .wpc-comment-author{ color:<?php echo $this->primary_color; ?>; font-size:16px; width:40%; float:left; white-space:nowrap; }
            #woopcomm .wpc-comment-label{ background:<?php echo $this->primary_color; ?>; color:#FFFFFF; padding:2px 5px; font-size:12px; margin:4px auto; text-align:center; display:table; line-height:16px; }
            #woopcomm .wpc-comment-date{ font-size:12px; color:#999999; width:59%; float:right; text-align:right; white-space:nowrap; line-height:27px; }
            #woopcomm .wpc-comment-footer { font-size:12px; font-weight:normal; color:#999999; margin-top:10px; min-height: 28px; font-family:Lato,sans-serif; }
            #woopcomm .wpc-comment-footer a{ text-decoration:none; font-size:13px; font-weight:bold; color:<?php echo $this->highlight_color; ?>; }
            #woopcomm .wpc-comment-footer .share_buttons_box img{ vertical-align:middle; }
            #woopcomm .wpc-comment-footer .wpc-voted{ color:#666666; cursor:default; }
            #woopcomm .wpc-comment-footer .wpc-vote-result{ padding:2px 6px 2px 5px; background:<?php echo $this->highlight_color; ?>; color:#FFFFFF; font-size:12px; font-weight:bold; display:inline; margin-right:5px;}
            #woopcomm .wpc-toggle{ float:right; text-align:right; padding-right:0px; margin-right:0px; color:#999999; cursor:pointer; font-size:12px; }
            #woopcomm .item { background: none; border-radius: 0px; box-shadow: none; }
            #wpc_response_info img{ margin: 0px auto 0px auto; }
            #woopcomm .share_buttons_box img { display:inline!important; }
            #woopcomm .wpc-captcha-label img{ display: inline!important; border:none; padding:0px 1px; margin:0px; }

            /* === CUSTOM === */

            #woopcomm .wpc-reply-link,
            #woopcomm .wpc-vote-link,
            #woopcomm .wpc-share-link {
                cursor: pointer; font-size:13px; font-weight:bold; color: <?php echo $this->highlight_color; ?>;
            }

            #woopcomm .wpc-form-footer,
            #woopcomm .wpc-secondary-forms-wrapper {display: none;}

            #woopcomm .wpc-field-captcha .wpc-captcha-label {
                margin-left: 5px;
                padding: 0;
                display: inline-block;
            }

            #woopcomm .wpc_captcha_refresh_img {cursor: pointer; margin-left: 3px;}
            #woopcomm .share_buttons_box {display: none;/*position: absolute;left: 40%;*/}

            #woopcomm .wpc-no-left-margin {margin-left: 0 !important;}

            div.wpc_modal {
                background: none repeat scroll 0 0 #EDEDED;
                color:#444444;
                font-size: 18px;
                font-weight: normal;
                padding: 45px 10px 50px 10px!important;
                text-align: center;
                line-height:25px;
            }

            /* ===== Comment Form CSS ===== */

            .wpc-load-more-submit-wrap {
                width: 100%;
                text-align: center;
            }

            .wpc-load-more-submit {
                width: 100%;
                text-align: center;
            }

            #wpc_openModalFormAction > div#wpc_response_info {
                width: 200px;
                background: none repeat scroll 0 0 #EDEDED;
                color:#444444;
                font-size: 18px;
                font-weight: normal;
                padding: 45px 10px 50px 10px!important;
                text-align: center;
                line-height:25px;
            }

            #wpc_openModalFormAction > div#wpc_response_info {
                /*z-index: 10000;*/
            }
            
            #wpc_openModalFormAction > div#wpc_response_info a.close {
              background: url("<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/x.png'); ?>") no-repeat;
              background-position-x: right;
              background-position-y: top;
            }

        </style>
        <?php
    }

    /**
     * init woocomerce colors
     */
    public function init_colors() {
        $colors = get_option('woocommerce_frontend_css_colors');
        $this->primary_color = ( $colors['primary'] ) ? $colors['primary'] : '#ad74a2';
        $this->highlight_color = ( $colors['highlight'] ) ? $colors['highlight'] : '#85ad74';
    }

}
?>
